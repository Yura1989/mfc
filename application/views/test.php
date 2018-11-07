<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <script src="<?=base_url();?>assets/js/jquery-3.2.1.min.js"></script>
</head>
<body>

<div id="container">
    <h1>TEST</h1>

    <form method="POST">
        text <input type="text">
        <br>
        number <input type="text">
        <br>
        <input type="button" value="send SMS" onclick="testAjax()">
        <div id="result"></div>
    </form>

    <div>
        <p class="greeting-id">The ID is </p>
        <p class="greeting-content">The content is </p>

    </div>

</body>
</html>

<script>
    function sendSMS ()
    {
        var url = 'https://api.bytehand.com/v2/sms/messages/247030191915403652';
        $.get(
            {
                url: url
            })
            .done(function (result) {
                if (result.Status == "Ok") {
                    alert("Проверка прошла успешно");
                }
                else {
                    alert("Попытка отправить SMS сообщение завершилась неудачей.\r\n" + result.message);
                }
                return;
            })
                .fail(function () { alert("Ошибка передачи данных серверу!"); });
    }

    function testAjax ()
    {
        $.ajax({
            type: "GET",
            headers: {
                "Access-Control-Allow-Credentials" : "true",
                "Access-Control-Allow-Origin" : "*",
                "X-Service-Key" : "w345EzxovCgc9FKlFd4kih3clBjMU3or",
                "Content-Type" : "application/json"
            },
            data: {
                access_token: "w345EzxovCgc9FKlFd4kih3clBjMU3or"
            },
            url: "https://api.bytehand.com/v2/sms/messages/247030191915403652",
            success: function (data) {
                alert(data);
            }
        });
    }
</script>
