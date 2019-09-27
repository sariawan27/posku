<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('product_model');
	}

	public function index()
	{
		$data['row'] = $this->product_model->get();
		$this->template->load('template', 'products/products_data', $data);
	}

	public function delete($id)
	{
		$this->product_model->delete($id);
		
		if ($this->db->affected_rows() > 0) {
			echo "<script> alert('Data Berhasil Dihapus'); </script>";
		}
		echo "<script> window.location='".site_url('customers')."'; </script>";
	}
}
