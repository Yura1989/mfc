<div class="layout-content">
    <div class="layout-content-body">
        <div class="title-bar">
            <div class="text-center m-b">
                <h3 class="m-b-0">Система отчетности МАУ "МФЦ"</h3>
                <small>Экспорт в Excel</small>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-4">
                <div class="panel panel-body text-left" data-toggle="match-height">
                    <h5>Выбор промежутка дат</h5>
                    <form method="POST" action="<?=base_url();?>Home/action">
                        <div class="form-group" id="rangeDate">
                            <div class="input-daterange input-group" id="datepicker">
                                <span class="input-group-addon">от</span>
                                <input type="text" class="input-sm form-control" name="start" />
                                <span class="input-group-addon">до</span>
                                <input type="text" class="input-sm form-control" name="end" />
                            </div>
                        </div>

                        <div class="form-group">
                                <div class="custom-controls-stacked m-t">
                                    <label class="custom-control custom-control-primary custom-radio">
                                        <input class="custom-control-input" type="radio" name="export" value="all">
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-label">Сводный отчет</span>
                                    </label>
                                    <label class="custom-control custom-control-primary custom-radio">
                                        <input class="custom-control-input" type="radio" name="export" value="priem">
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-label">Количество принятых документов</span>
                                    </label>
                                    <label class="custom-control custom-control-primary custom-radio">
                                        <input class="custom-control-input" type="radio" name="export" value="cons">
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-label">Количество консультаций</span>
                                    </label>
                                    <label class="custom-control custom-control-primary custom-radio">
                                        <input class="custom-control-input" type="radio" name="export" value="mfc">
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-label">Сводный отчет в разрезе МФЦ</span>
                                    </label>
                                </div>
                        </div>
                        <div class="form-group">
                            <button id="btn_export" class="btn btn-success" type="submit" name="BTexportRange">Сформировать отчет</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?=base_url();?>assets/js/jquery-3.2.1.min.js"></script>
<script src="<?=base_url();?>assets/datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="<?=base_url();?>assets/datepicker/locales/bootstrap-datepicker.ru.min.js" charset="UTF-8"></script>

<script type="text/javascript">
    $('#rangeDate .input-daterange').datepicker({
        format: "yyyy-mm-dd",
        startView: 1,
        minViewMode: 1,
        language: "ru",
        autoclose: true
    });
</script>