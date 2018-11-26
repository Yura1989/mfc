<script>
    var n = '<?php if (($flag) == 0) { echo 0; } else echo 1; ?>';
    if (n == 1) {
        if (confirm ("Отчет за текущей месяц уже сформирован, хотите его просмотреть или изменить?"))
        {
        }else {
            window.location = "rangeReport";
        }
    }

    /*Динамическое удаление услуг*/
    function delete_service(r){
        if (confirm ("Вы точно хотите удалить данную услугу?")) {
            var i=r.parentNode.parentNode.rowIndex;
            document.getElementById('myTable').deleteRow(i)
            /*автоматический подсчет строк*/
            $('.tert tbody tr').each(function(i) {
                var number = i + 1;
                $(this).find('td:first').text(number+".");
            });
        }
    }
</script>


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


<div class="layout-content">
    <div class="layout-content-body">
        <div class="title-bar">
            <div class="text-center m-b">
                <h3 class="m-b-0">Система отчетности МАУ "МФЦ"</h3>
                <small>После ввода данных не забывайте нажать СОХРАНИТЬ</small>
            </div>
            <div class="row">
                <div class="col-xs-2">
                    <div class="panel panel-body">
                            <div class="table-responsive">
                                <form method="POST">
                                    <div class="form-group" id="rangeDate">
                                        <div class="input-group ">
                                            <input type="text" name="dateReport" autocomplete="off" readonly="readonly" class="form-control" value="<?php if(isset ($_POST['dateReport'])) { echo $_POST['dateReport']; } ?> ">
                                                <span class="input-group-btn">
                                                    <button id="demo-datepicker-2-btn" class="btn btn-primary" type="button">
                                                        <span class="icon icon-calendar"></span>
                                                    </button>
                                                </span>
                                        </div>
                                    </div>
                            </div>
                        <div class="form-group">
                                <button class="btn btn-primary" name="BTloadNewReport" type="submit">Сформировать новый отчет</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-center tert" id="myTable">
                                <thead>
                                <tr class="bg-primary">
                                    <th>№</th>
                                    <th>Наименование ведомства</th>
                                    <th>Наименование услуги</th>
                                    <th>Общее количество заявлений (запросов) поступивших в МФЦ от заявителей</th>
                                    <th>Общее количество консультаций, предоставленных заявителям в МФЦ</th>
                                    <th style="background-color: #029acf">Общее количество заявлений (запросов) поступивших в Бизнес-окно (офис) от заявителей</th>
                                    <th style="background-color: #029acf">Общее количество консультаций, предоставленных заявителям в Бизнес-окно (офис)</th>
                                    <th>Итого принятых заявлений и консультаций</th>
                                    <th style="background-color: #469408">Общее количество выданных документов</th>
                                    <th style="display:none;" class="Form_show" >Операции</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if ($flag != 0) foreach ($rangeReport as $item):  ?>
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <a href="#"></a> <?php if(isset ($item['shortDepartment'])) { echo $item['shortDepartment']; } ?>
                                        <input type="hidden" value="<?php if (isset($item['number_reception'])) { echo $item['id_report']; } ?>" name="id_report[]" required ?>
                                    </td>
                                    <td> <?php if(isset ($item['name_service'])) { echo $item['name_service']; } ?> </td>
                                    <td>
                                       <input oninput="result();" class="number_reception" type="text" value="<?php if (isset($item['number_reception'])) { echo $item['number_reception']; } else { echo "0";} ?>" name="number_reception[]" required <?php if (($flag) == 0) { echo ""; } else { echo "disabled"; } ?>
                                    </td>
                                    <td>
                                       <input oninput="result();" class="number_consultation" type="text" value="<?php if (isset($item['number_consultation'])) { echo $item['number_consultation']; } else { echo "0";} ?>" name="number_consultation[]" required <?php if (($flag) == 0) { echo ""; } else { echo "disabled"; } ?>
                                    </td>
                                    <td>
                                       <input class="number_bus_recep" type="text" value="<?php if (isset($item['number_bus_recep'])) { echo $item['number_bus_recep']; } else { echo "0";} ?>" name="number_bus_recep[]" required <?php if (($flag) == 0) { echo ""; } else { echo "disabled"; } ?>
                                    </td>
                                    <td>
                                       <input class="number_bus_cons" type="text" value="<?php if (isset($item['number_bus_cons'])) { echo $item['number_bus_cons']; } else { echo "0";} ?>" name="number_bus_cons[]" required <?php if (($flag) == 0) { echo ""; } else { echo "disabled"; } ?>
                                    </td>
                                    <td>
                                       <input type="text" class="result_priem" value="<?php if (isset($item['result'])) { echo $item['result']; } else { echo "0";} ?>" name="result[]" disabled required>
                                    </td>
                                    <td>
                                       <input class="number_ready" type="text" value="<?php if (isset($item['number_ready'])) { echo $item['number_ready']; } else { echo "0";} ?>" name="number_ready[]" required <?php if (($flag) == 0) { echo ""; } else { echo "disabled"; } ?>
                                    </td>
                                    <td style="display:none;" class="Form_show">
                                        <button class="btn btn-outline-primary delete_ser" onclick="delete_service(this);" type="button">Удалить</button>
                                    </td>
                                </tr>

                                <?php endforeach; if ($flag == 0)  foreach ($report as $item):  ?>
                                    <tr>
                                        <td>1</td>
                                        <td><a href="#"></a> <?php if(isset ($item['shortDepartment'])) { echo $item['shortDepartment']; } ?> </td>
                                        <td> <?php if(isset ($item['name_service'])) { echo $item['name_service']; } ?> </td>
                                        <td>
                                            <input oninput="result();" class="number_reception" type="text" value="<?php if (isset($item['number_reception'])) { echo $item['number_reception']; } else { echo "0";} ?>" name="number_reception[]" required <?php if (($flag) == 0) { echo ""; } else { echo "disabled"; } ?>
                                        </td>
                                        <td>
                                            <input oninput="result();" class="number_consultation" type="text" value="<?php if (isset($item['number_consultation'])) { echo $item['number_consultation']; } else { echo "0";} ?>" name="number_consultation[]" required <?php if (($flag) == 0) { echo ""; } else { echo "disabled"; } ?>
                                        </td>
                                        <td>
                                            <input class="number_bus_recep" type="text" value="<?php if (isset($item['number_bus_recep'])) { echo $item['number_bus_recep']; } else { echo "0";} ?>" name="number_bus_recep[]" required <?php if (($flag) == 0) { echo ""; } else { echo "disabled"; } ?>
                                        </td>
                                        <td>
                                            <input class="number_bus_cons" type="text" value="<?php if (isset($item['number_bus_cons'])) { echo $item['number_bus_cons']; } else { echo "0";} ?>" name="number_bus_cons[]" required <?php if (($flag) == 0) { echo ""; } else { echo "disabled"; } ?>
                                        </td>
                                        <td>
                                            <input type="text" class="result_priem" value="<?php if (isset($item['result'])) { echo $item['result']; } else { echo "0";} ?>" name="result[]" disabled required>
                                        </td>
                                        <td>
                                            <input class="number_ready" type="text" value="<?php if (isset($item['number_ready'])) { echo $item['number_ready']; } else { echo "0";} ?>" name="number_ready[]" required <?php if (($flag) == 0) { echo ""; } else { echo "disabled"; } ?>
                                        </td>
                                    </tr>
                                <?php endforeach;  ?>
                                </tbody>
                            </table>
                            <?php if (($flag) == 0){ ?>
                                <button class="btn btn-success" type="submit" name="BTsaveReport">Сохранить</button>
                            <?php } else { ?>
                                <button onclick="editForm();" class="Btn_hide btn btn-info " type="button" name="BTeditReport">Изменить</button>
                                <button class="Btn_hide btn btn-success" type="button" onclick="exportExcel()" name="BTexport">Export</button>
                            <?php } ?>
                                <button style="display: none;" class="Btn_show btn btn-success " type="submit" name="BTsaveEditReport">Сохранить</button>
                            <button style="display: none;" class="Btn_show btn btn-info" type="button" id="BTaddEditReport" name="BTaddEditReport">Добавить услугу</button>
                            </form>
                             </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Скрытое модальное окно-->
<div id="modal_form" style="display: none; top: 45%; opacity: 0;">
    <span id="modal_close">X</span>
    <form action="" method="post">
        <div class="pricing-card-mfc">
            <div class="pricing-card-header bg-info">
                <span id="modal_close">X</span>
                <h1 class="pricing-card-price">
                    <span class="pricing-card-currency">Форма добавления услуг</span>
                </h1>
            </div>
            <div class="pricing-card-body">
                <ul class="pricing-card-details">
                    <li>Выберите услугу и нажмите добавить</li>
                    <select size="1" id="basic">
                        <?php if ($flag != 0) foreach ($report as $item):  ?>
                        <option class="services" name="service" data-dep="<?php if (isset ($item['shortDepartment'])) {  echo ($item['shortDepartment']); }?>" data-fulldep="<?php if (isset ($item['fullDepartment'])) {  echo ($item['fullDepartment']); }?>" data-id_service="<?php if (isset ($item['id_service'])) {  echo ($item['id_service']); }?>" value="<?php if (isset ($item['name_service'])) {  echo ($item['name_service']); }?>"> <?php if (isset ($item['name_service'])) {  echo ($item['name_service']); }?> </option>
                        <?php endforeach;  ?>
                    </select>
                </ul>
                <a class="btn btn-info btn-pill" name="addservices" id="addservices" Onclick="addservices('myTable'); return false;" href="#">Добавить услугу</a>
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
    $(document).ready(function() {
        /*Вывод даты для формирования отчета*/
        $('#rangeDate .input-group.date').datepicker({
            format: "yyyy-mm-dd",
            startView: 1,
            minViewMode: 1,
            language: "ru",
            autoclose: true
        });

        /*Автоматическое нумерация строк*/
        $('.tert tbody tr').each(function(i) {
            var number = i + 1;
            $(this).find('td:first').text(number+".");
        });

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

    /*Динамическое добавление услуг*/
    function addservices (id){
        if (confirm ("Вы точно хотите добавить данную услугу?"))
        {
            var services = document.getElementById("basic").value;
            var n = document.getElementById("basic");
            var shortDepartment = n.options[n.selectedIndex].dataset.dep;
            var fullDepartment = n.options[n.selectedIndex].dataset.fulldep;
            var id_service = n.options[n.selectedIndex].dataset.id_service;

            var tbody = document.getElementById(id).getElementsByTagName("TBODY")[0];
            var row = document.createElement("TR");
            var td1 = document.createElement("TD");
            td1.appendChild(document.createTextNode(0));

            /*Наименование ведомства*/
            var td2 = document.createElement("TD");
            td2.innerHTML='<a href="#"></a> '+ shortDepartment + ' <input type="hidden" value="0" name="id_report[]" required ?>';

            /*Наименование услуги*/
            var td3 = document.createElement("TD");
            td3.appendChild(document.createTextNode(services));

            var td4 = document.createElement("TD");
            td4.innerHTML='<input oninput="result();" class="number_reception" type="text" value="0" name="number_reception[]" required>'

            var td5 = document.createElement("TD");
            td5.innerHTML='<input oninput="result();" class="number_consultation" type="text" value="0" name="number_consultation[]" required >'

            var td6 = document.createElement("TD");
            td6.innerHTML='<input class="number_bus_recep" type="text" value="0" name="number_bus_recep[]" required>'

            var td7 = document.createElement("TD");
            td7.innerHTML='<input class="number_bus_cons" type="text" value="0" name="number_bus_cons[]" required>'

            var td8 = document.createElement("TD");
            td8.innerHTML='<input class="result_priem" type="text" value="0" name="result_priem[]" disabled required >'

            var td9 = document.createElement("TD");
            td9.innerHTML='<input class="number_ready" type="text" value="0" name="number_ready[]" required >'

            var td10 = document.createElement("TD");
            td10.innerHTML='<button class="btn btn-outline-primary delete_ser" onclick="delete_service(this);" type="button">Удалить</button>';

            row.appendChild(td1);
            row.appendChild(td2);
            row.appendChild(td3);
            row.appendChild(td4);
            row.appendChild(td5);
            row.appendChild(td6);
            row.appendChild(td7);
            row.appendChild(td8);
            row.appendChild(td9);
            row.appendChild(td10);
            tbody.appendChild(row);

            $('.tert tbody tr').each(function(i) {
                var number = i + 1;
                $(this).find('td:first').text(number+".");
            });

            $(function() { // ловим клик по крестику или подложке
                $('#modal_form')
                    .animate({opacity: 0, top: '45%'}, 200,  // плавно меняем прозрачность на 0 и одновременно двигаем окно вверх
                        function(){ // после анимации
                            $(this).css('display', 'none'); // делаем ему display: none;
                            $('#overlay').fadeOut(400); // скрываем подложку
                        }
                    );
            });

        }else {
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
    }

    /*функция выгрузки в excel*/
    function exportExcel (){
        location.href = '<?=base_url();?>/Home/action'
    }

    /*Функция изменения атрибутов таблицы*/
    function editForm () {
        $(".number_reception").prop("disabled", false);
        $(".number_consultation").prop("disabled", false);
        $(".number_bus_recep").prop("disabled", false);
        $(".number_bus_cons").prop("disabled", false);
        $(".number_ready").prop("disabled", false);
        $('.Form_show').show();
        $('.Btn_show').show();
        $('.Btn_hide').hide();
    }

    /*Автоматический подсчет суммы услуг*/
    function result() {
        var n = document.getElementsByClassName('number_reception').length;
        var i=0;
        while (i < n){
            var a = parseInt(document.getElementsByClassName('number_reception')[i].value);
            var b = parseInt(document.getElementsByClassName('number_consultation')[i].value);

            if (isNaN(a)==true) a=0;
            if (isNaN(b)==true) b=0;
            var c = a+b;
            document.getElementsByClassName('result_priem')[i].value = c;
            i++;
        }
    }
</script>

<script>
    $(function() {
        $('#basic').selectric();
    });
</script>