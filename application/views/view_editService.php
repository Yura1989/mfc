
<div class="layout-content">
    <div class="layout-content-body">
        <div class="col-md-6 title-bar">
            <p class="title-bar-title"></p>
            <h3 class="m-b-0">Справочник услуг</h3>
        </div>
        <div class="col-sm-9 col-md-offset-1">
            <div class="alert alert-info">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <span class="icon icon-info-circle icon-lg"></span>
                <small>Для редактирования, исправте название услуги и нажмите сохранить</small>
            </div>
        </div>

        <div class="row">
            <div class="col-md-9">
                <?php if (isset ($_REQUEST['BTaddService'])){ ?>
                    <form class="form form-horizontal" method="POST" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="Service">Полное наименование услуги</label>
                            <div class="col-sm-9">
                                <textarea id="fullService" name="Service" class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="shortDepartment">Ведомство</label>
                            <div class="col-sm-9">
                                <select id="shortDepartment" name="shortDepartment" class="custom-select">
                                    <?php foreach ($department as $item): ?>
                                        <?php echo("<option value=".$item['id_department'].">".$item['shortDepartment']."</option>"); ?>
                                    <?php endforeach ?>
                                </select>
                                </br>
                                <button class="btn btn-success" type="submit" name="BTaddSer">Добавить</button>
                            </div>
                        </div>
                    </form>
                <?php } else { foreach ($service as $item): ?>
                    <form class="form form-horizontal" method="POST" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="nameService">Полное наименование услуги</label>
                            <div class="col-sm-9">
                                <textarea id="nameService" name="nameService" class="form-control" rows="3"><?php if (isset($item['name_service'])) { echo $item['name_service']; } ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="shortDepartment">Ведомство</label>
                            <div class="col-sm-9">
                                <select id="shortDepartment" name="shortDepartment" class="custom-select">
                                    <?php foreach ($department as $key): ?>
                                        <?php
                                        $sel=($key['id_department']==$item['id_dep'])?"selected":"";
                                        echo("<option value=".$key['id_department']." ".$sel.">".$key['shortDepartment']."</option>");
                                        ?>
                                    <?php endforeach ?>
                                </select>
                                </br>
                                <button class="btn btn-success" type="submit" name="saveService">Сохранить</button>
                            </div>
                        </div>
                    </form>
                <?php endforeach; } ?>
            </div>
        </div>
    </div>
</div>
