<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function login()
	{
		check_already_login();
		$this->load->view('login');
	}
	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['signin'])){
			$this->load->model('user_model');
			$query = $this->user_model->login($post);
			if($query->num_rows() > 0){
				$row = $query->row();
				$params = array(
					'id' => $row->id,
					'level' => $row->level
				);
				$this->session->set_userdata($params);
				echo "<script>
				alert('Berhasil Signin');
				window.location='".site_url('dashboard')."';
				</script>";
			} else {
				echo "<script>
				alert('Gagal Signin');
				window.location='".site_url('auth/login')."';
				</script>";
			}
		} 
	}
	public function logout(){
		$params = array('id','level');
		$this->session->unset_userdata($params);
		redirect('auth/login');
	}
}
