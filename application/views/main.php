<!DOCTYPE html> <html lang="en">
<head> <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!— The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags —>
    <title><?php echo $title; ?></title>
    <!— Bootstrap —>
    <link href="/papilio/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/papilio/assets/css/style.css" rel="stylesheet">

    <!— HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries —>
    <!— WARNING: Respond.js doesn't work if you view the page via file:// —>
    <!--[if lt IE 9]>

    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

    <section id="main">
        <div class="container">
            <div class="row">
                <div class="col-md-4 logo text-left">
                    <img src="<?=base_url();?>images/logo.jpg" width="10%" alt="Мои документы">
                </div>
                <div class="col-md-4 mfc text-center ">
                    <h1>Система МАУ "МФЦ"</h1>
                </div>
                <div class="col-md-4 ">
                </div>
            </div>
        </div>
    </section>

    <!— jQuery (necessary for Bootstrap's JavaScript plugins) —>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.mi.."></script>
    <!— Include all compiled plugins (below), or include individual files as needed —>
    <script src="/papilio/assets/js/bootstrap.min.js"></script>
    <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</body>
</html>