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

	function get_admin_by_id($id){
		global $db;
		$sql = "SELECT * FROM tbl_admin ";
		$sql .= "WHERE admin_id = '".$id."' ";
		$sql .= "LIMIT 1";
		$result = mysqli_query($db,$sql);
		//error checking
		confirm_result_set($result);
		
		$admin_single = mysqli_fetch_assoc($result);
		mysqli_fee_result($result);
		//return an assoc array not a result set
		return $admin_single;	
	}


	function validate_admin($admin){
		$errors = [];

		if(is_blank($admin['firstname'])){
			$errors = "Firstname cannot be blank";
		}


		if(is_blank($admin['middlename'])){
			$errors = "Firstname cannot be blank";
		}


		if(is_blank($admin['lastname'])){
			$errors = "Firstname cannot be blank";
		}

		return $errors;
	}

	function add_admin($admin){
		global $db;
		
		$errors = validate_admin($admin);
		if(!empty($errors)){
			return $errors;
		}

		$sql = "INSERT INTO tbl_admin ";
		$sql .= "(admin_compo_id,firstname,middlename,lastname,username,hash_password,password,photo,contact,email,admin_status) ";
		$sql .= "VALUES ('".$admin['admin_compo_id']."','".$admin['firstname']."','".$admin['middlename']."','".$admin['lastname']."','".$admin['username']."','".$admin['hash_password']."','".$admin['password']."','".$admin['photo']."','".$admin['contact']."','".$admin['email']."','".$admin['admin_status']."') ";	
		
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

		$errors = validate_admin($admin);
		if(!empty($errors)){
			return $errors;
		}

		$sql = "UPDATE tbl_admin SET ";
		$sql .= "firstname ='".$admin['firstname']."', middlename ='".$admin['middlename']."', lastname ='".$admin['lastname']."', username ='".$admin['username']."', password ='".$admin['password']."', hash_password ='".$admin['hash_password']."', photo ='".$admin['photo']."', contact ='".$admin['contact']."', email ='".$admin['email']."', admin_status ='".$admin['admin_status']."'";
		$sql .= "WHERE admin_id = '".$admin['admin_id']."'";
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




?>