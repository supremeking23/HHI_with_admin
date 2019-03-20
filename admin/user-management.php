<?php 
  require_once('initialize.php');
  //echo dirname(__FILE__);
  //constant
  /*define("SITE_URL",dirname(__FILE__));
  //echo SITE_URL;
  define("SHARED_PATH",dirname(__FILE__).'\includes_admin');
 // echo SHARED_PATH;*/
  require_login();
  $admin_status;

  if(is_post_request()){
    $admin = [];
    $admin['admin_compo_id'] =   $_POST['admin_compo_id'] ?? '';
    $admin['firstname'] = $_POST['firstname'] ?? '';
    $admin['middlename'] = $_POST['middlename'] ?? '';
    $admin['lastname'] = $_POST['lastname'] ?? '';
    $admin['contact'] = $_POST['contact'] ?? '';
    $admin['email'] = $_POST['email'] ?? '';
    $admin['username'] = $_POST['username'] ?? '';  
    $admin['password'] = $_POST['password'] ?? '';
    $admin['confirm_password'] = $_POST['confirm_password'] ?? '';
    $admin['admin_type'] = "ADMIN";
    $admin['admin_status'] = 1;
    $now = date('Y-m-d H:i:s');
    $admin['date_added']  = $now;

    $result = add_admin($admin);
    if($result ===true){
        $log = [];
        $log['log_compo_id'] = 'LOG'.date("ymdhis") . abs(rand('0','9'));
        $now = date('Y-m-d H:i:s');
        $log['log_date'] = $now;
        $log['log_userid'] = $_SESSION['admin_compo_id'];
        $log['log_user'] = $_SESSION['username'];
        $log['log_usertype'] = $_SESSION['admin_type'];
        $log['log_action'] = "Add new user. User Id:". $admin['admin_compo_id'];
        insert_log($log);
        $_SESSION['message'] = "Admin Created";
    }else{
      $errors = $result;
    }
  }else{
    $admin = [];
    $admin['firstname'] = '';
    $admin['middlename'] = '';
    $admin['lastname'] = '';
    $admin['contact'] = '';
    $admin['email'] = '';
    $admin['username'] = '';
    $admin['password'] = '';
    $admin['confirm_password'] = '';
  }
 
  
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>HHI | Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="shortcut icon" href="<?php echo WWW_ROOT;?>/img/logo.jpg" />
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">

  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/skin-hhi.css">


  <link rel="stylesheet" type="text/css" href="dist/css/hhiadmin.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style type="text/css">

  </style>
</head>
<body class="hold-transition skin-blue sidebar-mini" id="usermanagement">
<div class="wrapper">

<?php include(SHARED_PATH.'/header.php');?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php include(SHARED_PATH.'/sidebar.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User Management
        <small>List</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-users"></i> HHI</a></li>
        <li class="active">User Management</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
       
        <div class="col-md-12">
          <?php 
            echo display_errors($errors);
            echo display_session_message();
          ?>
        </div>

      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="box">

            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-3">
                   <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#add-user" style="margin-bottom: 10px">Add user</button>
                    <div class="modal fade" id="add-user">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">User Details</h4>
                          </div>
                          <div class="modal-body">

                              <table class="table table-striped table-hover"> 

                              <?php 

                                /*
                                  //admin array
                                  $admin[];


                                  $result = add_admin($admin);
                                  new_id = mysqli_insert_id($db);

                                  if($result === true){
                                    //no error
                                  }else{
                                    $errors = $result
                                  }

                                */
                              ?>

                                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">

                                    <tr>
                                      <td><b>Admin ID</b></td>
                                      <td><input type="text" class="form-control" name="admin_compo_id" id="admin_compo_id" readonly=""></td>
                                    </tr>
                                    <tr>
                                      <td><b>First Name</b></td>
                                      <td><input type="text" class="form-control" name="firstname" id="firstname"></td>
                                    </tr>
                                    <tr>
                                      <td><b>Middle Name</b></td>
                                      <td><input type="text" class="form-control" name="middlename" id="middlename"></td>
                                    </tr>
                                    <tr>
                                      <td><b>Last Name</b></td>
                                      <td><input type="text" class="form-control" name="lastname" id="lastname"></td>
                                    </tr>

                                    <tr>
                                      <td><b>Contact</b></td>
                                      <td><input type="text" class="form-control" name="contact" id="contact"></td>
                                    </tr>

                                    <tr>
                                      <td><b>Email</b></td>
                                      <td><input type="text" class="form-control" name="email" id="email"></td>
                                    </tr>
                                    <tr>
                                      <td><b>Username</b></td>
                                      <td><input type="text" class="form-control" name="username" id="password"></td>
                                    </tr>

                                    <tr>
                                      <td><b>Password</b></td>
                                      <td><input type="password" class="form-control"  name="password" id="password"></td>
                                    </tr> 


                                    <tr>
                                      <td><b>Confirm Password</b></td>
                                      <td><input type="password" class="form-control"  name="confirm_password" id="confirm_password"></td>
                                    </tr>   

                                    <tr>
                                      <td></td>
                                      <td><input type="submit" name="submit" value="Save" class="btn btn-success "></td>
                                    </tr>  
                                
                                </form>
                              </table>
                            
                          </div>
                          <div class="modal-footer">
                          </div>
                        </div>
                        <!-- /.modal-content -->
                      </div>
                      <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->

                </div>
              </div>

              <br />
              
              <table id="" class="datatables table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th>User ID</th>
                  <th>Full Name</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Contant Number</th>
                  <th>Status</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>

                <?php 
                $admin_list =get_all_admin_except_current_admin($_SESSION['admin_id']);

                while($admins = mysqli_fetch_assoc($admin_list)):?>
                <tr>
                  <td><?php echo h($admins['admin_compo_id'])?></td>
                  <td><?php echo h($admins['firstname'].' '. $admins['middlename'].' '. $admins['lastname']);?></td>
                  <td><?php echo h($admins['username']);;?></td>
                  <td><?php echo h($admins['email']);?></td>
                  <td><?php echo h($admins['contact']);?></td>
                  <td><?php if($admins['admin_status'] == 1){
                              $admin_status = "Active";
                              $label_type = "label-success";
                              }else{
                              $admin_status = "Not Active";
                              $label_type = "label-danger";
                              }?>
                      <span class="label <?php echo $label_type?>"><?php echo $admin_status;?></span>  
                 </td>
                  <td>
                   <?php $admin = get_admin_by_id($admins['admin_id']);
                   /*
                    for update information
                   if($result === true){
                      //no error
                    }else{
                      $errors = $result;
                    }
                   */
                   ?>
                   <a href="<?php echo url_for('admin/user-detail.php?admin_id='. h(u($admins['admin_compo_id'])));?>" class="btn btn-primary">View Details</a>
                  </td>
                </tr>
              <?php endwhile;?>
               
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
    
    </div>
   
  </footer>


  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>

<script src="dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

<script src="dist/js/adminjs.js"></script>

<script>
  $(function () {
    //$("#usermanagement a:contains('User Management')").parent().addClass('active');
    //for tables regular datatable


    var admin_compo_id = document.getElementById("admin_compo_id");
    admin_compo_id = "<?= 'HHIADMIN'.date("ymdhis") . abs(rand('0','9'));  ?>";
    $('#admin_compo_id').val(admin_compo_id);
  });
</script>
</body>
</html>
