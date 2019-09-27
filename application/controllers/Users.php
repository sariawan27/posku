<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		check_admin();
		$this->load->model('user_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['row'] = $this->user_model->get();

		$this->template->load('template', 'users/users_data', $data);
	}
	public function add()
	{
		$this->form_validation->set_rules('name', 'Name', 'required|min_length[6]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
		$this->form_validation->set_rules('passwordconf', 'Password Confirmation', 'trim|required|matches[password]');
		$this->form_validation->set_rules('level', 'Level', 'required');

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		if ($this->form_validation->run() == FALSE)
		{
			$this->template->load('template', 'users/add_user');
		}
		else
		{
			$post = $this->input->post(null, TRUE);
			$this->user_model->add($post);

			if ($this->db->affected_rows() > 0) {
				echo "<script> alert('Data Berhasil Disimpan'); </script>";
			}
			echo "<script> window.location='".site_url('users')."'; </script>";
		}
	}
	public function edit($id)
	{
		$this->form_validation->set_rules('name', 'Name', 'required|min_length[6]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback_email_check');
		if ($this->input->post('password')) {
			$this->form_validation->set_rules('password', 'Password', 'trim|min_length[8]');
			$this->form_validation->set_rules('passwordconf', 'Password Confirmation', 'trim|matches[password]');
		}
		if ($this->input->post('passwordconf')) {
			$this->form_validation->set_rules('passwordconf', 'Password Confirmation', 'trim|required|matches[password]');
		}
		$this->form_validation->set_rules('level', 'Level', 'required');

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		if ($this->form_validation->run() == FALSE)
		{
			$query = $this->user_model->get($id);
			if ($query->num_rows() > 0) {
				$data['row'] = $query->row();
				$this->template->load('template', 'users/edit_user', $data);	
			} else {
				echo "<script> alert('Data Tidak Ditemukan');";
				echo "window.location='".site_url('users')."'; </script>";
			}
		}
		else
		{
			$post = $this->input->post(null, TRUE);
			$this->user_model->edit($post);

			if ($this->db->affected_rows() > 0) {
				echo "<script> alert('Data Berhasil Disimpan'); </script>";
			}
			echo "<script> window.location='".site_url('users')."'; </script>";
		}
	}
	function email_check()
	{
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM users WHERE email='$post[email]' AND id!='$post[id]' ");
		if ($query->num_rows() > 0) {
			$this->form_validation->set_message('email_check', '{field} ini sudah dipakai, silahkan ganti !');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function delete()
	{
		$id = $this->input->post('id');
		$this->user_model->delete($id);
		if ($this->db->affected_rows() > 0) {
			echo "<script> alert('Data Berhasil Dihapus'); </script>";
		}
		echo "<script> window.location='".site_url('users')."'; </script>";
	}
}
