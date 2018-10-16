
<div class="layout-content">
    <div class="layout-content-body">
        <div class="col-md-6 title-bar">
            <p class="title-bar-title"></p>
            <h3 class="m-b-0">Справочник ведомств</h3>
        </div>
        <div class="col-sm-9 col-md-offset-1">
            <div class="alert alert-info">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <span class="icon icon-info-circle icon-lg"></span>
                <small>Для редактирования, исправте название ведомства и нажмите сохранить</small>
            </div>
        </div>

        <div class="row">
            <div class="col-md-9">
                <?php if (isset ($_POST['BTaddDepartment'])) {?>
                    <form class="form form-horizontal" method="POST" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="shortDepartment">Краткое наименование ведомства</label>
                            <div class="col-sm-9">
                                <input id="shortDepartment" name="shortDepartment" class="form-control" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="fullDepartment">Полное наименование ведомства</label>
                            <div class="col-sm-9">
                                <textarea id="fullDepartment" name="fullDepartment" class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="typeDepartment">Тип</label>
                            <div class="col-sm-9">
                                <select id="typeDepartment" name="typeDepartment" class="custom-select">
                                    <?php foreach ($typeDep as $item): ?>
                                        <?php echo("<option value=".$item['id'].">".$item['typeDep']."</option>"); ?>
                                    <?php endforeach ?>
                                </select>
                                </br>
                                <button class="btn btn-success" type="submit" name="BTaddDep" >Добавить</button>
                            </div>
                        </div>
                    </form>
                <?php } else { foreach ($department as $item): ?>
                    <form class="form form-horizontal" method="POST" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="shortDepartment">Краткое наименование ведомства</label>
                            <div class="col-sm-9">
                                <input id="shortDepartment" name="shortDepartment" class="form-control" value="<?php if (isset ($item['shortDepartment'])) { echo $item['shortDepartment']; }?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="fullDepartment">Полное наименование ведомства</label>
                            <div class="col-sm-9">
                                <textarea id="fullDepartment" name="fullDepartment" class="form-control" rows="3"><?php if (isset ($item['fullDepartment'])) { echo $item['fullDepartment']; }?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="typeDepartment">Тип</label>
                            <div class="col-sm-9">
<!--                                <select id="typeDepartment" name="typeDepartment" class="custom-select">-->
<!--                                        <option>-->
<!--                                            --><?php //if (isset ($item['typeDepartment'])) { echo $item['typeDepartment']; }?>
<!--                                        </option>-->
<!--                                </select>-->
                                <select id="typeDepartment" name="typeDepartment" class="custom-select">
                                    <?php foreach ($typeDepartment as $key): ?>
                                        <?php
                                            $sel=($key['id']==$item['id_typedep'])?"selected":"";
                                            echo("<option value=".$key['id']." ".$sel.">".$key['typeDep']."</option>");
                                        ?>
                                    <?php endforeach ?>
                                </select>
                                </br>
                                <button class="btn btn-success" type="submit" name="BTeditDepartment" >Сохранить</button>
                            </div>
                        </div>
                    </form>
                <?php endforeach; } ?>
            </div>
        </div>
    </div>
</div>
</div>