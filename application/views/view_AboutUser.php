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
    <?php foreach ($user as $item): ?>
    <h1>Пользователь <?php echo $item['nickname']?></h1>
    <?php endforeach ?>

    <div id="body">

        <!--форма отображения информации о пользователе-->

        <?php foreach ($user as $item): ?>
        <form method="POST" action="<?=base_url();?>/index.php/welcome/AboutUser?<?php echo "user_id=".$item['id'] ?>">
            <label for="nickname">Nickname</label>
            <input type="text" name="nickname" id="nickname" value="<?php echo $item['nickname']?>"></input>
                <?php echo form_error('nickname'); ?>
            </br></br>
            <label for="name">Имя</label>
            <input type="text" name="name" id="name" value="<?php echo $item['name']?>"></input>
                <?php echo form_error('name'); ?>
            </br></br>
            <label for="sername">Фамилия</label>
            <input type="text" name="sername" id="sername" value="<?php echo $item['sername']?>"></input>
                <?php echo form_error('sername'); ?>
            </br></br>
            <label for="email">Email</label>
            <input type="text" name="email" id="email" value="<?php echo $item['email']?>"></input>
                <?php echo form_error('email'); ?>
            </br></br>
            <label for="password">Новый пароль</label>
            <input type="password" name="password" id="password" value=""></input>
                <?php echo form_error('password'); ?>
            </br></br>
            <label for="repassword">Подтверждение нового пароля</label>
            <input type="passsword" name="repassword" id="repassword" value=""></input>
                <?php echo form_error('repassword'); ?>
            </br></br>
            <input type="submit" name="edit" value="Сохранить"></input>
        </form>
        <?php endforeach?>

    </div>

    <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>