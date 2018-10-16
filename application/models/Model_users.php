<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_users extends CI_Model
{
    function addUser()
    {
        $add_User = array(
            array(
                'field' => 'nickname',
                'label' => 'Nickname',
                'rules' => 'trim|required|max_length[20]|is_unique[users.nickname]'
            ),
            array(
                'field' => 'password',
                'label' => 'Пароль',
                'rules' => 'trim|required|min_length[5]|max_length[20]|matches[repassword]'
            ),
            array(
                'field' => 'repassword',
                'label' => 'Повторный пароль',
                'rules' => 'trim|required|min_length[5]|max_length[20]'
            ),
            array(
                'field' => 'name',
                'label' => 'Имя пользователя',
                'rules' => 'trim|required|max_length[20]'
            ),
            array(
                'field' => 'sername',
                'label' => 'Фамилия пользователя',
                'rules' => 'trim|required|max_length[20]'
            ),
            array(
                'field' => 'email',
                'label' => 'Электронный адрес',
                'rules' => 'trim|required|max_length[50]|valid_email|is_unique[users.email]'
            ),
        );
        return $add_User;
    }
    
    function deleteUser($result)
    {
         echo "Пользователь удален". $result['msg'];;
    }

    function editUser()
    {
        $editUser = array(
            array(
                'field' => 'nickname',
                'label' => 'Nickname',
                'rules' => 'trim|required|max_length[20]'
            ),
            array(
                'field' => 'password',
                'label' => 'Пароль',
                'rules' => 'trim|required|min_length[5]|max_length[20]|matches[repassword]'
            ),
            array(
                'field' => 'repassword',
                'label' => 'Повторный пароль',
                'rules' => 'trim|required|min_length[5]|max_length[20]'
            ),
            array(
                'field' => 'name',
                'label' => 'Имя пользователя',
                'rules' => 'trim|required|max_length[20]'
            ),
            array(
                'field' => 'sername',
                'label' => 'Фамилия пользователя',
                'rules' => 'trim|required|max_length[20]'
            ),
            array(
                'field' => 'email',
                'label' => 'Электронный адрес',
                'rules' => 'trim|required|max_length[50]|valid_email'
            ),
        );
        return $editUser;
    }
}