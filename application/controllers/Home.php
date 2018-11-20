<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    /*Окно авторизации*/
    public function index()
    {
        if (!isset ($_POST['nickname']) || !isset($_POST['password']))
        {
            $this->load->view('view_authorise');
        }else{
            $query = sprintf("SELECT id, nickname, password FROM users" . " WHERE nickname = '%s';", trim($_POST['nickname']));
            $result = ($this->db->query($query));
            $hash = $result->result_array();
                if (($result->num_rows() == 1) && (password_verify(trim($_POST['password']), $hash['0']['password']))) {
                    $current_id = $hash['0']['id'];
                    $current_nickname = $hash['0']['nickname'];
                    set_cookie('current_id',  $current_id, '3600' );
                    set_cookie('current_nickname',  $current_nickname, '3600' );
                    redirect('/home/main');
                }else{
                    $this->load->view('view_authorise');
                }
        }
        
    }

    function auth()
    {
        if (!isset ($_COOKIE['user_id']))
        {
            if (!isset ($_POST['nickname']) || !isset($_POST['password']))
            {
                $this->load->view('view_authorise');
            }else{
                $query = sprintf("SELECT id, nickname, password FROM users" . " WHERE nickname = '%s';", trim($_POST['nickname']));
                $result = ($this->db->query($query));
                $hash = $result->result_array();
                    if (($result->num_rows() == 1) && (password_verify(trim($_POST['password']), $hash['0']['password'])))
                    {
                        $current_id = $hash['0']['id'];
                        $current_nickname = $hash['0']['nickname'];

                        redirect('/home/main');
                    }else{
                        $this->load->view('view_authorise');
                    }
            }
        }

    }

    /*Домашняя страница*/
    function main()
    {
        $this->load->view('template/view_header');
        $this->load->view('template/view_menu');
        $this->load->view('view_content');
        $this->load->view('template/view_footer');
    }

    /*--------------------------------------------------------*/
    /*Отправка SMS-сообщения*/
    function sendSms()
    {
        if (isset ($_POST['send'])){

            $string = $this->input->post('number');
            $count = array ("-", "(", ")", " ");
            $queryString=str_replace ($count, '', $string);
            $checktitle = preg_match("/^[0-9]{11}$/",$queryString);

            if ($checktitle == TRUE ){
                $add['number'] = $queryString;
                $add['message'] = "Приглашаем Вас в МФЦ г.Югорска за получением готовых документов";
                $add['date'] = date('Y-m-d');
                $key = "w345EzxovCgc9FKlFd4kih3clBjMU3o___r";
                $bytehandFrom = "MFC";

                $this->load->model('Model_sms');
                $data['description'] = $this->Model_sms->sendSms($add, $key, $bytehandFrom);
                $add['description'] = $data['description']['id'];

                if (isset ($data['description']['error'])) {
                    $this->load->view('template/view_header');
                    $this->load->view('template/view_menu');
                    $this->load->view('view_sendSms', $data);
                    $this->load->view('template/view_footer');
                } else {
                    $this->load->model('Model_db');
                    $this->Model_db->addSms($add);

                    $this->load->view('template/view_header');
                    $this->load->view('template/view_menu');
                    $this->load->view('view_results', $add);
                    $this->load->view('template/view_footer');
                }
            }else{
                $this->load->view('template/view_header');
                $this->load->view('template/view_menu');
                $this->load->view('view_sendSms');
                $this->load->view('template/view_footer');
            }
        }else{
            $this->load->view('template/view_header');
            $this->load->view('template/view_menu');
            $this->load->view('view_sendSms');
            $this->load->view('template/view_footer');
        }
    }

    /*История отпавки СМС из базы MySQL*/
    function hystory()
    {
        if (isset ($_POST['send']) && (($_POST['start']) != NULL) && (($_POST['end']) != NULL))
        {
            $data['startDate'] = $this->input->post('start');
            $data['endDate'] = $this->input->post('end');
            $query = sprintf('SELECT * FROM sms WHERE date BETWEEN '.'\''. $data['startDate'].'\''.' AND '.'\''.$data['endDate'].'\'');
            $this->load->model('Model_db');
            $result['data'] = $this->Model_db->hystorySms($query);
                $this->load->view('template/view_header');
                $this->load->view('template/view_menu');
                $this->load->view('view_hystory', $result);
                $this->load->view('template/view_footer');

        }else{
            $this->load->view('template/view_header');
            $this->load->view('template/view_menu');
            $this->load->view('view_hystory');
            $this->load->view('template/view_footer');
        }
    }

    /*Поиск и проверка статус смс сообщения по номеру телефона*/
    function transfer()
    {
        if (isset ($_POST['send']))
        {
            $data = $this->input->post('number');
            $count = array ("-", "(", ")", " ");
            $queryString=str_replace ($count, '', $data);
            $checktitle = preg_match("/^[0-9]{11}$/",$queryString);
            if($checktitle == TRUE){
                $query = sprintf("SELECT description, date FROM sms WHERE number = %s;",$queryString);
                $this->load->model('Model_db');
                $result = $this->Model_db->HystorySMS($query);
                $answer['date'] = $result;
                $n = count ($result);
                $answer['n'] = $n;
                for ($i=0; $i < $n; $i++){
                    $query_number = $result[$i]['description'];
                    $this->load->model('Model_sms');
                    $answer['number'][] = $this->Model_sms->transfer($query_number);
                }
                $this->load->view('template/view_header');
                $this->load->view('template/view_menu');
                $this->load->view('view_transfer', $answer);
                $this->load->view('template/view_footer');
            }else{
                $this->load->view('template/view_header');
                $this->load->view('template/view_menu');
                $this->load->view('view_transfer');
                $this->load->view('template/view_footer');
            }
        }else{
            $this->load->view('template/view_header');
            $this->load->view('template/view_menu');
            $this->load->view('view_transfer');
            $this->load->view('template/view_footer');
        }
    }

    /*Просмотр баланса*/
    function balance()
    {
        $balance['id'] = "34159";
        $balance['key'] = "6FFE53A3E0B16022";

        if (isset ($_POST['send'])){
            $this->load->model('Model_sms');
            $result = $this->Model_sms->balance($balance);
            $string['description'] = substr(($result['description']), 0, 7);
                $this->load->view('template/view_header');
                $this->load->view('template/view_menu');
                $this->load->view('view_balance', $string);
                $this->load->view('template/view_footer');
        } else {
            $this->load->view('template/view_header');
            $this->load->view('template/view_menu');
            $this->load->view('view_balance');
            $this->load->view('template/view_footer');
        }
    }
    /*--------------------------------------------------------*/

    /*Добавление пользователя*/
    function addUser()
    {
        $this->load->library('form_validation');

        $this->load->model('model_users');
        $this->form_validation->set_error_delimiters('<code style=\'color:#ff2352;\'>', '</code>');
        $this->form_validation->set_rules($this->model_users->addUser('$add_User'));
        if ($this->form_validation->run() == false)
        {
            $this->load->view('template/view_header');
            $this->load->view('template/view_menu');
            $this->load->view('view_addUsers');
            $this->load->view('template/view_footer');
        }else{
            $user['nickname'] = $this->input->post('nickname');
            $user['name'] = $this->input->post('name');
            $user['sername'] = $this->input->post('sername');
            $user['email'] = $this->input->post('email');
            $user['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            $user['date'] = date('Y-m-d');

            $this->load->model('model_db');
            $this->model_db->addUser($user);
            $this->load->view('template/view_header');
            $this->load->view('template/view_menu');
            $this->load->view('view_addUserFinish',$user);
            $this->load->view('template/view_footer');
        }
    }
    
    /*Статус добавления пользователя*/
    function addUserFinish() 
    {
        $this->load->view('template/view_header');
        $this->load->view('template/view_menu');
        $this->load->view('view_addUserFinish');
        $this->load->view('template/view_footer');
    }
    
    /*Просмотр пользователей*/
    function users ()
    {
        $select_users = 'SELECT id, nickname, name, sername, email, date FROM users';
        $this->load->model('model_db');
        $result['users'] = $this->model_db->getUsers($select_users);

        /*Надо сделать добавление увидемления в контент, а не через Alert*/
        /*if (isset($_REQUEST['success_message'])) {
            $result['msg'] = $_REQUEST['success_message'];
            $this->load->model('model_users');
            $this->model_users->deleteUser($result);
        }*/

        $this->load->view('template/view_header');
        $this->load->view('template/view_menu');
        $this->load->view('view_users', $result);
        $this->load->view('template/view_footer');
    }

    /*Удаление пользователей*/
    function deleteUser()
    {
        $user_id = $_REQUEST['user_id'];
        $delete_user = 'DELETE FROM users WHERE id=' . $user_id;
        $this->load->model('model_db');
        $this->model_db->deleteUser($delete_user);

        $msg = "Указанный пользователь"." ".$user_id." ". "был удален.";
        header("Location: users?success_message={$msg}");
    }

    /*Редактирование пользователей*/
    function editUser ()
    {
        if (!isset($_REQUEST['user_id'])){
            $user_id = $_COOKIE['user_id'];
        }else{
            $user_id = $_REQUEST['user_id'];
        }
        $select_user = "SELECT * FROM users WHERE id = ".$user_id;
        $this->load->model('model_db');
        $result['user'] = $this->model_db->getUsers($select_user);
        
        $this->load->library('form_validation');

        if (isset ($_POST['editUser'])){
            $this->load->model('model_users');
            $this->form_validation->set_error_delimiters('<code style=\'color:#ff2352;\'>', '</code>');
            $this->form_validation->set_rules($this->model_users->editUser('$editUser'));
            if ($this->form_validation->run() == false)
            {
                $this->load->view('template/view_header');
                $this->load->view('template/view_menu');
                $this->load->view('view_editUser', $result);
                $this->load->view('template/view_footer');
            }else{
                $User['id'] = $_REQUEST['user_id'];
                $User['nickname'] = $this->input->post('nickname');
                $User['name'] = $this->input->post('name');
                $User['sername'] = $this->input->post('sername');
                $User['email'] = $this->input->post('email');
                $User['password'] = password_hash($this->input->post('password'),PASSWORD_DEFAULT );
                $User['date'] = date('Y-m-d');

                $this->load->model('model_db');
                $this->model_db->editUser($User);
                $this->load->view('template/view_header');
                $this->load->view('template/view_menu');
                $this->load->view('view_result', $User);
                $this->load->view('template/view_footer');
            }
        }else{
            $this->load->view('template/view_header');
            $this->load->view('template/view_menu');
            $this->load->view('view_editUser', $result);
            $this->load->view('template/view_footer');
        }
    }

    /*Отправка нескольких SMS-сообщений*/
    function sendManySms()
    {
        if (isset ($_POST['send'])){

            $n = count ($_POST);
            $keys = array_keys($_POST);
            print_r ($_POST['numbertelephon_'.'1']);
            for($i=0; $i < $n; $i++) {
                echo "</br>";
                $string = $_POST[$keys[$i]];
                $queryString = str_replace('-', '', $string);
                echo $queryString . "<br>";
                $checktitle = preg_match("/^[0-9]{11}$/", $queryString);
                print_r($checktitle);
                if ($checktitle == TRUE) {
                    echo "Get DB";
                    $add['number'] = $queryString;
                    $add['message'] = "textSMS";
                    $add['date'] = date('Y-m-d');
                    $id = "2837";
                    $key = "8E60A7252A472D5A";
                    $bytehandFrom = "SMS-INFO";
                    print_r($add);

                    $this->load->model('model_sms');
                    $add['description'] = "test";

                    $this->load->model('model_db');
                    $this->Model_db->addSms($add);
                    //$this->model_sms->sendSmsInfo($add);
                }
            }
        }else{
            $this->load->view('template/view_header');
            $this->load->view('template/view_menu');
            $this->load->view('view_sendManySms');
            $this->load->view('template/view_footer');
        }
    }

    function reportTest()
    {
        $this->load->view('template/view_header');
        $this->load->view('template/view_menu');
        $this->load->view('view_report');
        $this->load->view('template/view_footer');
    }

    function rangeReport()
    {
         $this->load->view('template/view_header');
         $this->load->view('template/view_menu');
         $this->load->view('view_rangeReport');
         $this->load->view('template/view_footer');
    }

    /*Вывод формы заполнения отчета по услугам*/
    function report()
    {
        $query = 'SELECT * FROM service s JOIN department d ON s.id_dep=d.id_department JOIN typedep t ON d.id_typedep=t.id WHERE 1';
        $this->load->Model('Model_db');
        $result['report'] = $this->Model_db->DBgetReport($query);

        /*"Сформировать новый отчет" - Открытие выбора даты формирования нового отчета*/
        if (isset ($_POST['BTloadNewReport'])) {
            $this->load->view('template/view_header');
            $this->load->view('template/view_menu');
            $this->load->view('view_rangeReport');
            $this->load->view('template/view_footer');

        /*"Сформировать отчет" - Формирование пустого отчета, либо заполненного*/
        } elseif (isset ($_POST['BTloadReport']) && ($_POST['dateReport'] != NULL)) {
            $queryMonth = sprintf("SELECT date FROM reports WHERE date = '%s';", trim($_POST['dateReport']));
            $result['editreport'] = $this->Model_db->DBgetReport($queryMonth);
            $result['flag'] = (count ($result['editreport']));
            if ($this->Model_db->DBgetReport($query) == TRUE) {
                $query = sprintf("SELECT * FROM reports r JOIN service s JOIN department d ON r.IDservice=s.id_service AND s.id_dep=d.id_department WHERE date = '%s';", trim($_POST['dateReport']));
                $result['rangeReport'] = $this->Model_db->DBgetReport($query);
                $this->load->view('template/view_header');
                $this->load->view('template/view_menu');
                $this->load->view('view_report', $result);
                $this->load->view('template/view_footer_report');
            } else {
                $this->load->view('template/view_header');
                $this->load->view('template/view_menu');
                $this->load->view('view_report', $result);
                $this->load->view('template/view_footer');
            }

        /*"Сохранить" - сохранение нового отчета*/
        } elseif (isset ($_POST['BTsaveReport']) && isset ($_POST['number_reception'])) {
            $out = array();
            for ($i = 0; $i < count($_POST['number_reception']); $i++)
                {
                    if ($_POST['number_reception'][$i] != "")
                    {
                        $date = $this->input->post('dateReport');;
                        $idservice = $result['report'][$i]['id_service'];
                        $name_mfc = "Yugorsk";
                        $number_reception = $_POST['number_reception'][$i];
                        $number_consultation = $_POST['number_consultation'][$i];
                        $number_bus_recep = $_POST['number_bus_recep'][$i];
                        $number_bus_cons = $_POST['number_bus_cons'][$i];
                        $itog = $number_reception + $number_consultation;
                        $number_ready = $_POST['number_ready'][$i];
                        $out[] = "(" . $idservice . ", '" . $date . "','".$name_mfc."', " . $number_reception . ", " . $number_consultation . ", " . $number_bus_recep . ", " . $number_bus_cons . ", " . $itog . ", ". $number_ready .")";
                    }
                }
            $query = 'INSERT INTO reports (IDservice, date, name_mfc, number_reception, number_consultation, number_bus_recep, number_bus_cons, result, number_ready) VALUES' . implode(", ", $out);
            $this->load->Model('Model_db');
            $this->Model_db->DBsaveReport($query);
               header("Location: rangeReport");

        /*"Сохранить" - сохранение уже заполнееного отчета*/
        } elseif (isset ($_POST['BTsaveEditReport'])){
            //$out = array();
            $i=0;
            while ($i < count($_POST['number_reception']))
            {
                $id_report = $_POST['id_report'][$i];
                $month = $_POST['dateReport'];
                $number_reception = $_POST['number_reception'][$i];
                $number_consultation = $_POST['number_consultation'][$i];
                $number_bus_recep = $_POST['number_bus_recep'][$i];
                $number_bus_cons = $_POST['number_bus_cons'][$i];
                $number_ready = $_POST['number_ready'][$i];
                $itog = $number_reception + $number_consultation;
                //$out[] = "(".$id_report.", '" . $month . "', " . $number_reception . ", " . $number_consultation . ", " . $number_bus_recep . ", " . $number_bus_cons . ", " . $number_ready . ", " . $itog . ")";
                $query = sprintf("UPDATE reports
                                             SET
                                                 number_reception = ('%s'),
                                                 number_consultation = ('%s'),
                                                 number_bus_recep = ('%s'),
                                                 number_bus_cons = ('%s'),
                                                 number_ready = ('%s'),
                                                 result = ('%s')
                                             WHERE date = '%s' AND id_report = '%s';", trim($number_reception), trim($number_consultation), trim($number_bus_recep), trim($number_bus_cons), trim($number_ready), trim($itog), trim($month), trim($id_report));
                    $this->load->Model('Model_db');
                    $this->Model_db->DBsaveReport($query);
                        header("Location: rangeReport");
                $i++;
            }
        }
        else {
            header("Location: rangeReport");
        }
    }

    function editReport()
    {
        $query = 'SELECT * FROM reports r JOIN service s ON r.IDservice=s.id_service JOIN department d ON s.id_dep=d.id_department JOIN typedep t ON d.id_typedep=t.id WHERE 1';
        $this->load->Model('Model_db');
        $result['report'] = $this->Model_db->DBgetReport($query);
        print_r ($result);
        $this->load->view('template/view_header');
        $this->load->view('template/view_menu');
        $this->load->view('view_report', $result);
        $this->load->view('template/view_footer');
    }

    /*Вывод типа ведомств*/
    function typeDep()
    {
        /*Вывод всех типов ведомств из базы*/
        $select_TypeDep = 'SELECT * FROM typedep';
        $this->load->model('Model_db');
        $result['typeDep'] = $this->Model_db->DBgetTypeDep($select_TypeDep);

        $this->load->view('template/view_header');
        $this->load->view('template/view_menu');
        $this->load->view('view_typeDep', $result);
        $this->load->view('template/view_footer');
    }

    /*Редактирование типа ведомств*/
    function editTypeDep()
    {
        /*Вывод пустой форму "Типа ведомств"*/
        if (isset ($_POST['BTaddTypeDep'])) {
            $this->load->view('template/view_header');
            $this->load->view('template/view_menu');
            $this->load->view('view_editTypeDep');
            $this->load->view('template/view_footer');

        /*Редактирование "Типа ведомства"*/
        } else if (isset ($_REQUEST['typedep_id']) && isset ($_POST['BTsaveTypeDep'])) {
            $edit_typedep['id'] = $_REQUEST['typedep_id'];
            $edit_typedep['TypeDep'] = $this->input->post('TypeDepartment');
            //$edit_typedep = 'SELECT * FROM typedep WHERE id = ' . $typedep;
            $this->load->model('Model_db');
            $this->Model_db->DBEditTypeDep($edit_typedep);
            header("Location: typeDep");

        /*Добавление типа ведомства в базу*/
        } else if (isset($_POST['BTsaveTypeDep'])){
            $typedep['typeDep'] = $this->input->post('TypeDepartment');
            $this->load->model('Model_db');
            $this->Model_db->DBaddTypeDep($typedep);
            header("Location: typeDep");

        /*Вывод редактируемого "Типа ведомства" из базы*/
        } else if (isset ($_REQUEST['typedep_id'])) {
                $typedep = $_REQUEST['typedep_id'];
                $edit_typedep = 'SELECT * FROM typedep WHERE id = ' . $typedep;
                $this->load->model('Model_db');
                $result['typedep'] = $this->Model_db->DBgetTypeDep($edit_typedep);
                $this->load->view('template/view_header');
                $this->load->view('template/view_menu');
                $this->load->view('view_editTypeDep', $result);
                $this->load->view('template/view_footer');
        }
    }

    /*Удаление типа ведомств*/
    function deleteTypeDep()
    {
        $typedep_id = $_REQUEST['typedep_id'];
        $delete_typedep = 'DELETE FROM typedep WHERE id=' . $typedep_id;
        $this->load->model('Model_db');
        $this->Model_db->DBdeleteTypeDep($delete_typedep);

        $msg = "Указанный пользователь"." ".$typedep_id." ". "был удален.";
        header("Location: typeDep?success_message={$msg}");
    }

    /*Вывод Ведомств*/
    function department()
    {
        $select_Department = 'SELECT * FROM typeDep s JOIN department p ON s.id=p.id_typedep WHERE 1';
        $this->load->model('Model_db');
        $result['department'] = $this->Model_db->DBgetDepartment($select_Department);
        $this->load->view('template/view_header');
        $this->load->view('template/view_menu');
        $this->load->view('view_department', $result);
        $this->load->view('template/view_footer');
    }

    /*Редактирование Ведомств*/
    function editDepartment()
    {
        /*Вывод пустой формы для добавления Ведомства*/
        if (isset ($_POST['BTaddDepartment']))
        {
            $select_TypeDep = 'SELECT * FROM typedep';
            $this->load->model('Model_db');
            $query['typeDep'] = $this->Model_db->DBgetTypeDep($select_TypeDep);
            $this->load->view('template/view_header');
            $this->load->view('template/view_menu');
            $this->load->view('view_editDepartment', $query);
            $this->load->view('template/view_footer');

        /*Внесение изменения в таблицы "Ведомств" и "Типы ведомств"*/
        } else if (isset ($_REQUEST['department_id']) && isset ($_POST['BTeditDepartment'])) {
            $edit_department['id_department'] = $_REQUEST['department_id'];
            $edit_department['shortDepartment'] = $this->input->post('shortDepartment');
            $edit_department['fullDepartment'] = $this->input->post('fullDepartment');
            $edit_department['id_typedep'] = $this->input->post('typeDepartment');
                $this->load->model('Model_db');
                $this->Model_db->DBeditDepartment($edit_department);
                    header("Location: department");

        /*Добавление ведомства в базу*/
        } else if (isset ($_POST['BTaddDep'])) {

            $department['shortDepartment'] = $this->input->post('shortDepartment');
            $department['fullDepartment'] = $this->input->post('fullDepartment');
            $department['id_typedep'] = $this->input->post('typeDepartment');
                $this->load->model('Model_db');
                $this->Model_db->DBaddDepartment($department);
                    header("Location: department");

        /*Вывод редактируемого ведомства из базы по ID*/
        } else if (isset ($_REQUEST['department_id'])){
            $this->load->model('Model_db');
                $id['ID'] = $_REQUEST['department_id'];
                /*для выборки данных ведомства по ID, использовал до связей между таблицами
                $query['department'] = $this->Model_db->DBgetIdDepartment($id); */
                $select_TypeDep = 'SELECT * FROM typedep';
                $query['typeDepartment'] = $this->Model_db->DBgetDepartment($select_TypeDep);
                $select_Department = 'SELECT * FROM department s JOIN typeDep p ON s.id_typedep=p.id WHERE id_department='.$id['ID'];
                $query['department'] = $this->Model_db->DBgetDepartment($select_Department);
                print_r ($query['department']);
                $this->load->view('template/view_header');
                   // $this->load->view('template/view_menu');
                    $this->load->view('view_editDepartment', $query);
                    $this->load->view('template/view_footer');
        }
    }

    /*Удаление Ведомств*/
    function deleteDepartment()
    {
        $department_id = $_REQUEST['department_id'];
        $delete_department = 'DELETE FROM department WHERE id_department=' . $department_id;
        $this->load->model('Model_db');
        $this->Model_db->DBdeleteDepartment($delete_department);

        $msg = "Указанный пользователь"." ".$department_id." ". "был удален.";
        header("Location: department?success_message={$msg}");
    }

    /*Вывод Услуг*/
    function service()
    {
        $select_services = 'SELECT * FROM service s JOIN department p ON s.id_dep=p.id_department WHERE 1';
        $this->load->model('Model_db');
        $result['services'] = $this->Model_db->DBgetServices($select_services);
              $this->load->view('template/view_header');
              $this->load->view('template/view_menu');
              $this->load->view('view_service', $result);
              $this->load->view('template/view_footer');
    }

    /*Редактирование услуг*/
    function editService()
    {
        /*Вывод пустой формы для добавления услуги*/
        if (isset ($_POST['BTaddService'])) {
            $get_Department = 'SELECT * FROM department';
            $this->load->model('Model_db');
            $query['department'] = $this->Model_db->DBgetDepartment($get_Department);
            $this->load->view('template/view_header');
            $this->load->view('template/view_menu');
            $this->load->view('view_editService', $query);
            $this->load->view('template/view_footer');

        /*Добавление услуги*/
        } else if (isset ($_POST['BTaddSer'])) {
            $service['name_service'] = $this->input->post('Service');
            $service['id_dep'] = $this->input->post('shortDepartment');
            $this->load->model('Model_db');
            $this->Model_db->DBaddService($service);
            header("Location: service");

        /*Изменение услуги по ID*/
        } else if (isset ($_POST['saveService']) && ($_REQUEST['id_service'])) {
            $edit_service['id_service'] = $_REQUEST['id_service'];
            $edit_service['name_service'] = $this->input->post('nameService');
            $edit_service['id_dep'] = $this->input->post('shortDepartment');
            print_r ($edit_service);
            $this->load->model('Model_db');
            $this->Model_db->DBeditService($edit_service);
                header("Location: service");

        /*Вывод формы для редактиварония услуги*/
        } else {
            $id_service = $_REQUEST['id_service'];
            $select_services = 'SELECT * FROM service s JOIN department p ON s.id_dep=p.id_department WHERE id_service=' . $id_service;
            $this->load->model('Model_db');
            $result['service'] = $this->Model_db->DBgetServices($select_services);
            $select_department = 'SELECT * FROM department';
            $result['department'] = $this->Model_db->DBgetServices($select_department);
            $this->load->view('template/view_header');
            $this->load->view('template/view_menu');
            $this->load->view('view_editService', $result);
            $this->load->view('template/view_footer');
        }
    }

    /*Удаление услуг*/
    function deleteService()
    {
        $id_service = $_REQUEST['$id_service'];
        $delete_service = 'DELETE FROM service WHERE id_service=' . $id_service;
        $this->load->model('Model_db');
        $this->Model_db->DBdeleteService($delete_service);

        $msg = "Указанная услуга"." ".$id_service." ". "была удалена.";
        header("Location: service?success_message={$msg}");
    }

    function exportExcel(){
        $this->load->view('template/view_header');
        $this->load->view('template/view_menu');
        $this->load->view('view_exportExcel');
        $this->load->view('template/view_footer');
    }

    /*Тестирование выгрузки в Excel*/
    function action()
    {
        $this->load->model('Model_db');
        $this->load->library('Excel');

        /*Проверка и создание запроса в БД, формировании отчетов по фильтру*/
        if (isset ($_POST['BTexportRange']) && isset($_POST['export']) && ($_POST['start'] != NULL))
        {
            if ($_POST['export'] == 'all') {
                $export['startDate'] = $this->input->post('start');
                $export['endDate'] = $this->input->post('end');
                $query = 'SELECT * FROM reports r JOIN service s ON r.IDservice=s.id_service JOIN department d ON s.id_dep=d.id_department JOIN typedep t ON d.id_typedep=t.id WHERE date BETWEEN '.'\''.$export['startDate'].'\''.' AND '.'\''.$export['endDate'].'\'';
                $this->load->model('Model_db');
                $resultExport = $this->Model_db->DBexcel($query);
            }
            if ($_POST['export'] == 'priem') {
                $export['startDate'] = $this->input->post('start');
                $export['endDate'] = $this->input->post('end');
                $query = 'SELECT * FROM reports r JOIN service s ON r.IDservice=s.id_service JOIN department d ON s.id_dep=d.id_department JOIN typedep t ON d.id_typedep=t.id WHERE date BETWEEN '.'\''.$export['startDate'].'\''.' AND '.'\''.$export['endDate'].'\'';
                $this->load->model('Model_db');
                $resultExport = $this->Model_db->DBexcel($query);
            }
        } else {
            header("Location: exportExcel");
        }

        /*Проверка и создание запроса в БД, при выгрузке текущего заполненного отчета*/
        if (isset ($_POST['BTexport'])) {
            $export['startDate'] = $this->input->post('dateReport');
            $query = 'SELECT * FROM reports r JOIN service s ON r.IDservice=s.id_service JOIN department d ON s.id_dep=d.id_department JOIN typedep t ON d.id_typedep=t.id WHERE date='.'"'.$export['startDate'].'"';
            $resultExport = $this->Model_db->DBexcel($query);
        }

        /*Формирование сводного отчета*/
        if (isset ($resultExport)){

            $object = new PHPExcel();
            /*Номер листа в книги*/
            $object->setActiveSheetIndex(0);
            /*Название листа в книге*/
            $object->getActiveSheet()->setTitle('MFC Ugorsk');

            /*Формируем шапку таблицы*/
            $table_columns = array ("Отчетный месяц", "Наименование МФЦ", "Наименование услуги",
                "Наименование органа власти", "Категория услуги", "Общее количество заявлений (запросов) поступивших в МФЦ от заявителей",
                "Общее количество консультаций, предоставленных заявителям в МФЦ", "Общее количество заявлений (запросов) поступивших в Бизнес-окно (офис) от заявителей", "Общее количество консультаций, предоставленных заявителям в Бизнес-окно (офис)", "Итого принятых заявлений и консультаций", "Общее количество выданных документов");
            $column = 0;
            foreach ($table_columns as $item){
                $object->getActiveSheet()->setCellValueByColumnAndRow($column, 2, $item);
                $column++;
            }

            /*Переменная даты*/
            $date = date('d-m-y');
            $object->getActiveSheet()->setCellValue('A1', 'МАУ МФЦ г.Югорск,'.' Дата формирования отчета '.$date);

            /*Перебор всех данных из БД вставка их в Excel*/
            $row_start = 3;
            $i=0;
            foreach ($resultExport as $row){
                $row_next = $row_start+$i;

                $object->getActiveSheet()->setCellValue('A'.$row_next, $row->date);
                $object->getActiveSheet()->setCellValue('B'.$row_next, $row->name_mfc);
                $object->getActiveSheet()->setCellValue('C'.$row_next, $row->name_service);
                $object->getActiveSheet()->setCellValue('D'.$row_next, $row->shortDepartment);
                $object->getActiveSheet()->setCellValue('E'.$row_next, $row->IDservice);
                $object->getActiveSheet()->setCellValue('F'.$row_next, $row->number_reception);
                $object->getActiveSheet()->setCellValue('G'.$row_next, $row->number_consultation);
                $object->getActiveSheet()->setCellValue('H'.$row_next, $row->number_bus_recep);
                $object->getActiveSheet()->setCellValue('I'.$row_next, $row->number_bus_cons);
                $object->getActiveSheet()->setCellValue('J'.$row_next, $row->result);
                $object->getActiveSheet()->setCellValue('K'.$row_next, $row->number_ready);
                $i++;
            }

            /*Автоматическое вычисление ширины столбца A*/
            $object->getActiveSheet()->getColumnDimension('A')->setWidth(12);
            /*Ширину столбца B*/
            $object->getActiveSheet()->getColumnDimension('B')->setWidth(12);
            $object->getActiveSheet()->getColumnDimension('C')->setWidth(50);
            $object->getActiveSheet()->getColumnDimension('D')->setWidth(20);
            $object->getActiveSheet()->getColumnDimension('E')->setWidth(20);
            $object->getActiveSheet()->getColumnDimension('F')->setWidth(25);
            $object->getActiveSheet()->getColumnDimension('G')->setWidth(25);
            $object->getActiveSheet()->getColumnDimension('H')->setWidth(25);
            $object->getActiveSheet()->getColumnDimension('I')->setWidth(25);
            $object->getActiveSheet()->getColumnDimension('J')->setWidth(25);
            $object->getActiveSheet()->getColumnDimension('K')->setWidth(25);
            /*Высота строк*/
            $object->getActiveSheet()->getDefaultRowDimension()->setRowHeight(30);

            /*Перенос по словам*/
            $object->getActiveSheet()->getStyle('A2:K2')
                ->getAlignment()->setWrapText(true);

            /*Перенос по словам*/
            $object->getActiveSheet()->getStyle('A3:K'.($i+2))
                ->getAlignment()->setWrapText(true);

            /*Стиль Title A1-J1*/
            $styleTitle = array(
                'font' => array(
                    'bold' => true,
                    'size' => 16
                ),
                'alignment' => array(
                    'horizontal'    => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                    'vertical'      => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                ),
            );

            /*Стиль Header A2-E2*/
            $styleHeaderA2_E2 = array(
                'font' => array(
                    'bold' => true,
                    'color' => array('rgb' => 'ffffff')
                ),
                'alignment' => array(
                    'horizontal'    => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                    'vertical'      => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                ),
                'borders' => array(
                    'allborders' => array (
                        'style' => PHPExcel_Style_Border::BORDER_THIN
                    )
                ),
                'fill' => array(
                    'type'       => PHPExcel_Style_Fill::FILL_SOLID,
                    'color'   => array(
                        'rgb' => 'e04e39')
                ),
            );

            /*Стиль Header F2-H2*/
            $styleHeaderF2_I2 = array(
                'font' => array(
                    'bold' => true,
                    'color' => array('rgb' => 'ffffff')
                ),
                'alignment' => array(
                    'horizontal'    => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                    'vertical'      => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                ),
                'borders' => array(
                    'top' => array(
                        'style' => PHPExcel_Style_Border::BORDER_THICK,
                        'color' => array('argb' => '4f81bd'),
                    ),
                    'allborders' => array (
                        'style' => PHPExcel_Style_Border::BORDER_THIN
                    )
                ),
                'fill' => array(
                    'type'       => PHPExcel_Style_Fill::FILL_SOLID,
                    'color'   => array(
                        'rgb' => 'e04e39')
                ),
            );

            /*Стиль Header J2*/
            $styleHeaderResult = array(
                'font' => array(
                    'bold' => true,
                    'color' => array('rgb' => 'ffffff')
                ),
                'alignment' => array(
                    'horizontal'    => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                    'vertical'      => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                ),
                'borders' => array(
                    'top' => array(
                        'style' => PHPExcel_Style_Border::BORDER_THICK,
                        'color' => array('rgb' => '4f81bd'),
                    ),
                    'allborders' => array (
                        'style' => PHPExcel_Style_Border::BORDER_THIN
                    )
                ),
                'fill' => array(
                    'type'       => PHPExcel_Style_Fill::FILL_SOLID,
                    'color'   => array(
                        'rgb' => '4f81bd')
                ),
            );

            /*Стиль Header K2*/
            $styleHeaderReady = array(
                'font' => array(
                    'bold' => true,
                    'color' => array('rgb' => 'ffffff')
                ),
                'alignment' => array(
                    'horizontal'    => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                    'vertical'      => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                ),
                'borders' => array(
                    'allborders' => array (
                        'style' => PHPExcel_Style_Border::BORDER_THIN
                    )
                ),
                'fill' => array(
                    'type'       => PHPExcel_Style_Fill::FILL_SOLID,
                    'color'   => array(
                        'rgb' => '9bbb59')
                ),
            );

            /*Стиль BODY*/
            $styleBody = array(
                'alignment' => array(
                    'horizontal'    => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                    'vertical'      => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                ),
                'borders' => array(
                    'allborders' => array (
                        'style' => PHPExcel_Style_Border::BORDER_THIN
                    )
                ),
            );

            $object->getActiveSheet()->mergeCells('A1:K1');
            $object->getActiveSheet()->getRowDimension('1')->setRowHeight(40);
            $object->getActiveSheet()->getStyle('A1:K1')->applyFromArray($styleTitle);

            /*Применение стиля и фильтров к шапке*/
            $object->getActiveSheet()->getStyle('A2:E2')->applyFromArray($styleHeaderA2_E2);
            $object->getActiveSheet()->getStyle('F2:I2')->applyFromArray($styleHeaderF2_I2);
            $object->getActiveSheet()->getStyle('J2')->applyFromArray($styleHeaderResult);
            $object->getActiveSheet()->getStyle('K2')->applyFromArray($styleHeaderReady);
            $object->getActiveSheet()->setAutoFilter('A2:K2');

            /*Применение стиля к телу*/
            $object->getActiveSheet()->getStyle('A3:K'.($i+2))->applyFromArray($styleBody);

            /*Формирование xlsx файла*/
            $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel2007');
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment; filename="Data.xlsx"');
            $object_writer -> save('php://output');

        } else {
            header("Location: exportExcel");
        }
    }





    function js()
    {
        $query = 'SELECT * FROM reports';
        $this->load->model('Model_db');
        $result['report'] = $this->Model_db->DBgetReport($query);
        $this->load->view('view_js', $result);
    }

    function model()
    {
        $this->load->view('modelWindow');
    }

    function SelectServices ()
    {
        $this->load->view('template/view_header');
        $this->load->view('template/view_menu');
        $this->load->view('SelectServices');
        //$this->load->view('template/view_footer');
        //$this->load->view('template/view_header');
        //$this->load->view('view_content');
        //$this->load->view('template/view_footer');

    }

    function Cleartest()
    {
        $n = count($_POST);
        $key = array_keys($_POST);
        for($i=0; $i < $n; $i++){
            echo $_POST[$key[$i]]."<br>";
        }
        $this->load->view('clear_test');
    }

    function telephon()
    {
        $this->load->view('telephon');
    }

    function sendv2 ()
    {
        $this->load->view('test');
    }

    function ajaxtest () {
        $this->load->view('ajaxtest');
    }

    function test()
    {
        if (isset ($_POST['BTexportRange']) && isset($_POST['export']) && ($_POST['start'] != NULL))
        {
            if ($_POST['export'] == 'all')
            {
                $export['startDate'] = $this->input->post('start');
                $export['endDate'] = $this->input->post('end');
                $query = 'SELECT * FROM reports r JOIN service s ON r.IDservice=s.id_service JOIN department d ON s.id_dep=d.id_department JOIN typedep t ON d.id_typedep=t.id WHERE date BETWEEN '.'\''.$export['startDate'].'\''.' AND '.'\''.$export['endDate'].'\'';
                $this->load->model('Model_db');
                $result2 = $this->Model_db->DBgetReport($query);
                print_r ($result2);
                echo ("</br>");
                echo ("</br>");
                echo ("Первый случай");
            }
            if ($_POST['export'] == 'priem')
            {
                echo ("Второй случай");
                echo ("</br>");
                print_r ($_POST);
                $result2 = 2;
            }
        } else {
            header("Location: exportExcel");
        }

        if (isset ($result2)){
            echo ("</br>");
            print_r ($result2);
        } else {
            header("Location: exportExcel");
        }
    }

    function connectOracle ()
    {
        if (isset ($_POST['connectOracle'])){
            $dateForOracle['connect'] = $this->input->post['connect'];
            $dateForOracle['nickname'] = $this->input->post['nickname'];
        }

        $this->load->view('template/view_header');
        $this->load->view('template/view_menu');
        $this->load->view('view_connectOracle');
        $this->load->view('template/view_footer');

    }
}
