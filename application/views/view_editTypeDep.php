
<div class="layout-content">
    <div class="layout-content-body">
        <div class="col-md-6 title-bar">
            <p class="title-bar-title"></p>
            <h3 class="m-b-0">Справочник типов ведомств</h3>
        </div>
        <div class="col-sm-9 col-md-offset-1">
            <div class="alert alert-info">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <span class="icon icon-info-circle icon-lg"></span>
                <small>Для редактирования, исправте название типа ведомства и нажмите сохранить</small>
            </div>
        </div>

        <div class="row">
            <div class="col-md-9">
                <?php if (isset ($_POST['BTaddTypeDep'])){ ?>
                            <form class="form form-horizontal" method="POST" action="" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="TypeDepartment">Тип ведомства</label>
                                    <div class="col-sm-9">
                                        <input id="TypeDepartment" name="TypeDepartment" value="" class="form-control" type="text">
                                        </br>
                                        <button class="btn btn-success" type="submit" name="BTsaveTypeDep" >Сохранить</button>
                                    </div>
                                </div>
                            </form>
                    <?php } else { foreach ($typedep as $item): ?>
                        <form class="form form-horizontal" method="POST" action="" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="TypeDepartment">Изменение типа ведомства</label>
                                <div class="col-sm-9">
                                    <input id="TypeDepartment" name="TypeDepartment" value="<?php if (isset ($item['typeDep'])){ echo $item['typeDep'];}?>" class="form-control" type="text">
                                        </br>
                                    <button class="btn btn-success" type="submit" name="BTsaveTypeDep" >Сохранить</button>
                                </div>
                            </div>
                        </form>
                 <?php endforeach; } ?>
            </div>
        </div>
    </div>
</div>
</div>