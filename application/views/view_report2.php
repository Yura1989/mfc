<div class="layout-content">
    <div class="layout-content-body">
        <div class="title-bar">

            <div class="text-center m-b">
                <h3 class="m-b-0">Система отчетности МАУ "МФЦ"</h3>
                <small>После ввода данных не забывайте нажать СОХРАНИТЬ</small>
            </div>

            <div class="row">
                <div class="col-xs-2">
                    <div class="panel panel-body">
                            <div class="table-responsive">
                                <div class="form-group">
                                    <label for="type">Год</label>
                                    <select id="type" class="custom-select">
                                        <option value="success">Success</option>
                                        <option value="info">Info</option>
                                        <option value="warning">Warning</option>
                                        <option value="error">Error</option>
                                    </select>
                                </div>
                            <div class="form-group">
                                <label for="positionClass">Месяц</label>
                                <select id="positionClass" class="custom-select">
                                    <option value="toast-top-right">Top Right</option>
                                    <option value="toast-bottom-right">Bottom Right</option>
                                    <option value="toast-bottom-left">Bottom Left</option>
                                    <option value="toast-top-left">Top Left</option>
                                    <option value="toast-top-full-width">Top Full Width</option>
                                    <option value="toast-bottom-full-width">Bottom Full Width</option>
                                    <option value="toast-top-center">Top Center</option>
                                    <option value="toast-bottom-center">Bottom Center</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <button id="demo-show-toast" class="btn btn-primary" type="button">Сформировать отчет</button>
                            <button id="demo-clear-toasts" class="btn btn-default" type="button">Очистить</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-body">
                        <div class="table-responsive">
                            <form methos="POST">
                            <table class="table table-bordered table-hover table-center">
                                <thead>
                                <tr class="bg-primary">
                                    <th>№</th>
                                    <th>Наименование ведомства</th>
                                    <th>Наименование услуги</th>
                                    <th>Общее количество заявлений (запросов) поступивших в МФЦ от заявителей</th>
                                    <th>Общее количество консультаций, предоставленных заявителям в МФЦ</th>
                                    <th>Общее количество заявлений (запросов) поступивших в Бизнес-окно (офис) от заявителей</th>
                                    <th>Общее количество консультаций, предоставленных заявителям в Бизнес-окно (офис)</th>
                                    <th>Итого</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td><a href="#">01. ГУ-РО ФСС РФ по ХМАО-Югре</a></td>
                                    <td>Приём расчета по начисленным и уплаченным страховым взносам на обязательное социальное страхование  от несчастных случаев на производстве и профессиональных заболеваний, а также по расходам на выплату страхового обеспечения (Форма 4-ФСС)
                                    </td>
                                    <td><input type="text" name="number_reception"></td>
                                    <td><input type="text" name="number_consultation"></td>
                                    <td><input type="text" name="number_bus_recep"></td>
                                    <td> <input type="text" name="number_bus_cons"></td>
                                    <td class="miw-320">
                                        <small class="progress-description">
                                            <span class="pull-right">Critical</span>
                                            Low
                                        </small>
                                        <div class="progress progress-xs m-b-0">
                                            <div class="progress-bar progress-bar-success" style="width: 60%">
                                                <span class="sr-only">60% Complete (success)</span>
                                            </div>
                                            <div class="progress-bar progress-bar-warning" style="width: 30%">
                                                <span class="sr-only">30% Complete (warning)</span>
                                            </div>
                                            <div class="progress-bar progress-bar-danger" style="width: 10%">
                                                <span class="sr-only">10% Complete (danger)</span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                                <button class="btn btn-success" type="button" name="save">Сохранить</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

