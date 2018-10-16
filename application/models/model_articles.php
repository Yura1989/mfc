<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_articles extends CI_Model {

     function get_articles($num, $offset )
     {
          $this->db->limit('3');
          /*$this->db->where('date', $date);*/
          $query = $this->db->get('articles', $num, $offset);
          return $query->result_array();
     }

    function get_users($num, $offset )
    {
        $this->db->limit('3');
        /*$this->db->where('date', $date);*/
        $query = $this->db->get('users', $num, $offset);
        return $query->result_array();
    }

    function sendsms($add)
    {
        $this->db->insert('articles', $add);
    }

    function edit_articles($data)
    {
        $this->db->where('id', '5');
        $this->db->update('articles', $data);
    }

    function del_articles()
    {
        $this->db->where('id', $id);
        $this->db->delete('articles');
    }
    
    function addUsers ($users)
    {
        $this->db->insert('users', $users);
    }

    function AboutUsers($select_users)
    {
        $query = ($this->db->query($select_users));
        return $query->result_array();
    }

    function EditUser($user)
    {
        $this->db->where('id', $user['id']);
        $this->db->update('users', $user);
    }
    
    function get_User ($select_user)
    {
        $query = ($this->db->query($select_user));
        return $query->result_array();
    }
    
    function Delete_User ($delete_user)
    {
        $query = ($this->db->query($delete_user));
    }
    
}
