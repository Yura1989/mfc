<script src="../../application/views/jquery.js" type="text/javascript"></script>
<script src="<?= base_url();?>assets/js/jquery.maskedinput.js" type="text/javascript"></script>
<script type="text/javascript">
    jQuery(function($){
        $("#input_"+total).mask("+7(999)999-99-99");
        
    });
</script>


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
                        <form id="demo-inputmask"  class="form-horizontal" method="POST" action="<?=base_url();?>home/test">
                            <div class="form-group" id="myDIV">
                                <label class=" control-label" for="form-control-8">Телефон</label>
                                <input id="form-control-8"  class="form-control" name="number" required  type="text" data-inputmask="'alias': 'mac'">

                                <input type="text" id="phone" name="phone">

                                <span class="help-block">Введите номер мобильного телефона</span>
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
                    $('<input type="text" class="form-control" required/>')
                        .attr('id','input_'+total)
                        .attr('data-inputmask',"'alias': 'mac'")
                        .attr('name','number_'+total)
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

