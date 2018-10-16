
<div class="layout-content">
    <div class="layout-content-body">
        <div class="col-md-6 title-bar">
            <p class="title-bar-title"></p>
            <h3 class="m-b-0">Справочник услуг</h3>
        </div>

        <script type="text/javascript">
            function delete_service ($id_service) {
                if (confirm("Вы уверены что хотите удалить услугу:" + " " + $id_service + " " + "?")) {
                    window.location = "deleteService?$id_service=" + $id_service;
                }
            }
            //вывод Алерта при удалении типа ведомства
            <?php if (isset($msg)) { ?>
            window.onload = function() {
                alert("<?php echo $msg ?>");
            }
            <?php } ?>
        </script>

        <div class="col-md-6 col-md-offset-3">
            <div class="alert alert-info">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <span class="icon icon-info-circle icon-lg"></span>
                <small>Для добавление услуги, нажмите добавить услугу</small>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-body">
                    <div class="table-responsive">
                        <form method="POST" action="<?=base_url()?>Home/editService">
                            <table class="table table-bordered table-hover table-center tert">
                                <thead>
                                <tr class="bg-primary">
                                    <th>№</th>
                                    <th>Наименование услуги</th>
                                    <th>Краткое наименование ведомста</th>
                                    <th>Операция</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($services as $item): ?>
                                <tr>
                                    <td></td>
                                    <td><?php if(isset($item['name_service'])) {echo $item['name_service'];} ?></td>
                                    <td><a href="#"><?php if(isset($item['shortDepartment'])) {echo $item['shortDepartment'];} ?></a></td>
                                    <td>
                                        <?php $edit = sprintf (
                                            "<a href='editService?id_service=%d'>Редактировать</a>",
                                            $item['id_service']);
                                        ?>
                                        <?php echo $edit; ?>
                                        </br>
                                        <?php $delete = sprintf(
                                            "<a href='javascript:delete_service(%d);'>Удалить</a>",
                                            $item['id_service']);
                                        ?>
                                        <?php echo $delete;?>
                                    </td>
                                </tr>
                                <?php endforeach ?>
                                </tbody>
                            </table>
                            <button class="btn btn-success" type="submit" name="BTaddService">Добавить услугу</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>
        $('.tert tbody tr').each(function(i) {
            var number = i + 1;
            $(this).find('td:first').text(number+".");
        });
    </script>
