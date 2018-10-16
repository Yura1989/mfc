<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_auth extends CI_Model {

    function auth()
    {
        // Если пользователь зарегистрировался, должен быть создан cookie-файл id
        if (!isset($_COOKIE['id'])){
            // Установка факта отправки формы с именем пользователя для регистрации
            if(isset($_POST['nickname'])){
                $nickname = trim($_REQUEST['nickname']);
                $password = trim($_REQUEST['password']);
                //экранирование типа mysqli_real_escape_string в codeigniter не работает, если необходимо экранирование, нужно пользоваться встроенными функциями типа: $this->db->get();
                $query = sprintf("SELECT id, nickname, password FROM users " . " WHERE nickname = '%s';", $nickname);
                $results = ($this->db->query($query));
                $hash = $results->result_array();

                if (($results->num_rows() == 1) && (password_verify($password, $hash['0']['password'])))
                {
                    $user_id = $hash['0']['id'];
                    $nickname = $hash['0']['nickname'];
                    set_cookie('user_id',$user_id, '3600');
                    set_cookie('nickname',$nickname, '3600');
                    print_r ($_COOKIE);
                    echo "</br>";
                    print_r ($_REQUEST);
                    return $result=1;
                } else {
                        // Если пользователь не найден, выдача ошибки
                    $add['title'] = "<p>Error password</p>";
                    return $add;
                }
            }
        }
    }

    function messageAuth(){
        $title = base_url();
        echo <<<EOD
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<head>
    <meta charset="UTF-8" />
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
    <title>Добро пожаловать</title>
    <link rel="icon" href="images/logo.png" type="image/x-icon">
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="css/demo.css" />
    <link rel="stylesheet" type="text/css" href="css/style_auth.css" />
</head>
<body>
<div class="container">

    <header id="head">
        <h1>Система МАУ "МФЦ"</h1>
    </header>
    
    <section>
        <div id="container" >
            <div id="wrapper">
                <div id="login">
                    <form method="POST"  action="{$title}" autocomplete="on">
                        <h1>Войти</h1>
                        <p>
                            <label for="nickname" class="uname" data-icon="u" > Введи ваш nickname </label>
                            <input id="nickname" name="nickname" required="required" type="text" />
                        </p>
                        <p>
                            <label for="password" class="youpasswd" data-icon="p"> Введи пароль </label>
                            <input id="password" name="password" required="required" type="password" />
                        </p>
                        <p class="keeplogin">
                            <input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping" />
                            <label for="loginkeeping">Запомнить меня</label>
                        </p>
                        <p class="login button">
                            <input type="submit" value="Войти" />
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
</body>
</html>

EOD;
    }


    function authTest()
    {
        if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']))
        {
            header('HTTP/1.1 401 Unauthorized');
            header('WWW-Authenticate: Basic realm="The Social Site"');
            exit("Здесь нужно указать верное имя пользователя и пароль." . "Проходите дальше. Здесь вам нечего смотреть.");
        }else{
            //экранирование типа mysqli_real_escape_string в codeigniter не работает, если необходимо экранирование, нужно пользоваться встроенными функциями типа: $this->db->get();
            $query = sprintf("SELECT id, nickname, password FROM users " . " WHERE nickname = '%s';", trim($_SERVER['PHP_AUTH_USER']));
            $results = ($this->db->query($query));
            $hash = $results->result_array();

            /*print_r ($_SERVER['PHP_AUTH_USER']);
            echo "</br>";
            echo $results->num_rows();*/

            if (($results->num_rows() == 1) && (password_verify(trim($_SERVER['PHP_AUTH_PW']), $hash['0']['password'])))
            {
                $current_id = $hash['0']['id'];
                $current_nickname = $hash['0']['nickname'];
            } else
            {
                header('HTTP/1.1 401 Unauthorized');
                header('WWW-Authenticate: Basic realm="The Social Site"');
                exit("Здесь нужно указать верное имя пользователя и пароль." . "Проходите дальше. Здесь вам нечего смотреть.");
            }
            /*echo $hash['0']['password'];*/
            /*var_dump(password_verify(trim($_SERVER['PHP_AUTH_PW']), $hash['0']['password']));*/
        }
    }
}
?>