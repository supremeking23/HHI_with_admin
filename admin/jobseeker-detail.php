<?php 
  require_once('initialize.php');

  require_login();
  if(!isset($_GET['jobseeker_id'])){
    redirect_to('jobseeker.php');
  }


  $jobseeker = get_jobseeker_by_jobseeker_compo_id($_GET['jobseeker_id']);
 

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>HHI | Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <link rel="shortcut icon" href="../img/logo.jpg" />
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
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
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
<link rel="stylesheet" type="text/css" href="dist/css/hhiadmin.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini" id="jobseeker">
<div class="wrapper">

<?php include('includes_admin/header.php');?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php include('includes_admin/sidebar.php');?>
  <!-- Left side column. contains the logo and sidebar -->


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Jobseeker Detail
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-question-circle"></i> HHI</a></li>
        <li><a href="<?php echo url_for('admin/jobseeker.php')?>">Jobseekers</a></li>
        <li class="active">Jobseeker Detail</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!--<div class="col-md-3">
          <a href="compose.html" class="btn btn-primary btn-block margin-bottom">Compose</a>

          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Folders</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li><a href="mailbox.html"><i class="fa fa-inbox"></i> Inbox
                  <span class="label label-primary pull-right">12</span></a></li>
                <li><a href="#"><i class="fa fa-envelope-o"></i> Sent</a></li>
                <li><a href="#"><i class="fa fa-file-text-o"></i> Drafts</a></li>
                <li><a href="#"><i class="fa fa-filter"></i> Junk <span class="label label-warning pull-right">65</span></a>
                </li>
                <li><a href="#"><i class="fa fa-trash-o"></i> Trash</a></li>
              </ul>
            </div>
         
          </div>
         
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Labels</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li><a href="#"><i class="fa fa-circle-o text-red"></i> Important</a></li>
                <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> Promotions</a></li>
                <li><a href="#"><i class="fa fa-circle-o text-light-blue"></i> Social</a></li>
              </ul>
            </div>
            
          </div>
          
        </div> -->
        <!-- /.col -->
        <div class="col-md-3">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>

              <div class="box-tools">
               
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li><a href="<?php echo h('jobseeker.php')?>"><span class="fa fa-arrow-circle-left"></span>Back to List
                  </a></li>
                
              </ul>
            </div>
         
          </div>
        </div>


        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo $jobseeker['firstname'].' '. $jobseeker['middlename'].' '. $jobseeker['lastname'];?></h3>


            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-read-info">
                <h3><?php echo h($jobseeker['subject'])?></h3>
                <h5>From: <?php echo h($jobseeker['email']);?>
                  <span class="mailbox-read-time pull-right">
                    <?php 
                      $date =date_create($jobseeker['date_send']);
                      echo  $formated_date= date_format($date,"F d, Y h:i:sa");
                    ?>
                  </span></h5>
              </div>
              <!-- /.mailbox-read-info -->
 
              
              <div class="mailbox-read-message">
               <?php echo h($jobseeker['message']);?>
              </div>
              <!-- /.mailbox-read-message -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <hr>
              <h3>Attached Files</h3>
              <ul class="mailbox-attachments clearfix">
                <li>
                  <?php 
                    $ext =  strtolower(substr($jobseeker['file'] , strpos($jobseeker['file'] , '.') + 1));
                    $ext_class = '';
                    if($ext == 'docx'){
                      $ext_class = "fa-file-word-o";
                    }else if($ext == 'pdf'){
                      $ext_class = "fa-file-pdf-o";
                    }
                  ?>
                  <span class="mailbox-attachment-icon"><i class="fa <?php echo $ext_class;?>"></i></span>

                  <div class="mailbox-attachment-info">
                    <a data-tooltip="tooltip" data-title="Click here to download file" href="<?php echo url_for('admin/uploads/jobseeker_files/'.$jobseeker['file'])?>" class="mailbox-attachment-name"><i class="fa fa-paperclip" download></i> <?php echo h($jobseeker['file'])?></a>
                        <span class="mailbox-attachment-size">
                          
                          <!--<a href="<?php echo url_for('admin/uploads/jobseeker_files/'.$jobseeker['file'])?>" class="btn btn-default btn-xs pull-right" download><i class="fa fa-cloud-download"></i></a> -->
                        </span>
                  </div>
                </li>

                
              </ul>
            </div> 
            <!-- /.box-footer -->
            <div class="box-footer">
              <div class="pull-right">
                <!--<button type="button" class="btn btn-default"><i class="fa fa-trash-o"></i> Delete</button>
                <button type="button" class="btn btn-default"><i class="fa fa-print"></i> Print</button> -->
                <form>
                  <!--<input type="submit" name="archieve" id="archieve" value="Archieve" class="btn btn-danger"> -->
                  <button type="submit" class="btn btn-danger">Archieve <span class="fa fa-trash-o"></span></button>
                </form>
              </div>
              
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /. box -->
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
      
    </div>
   
  </footer>
  <!-- Control Sidebar -->

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
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

<script src="dist/js/adminjs.js"></script>
</body>
</html>
