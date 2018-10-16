<!DOCTYPE HTML>
<html>
<title>Модальное окно</title>
<head>
    <meta charset="UTF-8">
    <style type="text/css">
        /* Окно */
        #modal_form {
            width: 300px;
            height: 300px; /* Размеры должны быть фиксированы */
            border-radius: 5px;
            border: 3px #000 solid;
            background: #fff;
            position: fixed; /* чтобы окно было в видимой зоне в любом месте */
            top: 45%; /* отступаем сверху 45%, остальные 5% подвинет скрипт */
            left: 50%; /* половина экрана слева */
            margin-top: -150px;
            margin-left: -150px; /* тут вся магия центровки css, отступаем влево и вверх минус половину ширины и высоты соответственно =) */
            display: none; /* в обычном состоянии окна не должно быть */
            opacity: 0; /* полностью прозрачно для анимирования */
            z-index: 5; /* окно должно быть наиболее большем слое */
            padding: 20px 10px;
        }
        /* Кнопка закрыть для тех кто в танке) */
        #modal_form #modal_close {
            width: 21px;
            height: 21px;
            position: absolute;
            top: 10px;
            right: 10px;
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
    <h3>модальное окно</h3>
    <p><a href="#" id="go">Ссылка с окном</a></p>

    <div style="top: 45%; opacity: 10;">
        <span >X</span>
        <form action="" method="post">
            <h4>Форма добавления услуг</h4>
            <p>Выберите услугу и нажмите добавить<br>
                <input type="text" name="your-name" value="" size="40">
            </p>
            <p style="text-align: center; padding-bottom: 10px;">
                <input type="button" value="Добавить услугу">
            </p>
        </form>
    </div>

    /*Скрытое модальное окно*/
    <div id="modal_form" style="display: none; top: 45%; opacity: 0;">
        <span id="modal_close">X</span>
        <form action="" method="post">
            <h3>Простое модальное окно</h3>
            <p>Тут может быть рандомная обычная форма например.</p>
            <p>Ваше имя<br>
                <input type="text" name="your-name" value="" size="40">
            </p>
            <p>Ваш телефон<br>
                <input type="text" name="your-name" value="" size="40">
            </p>
            <p style="text-align: center; padding-bottom: 10px;">
                <input type="submit" value="Отправить">
            </p>
        </form>
    </div>
    <div id="overlay" style="display: none;"></div>


</body>
</html>
<script src="<?=base_url();?>assets/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() { // вся магия после загрузки страницы
        $('a#go').click( function(event){ // ловим клик по ссылки с id="go"
            event.preventDefault(); // выключаем стандартную роль элемента
            $('#overlay').fadeIn(400, // сначала плавно показываем темную подложку
                function(){ // после выполнения предъидущей анимации
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