<?php
$type = $_GET['type'];
if(empty($type) || !isset($type)) {
require_once('html/stat/stat_header.php');
require_once('html/stat/stat_body.php');
require_once('html/stat/stat_footer.php');
}

else if($type == 'calls') {
require_once('html/stat/calls/calls_header.php');
require_once('html/stat/calls/calls_body.php');
require_once('html/stat/calls/calls_footer.php');
}

else if($type == 'ce') {
require_once('html/stat/ce/ce_header.php');
require_once('html/stat/ce/ce_body.php');
require_once('html/stat/ce/ce_footer.php');
}

else if($type == 'clients') {
require_once('html/stat/clients/clients_header.php');
require_once('html/stat/clients/clients_body.php');
require_once('html/stat/clients/clients_footer.php');
}

else{}
?>