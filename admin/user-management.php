<?php 
  require_once('initialize.php');
  //echo dirname(__FILE__);
  //constant
  /*define("SITE_URL",dirname(__FILE__));
  //echo SITE_URL;
  define("SHARED_PATH",dirname(__FILE__).'\includes_admin');
 // echo SHARED_PATH;*/

  
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

<?php include('includes_admin/header.php');?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php include('includes_admin/sidebar.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User Management
        <small>List</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">User Management</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <?php /*
            echo display_errors($errors);
        */?>


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
                                      <td><b>First Name</b></td>
                                      <td><input type="text" class="form-control" name="firstname"></td>
                                    </tr>
                                    <tr>
                                      <td><b>Middle Name</b></td>
                                      <td><input type="text" class="form-control" name="middlename"></td>
                                    </tr>
                                    <tr>
                                      <td><b>Last Number</b></td>
                                      <td><input type="text" class="form-control" name="lastname"></td>
                                    </tr>
                                    <tr>
                                      <td><b>Username</b></td>
                                      <td><input type="text" class="form-control" name="username"></td>
                                    </tr>

                                    <tr>
                                      <td><b>Password</b></td>
                                      <td><input type="password" class="form-control"  name="password"></td>
                                    </tr> 

                                    <tr>
                                      <td><b>Confirm Password</b></td>
                                      <td><input type="password" class="form-control"  name="confirm-password"></td>
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
              <table id="" class="datatables table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th>Full Name</th>
                  <th>username</th>
                  <th>Email</th>
                  <th>Contant Number</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

                <?php 
                $admin_list =get_all_admins();

                while($admins = mysqli_fetch_assoc($admin_list)):?>
                <tr>
                  <td><?php echo $admins['firstname'].' '. $admins['middlename'].' '. $admins['lastname'];?></td>
                  <td><?php echo $admins['username']?></td>
                  <td><?php echo $admins['email']?></td>
                  <td><?php echo $admins['contact']?></td>
                  <td><?php echo $admins['admin_status']?></td>
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
    $('.datatables').DataTable({

      "lengthMenu": [[ 20,30,50, 70, -1], [ 20,30,50,70, "All"]],
      'paging'      : true,
      //'lengthChange': false,
      //'searching'   : false,
      'ordering'    : false,
      'info'        : true,
      //'autoWidth'   : false,      
    });
  })
</script>
</body>
</html>
