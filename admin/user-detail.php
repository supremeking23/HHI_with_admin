<?php 
  require_once('initialize.php');
  require_login();
  

  if(!isset($_GET['admin_id'])){
    redirect_to('user-management.php');
  }

  $admin_compo_id = $_GET['admin_id'];

  if(is_post_request()){
    $admin = [];
    $admin['admin_compo_id'] = $admin_compo_id;
    $admin['firstname'] = $_POST['firstname'] ?? '';
    $admin['middlename'] = $_POST['middlename'] ?? '';
    $admin['lastname'] = $_POST['lastname'] ?? '';
    $admin['contact'] = $_POST['contact'] ?? '';
    $admin['email'] = $_POST['email'] ?? '';
    $admin['username'] = $_POST['username'] ?? '';  
    $admin['password'] = $_POST['password'] ?? '';
    $admin['confirm_password'] = $_POST['confirm_password'] ?? '';
    //$admin['admin_type'] = "ADMIN";
    $admin['admin_status'] = $_POST['admin_status'];

    $result = update_admin($admin);
    if($result === true){
        $log = [];
        $log['log_compo_id'] = 'LOG'.date("ymdhis") . abs(rand('0','9'));
        $now = date('Y-m-d H:i:s');
        $log['log_date'] = $now;
        $log['log_userid'] = $_SESSION['admin_compo_id'];
        $log['log_user'] = $admin['username'];
        $log['log_usertype'] = $admin['admin_type'];
        $log['log_action'] = "Update Information for user ". $admin['admin_compo_id'];
        insert_log($log);
      $_SESSION['message'] = 'Admin updated.';
      redirect_to(url_for('admin/user-detail.php?admin_id='. h(u($admin['admin_compo_id']))));
    }else{
       $admin = get_admin_by_admin_compo_id($admin_compo_id);
      $errors = $result;
    }
  }else{
    $admin = get_admin_by_admin_compo_id($admin_compo_id);
  }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>HHI | User Profile</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="shortcut icon" href="<?php echo WWW_ROOT;?>/img/logo.jpg" />
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
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
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini" id="usermanagement">
<div class="wrapper">

<?php include('includes_admin/header.php');?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php include('includes_admin/sidebar.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">


    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-users"></i> HHI</a></li>
        <li><a href="<?php echo url_for('admin/user-management.php')?>">User Management</a></li>
        <li class="active">User profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
           <div class="col-sm-12">
              <?php echo display_errors($errors); 
              echo display_session_message();?>
           </div>
    
      </div>

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">

            <a role="button" data-toggle="modal" data-target="#updateProfile" data-tooltip="tooltip" data-title="click to edit profile picture">
              <?php if(empty($admin['photo'])){ ?>
                <img class="profile-user-img img-responsive img-circle" src="uploads/images/guest2.jpg" alt="User profile picture">
              <?php }else{ ?>
                <img class="profile-user-img img-responsive img-circle" src="uploads/images/<?php echo $admin['photo']?>" alt="User profile picture">
              <?php }?>
            </a>

            <div class="modal fade" id="updateProfile">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Update Profile Picture</h4>
                  </div>

                  <form action="<?php echo url_for('admin/includes_admin/upload_functions.php');?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                       <input type="hidden" name="admin_compo_id" value="<?php echo $admin_compo_id;?>">
                      <input type="file" id="photo" name="photo" class="form-control" onchange="document.getElementById('admin_Image').src = window.URL.createObjectURL(this.files[0])" required="" >

                      <div id="image_viewer" style="margin-top: 5px"> 
                        <img  id="admin_Image"  class="img-rounded" alt="" width="100%" height="200" src="" /></div>

                    </div>
                    <div class="modal-footer"> 
                      <input type="submit" name="update_user_profile" value="Update" class="btn btn-primary">
                    </div>
                  </form>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->

              <h3 class="profile-username text-center"><?php echo $admin['firstname'].' '.$admin['middlename'].' '.$admin['lastname'];?></h3>

              <p class="text-muted text-center"><?php echo $admin['admin_type'];?></p>

             

             <!-- <a href="<?php echo url_for('admin/user-management.php');?>" class="btn btn-default btn-block bg-green color-palette"><b>Back to user list</b></a> -->
              <ul class="nav nav-pills nav-stacked">
                <li><a href="<?php echo url_for('admin/user-management.php');?>"><span class="fa fa-arrow-circle-left"></span>Back to List
                  </a></li>
                
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->


          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#details" data-toggle="tab">Details</a></li>
              
              <li><a href="#settings" data-toggle="tab">Update Details</a></li>
              <li><a href="#admin_logs" data-toggle="tab">Admin Logs</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="details">
                <div class="row">
                  <div class="col-md-9">
                          <dl class="dl-horizontal">
                            <dt>Full Name</dt>
                            <dd><?php echo $admin['firstname'].' '.$admin['middlename'].' '.$admin['lastname'];?></dd>
                            <dt>Contact</dt>
                            <dd><?php echo $admin['contact']?></dd>
                           
                            <dt>Email</dt>
                            <dd><?php echo $admin['email']?></dd>
                            <dt>Username</dt>
                            <dd><?php echo $admin['username']?> </dd>
                          </dl>
                  </div>
                </div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="admin_logs">
                <table id="" class="datatables table table-bordered table-striped table-hover">
                  <thead>
                  <tr>
                    <th>Date</th>
                    <th>Action</th>
                   
                  </tr>
                  </thead>
                  <tbody>

                  <?php 
                  $log_list = view_logs_by_user_id($admin_compo_id);

                  while($logs = mysqli_fetch_assoc($log_list)):?>
                  <tr>
                    <td><?php 
                      $date =date_create($logs['log_date']);
                      echo  $formated_date= date_format($date,"F d, Y h:i:sa");
                    ?></td>
                    <td><?php echo $logs['log_action']?></td>
                    
 
                  </tr>
                  <?php endwhile;?>
                 
                  </tbody>
                </table>
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="settings">
                <form action="<?php echo $_SERVER['PHP_SELF'];?>?admin_id=<?php echo h(u($admin_compo_id));?>"  method="POST" class="form-horizontal">

                  <div class="form-group">
                    <label for="admin_status" class="col-sm-2 control-label">Admin Status</label>

                    <div class="col-sm-10">
                      <select class="form-control" id="admin_status" name="admin_status" placeholder="">
                        <option value="1" <?php if($admin['admin_status'] == 1) echo "selected";?> >Active</option>
                        <option value="0" <?php if($admin['admin_status'] == 0) echo "selected";?>>Not Active</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="firstname" class="col-sm-2 control-label">First Name</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name" value="<?php echo h($admin['firstname']); ?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="middlename" class="col-sm-2 control-label">Middle Name</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="middlename" name="middlename" placeholder="Middle Name" value="<?php echo h($admin['middlename']); ?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="lastname" class="col-sm-2 control-label">Last Name</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name" value="<?php echo h($admin['lastname']); ?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="contact" class="col-sm-2 control-label">Contact</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="contact" name="contact" placeholder="Contact Number" value="<?php echo h($admin['contact']); ?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo h($admin['email']); ?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="username" class="col-sm-2 control-label">Username</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="username" id="username" placeholder="username" value="<?php echo h($admin['username']); ?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="new_password" class="col-sm-2 control-label">New Password</label>

                    <div class="col-sm-10">
                      <input type="password" name="password" class="form-control" id="new_password" placeholder="New Password">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="confirm_password" class="col-sm-2 control-label">Confirm Password</label>

                    <div class="col-sm-10">
                      <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Confirm Password">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <input type="submit" name="submit" value="Save" class="btn btn-primary">
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>


  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="dist/js/adminjs.js"></script>
</body>
</html>
