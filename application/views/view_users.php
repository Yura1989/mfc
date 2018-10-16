<div class="layout-content">
        <div class="layout-content-body">
            <div class="title-bar">
                <h1 class="title-bar-title">
                    <span class="d-ib">Пользователи</span>
                </h1>

                <script type="text/javascript">
                    function delete_user (user_id) {
                        if (confirm("Вы уверены что хотите удалить пользователя:" + " " + user_id + " " + "?")) {
                            window.location = "deleteUser?user_id=" + user_id;
                        }
                    }

                    //вывод Алерта при удалении пользователя
                    <?php if (isset($msg)) { ?>
                     window.onload = function() {
                     alert("<?php echo $msg ?>");
                     }
                     <?php } ?>

                </script>

            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-middle">
                                    <thead>
                                    <tr>
                                        <th>
                                            <label class="custom-control custom-control-primary custom-checkbox">
                                                <input class="custom-control-input" type="checkbox">
                                                <span class="custom-control-indicator"></span>
                                            </label>
                                        </th>
                                        <th>Nickname</th>
                                        <th>Права доступа</th>
                                        <th>Дата создания</th>
                                        <th>Имя</th>
                                        <th>Фамилия</th>
                                        <th>Email</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($users as $item): ?>
                                        <tr>
                                            <td>
                                                <label class="custom-control custom-control-primary custom-checkbox">
                                                    <input class="custom-control-input" type="checkbox">
                                                    <span class="custom-control-indicator"></span>
                                                </label>
                                            </td>
                                            <td class="nowrap">
                                                <strong><?php echo $item['nickname'];?></strong>
                                            </td>
                                            <td>root</td>
                                            <td><?php echo $item['date'];?></td>
                                            <td><?php echo $item['name'];?></td>
                                            <td><?php echo $item['sername'];?></td>
                                            <td><?php echo $item['email'];?></td>
                                            <td>
                                                <div class="btn-group pull-right dropdown">
                                                    <button class="btn btn-link link-muted" aria-haspopup="true" data-toggle="dropdown" type="button">
                                                        <span class="icon icon-ellipsis-h icon-lg icon-fw"></span>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-right">

                                                        <?php $edit = sprintf(
                                                            "<a href='editUser?user_id=%d'>Изменить</a>",
                                                            $item['id']);
                                                        ?>

                                                        <li><?php echo $edit; ?></li>

                                                        <?php $delete = sprintf(
                                                            "<a href='javascript:delete_user(%d);'>Удалить</a>", $item['id']);
                                                        ?>

                                                        <li><?php echo $delete; ?></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>