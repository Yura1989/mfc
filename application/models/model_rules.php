<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_rules extends CI_Model {

    public $add_rules = array(
        array(
            'field' => 'number',
            'label' => 'Номер телефона',
            'rules' => 'required|exact_length[12]|trim'
        ),
        array(
            'field' => 'text',
            'label' => 'Текст статьи',
            'rules' => 'required|max_length[255]|trim'
        ),
    );

    function addUsers()
    {
        $add_Users = array(
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
                'rules' => 'trim|required|max_length[20]|valid_email|is_unique[users.email]'
            ),
        );

        return $add_Users;
    }

    function EditUsers()
    {
        $edit_Users = array(
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
                'rules' => 'trim|required|max_length[20]|valid_email'
            ),
        );

        return $edit_Users;
    }
}