<div class="layout-content">
    <div class="layout-content-body">
        <div class="title-bar">
            <h1 class="title-bar-title">
                <span class="d-ib">Добавление пользователей</span>
            </h1>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="demo-form-wrapper">
                        <div class="alert alert-info">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <span class="icon icon-info-circle icon-lg"></span>
                            <small>Пользователь с nickname <?php echo $nickname; ?> успешно добавлен</small>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block" onClick='location.href="<?=base_url();?>home/addUser"'>Добавить еще пользователя</button>
                        </div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>