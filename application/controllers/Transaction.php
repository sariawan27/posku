<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['transaction_model','detail_t_model', 'item_model']);
	}

	public function index()
	{
		$data['row'] = $this->transaction_model->get();
		$data['total'] = $this->detail_t_model->hitung();
		$this->template->load('template', 'transaction/transaction_data', $data);
	}

	public function add()
	{
		$detail_t = new stdClass();
		$detail_t->id = null;
		$detail_t->qty = null;
		$detail_t->price = null;
		$detail_t->subtotal = null;

		$product = $this->item_model->get();
		$transaction_id = $this->transaction_model->get();
		
		$data = array(
			'page' => 'add',
			'row' => $detail_t,
			'product' => $product,
			'transaction_id' => $transaction_id
		);
		$this->template->load('template', 'transaction/transaction_form', $data);
	}

	public function edit($id)
	{
		$query = $this->detail_t_model->get($id);
		if ($query->num_rows() > 0) {
			$detail_t = $query->row();
			$product = $this->item_model->get();
			$transaction_id = $this->transaction_model->get();
			$data = array(
				'page' => 'edit',
				'row' => $detail_t,
				'product' => $product,
				'transaction_id' => $transaction_id
			);
			$this->template->load('template', 'transaction/transaction_form', $data);
		} else {
			echo "<script> alert('Data Tidak Ditemukan');";
			echo "window.location='".site_url('transaction')."'; </script>";
		}
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($_POST['add'])) {
			$this->detail_t_model->add($post);
		} elseif (isset($_POST['edit'])) {
			$this->detail_t_model->edit($post);
		}

		if ($this->db->affected_rows() > 0) {
			echo "<script> alert('Data Berhasil Disimpan'); </script>";
		}
		echo "<script> window.location='".site_url('transaction')."'; </script>";
	}

	public function delete($id)
	{
		$this->detail_t_model->delete($id);
		
		if ($this->db->affected_rows() > 0) {
			echo "<script> alert('Data Berhasil Dihapus'); </script>";
		}
		echo "<script> window.location='".site_url('transaction')."'; </script>";
	}
	public function detail()
	{
		$data['row'] = $this->detail_t_model->get();
		$this->template->load('template', 'transaction/detail_transaction', $data);
	}
}
