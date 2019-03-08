<?php 


function url_for($script_path){
	//add the leading '/' if not present

	if($script_path[0] !='/'){
		$script_path = "/" .$script_path;
	}

	return WWW_ROOT .$script_path;
}

function redirect_to($location) {
  header("Location: " . $location);
  exit;
}


function u($string=""){
	return urlencode($string);
}
function raw_u($string=""){
	return rawurlencode($string);
}


function h($string=""){
	return htmlspecialchars($string);
}

function error_404(){
	header($_SERVER['SERVER_PROTOCOL'] . "404 Not Found");
	exit();
}

function error_500(){
	header($_SERVER['SERVER_PROTOCOL'] . "500 Internal Server Eror");
	exit();
}

function is_post_request(){
	return $_SERVER['REQUEST_METHOD'] == 'POST';

}

function is_get_request(){
	return $_SERVER['REQUEST_METHOD'] == 'GET';
	
}


function display_errors($errors=array()){
	$output = "";

	if(!empty($errors)){
		$output .= "<div class=\"errors modal modal-danger\" id=\"errormodal\">";
		$output .="<div class=\"modal-dialog\">";
		$output .="<div class=\"modal-content\">";
        $output .="<div class=\"modal-header\">";
        $output .="<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">";
        $output .="<span aria-hidden=\"true\">&times;</span></button>";
        $output .="<h4 class=\"modal-title\">Please fix the following errors:</h4>";
        $output .="</div>"; //modal header
        $output .="<div class=\"modal-body\">";
        $output .="<p></p>";
        $output .= "";
		$output .="<ul>";
		foreach($errors as $error){
			$output .="<li>" .h($error) . "</li>";
		}
		$output .="</ul>";
        $output .="</div>";      //modal body
        $output .="<div class=\"modal-footer\">";
        /*$output .="<button type=\"button\" class=\"btn btn-default pull-left\" data-dismiss=\"modal\">Close</button>";
        $output .="<button type=\"button\" class=\"btn btn-primary\">Save changes</button>";*/
      	$output .="</div>";
		$output .="</div>";
		$output .="</div>";
		$output .="</div>";
	}


	return $output;
}



function get_and_clear_error_message_modal(){
	if(isset($_SESSION['error_message']) && $_SESSION['error_message'] !=''){
		$msg = $_SESSION['error_message'];
		unset($_SESSION['error_message']);
		return $msg;
	}
}


//message
function display_error_message(){
	$output = "";
	$msg = get_and_clear_error_message_modal();
	if(!empty($msg)){

		$output .= "<div class=\"errors modal modal-danger\" id=\"errormodal\">";
		$output .="<div class=\"modal-dialog\">";
		$output .="<div class=\"modal-content\">";
        $output .="<div class=\"modal-header\">";
        $output .="<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">";
        $output .="<span aria-hidden=\"true\">&times;</span></button>";
        $output .="<h4 class=\"modal-title\">Please fix the following errors:</h4>";
        $output .="</div>"; //modal header
        $output .="<div class=\"modal-body\">";
        $output .="<p></p>";
        $output .= "";
		$output .="<ul>";
		foreach($msg as $error){
			$output .="<li>" .h($error) . "</li>";
		}
		$output .="</ul>";
        $output .="</div>";      //modal body
        $output .="<div class=\"modal-footer\">";
        /*$output .="<button type=\"button\" class=\"btn btn-default pull-left\" data-dismiss=\"modal\">Close</button>";
        $output .="<button type=\"button\" class=\"btn btn-primary\">Save changes</button>";*/
      	$output .="</div>";
		$output .="</div>";
		$output .="</div>";
		$output .="</div>";

		return $output;
	}
}



function get_and_clear_session_message(){
	if(isset($_SESSION['message']) && $_SESSION['message'] !=''){
		$msg = $_SESSION['message'];
		unset($_SESSION['message']);
		return $msg;
	}
}


//message
function display_session_message(){
	$output = "";
	$msg = get_and_clear_session_message();
	if(!is_blank($msg)){

		$output .= "<div class=\"alert alert-success alert-dismissible\">";
		$output .= "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>";
		$output .= h($msg);
		$output .="</div>";
		return $output;
		/*return '<div id="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		' .h($msg) . '</div>';*/
	}
}


//for portal sending messages
function send_success_modal(){
	$output = "";
	$msg = get_and_clear_session_message();
	if(!is_blank($msg)){
		$output .= "<div class=\"modal fade\" id=\"successmodal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"successmodal\" aria-hidden=\"true\">";
		$output .="<div class=\"modal-dialog modal-dialog-centered\" role=\"document\">";
		$output .="<div class=\"modal-content\">";
        $output .="<div class=\"modal-header\">";
        $output .="<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">";
        $output .="<span aria-hidden=\"true\">&times;</span></button>";
        $output .="<h4 class=\"modal-title\"></h4>";
        $output .="</div>"; //modal header
        $output .="<div class=\"modal-body\">";
        $output .="<p>";
        $output .= h($msg);
        $output .= "</p>";
        $output .="</div>";      //modal body
        $output .="<div class=\"modal-footer\">";
        /*$output .="<button type=\"button\" class=\"btn btn-default pull-left\" data-dismiss=\"modal\">Close</button>";
        $output .="<button type=\"button\" class=\"btn btn-primary\">Save changes</button>";*/
      	$output .="</div>";
		$output .="</div>";
		$output .="</div>";
		$output .="</div>";
		return $output;
	}
}



//for portal sending messages
function send_danger_modal($errors=array()){
	$output = "";

	if(!empty($errors)){
		$output .= "<div class=\"modal fade modal_failed alert-danger\" id=\"errormodal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"errormodal\" aria-hidden=\"true\">";
		$output .="<div class=\"modal-dialog modal-dialog-centered\" role=\"document\">";
		$output .="<div class=\"modal-content\">";
        $output .="<div class=\"modal-header\">";
        $output .="<h4 class=\"modal-title\">Please fix the following errors:</h4>";
        $output .="<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">";
        $output .="<span aria-hidden=\"true\">&times;</span></button>";
        
        $output .="</div>"; //modal header
        $output .="<div class=\"modal-body\">";
        $output .="<p></p>";
        $output .= "";
		$output .="<ul>";
		foreach($errors as $error){
			$output .="<li>" .h($error) . "</li>";
		}
		$output .="</ul>";
        $output .="</div>";      //modal body
        $output .="<div class=\"modal-footer\">";
        /*$output .="<button type=\"button\" class=\"btn btn-default pull-left\" data-dismiss=\"modal\">Close</button>";
        $output .="<button type=\"button\" class=\"btn btn-primary\">Save changes</button>";*/
      	$output .="</div>";
		$output .="</div>";
		$output .="</div>";
		$output .="</div>";
	}


	return $output;
}



?>