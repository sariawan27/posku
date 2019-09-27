<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {
    
    public function get($id = null)
    {
        $this->db->from('products');
        if ($id!=null) {
            $this->db->where('id', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    
    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('products');
    }
}