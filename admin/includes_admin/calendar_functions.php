<?php 
	require_once('../initialize.php');

	if($_POST['submit_event'] ?? ''){
		$event = [];
		$event['event_compo_id'] = $_POST['event_compo_id'];
		$event['event_name'] = $_POST['event_name'] ?? '';
		$event['event_description'] = $_POST['event_description'] ?? '';
		$event['event_datestart'] = $_POST['event_datestart'] ?? '';
		$event['event_dateend'] = $_POST['event_dateend'] ?? '';
		$event['event_timestart'] = $_POST['event_timestart'] ?? '';
		$event['event_timeend'] = $_POST['event_timeend'] ?? '';
		$event['event_type'] =  $_POST['event_type'] ?? '';
		$event['event_status'] = 1;
		$event['created_by'] = $_SESSION['admin_compo_id'];
		$now = date('Y-m-d H:i:s');
		$event['date_created'] = $now;
		print_r($event);


		$result = insert_event($event);

		if($result ===true){
        $log = [];
        $log['log_compo_id'] = 'LOG'.date("ymdhis") . abs(rand('0','9'));
        $now = date('Y-m-d H:i:s');
        $log['log_date'] = $now;
        $log['log_userid'] = $_SESSION['admin_compo_id'];
        $log['log_user'] = $admin['username'];
        $log['log_usertype'] = $admin['admin_type'];
        $log['log_action'] = "Add new event ". $event['event_compo_id'];
        insert_log($log);
			$_SESSION['message'] = "Event has been added";
			redirect_to(url_for('admin/dashboard.php'));
		}else{
			$errors = $result;
			$_SESSION['error_message'] = $errors;
			
			print_r($_SESSION['error_message']);
			redirect_to(url_for('admin/dashboard.php'));
			//echo display_errors($errors);
		}

	}


	if ($_POST['delete_event']?? '') {
		print_r($_POST);
		$event = [];
		$event['event_id'] = $_POST['event_id'];
		$event['event_compo_id'] = $_POST['event_compo_id'];
        $log = [];
        $log['log_compo_id'] = 'LOG'.date("ymdhis") . abs(rand('0','9'));
        $now = date('Y-m-d H:i:s');
        $log['log_date'] = $now;
        $log['log_userid'] = $_SESSION['admin_compo_id'];
        $log['log_user'] = $admin['username'];
        $log['log_usertype'] = $admin['admin_type'];
        $log['log_action'] = "Event has been deleted ". $event['event_compo_id'];
        insert_log($log);
		$result = delete_event($event);

		if($result){
			$_SESSION['message'] = "Event has been deleted";
			redirect_to(url_for('admin/dashboard.php'));
		}else{
			echo "may problem";
		}
	}
?>