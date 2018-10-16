
<div class="layout-content">
    <div class="layout-content-body">
        <div class="col-xs-6 col-md-12">
            <div class="pricing-card">
                <div class="pricing-card-header bg-success">
                    <h4 class="m-y-sm">SMS сообщение на номер: ". <?php echo $number; ?>. " успешно отправлено</h4>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" onclick="location.href = '<?=base_url();?>/home/sendSms'" name="send" class="btn btn-primary btn-info" id="send" >Отправить новое SMS-сообщение</button>
            </div>
        </div>
    </div>
</div>
