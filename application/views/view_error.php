<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Welcome to CodeIgniter</title>
    <link href="../../css/style.css" rel="stylesheet">

</head>
<body>

<div id="container">
    <h1>Ошибка</h1>
    <div id="body">
        <p><?php echo $error_message; ?></p>
        <br/>
        <p><img src="../images/error.jpg" /> </p>
        <p> Не волнуйтесь, мы в курсе происходящего и предпримем все необходимые
            меры. Если же вы хотите связаться с нами и узнать подробности произошедшего
            или вас что-нибудь беспокоит в сложившейся ситуации, пришлите нам it@mfc-ugorsk.ru сообщение, и мы непременно откликнемся.</p>
    </div>
    <code>
        <?php
        debug_print("<hr />");
        debug_print("<p>Было получено следующее сообщение об ошибке системного уровня: <b>{$system_error_message}</b></p>");
        ?>
    </code>

    <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>