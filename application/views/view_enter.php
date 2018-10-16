<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Welcome to CodeIgniter</title>
    <link href="../../css/style.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">

</head>
<body>

<div id="container">
    <h1>Enter</h1>

    <div id="body">
        <form method="post" action="<?=base_url();?>index.php/welcome/enter">
            Ведите имя пользователя: <br/><input type="text" name="username"/> <br/>
            Введите пароль: <br/><input type="password" name="password"/> <br/>
            Вход: <br/><input type="submit" name="enter"/> <br/>
        </form>
    </div>

    <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>