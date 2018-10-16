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
                                <form method="POST" action="<?=base_url();?>Home/report">

                                    <div class="form-group" id="rangeDate">
                                        <div class="input-group date">
                                            <input type="text" name="dateReport" class="form-control">
                                                <span class="input-group-btn">
                                                    <button id="demo-datepicker-2-btn" class="btn btn-primary" type="button">
                                                        <span class="icon icon-calendar"></span>
                                                    </button>
                                                </span>
                                        </div>
                                    </div>
                            </div>
                        <div class="form-group">
                            <button class="btn btn-primary" name="BTloadReport" type="submit">Сформировать отчет</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>-->
<script src="<?=base_url();?>assets/js/jquery-3.2.1.min.js"></script>
<script src="<?=base_url();?>assets/datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="<?=base_url();?>assets/datepicker/locales/bootstrap-datepicker.ru.min.js" charset="UTF-8"></script>

<script>
    $(document).ready(function() {

        var n = '<?php if (isset($editreport)) { echo 1; } else echo 0; ?>';
        if (n == 1) {
           if (confirm ("Отчет за текущей месяц уже сформирован, хотитк его просмотреть или изменить?"))
           {
           }else {
               window.location = "report";
           }
        }
    });

    $('#rangeDate .input-group.date').datepicker({
        format: "yyyy-mm-dd",
        startView: 1,
        minViewMode: 1,
        language: "ru",
        autoclose: true
    });
</script>
