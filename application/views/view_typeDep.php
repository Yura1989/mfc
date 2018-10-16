    <div class="layout-content">
      <div class="layout-content-body">
        <div class="col-md-6 title-bar">
          <p class="title-bar-title"></p>
            <h3 class="m-b-0">Справочник типов ведомств</h3>
        </div>

          <script type="text/javascript">
              function delete_typedep (typedep_id) {
                  if (confirm("Вы уверены что хотите удалить тип ведомства:" + " " + typedep_id + " " + "?")) {
                      window.location = "deleteTypeDep?typedep_id=" + typedep_id;
                  }
              }
              //вывод Алерта при удалении типа ведомства
              <?php if (isset($msg)) { ?>
              window.onload = function() {
                  alert("<?php echo $msg ?>");
              }
              <?php } ?>
          </script>

         <div class="col-md-6 col-md-offset-3">
          <div class="alert alert-info">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
              <span class="icon icon-info-circle icon-lg"></span>
              <small>Для добавление типа ведомства, заполните ниже поле, и нажмите сохранить</small>
          </div>
         </div>
         <div class="row">
              <div class="col-md-12">
                  <div class="panel panel-body">
                      <div class="table-responsive">
                          <form method="POST" action="<?=base_url();?>Home/editTypeDep">
                              <table class="table table-bordered table-hover table-center tert">
                                  <thead>
                                  <tr class="bg-primary">
                                       <th>№</th>
                                       <th>Тип ведомства</th>
                                       <th>Операция</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                  <?php foreach ($typeDep as $item): ?>
                                  <tr>
                                      <td></td>
                                      <td><?php if (isset ($item['typeDep'])){ echo $item['typeDep'];}?></td>
                                      <td>
                                          <?php $edit = sprintf (
                                                  "<a href='editTypeDep?typedep_id=%d'>Редактировать</a>",
                                                  $item['id']);
                                          ?>
                                          <?php echo $edit; ?>
                                          </br>
                                          <?php $delete = sprintf(
                                                "<a href='javascript:delete_typedep(%d);'>Удалить</a>",
                                                $item['id']);

                                          ?>
                                          <?php echo $delete;?>
                                      </td>
                                  </tr>
                                  <?php endforeach ?>
                                  </tbody>
                              </table>
                              <button class="btn btn-success" type="submit" name="BTaddTypeDep">Добавить тип ведомства</button>
                          </form>
                      </div>
                  </div>
              </div>
         </div>
      </div>
    </div>
</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>
        $('.tert tbody tr').each(function(i) {
            var number = i + 1;
            $(this).find('td:first').text(number+".");
        });
    </script>