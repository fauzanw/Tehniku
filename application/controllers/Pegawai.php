<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

	/**
	*	 Generated by Generator
	**/

	private $data_role = array(
		"2c282814-d165-4625-8ed3-492f82c57116"  => "admin",
		"a3253f9d-0741-4838-8583-20816cd63e11"  => "perusahaan",
		"adc5ce5d-0491-4d88-b9d4-8bc11b40415a"  => "pegawai",
		"ef40c680-03f0-45b9-ab98-290200f5ff13"  => "customer"
	);

	public function __construct() {
		parent::__construct();
		checkAuthUser('Pegawai');
	}

	public function index()
	{
		$pegawai    = $this->db->get_where('pegawai', ["user_id" => $this->session->userdata('id')])->row_array();
		$perusahaan = $this->db->get_where('perusahaan', ["id" => $pegawai['perusahaan_id']])->row_array();
		$data = [
			'title'             => 'Dashboard',
			'title_main_header' => 'Dashboard',
			'data_pegawai'      => $pegawai,
			'data_perusahaan'   => $perusahaan,
			'data_pegawai2'     => $this->session->userdata()
		];
		$this->load->view('pegawai/header', $data);
		$this->load->view('pegawai/navigator', $data);
		$this->load->view('pegawai/main_header', $data);
		$this->load->view('pegawai/index', $data);
		$this->load->view('pegawai/footer', $data);
	}

	public function tugas() {
		$pegawai      = $this->db->get_where('pegawai', ["user_id" => $this->session->userdata('id')])->row_array();
		$perusahaan   = $this->db->get_where('perusahaan', ["id" => $pegawai['perusahaan_id']])->row_array();
		$this->db
			 ->select('
				ps.*,
				jpt.jasa_id,
				jpt.jasa_type_id,
				j.nama_jasa,
				j.harga,
				j.perusahaan_id,
				j.jasa_keyword_id,
				jt.type,
				p.nama,
				p.nomor_ponsel,
				p.logo_perusahaan,
				c.nomor_ponsel,
				c.alamat,
				jk.keyword
			 ')
			 ->from('pesanan ps')
			 ->join('customer c', 'ps.customer_id=c.id')
			 ->join('jasa_pivot_type jpt', 'ps.jasa_id=jpt.jasa_id')
			 ->join('jasa j', 'jpt.jasa_id=j.id')
			 ->join('jasa_type jt', 'jpt.jasa_type_id=jt.id')
			 ->join('perusahaan p', 'j.perusahaan_id=p.id')
			 ->join('jasa_keyword jk', 'j.jasa_keyword_id=jk.id')
			 ->where('p.id', $perusahaan['id'])
			 ->where('ps.status !=', 1);
		$pesanan      = $this->db->get()->result_array();
		$real_pesanan = [];
		foreach($pesanan as $i => $data) {
			$pegawai_id = $pegawai['pegawai_id'];
			if(preg_match("/$id/", $data['pegawai_id'])) {
				array_push($real_pesanan, $data);	
			}
		}
		rsort($real_pesanan);
		$data = [
			'title'             => 'Tugas',
			'title_main_header' => 'Tugas',
			'data_pegawai'      => $pegawai,
			'data_perusahaan'   => $perusahaan,
			'data_pegawai2'     => $this->session->userdata(),
			'data_pesanan'      => $real_pesanan,
		];

		$this->load->view('pegawai/header', $data);
		$this->load->view('pegawai/navigator', $data);
		$this->load->view('pegawai/main_header', $data);
		$this->load->view('pegawai/tugas', $data);
		$this->load->view('pegawai/footer', $data);
	}

	public function tugas_detail($id) {
		$pegawai = $this->db->get_where('pegawai', ["user_id" => $this->session->userdata('id')])->row_array();
		$perusahaan = $this->db->get_where('perusahaan', ["id" => $pegawai['perusahaan_id']])->row_array();
		$this->db
			 ->select('
				 ps.*,
				 c.id as customer_id,
				 c.nama,
				 c.nomor_ponsel,
				 c.foto_customer,
				 c.alamat,
				 c.latlon
			 ')
			 ->from('pesanan ps')
			 ->join('customer c', 'ps.customer_id=c.id')
			 ->where('ps.id', $id);
		$pesanan = $this->db->get()->row_array();
		$this->db
			 ->select('*')
			 ->from('jasa_pivot_type jpt')
			 ->join('jasa j', 'jpt.jasa_id=j.id')
			 ->join('perusahaan p', 'j.perusahaan_id=p.id')
			 ->join('jasa_type jt', 'jpt.jasa_type_id=jt.id')
			 ->join('jasa_keyword jk', 'j.jasa_keyword_id=jk.id')
			 ->where('jpt.jasa_id', $pesanan['jasa_id']);
		$data_jasa = $this->db->get()->row_array();
		if($pesanan && $data_jasa) {
			$data_pegawai_to_surveying = [];
			$data_material_used = [];
			$data_material = $this->db->select('m.*,mk.nama_merek')->from('material m')->join('merek mk', 'm.merek_id=mk.id')->where('jasa_keyword_id', $data_jasa['jasa_keyword_id'])->get()->result_array();
			if($pesanan['material_id_used'] == 'all') {
				$this->db
					 ->select('*')
					 ->from('material m')
					 ->join('merek mk', 'm.merek_id=mk.id')
					 ->where('m.jasa_keyword_id', $data_jasa['jasa_keyword_id']);
				array_push($data_material_used, $this->db->get()->result_array())[0];
			}else if(preg_match("/,/", $pesanan['material_id_used'])){
				$material_id_used = explode(",", $pesanan['material_id_used']);
				foreach($material_id_used as $material_id) {
					$this->db
						 ->select('*')
						 ->from('material m')
						 ->join('merek mk', 'm.merek_id=mk.id')
						 ->where('m.id', $material_id)
						 ->where('m.jasa_keyword_id', $data_jasa['jasa_keyword_id']);
					 array_push($data_material_used, $this->db->get()->row_array());
				}
			}
			$data_harga_jasa           = join("", explode(".", explode("Rp. ", $data_jasa['harga'])[1]));
			$data_harga_material_array = [];
			foreach($data_material_used as $data) {
				$data_harga_material_array[] = join("", explode(".", $data['harga']));
			}
			$data_harga_material       = array_sum($data_harga_material_array);
			$data_total                = array_sum([$data_harga_material, $data_harga_jasa]);
			if(preg_match("/,/",$pesanan['pegawai_id'])) {
				$pegawai_id = explode(",", $pesanan['pegawai_id']);
				foreach($pegawai_id as $id_pegawai) {
					array_push($data_pegawai_to_surveying, $this->db->get_where('pegawai', ['id' => $id_pegawai])->row_array());
				}
			}else{
				array_push($data_pegawai_to_surveying, $this->db->get_where('pegawai', ['id' => $pesanan['pegawai_id']])->row_array());
			}
			// $result = array_diff($data_material, $data_material_used);
			// echo '<pre>';print_r(array_unique([$data_material, $data_material_used])); die;
			$data = [
				'title'                     => 'Detail tugas',
				'title_main_header'         => 'Detail tugas',
				'data_pegawai'              => $pegawai,
				'data_perusahaan'           => $perusahaan,
				'data_pegawai2'             => $this->session->userdata(),
				'data_pesanan'              => $pesanan,
				'data_jasa'                 => $data_jasa,
				'data_material_used'        => $pesanan['material_id_used'] == 'all' ? $data_material_used[0]:$data_material_used,
				'data_material'             => $data_material,
				'data_total_harga'          => formatRupiah($data_total),
				'data_pegawai_to_surveying' => $data_pegawai_to_surveying,
				'data_laporan_tugas_ini'    => $this->db->get_where('laporan', ['pesanan_id' => $id])->row_array()
			];
			if($pesanan['status'] == 2) {
				if(!isset($_POST['survey'])) {
					$this->load->view('pegawai/header', $data);
					$this->load->view('pegawai/navigator', $data);
					$this->load->view('pegawai/main_header', $data);
					$this->load->view('pegawai/tugas_before_survey', $data);
					$this->load->view('pegawai/footer', $data);
				}else{
					$this->db->set('status', 3);
					$this->db->where('id', $id);
					$this->db->update('pesanan');
					$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil</strong> mengubah status menjadi sedang survey.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					redirect("pegawai/tugas/$id/detail");
				}
			}else if($pesanan['status'] == 3) {
				if(isset($_POST['selesai'])) {
					$this->db->set('status', 4);
					$this->db->where('id', $id);
					$this->db->update('pesanan');
					$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Tugas</strong> telah selesai.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					redirect("pegawai/tugas/$id/detail");
				}else if(isset($_POST['lapor'])) {
					$this->db->insert('laporan', [
						'id'            => uniqid(),
						'uang_masuk'    => $_POST['uang_customer'],
						'pegawai_id'    => $pegawai['id'],
						'perusahaan_id' => $perusahaan['id'],
						'customer_id'   => $pesanan['customer_id'],
						'pesanan_id'    => $id,
						'date_created'  => date('Y-m-d')
					]);
					$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil</strong> melaporkan tugas.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					redirect("pegawai/tugas/$id/detail");
				}else{
					$this->load->view('pegawai/header', $data);
					$this->load->view('pegawai/navigator', $data);
					$this->load->view('pegawai/main_header', $data);
					$this->load->view('pegawai/tugas_survey', $data);
					$this->load->view('pegawai/footer', $data);
				}
			}else if($pesanan['status'] == 4) {
				$this->load->view('pegawai/header', $data);
				$this->load->view('pegawai/navigator', $data);
				$this->load->view('pegawai/main_header', $data);
				$this->load->view('pegawai/tugas_selesai', $data);
				$this->load->view('pegawai/footer', $data);
			}
		}else{
			show_error("Data tugas tidak valid", 400);
		}
	}

	public function tugas_tambah_material($id) {
		$this->db
			 ->select('
				 ps.*,
				 c.nama,
				 c.nomor_ponsel,
				 c.foto_customer,
				 c.alamat,
				 c.latlon
			 ')
			 ->from('pesanan ps')
			 ->join('customer c', 'ps.customer_id=c.id')
			 ->where('ps.id', $id);
		$pesanan = $this->db->get()->row_array();
		$this->db
			 ->select('*')
			 ->from('jasa_pivot_type jpt')
			 ->join('jasa j', 'jpt.jasa_id=j.id')
			 ->join('perusahaan p', 'j.perusahaan_id=p.id')
			 ->join('jasa_type jt', 'jpt.jasa_type_id=jt.id')
			 ->join('jasa_keyword jk', 'j.jasa_keyword_id=jk.id')
			 ->where('jpt.jasa_id', $pesanan['jasa_id']);
		$data_jasa = $this->db->get()->row_array();
		if($pesanan && $data_jasa) {
			$material_id = "";
			foreach($_POST['id_material'] as $id_material) {
				$material_id .= "$id_material,";
			}
			$material_id  = substr($material_id, 0, -1);
			$this->db->set('material_id_used', $material_id);
			$this->db->where('id', $id);
			$this->db->update('pesanan');
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil</strong> menambahkan component ke jasa ini.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect("pegawai/tugas/$id/detail");
		}else{
			show_error("Data tugas tidak valid", 400);
		}
	}
	public function setting()
	{
		$pegawai = $this->db->get_where('pegawai', ["user_id" => $this->session->userdata('id')])->row_array();
		$perusahaan = $this->db->get_where('perusahaan', ["id" => $pegawai['perusahaan_id']])->row_array();
		$data = [
			'title'             => 'Setting',
			'title_main_header' => 'Setting',
			'data_pegawai'     => $pegawai,
			'data_perusahaan'   => $perusahaan,
			'data_pegawai2'    => $this->session->userdata(),
		];
		if(!isset($_POST['edit_data'])) {
			$this->load->view('pegawai/header', $data);
			$this->load->view('pegawai/navigator', $data);
			$this->load->view('pegawai/main_header', $data);
			$this->load->view('pegawai/setting', $data);
			$this->load->view('pegawai/footer', $data);
		}else{
			list('nama' => $nama, 'email' => $email, 'new_password' => $edited_password, 'old_password' => $old_password, 'nomor_ponsel' => $nomor_ponsel, 'gender' => $gender) = $_POST;
			$new_password    = password_hash($edited_password, PASSWORD_DEFAULT);
			$data_pegawai   = $this->db->get_where('users', ['id' => $this->session->userdata('id')])->row_array();
			$cek_email       = $this->db->select('*')->from('users')->where_not_in('email', $data['data_pegawai2']['email'])->where('email', $email)->get()->row_array();

			if($cek_email) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Gagal</strong> edit email, email yang anda masukkan sudah digunakan.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				redirect('pegawai');
			}
			$edited_foto     = $_FILES['foto_pegawai']['name'];
			// jika password mau diubah
			if($edited_password) {
				if(!$old_password) {
					$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Gagal</strong> ganti password, password lama tidak boleh kosong.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					redirect('pegawai');
				}else {
					if(password_verify($old_password, $data_pegawai['password'])) {
						$this->db->set('password', $new_password);
					}else{
						// echo $old_password."<br><br>",
						// $data['data_pegawai2']['password']."<br><br>";
						// echo password_verify($old_password, $data['data_pegawai2']['password']); die;
						$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Gagal</strong> ganti password, password lama salah.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
						redirect('pegawai');
					}
				}
			}
			$this->db->set('email', $email);
			$this->db->where('id', $data['data_pegawai2']['id']);
			$this->db->update('users');

			if($edited_foto) {
				$config = array(
					'allowed_types' => 'jpeg|jpg|png',
					'max_size'      => '2048',
					'upload_path'   => './assets/argon/img/pegawai/',
					'encrypt_name'  => TRUE
				);
				$this->load->library('upload', $config);

				if($this->upload->do_upload('foto_pegawai')) {
					$new_logo = $this->upload->data('file_name');
					if($data['data_pegawai']['foto_pegawai'] != 'default.png') {
						unlink(FCPATH."assets/argon/img/pegawai/".$data['data_pegawai']['foto_pegawai']);
					}
					$this->db->set('foto_pegawai', $new_logo);
				}else{
					if($this->upload->display_errors() == "<p>The filetype you are attempting to upload is not allowed.</p>") {
						$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Gagal</strong> edit foto, format foto harus jpg / png /jpeg.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
						redirect('pegawai');
					} else if($this->upload->display_errors() == "<p>The file you are attempting to upload is larger than the permitted size.</p>") {
						$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Gagal</strong> edit foto, size foto tidak boleh lebih dari 2mb.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
						redirect('pegawai');
					} else {
						echo $this->upload->display_errors();die;	
					}
				}
			} 
			$this->db->set('nama', $nama);
			$this->db->set('nomor_ponsel', $nomor_ponsel);
			$this->db->set('gender', $gender);
			$this->db->where('user_id', $data['data_pegawai2']['id']);
			$this->db->update('pegawai');

			$this->session->set_userdata('email', $email);
			$this->session->set_userdata('password', $new_password);

			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Akun Pegawai</strong> berhasil di ubah.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('pegawai');
		}
	}

}

?>