<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('category_model');
	}

	public function index()
	{
		$data['row'] = $this->category_model->get();
		$this->template->load('template', 'products/categories/categories_data', $data);
	}

	public function add()
	{
		$categories = new stdClass();
		$categories->id = null;
		$categories->name = null;
		$data = array(
			'page' => 'add',
			'row' => $categories
		);
		$this->template->load('template', 'products/categories/categories_form', $data);
	}

	public function edit($id)
	{
		$query = $this->category_model->get($id);
		if ($query->num_rows() > 0) {
			$categories = $query->row();
			$data = array(
				'page' => 'edit',
				'row' => $categories
			);
			$this->template->load('template', 'products/categories/categories_form', $data);
		} else {
			$this->session->set_flashdata('Success', 'Data Berhasil Disimpan');
			redirect('categories');
		}
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($_POST['add'])) {
			$this->category_model->add($post);
		} elseif (isset($_POST['edit'])) {
			$this->category_model->edit($post);
		}

		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('Success', 'Data Berhasil Disimpan');
		}
		redirect('categories');
	}

	public function delete($id)
	{
		$this->category_model->delete($id);
		
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('Success', 'Data Berhasil Dihapus');
		}
		redirect('categories');
	}
}
