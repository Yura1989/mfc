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
                <button type="submit" onclick="send();" name="send" class="btn btn-primary btn-info" id="send" >Отправить запрос</button>
            </div>
            <div class="results">Ждем ответа</div>
        </div>
    </div>
</div>
<script>
    function send ()
    {
       $.ajax({
           type: "GET",
           dataType: 'json',
           url: 'http://api.bytehand.com/v1/balance?id=34159&key=6FFE53A3E0B16022',
           success: function (data) {
               $('.results').html(data);
               alert(data);
           }
       });
    }
</script>

