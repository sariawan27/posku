<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function login($post)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('email', $post['email']);
        $this->db->where('password', $post['password']);
        
        $query = $this->db->get();
        return $query;
    }
    public function get($id = null)
    {
        $this->db->from('users');
        if ($id!=null) {
            $this->db->where('id', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    public function add($post)
    {
        $params['name'] = $post['name'];
        $params['email'] = $post['email'];
        $params['password'] = $post['password'];
        $params['level'] = $post['level'];

        $this->db->insert('users', $params);
    }
    public function edit($post)
    {
        $params['name'] = $post['name'];
        $params['email'] = $post['email'];
        if (!empty($post['password'])) {
            $params['password'] = $post['password'];
        }
        $params['level'] = $post['level'];

        $this->db->where('id', $post['id']);
        $this->db->update('users', $params);
    }
    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('users');
    }

}