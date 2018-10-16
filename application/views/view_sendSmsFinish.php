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
    <h1>SMS-сообщение</h1>

    <div id="body">
         <code>SMS сообщение успешно отправлено</code>
        <p><?php echo $description; ?></p>
    </div>

    <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>