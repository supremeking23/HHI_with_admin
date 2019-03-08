<?php 
	require_once('../initialize.php');

	if(isset($_POST['upload_image_admin_submit'])){
		//echo "ivan";

		$admin_id = $_POST['admin_id'];
		$photo = $_FILES['photo']['name'];
        $photo_tmp =$_FILES['photo']['tmp_name'];
        move_uploaded_file($photo_tmp, "../uploads/images/$photo");

        $sql = "UPDATE tbl_admin SET photo = '".db_escape($db,$photo)."' WHERE admin_id = '".db_escape($db,$admin_id)."' ";

        $run_sql = mysqli_query($db,$sql);
        /*if($run_sql && mysqli_affected_rows($db) == 1){
			//$_SESSION['success_message'] = "Student has been added";
	        redirect_to(url_for('admin/profile.php'));
		}*/
		if($run_sql){
			//
			//return true;
			$_SESSION['message'] = "Admin information has been updated successfully";
			redirect_to(url_for('admin/profile.php'));
		}else{
			echo mysqli_error($db);
			db_disconnect($db);
			exit; 
		}

	}


	if(isset($_POST['update_user_profile'])){

		$admin_compo_id = $_POST['admin_compo_id'];
		$photo = $_FILES['photo']['name'];
        $photo_tmp =$_FILES['photo']['tmp_name'];
        move_uploaded_file($photo_tmp, "../uploads/images/$photo");

        $sql = "UPDATE tbl_admin SET photo = '".db_escape($db,$photo)."' WHERE admin_compo_id = '".db_escape($db,$admin_compo_id)."' ";
        $run_sql = mysqli_query($db,$sql);

        /*if($run_sql && mysqli_affected_rows($db) == 1){
			//$_SESSION['success_message'] = "Student has been added";
	        redirect_to(url_for('admin/profile.php'));
		}*/
		if($run_sql){
			//
			//return true;
			$_SESSION['message'] = "Admin information has been updated successfully";
			redirect_to(url_for('admin/user-detail.php?admin_id='.$admin_compo_id));
			//echo 'ok';
		}else{
			echo mysqli_error($db);
			db_disconnect($db);
			exit; 
		}

	}
	else{
		//redirect_to(url_for('admin/user-management.php'));
	}
?>