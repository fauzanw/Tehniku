<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH."/third_party/SimpleXLS.php";

class Admin extends CI_Controller {
	public function __construct() {
		parent::__construct();
	}

	/**
	*	 Generated by Generator
	**/

	private $data_role = array(
		"2c282814-d165-4625-8ed3-492xf82c57116"  => "admin",
		"a3253f9d-0741-4838-8583-20816cd63e11"  => "perusahaan",
		"adc5ce5d-0491-4d88-b9d4-8bc11b40415a"  => "pegawai",
		"ef40c680-03f0-45b9-ab98-290200f5ff13"  => "customer"
	);

	public function login() {
		if(isset($_POST['login'])) {
			$this->db
				 ->select('*')
				 ->from('users u')
				 ->join('user_role ur', 'u.role_id=ur.id')
				 ->where('u.email', $this->input->post('email'));
			$admin = $this->db->get()->row_array();
			if($admin) {
				if(password_verify($this->input->post('password'), $admin['password'])) {
					if($admin['role'] != 'Admin') {
						$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Anda</strong> bukanlah seorang admin.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
						redirect('admin/login');
					}else{
						$this->session->set_userdata($admin);
						redirect('admin');	
					}
				}else{
					$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Password</strong> anda salah.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					redirect('admin/login');
				}
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Email</strong> anda tidak terdaftar.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				redirect('admin/login');
			}
		}else{
			$data = [
				'title' => 'Admin'
			];
			$this->load->view('auth/login', $data);
		}
	}

	public function index()
	{
		checkAuthAdmin();	

		$this->db
			 ->select('*')
			 ->from('admin a')
			 ->join('users u', 'a.user_id=u.id')
			 ->where('u.email', $this->session->userdata('email'));
		$data = [
			'title'       => 'Dashboard',
			'data_admin'  => $this->db->get()->row_array()
		];
		$this->load->view('admin/header', $data);
		$this->load->view('admin/navigator');
		$this->load->view('admin/main_header');
		$this->load->view('admin/index');
		$this->load->view('admin/footer');
	}

	/**
	 * @method Perusahaan
	 * */ 

	public function perusahaan() {
		checkAuthAdmin();
		$this->db
			 ->select('*')
			 ->from('admin a')
			 ->join('users u', 'a.user_id=u.id')
			 ->where('u.email', $this->session->userdata('email'));
		$data = [
			'title'           => 'Data Perusahaan',
			'data_admin'      => $this->db->get()->row_array(),
			'data_perusahaan' => $this->db->select('p.*, u.is_verified, u.is_blocked')->from('perusahaan p')->join('users u', 'p.user_id=u.id')->get()->result_array()
		];
		$this->load->view('admin/header', $data);
		$this->load->view('admin/navigator');
		$this->load->view('admin/main_header');
		$this->load->view('admin/data_perusahaan', $data);
		$this->load->view('admin/footer');
	}

	public function detail_perusahaan($id) {
		checkAuthAdmin();
		$this->db
			 ->select('*')
			 ->from('admin a')
			 ->join('users u', 'a.user_id=u.id')
			 ->where('u.email', $this->session->userdata('email'));
		$data = [
			'title'           => 'Detail Perusahaan',
			'data_admin'      => $this->db->get()->row_array(),
			'data_perusahaan' => $this->db->get_where('perusahaan', ['id' => $id])->row_array()
		];
		$this->load->view('admin/header', $data);
		$this->load->view('admin/navigator');
		$this->load->view('admin/main_header');
		$this->load->view('admin/detail_perusahaan', $data);
		$this->load->view('admin/footer');
	}

	public function material()
	{
		checkAuthAdmin();
		if(isset($_POST['cari_jasa'])) {
			$this->db
				 ->select('*')
				 ->from('admin a')
				 ->join('users u', 'a.user_id=u.id')
				 ->where('u.email', $this->session->userdata('email'));
			$data = [
				'title'             => 'Data Material',
				'data_admin'        => $this->db->get()->row_array(),
				'data_material'     => $this->db->select('*')->from('material ml')->join('merek mk', 'ml.merek_id=mk.id')->join('jasa_keyword jk', 'ml.jasa_keyword_id=jk.id')->get()->result_array(),
				'data_keyword_jasa' => $this->db->get('jasa_keyword')->result_array(),
				'data_merek'        => $this->db->get('merek')->result_array()
			];
			if($_POST['jasa'] != 'semua_jasa' && $_POST['merek'] == 'semua_merek') {
				$data['data_material'] = $this->db->select('*')->from('material ml')->join('merek mk', 'ml.merek_id=mk.id')->join('jasa_keyword jk', 'ml.jasa_keyword_id=jk.id')->where('jk.id', $_POST['jasa'])->get()->result_array();
			}else if($_POST['jasa'] == 'semua_jasa' && $_POST['merek'] != 'semua_merek') {
				$data['data_material'] = $this->db->select('*')->from('material ml')->join('merek mk', 'ml.merek_id=mk.id')->join('jasa_keyword jk', 'ml.jasa_keyword_id=jk.id')->where('mk.id', $_POST['merek'])->get()->result_array();
			}else if($_POST['jasa'] == 'semua_jasa' && $_POST['merek'] == 'semua_merek') {
				$data['data_material'] = $this->db->select('*')->from('material ml')->join('merek mk', 'ml.merek_id=mk.id')->join('jasa_keyword jk', 'ml.jasa_keyword_id=jk.id')->get()->result_array();
			}else if($_POST['jasa'] != 'semua_jasa' && $_POST['merek'] != 'semua_merek') {
				$data['data_material'] = $this->db->select('*')->from('material ml')->join('merek mk', 'ml.merek_id=mk.id')->join('jasa_keyword jk', 'ml.jasa_keyword_id=jk.id')->where('mk.id', $_POST['merek'])->where('jk.id', $_POST['jasa'])->get()->result_array();
			}

			$this->load->view('admin/header', $data);
			$this->load->view('admin/navigator');
			$this->load->view('admin/main_header');
			$this->load->view('admin/data_material', $data);
			$this->load->view('admin/footer');
		}else{
			$this->db
				 ->select('*')
				 ->from('admin a')
				 ->join('users u', 'a.user_id=u.id')
				 ->where('u.email', $this->session->userdata('email'));
			$data = [
				'title'             => 'Data Material',
				'data_admin'        => $this->db->get()->row_array(),
				'data_material'     => $this->db->select('ml.*, mk.nama_merek, jk.keyword')->from('material ml')->join('merek mk', 'ml.merek_id=mk.id')->join('jasa_keyword jk', 'ml.jasa_keyword_id=jk.id')->get()->result_array(),
				'data_keyword_jasa' => $this->db->get('jasa_keyword')->result_array(),
				'data_merek'        => $this->db->get('merek')->result_array()
			];
			$this->load->view('admin/header', $data);
			$this->load->view('admin/navigator');
			$this->load->view('admin/main_header');
			$this->load->view('admin/data_material', $data);
			$this->load->view('admin/footer');
		}
	}

	public function tambah_material()
	{
		if(isset($_POST['tambah_material'])) {
			$data_material = [
				"id"              => uniqid(),
				"nama_material"   => htmlspecialchars($this->input->post('nama_material')),
				"description"     => htmlspecialchars($this->input->post('description')),
				"merek_id"        => $this->input->post('merek'),
				"harga"           => $this->input->post('harga'),
				"jasa_keyword_id" => $this->input->post('jasa_keyword')
			];
			$this->db->insert("material", $data_material);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil</strong> tambah material.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('admin/material');
		}else{
			$this->db
				 ->select('*')
				 ->from('admin a')
				 ->join('users u', 'a.user_id=u.id')
				 ->where('u.email', $this->session->userdata('email'));
			$data = [
				'title'             => 'Data Material',
				'data_admin'        => $this->db->get()->row_array(),
				'data_merek'        => $this->db->get('merek')->result_array(),
				'data_jasa_keyword' => $this->db->get('jasa_keyword')->result_array()
			];
			$this->load->view('admin/header', $data);
			$this->load->view('admin/navigator');
			$this->load->view('admin/main_header');
			$this->load->view('admin/tambah_material', $data);
			$this->load->view('admin/footer');
		}
	}

	public function hapus_material($id) 
	{
		$material = $this->db->get_where('material', ['id' => $id])->row_array();
		if($material) {
			$this->db->delete('material', ['id' => $id]);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil</strong> hapus material.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('admin/material');
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Gagal</strong> hapus material, id tidak valid.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('admin/material');
		}
	}

	public function edit_material($id)
	{
		$material = $this->db->get_where('material', ['id' => $id])->row_array();
		if($material) {
			if(isset($_POST['edit_material'])) {
				$data_material = [
					'nama_material'     => htmlspecialchars($this->input->post('nama_material')),
					'description'       => htmlspecialchars($this->input->post('description')),
					'merek_id'          => $this->input->post('merek'),
					'harga'             => $this->input->post('harga'),
					'jasa_keyword_id'   => $this->input->post('jasa_keyword')
				];

				$this->db->where('id', $id);
				$this->db->update('material', $data_material);
				$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success</strong> edit material.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				redirect('admin/material');
			}else{
				$this->db
					 ->select('*')
					 ->from('admin a')
					 ->join('users u', 'a.user_id=u.id')
					 ->where('u.email', $this->session->userdata('email'));
				$data = [
					'title'             => 'Data Material',
					'data_admin'        => $this->db->get()->row_array(),
					'data_merek'        => $this->db->get('merek')->result_array(),
					'data_jasa_keyword' => $this->db->get('jasa_keyword')->result_array(),
					'data_material'     => $material
				];
				$this->load->view('admin/header', $data);
				$this->load->view('admin/navigator');
				$this->load->view('admin/main_header');
				$this->load->view('admin/edit_material', $data);
				$this->load->view('admin/footer');
			}
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Gagal</strong> edit material, id tidak valid.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('admin/material');
		}
	}

	public function impor_excel_material()
	{
		if(isset($_POST['impor_material'])) {
			$acceptable = array(
				'application/vnd.ms-excel',
			);
			if(!in_array($_FILES['cover']['type'], $acceptable)) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Gagal</strong> impor material, tipe file tidak valid.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				redirect('admin/material/impor_excel');
			}else{
				$file = $_FILES['cover']['tmp_name'];
				if($xls = SimpleXLS::parse($file)) {
					for($i = 3;$i < sizeof($xls->rows()) - 3;$i++) {
						$data_material = [
							'id'               => uniqid(),
							'nama_material'    => htmlspecialchars($xls->rows()[$i][1]),
							'description'      => htmlspecialchars($xls->rows()[$i][2]),
							'merek_id'         => $xls->rows()[$i][3],
							'harga'            => formatRupiah($xls->rows()[$i][4]),
							'jasa_keyword_id'  => $xls->rows()[$i][5]
						];

						$this->db->insert('material', $data_material);
					}
					$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil</strong> impor material.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					redirect('admin/material');
				}else{
					echo SimpleXLS::parseError();
				}
			}
		}else{
			$this->db
				 ->select('*')
				 ->from('admin a')
				 ->join('users u', 'a.user_id=u.id')
				 ->where('u.email', $this->session->userdata('email'));
			$data = [
				'title'             => 'Data Material',
				'data_admin'        => $this->db->get()->row_array(),
				'data_merek'        => $this->db->get('merek')->result_array(),
				'data_jasa_keyword' => $this->db->get('jasa_keyword')->result_array()
			];
			$this->load->view('admin/header', $data);
			$this->load->view('admin/navigator');
			$this->load->view('admin/main_header');
			$this->load->view('admin/import_excel', $data);
			$this->load->view('admin/footer');
		}
	}

	public function edit_verif_perusahaan() {
		$user_id = $this->input->post('id');

		$result = $this->db->get_where('users', ['id' => $user_id])->row_array();
		if($result['is_verified'] == 1) {
			$this->db->set('is_verified', 0);
			$this->db->where('id', $user_id);
			$this->db->update('users');
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil</strong> unverifikasi akun perusahaan.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		}else{
			$this->db->set('is_verified', 1);
			$this->db->where('id', $user_id);
			$this->db->update('users');
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil</strong> verifikasi akun perusahaan.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		}
	}

	public function edit_blocked_perusahaan() {
		$user_id = $this->input->post('id');

		$result = $this->db->get_where('users', ['id' => $user_id])->row_array();
		if($result['is_blocked'] == 1) {
			$this->db->set('is_blocked', 0);
			$this->db->where('id', $user_id);
			$this->db->update('users');
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil</strong> membuka blokir akun perusahaan.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		}else{
			$this->db->set('is_blocked', 1);
			$this->db->where('id', $user_id);
			$this->db->update('users');
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil</strong> memblokir akun perusahaan.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		}
	}

	/**
	 * End @method Perusahaan
	 * */ 

	/**
	 * @method Merek
	 * */  

	public function merek() {
		if(isset($_POST['tambah_merek'])) {
			foreach($_POST['nama_merek'] as $nama) {
				$data_merek = [
					'id'          => uniqid(),
					'nama_merek'  => htmlspecialchars($nama)
				];
				$this->db->insert('merek', $data_merek);
			}
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil</strong> tambah merek.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('admin/merek');

		}else{
			$this->db
				 ->select('*')
				 ->from('admin a')
				 ->join('users u', 'a.user_id=u.id')
				 ->where('u.email', $this->session->userdata('email'));
			$data = [
				'title'             => 'Data Merek',
				'data_admin'        => $this->db->get()->row_array(),
				'data_merek'        => $this->db->get('merek')->result_array()
			];
			$this->load->view('admin/header', $data);
			$this->load->view('admin/navigator');
			$this->load->view('admin/main_header');
			$this->load->view('admin/data_merek', $data);
			$this->load->view('admin/footer');
		}
	}

	/**
	 * End @method merek
	 * */  

	/**
	 * @method Pegawai
	 * */  

	public function pegawai()
	{
		checkAuthAdmin();
		$this->db
			 ->select('*')
			 ->from('admin a')
			 ->join('users u', 'a.user_id=u.id')
			 ->where('u.email', $this->session->userdata('email'));
		$data = [
			'title'           => 'Data Pegawai',
			'data_admin'      => $this->db->get()->row_array(),
			'data_pegawai'    => $this->db->select('*')->from('pegawai p')->join('users u', 'p.user_id=u.id')->join('perusahaan pr', 'p.perusahaan_id=pr.id')->get()->result_array()
		];
		$this->load->view('admin/header', $data);
		$this->load->view('admin/navigator');
		$this->load->view('admin/main_header');
		$this->load->view('admin/data_pegawai');
		$this->load->view('admin/footer');
	}

	/**
	 * End @method Pegawai
	 * */ 

	/**
	 * @method Customer
	 * */  

	public function customer() {
		checkAuthAdmin();
		$this->db
			 ->select('*')
			 ->from('admin a')
			 ->join('users u', 'a.user_id=u.id')
			 ->where('u.email', $this->session->userdata('email'));
		$data = [
			'title'           => 'Data Customer',
			'data_admin'      => $this->db->get()->row_array(),
			'data_customer'   => $this->db->select('*')->from('customer p')->join('users u', 'p.user_id=u.id')->get()->result_array()
		];
		$this->load->view('admin/header', $data);
		$this->load->view('admin/navigator');
		$this->load->view('admin/main_header');
		$this->load->view('admin/data_customer');
		$this->load->view('admin/footer');
	}

	public function edit_blocked_customer() {
		$user_id = $this->input->post('id');

		$result = $this->db->get_where('users', ['id' => $user_id])->row_array();
		if($result['is_blocked'] == 1) {
			$this->db->set('is_blocked', 0);
			$this->db->where('id', $user_id);
			$this->db->update('users');
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil</strong> membuka blokir customer.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		}else{
			$this->db->set('is_blocked', 1);
			$this->db->where('id', $user_id);
			$this->db->update('users');
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil</strong> memblokir akun customer.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		}
	}

	/**
	 * End @method Customer
	 * */  

	
	/**
	 * @method Verifikasi
	 * */ 

	public function verifikasi()
	{
		checkAuthAdmin();
		$this->db
			 ->select('*')
			 ->from('admin a')
			 ->join('users u', 'a.user_id=u.id')
			 ->where('u.email', $this->session->userdata('email'));
		$data = [
			'title'                => 'Data Pegawai',
			'data_admin'           => $this->db->get()->row_array(),
			'data_verifikasi'      => $this->db->select('u.*, ur.role')->from('users u')->join('user_role ur', 'u.role_id=ur.id')->where('u.is_verified', 0)->get()->result_array(),
			'data_verifikasi_user' => []
		];	
		foreach($data['data_verifikasi'] as $data_verif) {
			if($data_verif['role'] == 'Perusahaan') {
				array_push($data['data_verifikasi_user'], $this->db->get_where('perusahaan', ['user_id'  => $data_verif['id']])->row_array());
			}else if($data_verif['role'] == 'Customer') {
				array_push($data['data_verifikasi_user'], $this->db->get_where('customer', ['user_id'  => $data_verif['id']])->row_array());
			}
		}
		$this->load->view('admin/header', $data);
		$this->load->view('admin/navigator');
		$this->load->view('admin/main_header');
		$this->load->view('admin/data_verifikasi');
		$this->load->view('admin/footer');
	}

	public function edit_verif_user() {
		$user_id = $this->input->post('id');

		$result = $this->db->get_where('users', ['id' => $user_id])->row_array();
		if($result['is_verified'] == 0) {
			$this->db->set('is_verified', 1);
			$this->db->where('id', $user_id);
			$this->db->update('users');
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil</strong> memverifikasi akun user.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata("id");
		$this->session->unset_userdata("email");
		$this->session->unset_userdata("password");
		$this->session->unset_userdata("role_id");
		$this->session->unset_userdata("is_verified");
		$this->session->unset_userdata("date_joined");
		redirect('admin/login');
	}

}

?>