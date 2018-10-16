<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="../../css/style.css" rel="stylesheet">
    <link href="../../css/style_form.css" rel="stylesheet">
</head>
<body>

<div id="container">
    <div id="body">
    <p>Для запроса баланса введи ID и KEY</p>
    <div id="body">

        <form method="POST" action="<?=base_url();?>index.php/welcome/balance" name="form" id="form" class="contact_form" action="#" method="post" name="contact_form">
            <ul>
                <li>
                    <h2>Запрос Баланса</h2>
                </li>
                <li>
                    <label for="id">Введите id: </label>
                    <input type="text" id="id" name="id" required />
                    <span id="messageID"></span>
                </li>
                <li>
                    <label for="key">Введите Key </label>
                    <input type="text"id="key" name="key" required />
                    <span id="messageKEY"></span>
                </li>
                <li>
                    <button class="submit" type="submit" id="balance" name="balance">Отправить запрос</button>
                </li>
            </ul>
        </form>

    </div>
    <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
        </div>
</div>

</body>
</html>