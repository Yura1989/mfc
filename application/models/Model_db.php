<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_db extends CI_Model
{

    /*Добавление пользователя*/
    function addUser($user)
    {
        $this->db->insert('users', $user);
    }

    /*Выгрузка данных о пользователях*/
    function getUsers($select_users)
    {
        $query = ($this->db->query($select_users));
        return $query->result_array();
    }

    /*Удаление пользователя*/
    function deleteUser($delete_user)
    {
        $query = ($this->db->query($delete_user));
    }

    /*Редактирование пользователя*/
    function editUser($User)
    {
        $this->db->where('id', $User['id']);
        $this->db->update('users', $User);
    }

    /*Запись sms-сообщения в БД*/
    function addSms($sms)
    {
        $this->db->insert('sms', $sms);
    }

    function connectOracle()
    {
        $conn = oci_connect("pvd", "pvd", "10.27.23.50/XE");
        if (!$conn) {
            $e = oci_error();
            trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
        } else {
            echo "verygood";
        }
    }

    function editService($service)
    {
        $this->db->insert('service', $service);
    }

    /*Добавление типа ведомства*/
    function DBaddTypeDep($typedep)
    {
        $this->db->insert('typedep', $typedep);
    }

    /*Выгрузка данных "Типов ведомств"*/
    function DBgetTypeDep($select_TypeDep)
    {
        $query = ($this->db->query($select_TypeDep));
        return $query->result_array();
    }

    /*Удаление типа ведомств*/
    function DBdeleteTypeDep($delete_TypeDep)
    {
        $this->db->query($delete_TypeDep);
    }

    /*Редактирование типа ведомства*/
    function DBeditTypeDep($edit_typedep)
    {
        $this->db->where('id', $edit_typedep['id']);
        $this->db->update('typedep', $edit_typedep);
    }

    /*Добавление ведомств*/
    function DBaddDepartment($department)
    {
        $this->db->insert('department', $department);
    }

    /*Выгрузка всех данных ведомств*/
    function DBgetDepartment($select_Department)
    {
        $query = ($this->db->query($select_Department));
        return $query->result_array();
//        $this->db->select('*');
//        $query = $this->db->get('department');
//        return $query->result_array();
    }

    /*Выгрузка данных ведомств по ID*/
    function DBgetIdDepartment($id)
    {
        $this->db->select('*');
        $this->db->where('id_department', $id['ID']);
        $query = $this->db->get('department');
        return $query->result_array();
    }

    /*Редактирование ведомства по ID*/
    function DBeditDepartment($edit_department)
    {
        $this->db->where('id_department', $edit_department['id_department']);
        $this->db->update('department', $edit_department);
    }

    /*Удаление ведомств*/
    function DBdeleteDepartment($delete_department)
    {
       $this->db->query($delete_department);
    }

    /*Выгрузка услуг*/
    function DBgetServices($select_services)
    {
        $query = ($this->db->query($select_services));
        return $query->result_array();
    }

    /*Добавление услуг*/
    function DBaddService($service)
    {
        $this->db->insert('service', $service);
    }

    /*Редактирование услуги по ID*/
    function DBeditService($edit_service)
    {
        $this->db->where('id_service', $edit_service['id_service']);
        $this->db->update('service', $edit_service);
    }

    /*Удаление услуг*/
    function DBdeleteService($delete_service)
    {
        $query = ($this->db->query($delete_service));
    }

    /*Выгрузка данных по всем услугам и показателями*/
    function DBgetReport ($query)
    {
        $result = ($this->db->query($query));
        return $result->result_array();
    }

    /*Сохранение данных по всем услугам и показателям*/
    function DBsaveReport ($query)
    {
        $result = ($this->db->query($query));
    }

    function DBexcel($query)
    {
        $query = $this->db->query($query);
        return $query->result();
    }


}
