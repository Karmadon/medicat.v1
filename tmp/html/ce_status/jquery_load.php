<?php
session_start();
$get_id = (int)$_GET['id_client'];
require_once('../conn.php');

$ce_id = (int)$_GET['id_ce'];

$sql = "SELECT * FROM ce WHERE id=$ce_id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();


echo'
            <div class="col-md-12">
               <!-- Date and time range -->
              <div class="form-group">
                <label>Дата и время записи:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-clock-o"></i>
                  </div>
                  <input type="text" name="datetime" value="'.$row["date"].' '.$row["time"].'"class="form-control pull-right" id="reservationtime">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
            </div>
            <!-- /.col -->
          </div>';
?>