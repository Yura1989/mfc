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
    <h1>Пользователи</h1>

    <div id="body">

        //форма отображения кол-ва пользователей
        <form method="post" action="<?=base_url();?>index.php/welcome/users">
            <input type="text" name="limit" value="">
            <input type="submit" name="lim" value="Выбор">
        </form>

        <table border="1" width="100%">
            <tr>
                <th>Nickname</th>
                <th>Email</th>
            </tr>
            <?php foreach($users as $item): ?>
                <tr>
                    <td><?= $item['nickname'];?></td>
                    <td><?= $item['email'];?></td>
                </tr>
            <?php endforeach?>
        </table>
    </div>

    <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>