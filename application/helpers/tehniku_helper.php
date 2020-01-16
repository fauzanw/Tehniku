<?php 

function hitungJarak($latitude1, $longitude1, $latitude2, $longitude2, $unit = 'Mi') 
{ 
	$theta = $longitude1 - $longitude2; 
	$distance = (sin(deg2rad($latitude1)) * sin(deg2rad($latitude2)))  + (cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * cos(deg2rad($theta))); 
	$distance = acos($distance); 
	$distance = rad2deg($distance); 
	$distance = $distance * 60 * 1.1515; 
	switch($unit) 
	{ 
		case 'Mi': break; 
		case 'Km' : $distance = $distance * 1.609344; 
	} 
    $round = round($distance, 2);
    $split = explode('.', $round);
	return $split[0];
}

function formatRupiah($uang) {
	return number_format($uang, 0, ".", ".");
}

function upload(string $file_name,string $upload_path, string $allow_file_type, int $max_size, bool $encrypt, string $redirect_link) {
	$ci = get_instance();
	$config = array(
		'upload_path'    => $upload_path,
		'allowed_types'  => $allow_file_type,
		'max_size'       => $max_size,
		'encrypt_name'   => TRUE
	);
	$ci->load->library('upload',$config);
	if($ci->upload->do_upload($file_name)) {
		return $ci->upload->data('file_name');
	}else{
		if($ci->upload->display_errors() == "<p>The filetype you are attempting to upload is not allowed.</p>") {
			$ci->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Gagal</strong> upload foto, format foto harus jpg / png /jpeg.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect($redirect_link);
		} else if($ci->upload->display_errors() == "<p>The file you are attempting to upload is larger than the permitted size.</p>") {
			$ci->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Gagal</strong> upload foto, size foto tidak boleh lebih dari 2mb.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect($redirect_link);
		} else {
			echo $ci->upload->display_errors();die;	
		}
	}

	// return false;
}


?>