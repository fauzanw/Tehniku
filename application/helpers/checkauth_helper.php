<?php 

function checkAuthAdmin() {
    $ci = get_instance();
    $ci->db
         ->select('*')
         ->from('users u')
         ->join('user_role ur', 'u.role_id=ur.id')
         ->where('u.email', $ci->session->userdata('email'));
    $data = $ci->db->get()->row_array();
    if(!$ci->session->userdata('email')) {
    	redirect('admin/login');
    }elseif($data['role'] != 'Admin') {
		show_404();
	}
}

function checkAuthUser($role) {
    $ci = get_instance();
    $ci->db
         ->select('*')
         ->from('users u')
         ->join('user_role ur', 'u.role_id=ur.id')
         ->where('u.email', $ci->session->userdata('email'));
    $data = $ci->db->get()->row_array();
    if(!$ci->session->userdata('email')) {
    	if($role == "Admin") {
          redirect('admin/login');
     }else{
          redirect('auth/login');
     }
    }elseif($data['role'] != $role) {
		show_404();
	}
}


?>