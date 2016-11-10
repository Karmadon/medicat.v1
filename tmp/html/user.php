<?php
require_once('classes/userClass.php');
$userObj = new USER();
$userInfo = $userObj->getUserById($_SESSION['result']['id']);
?>
<div class="user-panel">
        <div style="width:45px; height:45px;" class="pull-left image">
        </div>
        <div class="pull-left info">
          <p><small><?php echo $userInfo['result']['name']; ?> <?php echo $userInfo['result']['lastname']; ?></small></p>
          <p>
		  <?php 
		  if ($userInfo['result']['groupd_id'] == '1') {
		  echo '<small class="text-gray"><b>Администратор</b></small>'; }
		  elseif ($userInfo['result']['groupd_id'] == '101') {
		  echo '<small class="text-gray"><b>Менеджер</b></small>'; }
		  elseif ($userInfo['result']['groupd_id'] == '102') {
		  echo '<small class="text-gray"><b>Пользователь</b></small>'; }
		  else{}
		  ?> 
	      </p>
        </div>
      </div>
