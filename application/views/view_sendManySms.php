<script type="text/javascript" src="<?=base_url();?>/assets/SendSms/jquery.js" ></script>
<script type="text/javascript" src="<?=base_url();?>/assets/SendSms/jquery.maskedinput-1.2.2.js" ></script>

<script type="text/javascript">
    var totall++;
    jQuery(function($) {
        $.mask.definitions['~']='[+-]';
        totall++;
        $('#numbertelephon_'+totall).mask('8(999)999-99-99');
        alert ($('#numbertelephon_'+totall));
    });</script>


<div class="layout-content">
        <div class="layout-content-body">
            <div class="title-bar">
                <h1 class="title-bar-title">
                    <span class="d-ib">Отправка SMS-сообщения</span>
                </h1>
                <p class="title-bar-description">
                    <small>Для отправки SMS-сообщения заполните ниже форму</small>
                </p>
            </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="demo-form-wrapper">
                        <form id="demo-inputmask"  class="form-horizontal" method="POST" action="<?=base_url();?>home/sendManySms">
                            <div class="form-group" id="myDIV">
                            </div>
                            <div class="form-group">
                                <button type="submit" name="add" class="btn btn-primary btn-info" id="add" onclick="return add_new_image();">Добавить телефон</button>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="send" class="btn btn-primary btn-block" id="send" ">Отправить сообщение</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <script>
                var total = 0;
                function add_new_image(){
                    total++;
                    //добавляем label "телефон"
                    $('<label class="control-label">Телефон </label>')
                        .attr('for','number_'+total)
                        .attr('id','label_'+total)
                        .append(
                             $('<span id="progress_'+total+'" class="padding5px"><a  href="#" onclick="$(\'#input_'+total+'\').remove(); $(\'#label_'+total+'\').remove();" >Удалить</a></span>')
                        )
                     .appendTo('#myDIV');

                    //добавляем input
                    $('<input type="text" class="form-control" required placeholder="8(___) ___-__-__"/>')
                        .attr('id','input_'+total)
                        .attr('name','numbertelephon_'+total)
                    .appendTo('#myDIV');
                }
                $(document).ready(function() {
                    add_new_image();
                });
            </script>


            <!--<script>
                function myFunction () {
                    var elem = document.getElementById("myDIV"),
                        div = document.createElement('DIV'),
                        input = document.createElement('INPUT');
                        style = div.style;
                        div.className = "form-group";
                        div.innerHTML = "Hello";
                        div = elem.appendChild(div);


                    console.log(elem);
                }
            </script>-->
       <!-- <script>
            function myFunction() {
                var myDIV = document.getElementById('myDIV');
                myDIV.className = 'form-control';
                var input = document.createElement('INPUT')
                input.innerHTML = 'Новый элемент списка'
                myDIV.appendChild(input);
            }
        </script>-->
    </div>
</div>

