<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_model extends CI_Model {
    
    public function get($id = null)
    {
        $this->db->from('customers');
        if ($id!=null) {
            $this->db->where('id', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    
    public function add($post)
    {
        $params = [
            'name' => $post['name'],
            'address' => $post['address'],
            'created_at' => date('Y-m-d H:i:s')
        ];
        $this->db->insert('customers', $params);
    }

    public function edit($post)
    {
        $params = [
            'name' => $post['name'],
            'address' => $post['address'],
            'updated_at' => date('Y-m-d H:i:s')
        ];
        $this->db->where('id', $post['id']);
        $this->db->update('customers', $params);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('customers');
    }
}