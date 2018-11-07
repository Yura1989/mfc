<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_sms extends CI_Model{

    /*Проверка на наличие текста в сообщении*/
    function smsRules()
    {
        $smsRules = array(
            array(
                'field' => 'message',
                'label' => 'Текст статьи',
                'rules' => 'required|max_length[70]|trim'
            ),
        );
        return $smsRules;
    }

    /*Функция отправки одного сообщения*/
    function sendSms($add, $id, $key, $bytehandFrom)
    {
        $query = @file_get_contents('http://bytehand.com:3800/send?id='.$id.'&key='.$key.'&to='.urlencode($add['number']).'&from='.urlencode($bytehandFrom).'&text='.urlencode($add['message']));
        if ($query === false) {
            /*$query = "Ошибка при отправке сообщения!!!";*/
            return $query;
        } else {
            $json = json_decode($query);
            $query = $json->{'name'};
            return $query;
        }
    }

    /*Вывод сообщения об успешной отправке*/
    function sendSmsInfo($add){
        echo "<code>SMS сообщение на номер: ".$add['number'] . " успешно отправлено</code>";
        echo "<p></p>";
    }
}