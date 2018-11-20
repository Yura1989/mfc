<script src="<?= base_url();?>assets/js/jquery.js" type="text/javascript"></script>
<script src="<?= base_url();?>assets/js/jquery.maskedinput-1.2.2.js" type="text/javascript"></script>
<script type="text/javascript">
    jQuery(function($) {
        $.mask.definitions['~']='[+-]';
        $('#number').mask('8 (999) 999-99-99');
    });
</script>
<div class="layout-content">
    <div class="layout-content-body">
        <div class="title-bar">
            <h1 class="title-bar-title">
                <span class="d-ib">Система МАУ "МФЦ"</span>
            </h1>
            <p class="title-bar-description">
                <small>Поиск телефона и проверка доставки</small>
            </p>
            <div class="row">
                <div class="col-xs-4">
                    <div class="panel panel-body text-left" data-toggle="match-height">
                        <form method="POST" action="<?= base_url(); ?>Home/transfer">
                            <div class="form-group">
                                <label class=" control-label" for="number">Телефон</label>
                                <input id="number" class="form-control" autocomplete="off" name="number" required type="text"placeholder="8 (___) ___-__-__">
                            </div>
                            <div class="form-group">
                                <button id="btn_export" class="btn btn-success" type="submit" name="send">Поиск телефона</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php if (isset ($number)) { ?>
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
                                            <th rowspan="1" colspan="1" style="width: 524px;">Статус</th>
                                        </thead>
                                        <tbody>
                                        <span class="label arrow-left arrow-warning">  <?php if (isset($n)) { echo "Найдено ". $n ." отправленных смс на данный номер мобильного телефона"; } ?> </span>
                                        <?php foreach ($number as $item): ?>
                                            <tr>
                                                <td><?php if (isset ($item['receiver'])) { echo ($item['receiver']);  } else { if ($item['result'] == 'error')  { echo ($_POST['number']); } }  ?></td>
                                                <td><?php if (isset ($item['text'])) { echo ($item['text']); } ?></td>
                                                <td><?php if (isset ($item['posted_at'])) { echo (substr(($item['posted_at']), 0, 10)); } else { echo(0); } ?></td>
                                                <td>
                                                        <?php if (isset ($item['state'])) { if ($item['state'] == 'delivered')
                                                        { ?> <span class="label label-success"> <?php echo "Досталено";} else { if ($item['state'] == 'rejected')
                                                        { ?> <span class="label label-primary"> <?php echo "Отклонено";} else { echo "Ошибка отправки"; } } }
                                                        else {if ($item['result'] == 'error')
                                                        { ?> <span class="label label-primary"> <?php echo ("Ошибка доступности сервиса Bytehand"); }} ?>
                                                    </span>
                                                </td>
                                            </tr>
                                        <?php
                                         endforeach; ?>
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
