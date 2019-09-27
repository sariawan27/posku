<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction_model extends CI_Model {
    
    public function get($id = null)
    {
        $this->db->from('sales');
        if ($id!=null) {
            $this->db->where('id', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    
    public function add($post)
    {
        $params = [
            'qty' => $post['qty'],
            'price' => $post['price'],
            'product_id' => $post['product'],
            'sale_id' => $post['transaction_id'],
            'created_at' => date('Y-m-d H:i:s')
        ];
        $this->db->insert('sales', $params);
    }

    public function edit($post)
    {
        $params = [
            'qty' => $post['qty'],
            'price' => $post['price'],
            'product_id' => $post['product'],
            'sale_id' => $post['transaction_id'],
            'created_at' => date('Y-m-d H:i:s')
        ];
        $this->db->where('id', $post['id']);
        $this->db->update('sales', $params);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('sales');
    }
}