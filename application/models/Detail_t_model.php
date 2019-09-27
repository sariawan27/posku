<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_t_model extends CI_Model {
    
    public function get($id = null)
    {
        $this->db->from('sale_items');
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
            'subtotal' => $post['qty'] * $post['price'],
            'product_id' => $post['product'],
            'sale_id' => $post['transaction_id'],
            'created_at' => date('Y-m-d H:i:s'),
        ];
        $this->db->insert('sale_items', $params);
    }

    public function edit($post)
    {
        $params = [
            'qty' => $post['qty'],
            'price' => $post['price'],
            'subtotal' => $post['qty'] * $post['price'],
            'product_id' => $post['product'],
            'sale_id' => $post['transaction_id'],
            'updated_at' => date('Y-m-d H:i:s')
        ];
        $this->db->where('id', $post['id']);
        $this->db->update('sale_items', $params);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('sale_items');
    }

    public function hitung()
    {
        $this->db->select_sum('subtotal');
        $query = $this->db->get('sale_items');
        if ($query->num_rows() > 0) {
            return $query->row()->subtotal;
            
        } else {
            return 0;
        }
    }
}