<?php 
require_once('initialize.php');
$log = [];
$log['log_compo_id'] = 'LOG'.date("ymdhis") . abs(rand('0','9'));
$now = date('Y-m-d H:i:s');
$log['log_date'] = $now;
$log['log_userid'] = $_SESSION['admin_compo_id'];
$log['log_user'] = $_SESSION['username'];
$log['log_usertype'] = $_SESSION['admin_type'];
$log['log_action'] = "Logout Successful";
insert_log($log);
log_out_admin();
redirect_to(url_for('/admin/login.php'));
?>