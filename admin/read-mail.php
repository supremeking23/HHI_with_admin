<?php 
  require_once('initialize.php');
  //echo dirname(__FILE__);
  //constant
  /*define("SITE_URL",dirname(__FILE__));
  //echo SITE_URL;
  define("SHARED_PATH",dirname(__FILE__).'\includes_admin');
 // echo SHARED_PATH;*/
  require_login();

  if(!isset($_GET['message_id'])){
    redirect_to('message.php');
  }

  $message_compo_id = $_GET['message_id'];
  $message_detail = get_message_by_message_compo_id($message_compo_id);
  //echo $message_detail['sender_id'];
  $sender = get_admin_by_admin_compo_id($message_detail['sender_id']);
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
<body class="hold-transition skin-blue sidebar-mini" id="message">
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
        Read Mail
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-users"></i> HHI</a></li>
        <li><a href="<?php echo url_for('admin/message.php')?>">Messages</a></li>
        <li class="active">Message Detail</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">
          <a href="<?php echo url_for('admin/compose-message.php')?>" class="btn btn-primary btn-block margin-bottom">Compose</a>

          <?php include(SHARED_PATH.'/message_folder.php');?>

          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="box">

            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-read-info">
                <h3><?php echo $message_detail['subject'];?></h3>
                <?php 


                ?>
                <h5>From: <?php echo $sender['email'] ?>
                  <span class="mailbox-read-time pull-right">
                  <?php 
                      $date =date_create($message_detail['date_send']);
                      echo  $formated_date= date_format($date,"F d, Y h:i:sa");
                    ?>
                 </span></h5>
              </div>
              <!-- /.mailbox-read-info -->

              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
                <?php echo  $message_detail['message_body']?>
              </div>
              <!-- /.mailbox-read-message -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">

               <?php 
                  $attachments =  get_attachment_by_message_compo_id($message_compo_id);
                  while($attachment = mysqli_fetch_assoc($attachments)):
                ?>
                <?php 
                  $ext =  strtolower(substr($attachment['attachment'] , strpos($attachment['attachment'] , '.') + 1));
                  $ext_class = '';
                  if($ext == 'docx'){
                    $ext_class = "fa-file-word-o";
                  }else if($ext == 'pdf'){
                    $ext_class = "fa-file-pdf-o";
                  }else if($ext == 'xlsm'){
                    $ext_class = "fa-file-excel-o";
                  }
                ?>

              
              <ul class="mailbox-attachments clearfix">

              <?php if(!empty($attachment['attachment'])):?>
                <li>
                  <span class="mailbox-attachment-icon"><i class="fa <?php echo $ext_class;?>"></i></span>

                  <div class="mailbox-attachment-info">
                    <a href="<?php echo url_for('admin/uploads/message_files/'.$attachment['attachment'])?>" download class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> <?php echo $attachment['attachment']?></a>
                        <span class="mailbox-attachment-size">
                          1,245 KB
                          <a href="<?php echo url_for('admin/uploads/message_files/'.$attachment['attachment'])?>" class="btn btn-default btn-xs pull-right" download><i class="fa fa-cloud-download"></i></a>
                        </span>
                  </div>
                </li>
               <?php endif;?>
               <?php endwhile;?>
                
                
              </ul>               
             

            </div>
            <!-- /.box-footer -->
            <div class="box-footer">
              <div class="pull-right">
                <button type="button" class="btn btn-default"><i class="fa fa-reply"></i> Reply</button>
                <button type="button" class="btn btn-default"><i class="fa fa-share"></i> Forward</button>
              </div>
              <button type="button" class="btn btn-default"><i class="fa fa-trash-o"></i> Delete</button>
              <button type="button" class="btn btn-default"><i class="fa fa-print"></i> Print</button>
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
