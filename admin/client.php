<?php 
  require_once('initialize.php');
  //echo dirname(__FILE__);
  //constant
  /*define("SITE_URL",dirname(__FILE__));
  //echo SITE_URL;
  define("SHARED_PATH",dirname(__FILE__).'\includes_admin');
 // echo SHARED_PATH;*/
  require_login();

  if(is_post_request()){
    $client = [];
    $client['client_compo_id'] = $_POST['client_compo_id'] ?? '';
    $client['firstname'] = $_POST['firstname'] ?? '';
    $client['middlename'] = $_POST['middlename'] ?? '';
    $client['lastname'] = $_POST['lastname'] ?? '';
    $client['company'] = $_POST['company'] ?? '';
    $client['position_in_company'] = $_POST['position_in_company'] ?? '';
    $client['company_size'] = $_POST['company_size'] ?? '';
    $client['industry'] = $_POST['industry'] ?? '';
    $client['email'] = $_POST['email'] ?? '';
    $client['contact'] = $_POST['contact'] ?? '';
    //$client['zip_code'] = $_POST['zip_code'] ?? '';
    //$client['message'] = $_POST['message'] ?? '';
    $client['data_status'] = 1;


    $now = date('Y-m-d H:i:s');
    $client['date_send'] = $now;

    
    $man_power_file = $_FILES['man_power_file']['name'];
    $man_power_file_tmp =$_FILES['man_power_file']['tmp_name'];
    $client['man_power_file'] = $man_power_file;
    $client['added_by'] = $_SESSION['admin_compo_id'];

    $result = insert_client_files($client);
    if($result === true){

      $log = [];
      $log['log_compo_id'] = 'LOG'.date("ymdhis") . abs(rand('0','9'));
      $now = date('Y-m-d H:i:s');
      $log['log_date'] = $now;
      $log['log_userid'] = $_SESSION['admin_compo_id'];
      $log['log_user'] = $_SESSION['username'];
      $log['log_usertype'] = $_SESSION['admin_type'];
      $log['log_action'] = "Add new client detail Client Id: ". $client['client_compo_id'];
      insert_log($log);
      $_SESSION['message'] = "Client data has been added successfuly";
      move_uploaded_file($man_power_file_tmp, "uploads/client_files/$man_power_file");
    }else{
      $errors = $result;
    }
  }else{

    $client = [];
    $client['firstname'] =  '';
    $client['middlename'] =  '';
    $client['lastname'] = '';
    $client['company'] =   '';
    $client['position_in_company'] =  '';
    $client['company_size'] =  '';
    $client['industry'] =  '';
    $client['email'] =  '';
    $client['contact'] =  '';
    //$client['zip_code'] =  '';
    //$client['message'] =  '';
    
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
  <link rel="shortcut icon" href="../img/logo.jpg" />
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
<body class="hold-transition skin-blue sidebar-mini" id="client">
<div class="wrapper">

<?php include('includes_admin/header.php');?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php include('includes_admin/sidebar.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Client
        <small>List</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Client</li>
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
                   <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#add-user" style="margin-bottom: 10px">Add Client</button>
                    <div class="modal fade" id="add-user">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Client Details</h4>
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
                                      <td><b>Client ID</b></td>
                                      <td><input type="text" class="form-control" name="client_compo_id" id="client_compo_id" readonly=""></td>
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
                                      <td><b>Last Number</b></td>
                                      <td><input type="text" class="form-control" name="lastname" id="lastname"></td>
                                    </tr>

                                    <tr>
                                      <td><b>Industry</b></td>
                                      <td><input type="text" class="form-control" name="industry" id="industry"></td>
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
                                      <td><b>Company</b></td>
                                      <td><input type="text" class="form-control" name="company" id="company"></td>
                                    </tr>

                                    <tr>
                                      <td><b>Position</b></td>
                                      <td><input type="text" class="form-control" name="position_in_company" id="position_in_company"></td>
                                    </tr>

                                    <tr>
                                      <td><b>Manpower Request Form</b></td>
                                      <td><input type="file" class="" name="man_power_file" id="man_power_file"></td>
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
                  <th>Client ID</th>
                  <th>Company</th>
                  <th>Full Name</th>
                  <th>Email</th>
                  <th>Phone Number</th>
                  <th>Position in the Company</th>
                  <th>Date Added</th>
                  <th>Added By</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

                <?php 
                $client_list = get_all_client_files();
                while($clients = mysqli_fetch_assoc($client_list)):?>
                <tr>
                  <td><?php echo $clients['client_compo_id'];?></td>
                  <td><?php echo $clients['company'];?></td>
                  <td><?php echo $clients['firstname'].' '. $clients['middlename'].' '. $clients['lastname'];?></td>
                  <td><?php echo $clients['email'];?></td>
                  <td><?php echo $clients['contact'];?></td>
                  <td><?php echo $clients['position_in_company'];?></td>
                  <td><?php echo $clients['date_send'];?></td>
                  <td><?php 
                    if(empty($clients['added_by'])){
                      echo "Client submit their data through the HHI web portal";
                    }else{
                      $user = get_admin_by_admin_compo_id($clients['added_by']);
                      echo h( $user['firstname'].' '. $user['lastname']);
                      //echo $clients['added_by'];
                    }
                   ?></td>
                  <td>
                    <a href="<?php echo url_for('admin/client-detail.php?client_id='. h(u($clients['client_compo_id'])));?>" class="btn btn-primary">View Details</a>
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
            $().ready(function() {
                var client_compo_id = document.getElementById("client_compo_id");
                client_compo_id = "<?= 'CLIENT'.date("ymdhis") . abs(rand('0','9'));  ?>";
                $('#client_compo_id').val(client_compo_id);
            });
</script>
</body>
</html>
