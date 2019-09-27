<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Items extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['item_model', 'category_model']);
	}

	public function index()
	{
		$data['row'] = $this->item_model->get();
		$this->template->load('template', 'products/items/items_data', $data);
	}

	public function add()
	{
		$items = new stdClass();
		$items->id = null;
		$items->name = null;
		$items->price = null;
		
		$category = $this->category_model->get();
		
		$data = array(
			'page' => 'add',
			'row' => $items,
			'category' => $category
		);
		$this->template->load('template', 'products/items/items_form', $data);
	}

	public function edit($id)
	{
		$query = $this->item_model->get($id);
		if ($query->num_rows() > 0) {
			$items = $query->row();
			$category = $this->category_model->get();
			$data = array(
				'page' => 'edit',
				'row' => $items,
				'category' => $category
			);
			$this->template->load('template', 'products/items/items_form', $data);
		} else {
			$this->session->set_flashdata('Success', 'Data Berhasil Disimpan');
			redirect('items');
		}
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($_POST['add'])) {
			$this->item_model->add($post);
		} elseif (isset($_POST['edit'])) {
			$this->item_model->edit($post);
		}

		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('Success', 'Data Berhasil Disimpan');
		}
		redirect('items');
	}

	public function delete($id)
	{
		$this->item_model->delete($id);
		
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('Success', 'Data Berhasil Dihapus');
		}
		redirect('items');
	}
}
