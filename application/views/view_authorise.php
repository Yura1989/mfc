<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="theme-color" content="#ffffff">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Система МАУ "МФЦ" г.Югорск</title>
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url();?>assets/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="<?= base_url();?>assets/img/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="<?= base_url();?>assets/img/favicon-16x16.png" sizes="16x16">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,400italic,500,700">
    <link rel="stylesheet" href="<?= base_url();?>assets/css/vendor.min.css">
    <link rel="stylesheet" href="<?= base_url();?>assets/css/elephant.min.css">
    <link rel="stylesheet" href="<?= base_url();?>assets/css/application.min.css">
    <link rel="stylesheet" href="<?= base_url();?>assets/css/demo.min.css">
    <link rel="stylesheet" href="<?= base_url();?>assets/css/login-2.min.css">
</head>
<body>
<div class="login">
    <div class="login-body">
        <a class="login-brand" href="http://mfc-ugorsk.ru">
            <img class="img-responsive" src="<?= base_url();?>assets/img/logo2.png" >
        </a>
        <div class="login-form">
            <form data-toggle="validator" method="POST" action="<?=base_url();?>">
                <div class="form-group">
                    <label for="nickname">Nickname</label>
                    <input id="nickname" class="form-control" type="text" name="nickname" spellcheck="false" autocomplete="off" data-msg-required="Пожалуйста введи ваш Nickname" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" class="form-control" type="password" name="password" minlength="6" data-msg-minlength="Пароль должен быть более 6 символов" data-msg-required="Пожалуйста введи ваш пароль" required>
                </div>
                <div class="form-group">
                    <label class="custom-control custom-control-primary custom-checkbox">
                        <input class="custom-control-input" type="checkbox" checked="checked">
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-label">Запомнить меня</span>
                    </label>

                </div>
                <button class="btn btn-primary btn-block" type="submit">Войти</button>
            </form>
        </div>
    </div>
    <div class="login-footer">
        <strong>{elapsed_time}</strong> seconds Version <strong> 1.0 </strong>
    </div>
</div>
<script src="<?= base_url();?>assets/js/vendor.min.js"></script>
<script src="<?= base_url();?>assets/js/elephant.min.js"></script>
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-83990101-1', 'auto');
    ga('send', 'pageview');
</script>
</body>
</html>