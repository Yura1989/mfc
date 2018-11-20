<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_sms extends CI_Model{

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
        $result_jsdecode = json_decode($result, TRUE);
        return $result_jsdecode;
    }

    /*Поиск и просмотр статуса СМС с сервиса ByteHand*/
    function transfer($data)
    {
        $number = $data;
        $ch = curl_init('https://api.bytehand.com/v2/sms/messages/'.$number);

        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch,CURLOPT_HTTPHEADER,array(
            'Content-Type: application/json',
            'Content-Type: charset=UTF-8',
            'X-Service-Key: w345EzxovCgc9FKlFd4kih3clBjMU3or'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($ch);
        curl_close($ch);
        $result_jsdecode = json_decode($result, TRUE);
        return $result_jsdecode;
    }

    /*Функция проверки баланса*/
    function balance($balance)
    {
        $data = array (
            'id' => $balance['id'],
            'key' => $balance['key']
        );
        $request = http_build_query($data);
        $ch = curl_init('http://api.bytehand.com/v1/balance?'.$request);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($ch);
        curl_close($ch);

        $result_jsdecode = json_decode($result, TRUE);
        return $result_jsdecode;
    }

    /*Вывод сообщения об успешной отправке*/
    function sendSmsInfo($add){
        echo "<code>SMS сообщение на номер: ".$add['number'] . " успешно отправлено</code>";
        echo "<p></p>";
    }

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
}
