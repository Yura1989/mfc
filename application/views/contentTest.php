<div id="content">
    <p class="content">Введите свой SQL-запрос в это поле:</p>
    <form action="<?=base_url();?>index.php/welcome/mssql" method="POST">
        <fieldset>
                 <textarea id="query_text" name="query"
                           cols="35" rows="8"></textarea>
        </fieldset>
        <br />
        <fieldset>
            <input type="submit" value="Запуск запроса" />
            <input type="reset" value="Очистка и перезапуск" />
        </fieldset>
    </form>
</div>
</div>

