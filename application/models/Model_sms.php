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
    function sendSms($add, $key, $bytehandFrom)
    {
        $data = array('sender' => $bytehandFrom,
            'receiver' => $add['number'],
            'text' => $add['message'],);
        $data_json = json_encode($data);

        $ch = curl_init('https://api.bytehand.com/v2/sms/messages');

        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch,CURLOPT_HTTPHEADER,array(
            'Content-Type: application/json',
            'Content-Type: charset=UTF-8',
            'X-Service-Key: '.$key));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);


        $result = curl_exec($ch);
        curl_close($ch);
        $result_jsdecode = json_decode(json_encode($result), True);
            if (isset ($result_jsdecode['count'])) {
                return $result_jsdecode;
            } else {
                return false;
            }
    }

    /*Вывод сообщения об успешной отправке*/
    function sendSmsInfo($add){
        echo "<code>SMS сообщение на номер: ".$add['number'] . " успешно отправлено</code>";
        echo "<p></p>";
    }
}