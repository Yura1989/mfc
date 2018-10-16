<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Событие onclick</title>
</head>
<body>
    <form>
         <table>
           <thead>
               <tr class="bg-primary">
                   <th>№</th>
                   <th>Ведомство</th>
                   <th>Услуга</th>
                   <th>Принято услуг всего</th>
                   <th>Консультации всего</th>
                   <td style="width: 0px"></td>
                   <th style="display:none;" class="number_bus_recep2">Принято услуг юр лица</th>
                   <th style="display:none;" class="number_bus_cons2">Консультации юр. лица</th>
                   <th>Итого</th>
                   <th style="display:none;" class="Form_show" >Операции</th>
              </tr>
           </thead>
           <tbody>
               <tr>
                   <td>1</td>
                   <td> <a href="#">МВД</a></td>
                   <td>Выдача паспорта</td>
                   <td><input oninput="result();" class="number_reception" type="text" disabled value="" ></td>
                   <td><input oninput="result();" class="number_consultation" type="text" disabled value="" ></td>
                   <td class="showBisiness2" style="width: 0px"><a href="">+</a></td>
                   <td style="display:none;" class="number_bus_recep22"><input oninput="result();" class="number_bus_recep" type="text" disabled value="" ></td>
                   <td style="display:none;" class="number_bus_cons22"><input oninput="result();" class="number_bus_cons" type="text" disabled value="" ></td>
                   <td><input class="Result_disabled" type="text" disabled value=""></td>
                   <td style="display:none;" class="Form_show"><a href="#">delete</a></td>
               </tr>
               <tr>
                   <td>2</td>
                   <td><a href="#">ФНС</a></td>
                   <td>Выдача ИНН</td>
                   <td><input oninput="result();" class="number_reception" type="text" disabled value=""></td>
                   <td><input oninput="result();" class="number_consultation" type="text" disabled value=""></td>
                   <td class="showBisiness2" style="width: 0px"><a href="#">+</a></td>
                   <td style="display:none;" class="number_bus_recep22"><input oninput="result();" class="number_bus_recep" type="text" disabled value=""></td>
                   <td style="display:none;" class="number_bus_cons22"><input oninput="result();" class="number_bus_cons" type="text" disabled value=""></td>
                   <td><input class="Result_disabled" type="text" disabled value=""></td>
                   <td style="display:none;" class="Form_show"><a href="#">delete</a></td>
               </tr>
           <p id="test"></p>
           </tbody>
        </table>
            <button onclick="editForm();" class="Btn_hide btn btn-info " type="button" name="BTeditReport">Изменить</button>
            <button class="Btn_hide btn btn-success" type="button" onclick="exportExcel()" name="BTexport">Export</button>
            <button onclick="showForm();" style="display: none;" class="Btn_show btn btn-success " type="submit" name="BTsaveEditReport">Сохранить</button>
            <button style="display: none;" class="Btn_show btn btn-success " type="submit" name="BTsaveEditReport">Добавить услугу</button>
    </form>

    <input oninput="testor();" class="tert2" type="text">
    <input oninput="testor();" class="tert22" type="text"> oninput: <span class="res"></span>
        </br>
    <input oninput="testor();" class="tert2" type="text">
    <input oninput="testor();" class="tert22" type="text"> oninput: <span class="res"></span>


    <div class="accordion">
        <h3 class="">Question One Sample Text</h3>
        <p style="display: none;">Lorem.</p>
        <h3 class="">This is Question Two</h3>
        <p style="display: none;">Lorem ipsum.</p>
        <h3 class="">Another Questio here</h3>
        <p style="display: none;">Lorem ipsum dolor.</p>
        <h3 class="">Sample heading</h3>
        <p style="display: none;">Lorem ipsum dolor sit.</p>
        <h3 class="">Sample Question Heading</h3>
        <p style="display: none;">Lorem ipsum dolor sit amet.</p>
    </div>

    <table>
        <thead>
        <tr class="butt">
            <th>№</th>
            <th class="but">Ведомство</th>
            <th class="silka"><a href="">+</a></th>
            <th style="display: none;">Услуга</th>
        </tr>
        <tr class="mvd">
            <td>1</td>
            <td style="display: none;">паспорт</td>
            <td style="display: none;">паспорт</td>
        </tr>
        <tr class="">
            <td class="but">1</td>
            <td>МВД</td>
            <td class="silka"><a href="">+</a></td>
            <td style="display: none;">паспорт</td>
        </tr>
        </thead>
    </table>

    <div class="topmenu">
        <table>
            <tr>
                <th>1</th>
                <th>1</th>
                <th>1</th>
            </tr>
            <tr>
                <td>3</td>
                <td>3</td>
                <td>3</td>
            </tr>
            <tr>
                <th>1</th>
                <th>1</th>
                <th>1</th>
            </tr>
            <tr>
                <td>30</td>
                <td>30</td>
                <td>30</td>
            </tr>
        </table>
    </div>


</body>
</html>

<script src="<?=base_url();?>assets/js/jquery-3.2.1.min.js"></script>
<script>

    $(document).ready (function (){

        $('.topmenu table').hover (
            function() {
                $(this).addClass("active2");
                $(this).find('td').stop(true, true);
                $(this).find('td').slideToggle('slow');
            },

            function(){
                $(this).removeClass("active2");
                $(this).find('td').slideUp('fast');
            }
        );

        $(".accordion h3").click(function(){
             $(this).next("p").slideToggle("slow")
             //.siblings("p:visible").slideUp("slow");
             //$(this).toggleClass("active");
             //$(this).siblings("h3").removeClass("active");
         });

        $(".silka").click(function() {
           $(this).next("th").slideToggle("slow")
            return false;
           //alert ("geel")
        });

        $(".showBisiness2").click(function () {
            $(".number_bus_recep2").show();
            $(".number_bus_cons2").show();

            $(this).next("td").slideToggle("slow")

            return false;
        });

    });

    /*Добавление операций по услугам*/
    function editForm () {
        $('.number_reception').prop("disabled", false);
        $('.number_consultation').prop("disabled", false);
        $(".number_bus_recep").prop("disabled", false);
        $(".number_bus_cons").prop("disabled", false);
        $('.Form_show').show();
        $('.Btn_show').show();
        $('.Btn_hide').hide();
    }

    /*автоматический подсчет суммы услуг*/
    function result() {
        var n = document.getElementsByClassName('number_reception').length;
        var i=0;
        while (i < n){
            var a = parseInt(document.getElementsByClassName('number_reception')[i].value);
            var b = parseInt(document.getElementsByClassName('number_consultation')[i].value);
            if (isNaN(a)==true) a=0;
            if (isNaN(b)==true) b=0;
            var c = a+b;
            document.getElementsByClassName('Result_disabled')[i].value = c;
            i++;
        }
    }

    /*Исчезновение операций по услугам*/
    function showForm () {
        $('.number_reception').prop("disabled", true);
        $('.number_consultation').prop("disabled", true);
        $('.Form_disabled').prop("disabled", true);
        $(".number_bus_recep").prop("disabled", true);
        $(".number_bus_cons").prop("disabled", true);
        $('.Form_show').hide();
        $('.Btn_show').hide();
        $('.Btn_hide').show();
    }

    function showBisiness() {
        $(".number_bus_recep2").show();
        $(".number_bus_cons2").show();
    }

    /*тестовая функция*/
    function testor () {
        var n = document.getElementsByClassName('tert2').length;
        var i=0;
        while (i < n) {
            var a = 0;
            var m = parseInt(document.getElementsByClassName('tert2')[i].value);
            if (isNaN(m)) {
                a = 0;
            } else{
                a = m;
            }

            var b = 0;
            var v = parseInt(document.getElementsByClassName('tert22')[i].value);
            if (isNaN(v)) {
                b = 0;
            } else {
                b = v;
            }

            var c = a+b;
            document.getElementsByClassName('res')[i].innerHTML = c;
            i++;
        }
    }

</script>
