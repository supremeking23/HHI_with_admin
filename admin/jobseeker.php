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
        $jobseeker = [];
        $jobseeker['jobseeker_compo_id'] = $_POST['jobseeker_compo_id'] ?? '';
        $jobseeker['firstname'] = $_POST['firstname'] ?? '';
        $jobseeker['middlename'] = $_POST['middlename'] ?? '';
        $jobseeker['lastname'] = $_POST['lastname'] ?? '';
        $jobseeker['gender'] = $_POST['gender'] ?? '';
        $jobseeker['contact'] = $_POST['contact'] ?? '';
        $jobseeker['email'] = $_POST['email'] ?? '';
        $jobseeker['subject'] = $_POST['subject'] ?? '';
        //$jobseeker['message'] = $_POST['message'] ?? '';
        $jobseeker['data_status'] = 1;
        $jobseeker['added_by'] = $_SESSION['admin_compo_id'];


        $now = date('Y-m-d H:i:s');
        $jobseeker['date_send'] = $now;

        
        $resume_file = $_FILES['resume_file']['name'];
        $resume_file_tmp =$_FILES['resume_file']['tmp_name'];
        $jobseeker['file'] = $resume_file;
        
        $result = insert_jobseeker_files($jobseeker);
        if($result === true){
          $log = [];
          $log['log_compo_id'] = 'LOG'.date("ymdhis") . abs(rand('0','9'));
          $now = date('Y-m-d H:i:s');
          $log['log_date'] = $now;
          $log['log_userid'] = $_SESSION['admin_compo_id'];
          $log['log_user'] = $_SESSION['username'];
          $log['log_usertype'] = $_SESSION['admin_type'];
          $log['log_action'] = "Add new jobseeker detail Jobseeker Id: ". $jobseeker['jobseeker_compo_id'];
          insert_log($log);
          $_SESSION['message'] = "Jobseeker data has been added successfuly";
          move_uploaded_file($resume_file_tmp, "uploads/jobseeker_files/$resume_file");
        }else{
          $errors = $result;
        }
    }else{
        $jobseeker = [];
        $jobseeker['firstname'] =  '';
        $jobseeker['middlename'] =  '';
        $jobseeker['lastname'] = '';
        $jobseeker['gender'] =   '';
        $jobseeker['contact'] =  '';
        $jobseeker['email'] =  '';
        $jobseeker['subject'] =  '';
        //$jobseeker['message'] =  '';
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
    .btn-primary{
      background: 
    }
  </style>
</head>
<body class="hold-transition skin-blue sidebar-mini" id="jobseeker">
<div class="wrapper">

<?php include(SHARED_PATH.'/header.php');?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php include(SHARED_PATH.'/sidebar.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Jobseeker
        <small>List</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Jobseeker</li>
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
                   <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#add-user" style="margin-bottom: 10px">Add Jobseeker</button>
                    <div class="modal fade" id="add-user">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Jobseeker Details</h4>
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
                                      <td><b>Jobseeker ID</b></td>
                                      <td><input type="text" class="form-control" name="jobseeker_compo_id" id="jobseeker_compo_id" readonly=""></td>
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
                                      <td><b>Gender</b></td>
                                      <td>
                                        <select class="form-control" id="gender" name="gender">
                                           
                                           <option value="male">Male</option>
                                           <option value="female">Female</option>
                                        </select>
                                      </td>
                                    </tr>

                                    <tr>
                                      <td><b>Contact</b></td>
                                      <td> <input type="text" class="form-control input-text-color" placeholder="" id="contact" name="contact"></td>
                                    </tr>
                                    <tr>
                                      <td><b>Email</b></td>
                                      <td> <input type="text" class="form-control input-text-color" placeholder="" id="email" name="email"></td>
                                    </tr>

                                    <tr>
                                      <td><b>Subject</b></td>
                                      <td><input type="text" name="subject" id="subject" class="form-control"></td>
                                    </tr> 

                                    <tr>
                                      <td><b>Resume</b></td>
                                      <td><input type="file" name="resume_file" id="resume_file" ></td>
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
                  <th>Full Name</th>
                  <th>Email</th>
                  <th>Phone Number</th>
                  <th>Subject</th>
                  <th>Date Added</th>
                  <th>Added By</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>

                <?php 
                $jobseeker_list = get_all_jobseeker_files();

                while($jobseekers = mysqli_fetch_assoc($jobseeker_list)):?>
                <tr>
                  <td><?php echo $jobseekers['firstname'].' '. $jobseekers['middlename'].' '. $jobseekers['lastname'];?></td>
                  <td><?php echo $jobseekers['email']?></td>
                  <td><?php echo $jobseekers['contact']?></td>
                  <td><?php echo $jobseekers['subject']?></td>
                  <td><?php echo $jobseekers['date_send']?></td>
                  <td><?php 
                    if(empty($jobseekers['added_by'])){
                      echo "Jobseeker submit their data through the HHI web portal";
                    }else{
                      $user = get_admin_by_admin_compo_id($jobseekers['added_by']);
                      echo h( $user['firstname'].' '. $user['lastname']);
                      //echo $clients['added_by'];
                    }
                   ?></td>
                  <td>
                     <a href="<?php echo url_for('admin/jobseeker-detail.php?jobseeker_id='. h(u($jobseekers['jobseeker_compo_id'])));?>" class="btn btn-primary">View Details</a>
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
            var jobseeker_compo_id = document.getElementById("jobseeker_compo_id");
            jobseeker_compo_id = "<?= 'JOBSEEKER'.date("ymdhis") . abs(rand('0','9'));  ?>";
            $('#jobseeker_compo_id').val(jobseeker_compo_id);
        });
</script>
</body>
</html>
