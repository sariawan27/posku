<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customers extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('customer_model');
	}

	public function index()
	{
		$data['row'] = $this->customer_model->get();
		$this->template->load('template', 'customers/customers_data', $data);
	}

	public function add()
	{
		$customers = new stdClass();
		$customers->id = null;
		$customers->name = null;
		$customers->address = null;
		$data = array(
			'page' => 'add',
			'row' => $customers
		);
		$this->template->load('template', 'customers/customers_form', $data);
	}

	public function edit($id)
	{
		$query = $this->customer_model->get($id);
		if ($query->num_rows() > 0) {
			$customers = $query->row();
			$data = array(
				'page' => 'edit',
				'row' => $customers
			);
			$this->template->load('template', 'customers/customers_form', $data);
		} else {
			echo "<script> alert('Data Tidak Ditemukan');";
			echo "window.location='".site_url('customers')."'; </script>";
		}
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($_POST['add'])) {
			$this->customer_model->add($post);
		} elseif (isset($_POST['edit'])) {
			$this->customer_model->edit($post);
		}

		if ($this->db->affected_rows() > 0) {
			echo "<script> alert('Data Berhasil Disimpan'); </script>";
		}
		echo "<script> window.location='".site_url('customers')."'; </script>";
	}

	public function delete($id)
	{
		$this->customer_model->delete($id);
		
		if ($this->db->affected_rows() > 0) {
			echo "<script> alert('Data Berhasil Dihapus'); </script>";
		}
		echo "<script> window.location='".site_url('customers')."'; </script>";
	}
}
