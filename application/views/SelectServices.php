<!DOCTYPE html>
<html>
<head>

    <style type="text/css">
        /* Окно */
        #modal_form {
            width: 500px;
            background: #fff;
            position: fixed; /* чтобы окно было в видимой зоне в любом месте */
            top: 45%; /* отступаем сверху 45%, остальные 5% подвинет скрипт */
            left: 50%; /* половина экрана слева */
            margin-top: -150px;
            margin-left: -150px; /* тут вся магия центровки css, отступаем влево и вверх минус половину ширины и высоты соответственно =) */
            display: none; /* в обычном состоянии окна не должно быть */
            opacity: 0; /* полностью прозрачно для анимирования */
            z-index: 5; /* окно должно быть наиболее большем слое */
        }
        /* Кнопка закрыть для тех кто в танке) */
        #modal_form #modal_close {
            width: 21px;
            height: 21px;
            position: absolute;
            top: 5px;
            right: 0px;
            cursor: pointer;
            display: block;
        }
        /* Подложка */
        #overlay {
            z-index: 3; /* подложка должна быть выше слоев элементов сайта, но ниже слоя модального окна */
            position: fixed; /* всегда перекрывает весь сайт */
            background-color: #000; /* черная */
            opacity: 0.8; /* но немного прозрачна */
            width: 100%;
            height: 100%; /* размером во весь экран */
            top: 0;
            left: 0; /* сверху и слева 0, обязательные свойства! */
            cursor: pointer;
            display: none; /* в обычном состоянии её нет) */
        }
    </style>

</head>

<body>
<button class="Btn_show btn btn-info" type="button" id="BTaddEditReport" name="BTaddEditReport">Добавить услугу</button>
Исходный код этого примера:

<h1>Добавление строки в таблице с помощью DOM javascript</h1>
    <p>Скрипт добавляет строку в таблицу, после нажатия на ссылку.</p>
<center>
    <table id="myTable" cellspacing="0" border="1">
        <tbody>
        <tr>
            <td>Услуга</td><td>Краткое наименование ведомства</td>
            <td>Полное наименование ведомства</td><td>Номер услуги</td>
        </tr>
        <tr>
            <td>row1_column1</td><td>row1_column1</td>
            <td>row1_column1</td><td>row1_column1</td>
        </tr>
        </tbody>
    </table>
</body>
</html>

<table id="tab1" class="sortable">
    <thead>
    <tr>
        <th>ФИО</th>
        <th>Должность</th>
    </tr>
    </thead>
    <tbody>
    </tbody>
</table>
<form action="" id="add_persons" method="post" onsubmit="addRow();return false;">
    <fieldset>
        <legend>Добавить сотрудника</legend>
        <ul>
            <li>
                <label for="name">Фамилия</label>
                <input type="text" name="name" id="name" value="" size="12" tabindex="1" />
            </li>
            <li>
                <label for="initials">Инициалы</label>
                <input type="text" name="initials" id="initials" value="" size="12" tabindex="2" />
            </li>
            <li>
                <label for="posada">Должность</label>
                <input type="text" name="posada" id="posada" value="" size="12" tabindex="3" />
            </li>
            <li>
                <label for="subm">Действия</label>
                <input type="submit" name="subm" class="submit" value="Добавить" tabindex="4" />
            </li>
        </ul>
    </fieldset>
</form>
<div id="result"></div>

<!--Скрытое модальное окно-->
<div id="modal_form" style="display: none; top: 45%; opacity: 0;">
    <span id="modal_close">X</span>
    <form action="" method="post">
            <div style="max-width: 900px;">
                <div style="width: 45%">
                    <h3>Basic usage</h3>
                    <a href="" onclick="addRow1('myTable');return false;">Добавить строку</a>

                    <select id="basic" >
                        <?php foreach ($report as $item): ?>
                        <option class="services" name="service" data-dep="<?php echo ($item['shortDepartment']); ?>" data-fulldep="<?php echo ($item['fullDepartment']); ?>" data-id_service="<?php echo ($item['id_service']); ?>" value="<?php echo ($item['name_service']); ?>"><?php echo ($item['name_service']); ?></option>
                        <?php endforeach; ?>
                    </select>

                    <select id="ddlViewBy" name="select_services">
                        <option value="test" data-ttt="1" >test</option>
                        <option value="test2" data-ttt="2" >test2</option>
                        <option value="test3" data-ttt="3" >test3</option>
                    </select>
                </div>
            </div>
    </form>
</div>
<div id="overlay" style="display: none;"></div>

<script src="<?=base_url();?>assets/js/jquery-3.2.1.min.js"></script>
<script src="<?=base_url();?>assets/datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="<?=base_url();?>assets/datepicker/locales/bootstrap-datepicker.ru.min.js" charset="UTF-8"></script>
<link rel="stylesheet" href="<?= base_url();?>assets/modelselect/selectric.css">
<script src="<?= base_url();?>assets/modelselect/jquery.selectric.js"></script>

<script>
    $(function() {
        $('#basic').selectric();
    });
</script>

<script>
    var name;
    var initials;
    var posada;

    function addRow()
    {
        // Считываем значения с формы
        name = document.getElementById('name').value;
        initials = document.getElementById('initials').value;
        posada = document.getElementById('posada').value;

        // Находим нужную таблицу
        var tbody = document.getElementById('tab1').getElementsByTagName('TBODY')[0];

        // Создаем строку таблицы и добавляем ее
        var row = document.createElement("TR");
        tbody.appendChild(row);

        // Создаем ячейки в вышесозданной строке
        // и добавляем тх
        var td1 = document.createElement("TD");
        var td2 = document.createElement("TD");

        row.appendChild(td1);
        row.appendChild(td2);

        // Наполняем ячейки
        td1.innerHTML = name+' '+initials;
        td2.innerHTML = posada;
    }
</script>

<script type="text/javascript">
    function addRow1(id){

        var services = document.getElementById("basic").value;
        var n = document.getElementById("basic");
        var shortDepartment = n.options[n.selectedIndex].dataset.dep;
        var fullDepartment = n.options[n.selectedIndex].dataset.fulldep;
        var id_service = n.options[n.selectedIndex].dataset.id_service;

        console.log(services);
        console.log(shortDepartment);

        var ee = document.getElementById("ddlViewBy").value;
        var e = document.getElementById("ddlViewBy");
        var rc = e.options[e.selectedIndex].dataset.ttt;

        console.log(ee);
        console.log(rc);

        //var shortDepartment = document.getElementById("shortDepartment").value;
        //var fullDepartment = document.getElementById("fullDepartment").value;
        //var id_service = document.getElementById("id_service").value;

        var tbody = document.getElementById(id).getElementsByTagName("TBODY")[0];
        var row = document.createElement("TR");
        var td1 = document.createElement("TD");
        td1.appendChild(document.createTextNode(services));
        var td2 = document.createElement("TD");
        td2.appendChild (document.createTextNode(shortDepartment));
        var td3 = document.createElement("TD");
        td3.appendChild (document.createTextNode(fullDepartment));
        var td4 = document.createElement("TD");
        td4.appendChild (document.createTextNode(id_service));
        row.appendChild(td1);
        row.appendChild(td2);
        row.appendChild(td3);
        row.appendChild(td4);
        tbody.appendChild(row);

        $(function() { // ловим клик по крестику или подложке
            $('#modal_form')
                .animate({opacity: 0, top: '45%'}, 200,  // плавно меняем прозрачность на 0 и одновременно двигаем окно вверх
                    function(){ // после анимации
                        $(this).css('display', 'none'); // делаем ему display: none;
                        $('#overlay').fadeOut(400); // скрываем подложку
                    }
                );
        });
    }
</script>

<script>
    $(document).ready(function() {
        /*Открываем модальное окно*/
        $('#BTaddEditReport').click( function(event){ // ловим клик по ссылки с id="go"
            event.preventDefault(); // выключаем стандартную роль элемента
            $('#overlay').fadeIn(400, // сначала плавно показываем темную подложку
                function(){ // после выполнения предыдущей анимации
                    $('#modal_form')
                        .css('display', 'block') // убираем у модального окна display: none;
                        .animate({opacity: 1, top: '50%'}, 200); // плавно прибавляем прозрачность одновременно со съезжанием вниз
                });
        });
        /* Закрытие модального окна, тут делаем то же самое но в обратном порядке */
        $('#modal_close, #overlay').click( function(){ // ловим клик по крестику или подложке
            $('#modal_form')
                .animate({opacity: 0, top: '45%'}, 200,  // плавно меняем прозрачность на 0 и одновременно двигаем окно вверх
                    function(){ // после анимации
                        $(this).css('display', 'none'); // делаем ему display: none;
                        $('#overlay').fadeOut(400); // скрываем подложку
                    }
                );
        });

    });
</script>