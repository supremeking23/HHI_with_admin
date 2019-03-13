<?php 
  require_once('initialize.php');


  $errors = [];
  $username = "";
  $password = "";

  if(is_post_request()){
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

      // Validations
    if(is_blank($username)) {
      $errors[] = "Username cannot be blank.";
    }
    if(is_blank($password)) {
      $errors[] = "Password cannot be blank.";
    }

    //if there were no errors
    if(empty($errors)){
      //redirect_to('dashboard.php');
      // Using one variable ensures that msg is the same
      $login_failure_message = "Login in was unsuccessful";
      $admin = find_admin_by_username_active($username);
      if($admin) {
        if(password_verify($password, $admin['hash_password'])) {
        // password matches
        log_in_admin($admin);
        $log = [];
        $log['log_compo_id'] = 'LOG'.date("ymdhis") . abs(rand('0','9'));
        $now = date('Y-m-d H:i:s');
        $log['log_date'] = $now;
        $log['log_userid'] = $admin['admin_compo_id'];
        $log['log_user'] = $admin['username'];
        $log['log_usertype'] = $admin['admin_type'];
        $log['log_action'] = "Login Successful";
        insert_log($log);
        redirect_to(url_for('admin/dashboard.php'));
        } else {
          // username found, but password does not match
          $errors[] = $login_failure_message;
        }
      }else{
          $errors[] = $login_failure_message;
      }
    }
    //print_r($_POST);

  } //post bracket

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>HHI| Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
  <link rel="stylesheet" type="text/css" href="dist/css/hhiadmin.css">
  <link rel="shortcut icon" href="../img/logo.jpg" />

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
  <?php echo display_errors($errors); ?>
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Hunter's Hub </b>Inc</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg"></p>

    <form action="login.php" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username;?>">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">

        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>


    <!-- /.social-auth-links -->


  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script src="dist/js/adminjs.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
