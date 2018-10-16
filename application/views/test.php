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
    <h1>TEST</h1>

    <div id="body">

        
        <?php $result = @file_get_contents('http://bytehand.com:3800/balance?id='.$id.'&key='.$key); ?>
         </br>
        <?php $json = json_decode ($result);
          print $json->{'description'};
        ?>
        </br>


    </div>

    <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>