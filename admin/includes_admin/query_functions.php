<?php 

	function insert_log($log){
	  	global $db;
		$sql = "INSERT INTO tbl_logs(log_compo_id,log_date,log_user,log_usertype,log_action,log_userid) ";
		$sql .= "VALUES (";
		$sql .= "'".db_escape($db, $log['log_compo_id'])."', ";
		$sql .= "'".db_escape($db, $log['log_date'])."',";
		$sql .= "'".db_escape($db, $log['log_user'])."',";
		$sql .= "'".db_escape($db, $log['log_usertype'])."',";
		$sql .= "'".db_escape($db, $log['log_action'])."',";
		$sql .= "'".db_escape($db, $log['log_userid'])."'";
		$sql .= ")";
		$result = mysqli_query($db,$sql);

		// For INSERT statements, $result is true/false
		if($result) {
		  return true;
		} else {
		  // INSERT failed
		  echo mysqli_error($db);
		  db_disconnect($db);
		  exit;
		}
	}


	function view_logs_by_user_id($user_id){
		global $db;
		$sql = "SELECT * FROM tbl_logs ";
		$sql .= "WHERE log_userid = '".$user_id."' ";
		$sql .= "ORDER BY log_id DESC";
		$result = mysqli_query($db,$sql);
		//error checking
		confirm_result_set($result);
	
		return $result;		
	}

	//crud operation
	function get_all_admins(){
		global $db;
		$sql = "SELECT * FROM tbl_admin ";
		$sql .= "ORDER BY admin_id ASC";
		$result = mysqli_query($db,$sql);
		confirm_result_set($result);
		return $result;
	}


	function get_all_admin_except_current_admin($admin_id){
		global $db;
		$sql = "SELECT * FROM tbl_admin WHERE admin_id != '".db_escape($db,$admin_id)."' ";
		$sql .= "ORDER BY admin_id ASC";
		$result = mysqli_query($db,$sql);
		confirm_result_set($result);
		return $result;
	}

	function get_admin_by_id($id){
		global $db;
		$sql = "SELECT * FROM tbl_admin ";
		$sql .= "WHERE admin_id = '".$id."' ";
		$sql .= "LIMIT 1";
		$result = mysqli_query($db,$sql);
		//error checking
		confirm_result_set($result);
		
		$admin_single = mysqli_fetch_assoc($result);
		mysqli_free_result($result);
		//return an assoc array not a result set
		return $admin_single;	
	}


	function get_admin_by_admin_compo_id($admin_compo_id){
		global $db;
		$sql = "SELECT * FROM tbl_admin ";
		$sql .= "WHERE admin_compo_id = '".db_escape($db,$admin_compo_id)."' ";
		$sql .= "LIMIT 1";
		$result = mysqli_query($db,$sql);
		//error checking
		confirm_result_set($result);
		
		$admin_single = mysqli_fetch_assoc($result);
		mysqli_free_result($result);
		//return an assoc array not a result set
		return $admin_single;	
	}


	function validate_admin($admin, $options=[]){
		$errors = [];

		$password_required = $options['password_required'] ?? true;

		if(is_blank($admin['firstname'])){
			$errors[] = "Firstname cannot be blank";
		}

		/*    if(is_blank($admin['first_name'])) {
      $errors[] = "First name cannot be blank.";
    } elseif (!has_length($admin['first_name'], array('min' => 2, 'max' => 255))) {
      $errors[] = "First name must be between 2 and 255 characters.";
    }*/
		if(is_blank($admin['middlename'])){
			$errors[] = "Middlename cannot be blank";
		}

		if(is_blank($admin['lastname'])){
			$errors[] = "Lastname cannot be blank";
		}

		if(is_blank($admin['contact'])){
			$errors[] = "Contact number cannot be blank";
		}

		if(is_blank($admin['email'])){
			$errors[] = "Email cannot be blank";
		}

		if(is_blank($admin['username'])){
			$errors[] = "Username cannot be blank";
		}elseif (!has_unique_username($admin['username'], $admin['admin_compo_id'] ?? 0)) {
      $errors[] = "Username not allowed. Try another.";
    }

	    if($password_required) {
	      if(is_blank($admin['password'])) {
	        $errors[] = "Password cannot be blank.";
	      } 

	      if(is_blank($admin['confirm_password'])) {
	        $errors[] = "Confirm password cannot be blank.";
	      } elseif ($admin['password'] !== $admin['confirm_password']) {
	        $errors[] = "Password and confirm password must match.";
	      }
	    }




		/*if($admin['password'] !== $admin['confirm_password']){
			$errors[] = "Password and confirm password must match.";
		}*/

		return $errors;
	}

	function add_admin($admin){
		global $db;
		
		$errors = validate_admin($admin);
		if(!empty($errors)){
			return $errors;
		}


		$hashed_password = password_hash($admin['password'], PASSWORD_BCRYPT);

		$sql = "INSERT INTO tbl_admin ";
		$sql .= "(admin_compo_id,firstname,middlename,lastname,username,hash_password,password,contact,email,admin_status,admin_type,date_added) ";
		$sql .= "VALUES ('".db_escape($db,$admin['admin_compo_id'])."','".db_escape($db,$admin['firstname'])."','".db_escape($db,$admin['middlename'])."','".db_escape($db,$admin['lastname'])."','".db_escape($db,$admin['username'])."','".db_escape($db,$hashed_password)."','".db_escape($db,$admin['password'])."','".db_escape($db,$admin['contact'])."','".db_escape($db,$admin['email'])."','".db_escape($db,$admin['admin_status'])."','".db_escape($db,$admin['admin_type'])."','".db_escape($db,$admin['date_added'])."')";	
		
		$result = mysqli_query($db,$sql);
		// for insert statement, $result is true/false
		if($result){
			//redirect
			return true;
		}else{
			//insert failed
			echo mysqli_error($db);
			db_disconnect($db);
			exit; 
		}
	}

	function update_admin($admin){
		global $db;

		$password_sent = !is_blank($admin['password']);

		$errors = validate_admin($admin,['password_required' => $password_sent]);
		if(!empty($errors)){
			return $errors;
		}

        $hashed_password = password_hash($admin['password'], PASSWORD_BCRYPT);

		$sql = "UPDATE tbl_admin SET ";
		$sql .= "firstname ='".db_escape($db,$admin['firstname'])."', ";
		$sql .= "middlename ='".db_escape($db,$admin['middlename'])."', ";
		$sql .= "lastname ='".db_escape($db,$admin['lastname'])."', ";
		$sql .= "username ='".db_escape($db,$admin['username'])."', ";
		if($password_sent){
			$sql .= "password ='".db_escape($db,$admin['password'])."', ";
			$sql .= "hash_password ='".db_escape($db,$hashed_password)."', ";
		}
		$sql .= "contact ='".db_escape($db,$admin['contact'])."', ";
		$sql .= "email ='".db_escape($db,$admin['email'])."', ";
		$sql .= "admin_status ='".db_escape($db,$admin['admin_status'])."' ";
		$sql .= "WHERE admin_compo_id = '".db_escape($db,$admin['admin_compo_id'])."' "; //compo_id
		$sql .= "LIMIT 1";

		$result = mysqli_query($db, $sql);
		// for insert statement, $result is true/false
		if($result){
			//
			return true;
		}else{
			echo mysqli_error($db);
			db_disconnect($db);
			exit; 
		}
	}




	/*not necessary*/
	function delete_admin($admin_id){
		global $db;
		$sql = "DELETE FROM tbl_admin WHERE admin_id = '".$admin_id."' ";
		$sql .= "LIMIT 1";
		$result = mysqli_query($db, $sql);

		if($result){
			return true;
		}else{
			echo mysqli_error($db);
			db_disconnect($db);
			exit; 
		}
	}


	function find_admin_by_username($username) {
		global $db;

		$sql = "SELECT * FROM tbl_admin ";
		$sql .= "WHERE username='" . db_escape($db, $username) . "' ";
		$sql .= "LIMIT 1";
		$result = mysqli_query($db, $sql);
		confirm_result_set($result);
		$admin = mysqli_fetch_assoc($result); // find first
		mysqli_free_result($result);
		return $admin; // returns an assoc. array
	}



  	//for login
    function find_admin_by_username_active($username) {
	    global $db;

	    $sql = "SELECT * FROM tbl_admin ";
	    $sql .= "WHERE username='" . db_escape($db, $username) . "' ";
	    $sql .= "AND admin_status = '1' ";
	    $sql .= "LIMIT 1";
	    $result = mysqli_query($db, $sql);
	    confirm_result_set($result);
	    $admin = mysqli_fetch_assoc($result); // find first
	    mysqli_free_result($result);
	    return $admin; // returns an assoc. array
    }




   //validate inquiry message
   function validate_inquiry($inquiry){
	 	$errors = [];

		if(is_blank($inquiry['name'])){
			$errors[] = "Name cannot be blank";
		}

		if(is_blank($inquiry['email'])){
			$errors[] = "Email cannot be blank";
		}else if(!has_valid_email_format($inquiry['email'])){
			$errors[] = "Invalid email address";
		}

		if(is_blank($inquiry['message'])){
			$errors[] = "Message cannot be blank";
		}	

	    return $errors;
   }


  //inquiries //contact.php
  function send_inquiry($inquiry){
  	global $db;

	$errors = validate_inquiry($inquiry);
	if(!empty($errors)){
		return $errors;
	}

  	$sql = "INSERT INTO tbl_inquiries(inquiries_compo_id,name,email,message,date_send,data_status) ";
  	$sql .= "VALUES('".db_escape($db,$inquiry['inquiries_compo_id'])."', '".db_escape($db,$inquiry['name'])."', '".db_escape($db,$inquiry['email'])."', '".db_escape($db,$inquiry['message'])."','".db_escape($db,$inquiry['date_send'])."','".db_escape($db,$inquiry['data_status'])."') ";
  	//$sql .= "";

	$result = mysqli_query($db,$sql);
	// for insert statement, $result is true/false
	if($result){
		//redirect
		return true;
	}else{
		//insert failed
		echo mysqli_error($db);
		db_disconnect($db);
		exit; 
	}
  }



  //get all inquries
  function get_all_inquiries(){
	global $db;
	$sql = "SELECT * FROM tbl_inquiries WHERE data_status = '1'";
	$sql .= "ORDER BY inquiries_id DESC";
	$result = mysqli_query($db,$sql);
	confirm_result_set($result);
	return $result;
  }

  function archive_inquiry($inquiry){
  	global $db;
  	$sql = "UPDATE tbl_inquiries SET data_status = '0' WHERE inquiries_id = '".db_escape($db,$inquiry['inquiry_id'])."' ";
	$result = mysqli_query($db, $sql);
	// for insert statement, $result is true/false
	if($result){
		//
		return true;
	}else{
		echo mysqli_error($db);
		db_disconnect($db);
		exit; 
	}
  }


   function get_all_inquiries_in_archive(){
	global $db;
	$sql = "SELECT * FROM tbl_inquiries WHERE data_status = '0'";
	$sql .= "ORDER BY inquiries_id DESC";
	$result = mysqli_query($db,$sql);
	confirm_result_set($result);
	return $result;
  }


  function get_inquiry_by_inquiries_compo_id($inquiries_compo_id){
	global $db;
	$sql = "SELECT * FROM tbl_inquiries WHERE inquiries_compo_id = '".db_escape($db,$inquiries_compo_id)."'";
	$sql .= "LIMIT 1";
	$result = mysqli_query($db,$sql);
	//error checking
	confirm_result_set($result);
	
	$inquiry_single = mysqli_fetch_assoc($result);
	mysqli_free_result($result);
	//return an assoc array not a result set
	return $inquiry_single;
  }



//



  ///JOBSEEKER
   //validate jobseeker file
   function validate_jobseeker_files($jobseeker){
	 	$errors = [];

		if(is_blank($jobseeker['firstname'])){
			$errors[] = "Firstname cannot be blank";
		}

		if(is_blank($jobseeker['middlename'])){
			$errors[] = "Middlename cannot be blank";
		}

		if(is_blank($jobseeker['lastname'])){
			$errors[] = "Lastname cannot be blank";
		}
		if(is_blank($jobseeker['gender'])){
			$errors[] = "Gender cannot be blank";
		}
		if(is_blank($jobseeker['contact'])){
			$errors[] = "Contact number cannot be blank";
		}


		if(is_blank($jobseeker['email'])){
			$errors[] = "Email cannot be blank";
		}else if(!has_valid_email_format($jobseeker['email'])){
			$errors[] = "Invalid email format";
		}
		


		if(is_blank($jobseeker['file'])){
			$errors[] = "File cannot be blank";
		}else if(file_upload_resume($jobseeker['file'])){
			$errors[] = "Upload only pdf or word file";
		}	

	    return $errors;
   }


  function send_jobseeker_files($jobseeker){
  	global $db;

	$errors = validate_jobseeker_files($jobseeker);
	if(!empty($errors)){
		return $errors;
	}  	

  	$sql = "INSERT INTO tbl_jobseekers(jobseeker_compo_id,firstname,middlename,lastname,gender,contact,email,subject,message,file,date_send,data_status) ";
  	$sql .= "VALUES('".db_escape($db,$jobseeker['jobseeker_compo_id'])."', '".db_escape($db,$jobseeker['firstname'])."', '".db_escape($db,$jobseeker['middlename'])."', '".db_escape($db,$jobseeker['lastname'])."','".db_escape($db,$jobseeker['gender'])."','".db_escape($db,$jobseeker['contact'])."','".db_escape($db,$jobseeker['email'])."','".db_escape($db,$jobseeker['subject'])."','".db_escape($db,$jobseeker['message'])."','".db_escape($db,$jobseeker['file'])."','".db_escape($db,$jobseeker['date_send'])."','".db_escape($db,$jobseeker['data_status'])."') ";
  	//$sql .= "";

	$result = mysqli_query($db,$sql);
	// for insert statement, $result is true/false
	if($result){
		//redirect
		return true;
	}else{
		//insert failed
		echo mysqli_error($db);
		db_disconnect($db);
		exit; 
	}
  }


     //validate jobseeker file
  function validate_jobseeker_files_admin($jobseeker){
 	$errors = [];

	if(is_blank($jobseeker['firstname'])){
		$errors[] = "Firstname cannot be blank";
	}

	if(is_blank($jobseeker['middlename'])){
		$errors[] = "Middlename cannot be blank";
	}

	if(is_blank($jobseeker['lastname'])){
		$errors[] = "Lastname cannot be blank";
	}
	
	if(is_blank($jobseeker['contact'])){
		$errors[] = "Contact number cannot be blank";
	}


	if(is_blank($jobseeker['email'])){
		$errors[] = "Email cannot be blank";
	}else if(!has_valid_email_format($jobseeker['email'])){
		$errors[] = "Invalid email format";
	}
	

	


	if(is_blank($jobseeker['file'])){
		$errors[] = "File cannot be blank";
	}else if(file_upload_resume($jobseeker['file'])){
		$errors[] = "Upload only pdf or word file";
	}	

    return $errors;
 }

  function insert_jobseeker_files($jobseeker){
  	global $db;

	$errors = validate_jobseeker_files_admin($jobseeker);
	if(!empty($errors)){
		return $errors;
	} 

	$sql = "INSERT INTO tbl_jobseekers(jobseeker_compo_id,firstname,middlename,lastname,gender,contact,email,subject,file,date_send,data_status,added_by)";
	$sql .="VALUES (";
	$sql .= "'".db_escape($db,$jobseeker['jobseeker_compo_id'])."', "; 	
	$sql .= "'".db_escape($db,$jobseeker['firstname'])."', ";
	$sql .= "'".db_escape($db,$jobseeker['middlename'])."', ";
	$sql .= "'".db_escape($db,$jobseeker['lastname'])."', ";
	$sql .= "'".db_escape($db,$jobseeker['gender'])."', ";
	$sql .= "'".db_escape($db,$jobseeker['contact'])."', ";
	$sql .= "'".db_escape($db,$jobseeker['email'])."', ";
	$sql .= "'".db_escape($db,$jobseeker['subject'])."', ";
	$sql .= "'".db_escape($db,$jobseeker['file'])."', ";
	$sql .= "'".db_escape($db,$jobseeker['date_send'])."', ";
	$sql .= "'".db_escape($db,$jobseeker['data_status'])."', ";
	$sql .= "'".db_escape($db,$jobseeker['added_by'])."' ";
	$sql .= ")";
	$result = mysqli_query($db,$sql);
	// for insert statement, $result is true/false
	if($result){
		//redirect
		return true;
	}else{
		//insert failed
		echo mysqli_error($db);
		db_disconnect($db);
		exit; 
	}
  }


  //all jobseeker files that has a data_status of 1
  function get_all_jobseeker_files(){
	global $db;
	$sql = "SELECT * FROM tbl_jobseekers WHERE data_status = '1' ";
	$sql .= "ORDER BY jobseeker_id DESC";
	$result = mysqli_query($db,$sql);
	confirm_result_set($result);
	return $result;
  }


    function archive_jobseeker($jobseeker){
  	global $db;
  	$sql = "UPDATE tbl_jobseekers SET data_status = '0' WHERE jobseeker_id = '".db_escape($db,$jobseeker['jobseeker_id'])."' ";
	$result = mysqli_query($db, $sql);
	// for insert statement, $result is true/false
	if($result){
		//
		return true;
	}else{
		echo mysqli_error($db);
		db_disconnect($db);
		exit; 
	}
  }


   function get_all_jobseekers_in_archive(){
	global $db;
	$sql = "SELECT * FROM tbl_jobseekers WHERE data_status = '0'";
	$sql .= "ORDER BY jobseeker_id DESC";
	$result = mysqli_query($db,$sql);
	confirm_result_set($result);
	return $result;
  }


  function get_jobseeker_by_jobseeker_compo_id($jobseeker_compo_id){
		global $db;
		$sql = "SELECT * FROM tbl_jobseekers ";
		$sql .= "WHERE jobseeker_compo_id = '".db_escape($db,$jobseeker_compo_id)."' ";
		$sql .= "LIMIT 1";
		$result = mysqli_query($db,$sql);
		//error checking
		confirm_result_set($result);
		
		$jobseeker_single = mysqli_fetch_assoc($result);
		mysqli_free_result($result);
		//return an assoc array not a result set
		return $jobseeker_single;	
  }	




  //clients 

     //validate jobseeker file
   function validate_client_files($client){
	 	$errors = [];

		if(is_blank($client['firstname'])){
			$errors[] = "Firstname cannot be blank";
		}

		if(is_blank($client['middlename'])){
			$errors[] = "Middlename cannot be blank";
		}

		if(is_blank($client['lastname'])){
			$errors[] = "Lastname cannot be blank";
		}
		
		if(is_blank($client['contact'])){
			$errors[] = "Contact number cannot be blank";
		}


		if(is_blank($client['email'])){
			$errors[] = "Email cannot be blank";
		}else if(!has_valid_email_format($client['email'])){
			$errors[] = "Invalid email format";
		}
		

		/*if(is_blank($client['message'])){
			$errors[] = "Message cannot be blank";
		}*/


		if(is_blank($client['man_power_file'])){
			$errors[] = "File cannot be blank";
		}else if(file_upload_man_power_file($client['man_power_file'])){
			$errors[] = "Upload only excel file";
		}	

	    return $errors;
   }

  function send_client_files($client){
	  	global $db;

		$errors = validate_client_files($client);
		if(!empty($errors)){
			return $errors;
		}  	

	  	$sql = "INSERT INTO tbl_clients(client_compo_id,firstname,middlename,lastname,company,position_in_company,company_size,industry,email,contact,zip_code,message,man_power_file,date_send,data_status) ";
	  	$sql .= "VALUES('".db_escape($db,$client['client_compo_id'])."', '".db_escape($db,$client['firstname'])."', '".db_escape($db,$client['middlename'])."', '".db_escape($db,$client['lastname'])."','".db_escape($db,$client['company'])."','".db_escape($db,$client['position_in_company'])."','".db_escape($db,$client['company_size'])."','".db_escape($db,$client['industry'])."','".db_escape($db,$client['email'])."','".db_escape($db,$client['contact'])."','".db_escape($db,$client['zip_code'])."','".db_escape($db,$client['message'])."','".db_escape($db,$client['man_power_file'])."','".db_escape($db,$client['date_send'])."','".db_escape($db,$client['data_status'])."') ";
	  	//$sql .= "";

		$result = mysqli_query($db,$sql);
		// for insert statement, $result is true/false
		if($result){
			//redirect
			return true;
		}else{
			//insert failed
			echo mysqli_error($db);
			db_disconnect($db);
			exit; 
		}
  } 


     //validate jobseeker file
   function validate_client_files_admin($client){
	 	$errors = [];

		if(is_blank($client['firstname'])){
			$errors[] = "Firstname cannot be blank";
		}

		if(is_blank($client['middlename'])){
			$errors[] = "Middlename cannot be blank";
		}

		if(is_blank($client['lastname'])){
			$errors[] = "Lastname cannot be blank";
		}
		
		if(is_blank($client['contact'])){
			$errors[] = "Contact number cannot be blank";
		}


		if(is_blank($client['email'])){
			$errors[] = "Email cannot be blank";
		}else if(!has_valid_email_format($client['email'])){
			$errors[] = "Invalid email format";
		}
		

		


		if(is_blank($client['man_power_file'])){
			$errors[] = "File cannot be blank";
		}else if(file_upload_man_power_file($client['man_power_file'])){
			$errors[] = "Upload only excel file";
		}	

	    return $errors;
   }

  //admin action
  function insert_client_files($client){
	  	global $db;

		$errors = validate_client_files_admin($client);
		if(!empty($errors)){
			return $errors;
		}  	

	  	$sql = "INSERT INTO tbl_clients(client_compo_id,firstname,middlename,lastname,company,position_in_company,industry,email,contact,man_power_file,date_send,data_status,added_by) ";
	  	$sql .= "VALUES(";
	  	$sql .= "'".db_escape($db,$client['client_compo_id'])."', ";
	  	$sql .= "'".db_escape($db,$client['firstname'])."', ";
	  	$sql .= "'".db_escape($db,$client['middlename'])."', ";
	  	$sql .= "'".db_escape($db,$client['lastname'])."', ";
	  	$sql .= "'".db_escape($db,$client['company'])."', ";
	  	$sql .= "'".db_escape($db,$client['position_in_company'])."', ";
	  	$sql .= "'".db_escape($db,$client['industry'])."', ";
	  	$sql .= "'".db_escape($db,$client['email'])."', ";
	  	$sql .= "'".db_escape($db,$client['contact'])."', ";
	  	$sql .= "'".db_escape($db,$client['man_power_file'])."', ";
	  	$sql .= "'".db_escape($db,$client['date_send'])."', ";
	  	$sql .= "'".db_escape($db,$client['data_status'])."', ";
	  	$sql .= "'".db_escape($db,$client['added_by'])."' ";
	  	$sql .=")";
	  	//$sql .= "";

		$result = mysqli_query($db,$sql);
		// for insert statement, $result is true/false
		if($result){
			//redirect
			return true;
		}else{
			//insert failed
			echo mysqli_error($db);
			db_disconnect($db);
			exit; 
		}
  } 


 //all jobseeker files that has a data_status of 1
  function get_all_client_files(){
	global $db;
	$sql = "SELECT * FROM tbl_clients WHERE data_status = '1'";
	$sql .= "ORDER BY client_id DESC";
	$result = mysqli_query($db,$sql);
	confirm_result_set($result);
	return $result;
  }


  function archive_client($client){
  	global $db;
  	$sql = "UPDATE tbl_clients SET data_status = '0' WHERE client_id = '".db_escape($db,$client['client_id'])."' ";
	$result = mysqli_query($db, $sql);
	// for insert statement, $result is true/false
	if($result){
		//
		return true;
	}else{
		echo mysqli_error($db);
		db_disconnect($db);
		exit; 
	}
  }


   function get_all_clients_in_archive(){
	global $db;
	$sql = "SELECT * FROM tbl_clients WHERE data_status = '0'";
	$sql .= "ORDER BY client_id DESC";
	$result = mysqli_query($db,$sql);
	confirm_result_set($result);
	return $result;
  }


  function get_client_by_client_compo_id($client_compo_id){
		global $db;
		$sql = "SELECT * FROM tbl_clients ";
		$sql .= "WHERE client_compo_id = '".db_escape($db,$client_compo_id)."' ";
		$sql .= "LIMIT 1";
		$result = mysqli_query($db,$sql);
		//error checking
		confirm_result_set($result);
		
		$client_single = mysqli_fetch_assoc($result);
		mysqli_free_result($result);
		//return an assoc array not a result set
		return $client_single;	
  }






  //events -calendar

   function validate_event($event){
	 	$errors = [];

		if(is_blank($event['event_name'])){
			$errors[] = "Event name cannot be blank";
		}

		/*if(is_blank($event['event_description'])){
			$errors[] = "Event Description cannot be blank";
		}*/

		if(is_blank($event['event_datestart'])){
			$errors[] = "Date Start cannot be blank";
		}


		/*if(!date_start_date_end($event['event_datestart'], $event['event_dateend'])){
			$errors[] = "Beginning date should not be less than the end date";
		}*/
		
		if(is_blank($event['event_timestart'])){
			$errors[] = "Time start cannot be blank";
		}


		if(is_blank($event['event_timeend'])){
			$errors[] = "Time end cannot be blank";
		}

		/*if($event['event_timestart'] > $event['event_timeend']){
			$errors[] = "Beginning time should not be less than the end time";
		}*/

		if(!time_start_time_end($event['event_timestart'], $event['event_timeend'])){
			$errors[] = "Beginning time should not be less than the end time";
		}

		
		

		/*if(is_blank($client['message'])){
			$errors[] = "Message cannot be blank";
		}	*/

	    return $errors;
   }


  function insert_event($event){
  		global $db;

		$errors = validate_event($event);
		if(!empty($errors)){
			return $errors;
		} 	

  		$sql = "INSERT INTO tbl_events(event_compo_id,event_name,event_description,event_datestart,event_dateend,event_timestart,event_timeend,event_type,event_status,created_by,date_created) ";
  		$sql .= "VALUES (";
  		$sql .= "'".db_escape($db, $event['event_compo_id'])."', ";
  		$sql .= "'".db_escape($db, $event['event_name'])."', ";
  		$sql .= "'".db_escape($db, $event['event_description'])."', ";
  		$sql .= "'".db_escape($db, $event['event_datestart'])."', ";
  		$sql .= "'".db_escape($db, $event['event_datestart'])."', ";
  		$sql .= "'".db_escape($db, $event['event_timestart'])."', ";
  		$sql .= "'".db_escape($db, $event['event_timeend'])."', ";
  		$sql .= "'".db_escape($db, $event['event_type'])."', ";
  		$sql .= "'".db_escape($db, $event['event_status'])."', ";
  		$sql .= "'".db_escape($db, $event['created_by'])."', ";
  		$sql .= "'".db_escape($db, $event['date_created'])."' ";
  		$sql .= ")";
  		$result = mysqli_query($db,$sql);

	    // For INSERT statements, $result is true/false
	    if($result) {
	      return true;
	    } else {
	      // INSERT failed
	      echo mysqli_error($db);
	      db_disconnect($db);
	      exit;
	    }
  }


	function update_event($event){
		global $db;


		
 		$errors = validate_event($event);
		if(!empty($errors)){
			return $errors;
		}  		

		$sql = "UPDATE tbl_events SET ";
		$sql .= "event_status ='".db_escape($db,$event['event_status'])."', ";
		$sql .= "event_type ='".db_escape($db,$event['event_type'])."', ";
		$sql .= "event_name ='".db_escape($db,$event['event_name'])."', ";
		$sql .= "event_description ='".db_escape($db,$event['event_description'])."', ";

		$sql .= "event_datestart ='".db_escape($db,$event['event_datestart'])."', ";
		$sql .= "event_dateend ='".db_escape($db,$event['event_dateend'])."', ";
		$sql .= "event_timestart ='".db_escape($db,$event['event_timestart'])."', ";
        $sql .= "event_timeend ='".db_escape($db,$event['event_timeend'])."' ";
		$sql .= "WHERE event_compo_id = '".db_escape($db,$event['event_compo_id'])."' "; //compo_id
		$sql .= "LIMIT 1";

		$result = mysqli_query($db, $sql);
		// for insert statement, $result is true/false
		if($result){
			//
			return true;
		}else{
			echo mysqli_error($db);
			db_disconnect($db);
			exit; 
		}
	}

  function load_calendar(){
	global $db;
	$sql = "SELECT * FROM tbl_events ";
	$sql .= "ORDER BY event_id DESC";
	$result = mysqli_query($db,$sql);
	confirm_result_set($result);
	return $result;
  }




  function load_upcoming_event(){
  	$now = date('Y-m-d');
	global $db;
	$sql = "SELECT * FROM tbl_events WHERE event_status = 1 AND event_datestart > '".db_escape($db,$now)."'";
	$sql .= "ORDER BY event_id DESC LIMIT 3";
	$result = mysqli_query($db,$sql);
	confirm_result_set($result);
	return $result;
  }


  function get_event_for_this_day(){
  	$now = date('Y-m-d');

	global $db;
	$sql = "SELECT * FROM tbl_events ";
	$sql .= "WHERE event_datestart = '".db_escape($db,$now)."' ";
	//$sql .= "LIMIT 1";
	$result = mysqli_query($db,$sql);
	confirm_result_set($result);
	//return an assoc array not a result set
	return $result;

  }


  function get_event_by_event_compo_id($event_compo_id){
  	//$now = date('Y-m-d');

	global $db;
	$sql = "SELECT * FROM tbl_events ";
	$sql .= "WHERE event_compo_id = '".db_escape($db,$event_compo_id)."' ";
	//$sql .= "LIMIT 1";
	$result = mysqli_query($db,$sql);
	confirm_result_set($result);
	
	$count_event = mysqli_fetch_assoc($result);
	mysqli_free_result($result);
	//return an assoc array not a result set
	return $count_event;	
  }


  function count_event_for_this_day(){
  	$now = date('Y-m-d');

	global $db;
	$sql = "SELECT COUNT(*) as 'count_event_today' FROM tbl_events ";
	$sql .= "WHERE event_datestart = '".db_escape($db,$now)."' ";
	//$sql .= "LIMIT 1";
	$result = mysqli_query($db,$sql);
	confirm_result_set($result);
	
	$count_event = mysqli_fetch_assoc($result);
	mysqli_free_result($result);
	//return an assoc array not a result set
	return $count_event;	
  }


  function delete_event($event){
		global $db;
		$sql = "DELETE FROM tbl_events WHERE event_id = '".db_escape($db,$event['event_id'])."' ";
		$sql .= "LIMIT 1";
		$result = mysqli_query($db, $sql);

		if($result){
			return true;
		}else{
			echo mysqli_error($db);
			db_disconnect($db);
			exit; 
		}
  
  }



//MESSAGE RELATED FUNCTIONS WERE NOT USED

  ///message
  function insert_message_detail($message){
  	global $db;
	$sql = "INSERT INTO tbl_messages(message_compo_id,sender_id,subject,message_body,date_send,message_status) ";
	$sql .= "VALUES (";
	$sql .= "'".db_escape($db, $message['message_compo_id'])."', ";
	$sql .= "'".db_escape($db, $message['sender_id'])."', ";
	$sql .= "'".db_escape($db, $message['subject'])."', ";
	$sql .= "'".db_escape($db, $message['message_body'])."', ";
	$sql .= "'".db_escape($db, $message['date_send'])."', ";
	$sql .= "'".db_escape($db, $message['message_status'])."'";
	
	$sql .= ")";
	$result = mysqli_query($db,$sql);

	// For INSERT statements, $result is true/false
	if($result) {
	  return true;
	} else {
	  // INSERT failed
	  echo mysqli_error($db);
	  db_disconnect($db);
	  exit;
	}
  }

  //not use
  function search_message_detail_by_id($id){
	global $db;
	$sql = "SELECT * FROM tbl_messages ";
	$sql .= "WHERE message_id = '".db_escape($db,$id)."' ";
	$sql .= "LIMIT 1";
	$result = mysqli_query($db,$sql);
	//error checking
	confirm_result_set($result);
	
	$message_single = mysqli_fetch_assoc($result);
	mysqli_free_result($result);
	//return an assoc array not a result set
	return $message_single;
  }


  function insert_message_file($attachment){
  	global $db;
	$sql = "INSERT INTO tbl_message_files(message_compo_id,attachment) ";
	$sql .= "VALUES (";
	$sql .= "'".db_escape($db, $attachment['message_compo_id'])."', ";
	$sql .= "'".db_escape($db, $attachment['attachment'])."'";
	
	$sql .= ")";
	$result = mysqli_query($db,$sql);

	// For INSERT statements, $result is true/false
	if($result) {
	  return true;
	} else {
	  // INSERT failed
	  echo mysqli_error($db);
	  db_disconnect($db);
	  exit;
	}
  }


  function insert_message_recipient($recipient){
  	global $db;
	$sql = "INSERT INTO tbl_message_recipients(message_compo_id,recipient_id,recipient_message_status) ";
	$sql .= "VALUES (";
	$sql .= "'".db_escape($db, $recipient['message_compo_id'])."', ";
	$sql .= "'".db_escape($db, $recipient['recipient'])."',";
	$sql .= "'".db_escape($db, $recipient['recipient_message_status'])."'";
	$sql .= ")";
	$result = mysqli_query($db,$sql);

	// For INSERT statements, $result is true/false
	if($result) {
	  return true;
	} else {
	  // INSERT failed
	  echo mysqli_error($db);
	  db_disconnect($db);
	  exit;
	}
  }


  function count_inbox_for_current_login($current_login){
  	

	global $db;
	$sql = "SELECT COUNT(*) as 'count_inbox' FROM tbl_message_recipients ";
	$sql .= "WHERE  recipient_id = '".db_escape($db,$current_login)."'";
	//$sql .= "LIMIT 1";
	$result = mysqli_query($db,$sql);
	confirm_result_set($result);
	
	$count_inbox = mysqli_fetch_assoc($result);
	mysqli_free_result($result);
	//return an assoc array not a result set
	return $count_inbox;	
  }


  function get_inbox_for_current_user($current_user){
	global $db;
	$sql = "SELECT a.sender_id, a.subject, a.message_body,a.date_send,b.recipient_id,b.recipient_message_status,a.message_compo_id FROM tbl_messages a JOIN tbl_message_recipients b ON a.message_compo_id = b.message_compo_id ";
	$sql .= "WHERE b.recipient_id = '".db_escape($db,$current_user)."' ";
	$sql .="ORDER BY a.message_id DESC";
	//$sql .= "LIMIT 1";
	$result = mysqli_query($db,$sql);
	confirm_result_set($result);
	//return an assoc array not a result set
	return $result;
  }


  function get_attachment_by_message_compo_id($message_compo_id){
  	global $db;
  	$sql = "SELECT attachment FROM tbl_message_files WHERE message_compo_id = '".$message_compo_id."'";
  	$result = mysqli_query($db,$sql);
	confirm_result_set($result);
	//return an assoc array not a result set
	return $result;
  }


  function get_message_by_message_compo_id($message_compo_id){

	global $db;
	$sql = "SELECT * FROM tbl_messages ";
	$sql .= "WHERE message_compo_id =  '".db_escape($db,$message_compo_id)."'";
	//$sql .= "LIMIT 1";
	$result = mysqli_query($db,$sql);
	confirm_result_set($result);
	
	$message = mysqli_fetch_assoc($result);
	mysqli_free_result($result);
	//return an assoc array not a result set
	return $message;
  }


  /*function find_sender_by_sender_id($sender_id){

  }*/


?>