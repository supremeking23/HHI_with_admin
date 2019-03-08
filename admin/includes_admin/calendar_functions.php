<?php 
	require_once('../initialize.php');

	if($_POST['submit_event']){
		$event = [];
		$event['event_compo_id'] = $_POST['event_compo_id'];
		$event['event_name'] = $_POST['event_name'] ?? '';
		$event['event_description'] = $_POST['event_description'] ?? '';
		$event['event_datestart'] = $_POST['event_datestart'] ?? '';
		$event['event_dateend'] = $_POST['event_dateend'] ?? '';
		$event['event_timestart'] = $_POST['event_timestart'] ?? '';
		$event['event_timeend'] = $_POST['event_timeend'] ?? '';
		print_r($event);


		$result = insert_event($event);

		if($result ===true){
			$_SESSION['message'] = "Event has been added";
			redirect_to(url_for('admin/dashboard.php'));
		}else{
			$errors = $result;
			$_SESSION['error_message'] = $errors;
			
			print_r($_SESSION['error_message']);
			redirect_to(url_for('admin/dashboard.php'));
		}

	}
?>