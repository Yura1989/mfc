<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Error extends CI_Controller{

    public function index (){

        define ("DEBUG_MODE", true);
        define ("SITE_ROOT", "http://localhost/CodeIgniter/index.php");

        error_reporting(E_ALL);

        if (DEBUG_MODE){
            error_reporting(E_ALL);
        }else {
            error_reporting(0);
        }

        function debug_print($message){
            if (DEBUG_MODE){
                echo $message;
            }
        }

        if (isset($_REQUEST['error_message'])) {
            $data['error_message'] = preg_replace("/\\\\/", '', $_REQUEST['error_message']);
        } else {
            $data['error_message'] = "вы здесь оказались из-за сбоя в работе программы.";
        }

        if (isset($_REQUEST['system_error_message'])) {
            $data['system_error_message'] = preg_replace("/\\\\/", '', $_REQUEST['system_error_message']);
        } else {
            $data['system_error_message'] = "Сообщения о системных ошибках отсутствуют.";
        }

        function handle_error($user_error_message, $system_error_message) {
            header("Location: error?" .
                "error_message={$user_error_message}&" . "system_error_message={$system_error_message}");
        }

        $this->load->view('view_error', $data);
        $this->load->view('footer');
    }

}

