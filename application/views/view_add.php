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
    <h1>Add</h1>

    <div id="body">

        <form method="POST" name="form" id="form" action="<?=base_url();?>index.php/welcome/addArticles">
            <label for="title">Номер телефона: </label>
            <br/><input type="text" id="title" name="title" value="<?=set_value('title');?>" /><?=form_error('title')?> <br/>
            <label for="text">Текст сообщения: </label>
            <br/><textarea id="text" name="text" rows="10" cols="40" ><?=set_value('text');?></textarea> <?=form_error('text')?><br/>
        <label for="date">Дата сообщения: </label>
        <br/><input type="date" name="date" value="<?=set_value('date');?>"/><?=form_error('date')?><br/>
        Отправить сообщение<br/><input type="submit" id="send" name="send" onclick="return valid()" value="Отправить" /><br/>
        </form>

        <p>If you are exploring CodeIgniter for the very first time, you should start by reading the <a href="user_guide/">User Guide</a>.</p>
        <p><a href="<?=base_url();?>index.php/welcome/getArticles">GetArticles</a></p>
    </div>

    <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>