<div class="layout-content">
    <div class="layout-content-body">
        <div class="title-bar">
            <h1 class="title-bar-title">
                <span class="d-ib">Запрос Баланса</span>
            </h1>
            <p class="title-bar-description">
                <small>Для просотра баланса нажмите кнопку</small>
            </p>
        </div>
        <div class="col-xs-6 col-md-12">
            <div class="form-group">
                <form method="POST" action="<?=base_url();?>home/balance">
                    <input type="submit" name="send" class="btn btn-primary btn-info" value="Отправить запрос" >
                </form>
            </div>
            <?php if (isset ($description)) { ?>
                <div class="pricing-card">
                    <div class="pricing-card-header bg-success">
                        <h4 class="m-y-sm">Баланс Вашего счета составляет <?php echo $description; ?> рублей</h4>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>


