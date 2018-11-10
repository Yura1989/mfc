    <div class="layout-content">
      <div class="layout-content-body">
        <div class="title-bar">
          <h1 class="title-bar-title">
            <span class="d-ib">Система МАУ "МФЦ"</span>
          </h1>
          <p class="title-bar-description">
            <small>История отправки SMS сообщений</small>
          </p>
            <div class="row">
                <div class="col-xs-4">
                    <div class="panel panel-body text-left" data-toggle="match-height">
                        <form method="POST" action="<?=base_url();?>Home/hystory">
                            <div class="form-group" id="rangeDate">
                                <div class="input-daterange input-group" id="datepicker">
                                    <span class="input-group-addon">от</span>
                                    <input type="text" autocomplete="off" class="form-control" name="start" />
                                    <span class="input-group-addon">до</span>
                                    <input type="text" autocomplete="off" class="form-control" name="end" />
                                </div>
                            </div>
                            <div class="form-group">
                                <button id="btn_export" class="btn btn-success" type="submit" name="send">Сформировать отчет</button>
                            </div>
                        </form>
                    </div>
                </div>

                <?php if (isset ($_POST['send']) && (($_POST['start']) != NULL) && (($_POST['end']) != NULL)) { ?>
                    <div class="col-xs-12">
                        <div class="panel">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="" class="table table-center">
                                            <thead>
                                            <tr>
                                                <th rowspan="1" colspan="1" style="width: 289px;">Номер телефона</th>
                                                <th rowspan="1" colspan="1" style="width: 524px;">Текст отправки</th>
                                                <th rowspan="1" colspan="1" style="width: 524px;">Дата отправки</th>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($data as $item): ?>
                                                <tr>
                                                    <td><?php echo($item['number']); ?></td>
                                                    <td><?php echo($item['message']); ?></td>
                                                    <td><?php echo($item['date']); ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

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
            language: "ru",
            autoclose: true
        });
    </script>