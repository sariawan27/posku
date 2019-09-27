<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item_model extends CI_Model {
    
    public function get($id = null)
    {
        $this->db->from('products');
        if ($id!=null) {
            $this->db->where('id', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    
    public function add($post)
    {
        $params = [
            'id' => $post['id'],
            'name' => $post['name'],
            'price' => $post['price'],
            'category_id' => $post['category'],
            'created_at' => date('Y-m-d H:i:s')
        ];
        $this->db->insert('products', $params);
    }

    public function edit($post)
    {
        $params = [
            'id' => $post['id'],
            'name' => $post['name'],
            'price' => $post['price'],
            'category_id' => $post['category'],
            'updated_at' => date('Y-m-d H:i:s')
        ];
        $this->db->where('id', $post['id']);
        $this->db->update('products', $params);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('products');
    }
}