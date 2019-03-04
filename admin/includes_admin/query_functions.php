<?php 
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
		$sql .= "(admin_compo_id,firstname,middlename,lastname,username,hash_password,password,contact,email,admin_status,admin_type) ";
		$sql .= "VALUES ('".db_escape($db,$admin['admin_compo_id'])."','".db_escape($db,$admin['firstname'])."','".db_escape($db,$admin['middlename'])."','".db_escape($db,$admin['lastname'])."','".db_escape($db,$admin['username'])."','".db_escape($db,$hashed_password)."','".db_escape($db,$admin['password'])."','".db_escape($db,$admin['contact'])."','".db_escape($db,$admin['email'])."','".db_escape($db,$admin['admin_status'])."','".db_escape($db,$admin['admin_type'])."')";	
		
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

  	$sql = "INSERT INTO tbl_inquiries(inquiries_compo_id,name,email,message,date_send) ";
  	$sql .= "VALUES('".db_escape($db,$inquiry['inquiries_compo_id'])."', '".db_escape($db,$inquiry['name'])."', '".db_escape($db,$inquiry['email'])."', '".db_escape($db,$inquiry['message'])."','".db_escape($db,$inquiry['date_send'])."') ";
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
	$sql = "SELECT * FROM tbl_inquiries ";
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







  ///JOBSEEKER
  function send_jobseeker_files(){
  	global $db;
  }



?>