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

</body>
</html>

<!--Скрытое модальное окно-->
<div id="modal_form" style="display: none; top: 45%; opacity: 0;">
    <span id="modal_close">X</span>
    <form action="" method="post">
            <div style="max-width: 900px;">
                <div style="width: 45%">
                    <h3>Basic usage</h3>
                    <select id="basic">
                        <option value="">Long item, lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit, consectetur, repellat animi nam veniam tempora hic</option>
                        <option value="strawberries">Strawberries</option>
                        <option value="mango">Mango</option>
                        <option value="bananas">Bananas</option>
                        <option value="watermelon">Watermelon</option>
                        <option value="apples">Apples</option>
                        <option value="grapes">Grapes</option>
                        <option value="oranges">Oranges</option>
                        <option value="pineapple">Pineapple</option>
                        <option value="peaches">Peaches</option>
                        <option value="cherries">Cherries</option>
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