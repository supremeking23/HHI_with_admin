<?php 
  require_once('initialize.php');
  //echo dirname(__FILE__);
  //constant
  /*define("SITE_URL",dirname(__FILE__));
  //echo SITE_URL;
  define("SHARED_PATH",dirname(__FILE__).'\includes_admin');
 // echo SHARED_PATH;*/
  require_login();


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
<body class="hold-transition skin-blue sidebar-mini" id="archive">
<div class="wrapper">

<?php include(SHARED_PATH.'/header.php');?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php include(SHARED_PATH.'/sidebar.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Archive
        <small>Section</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li class="active">Archive</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
       
        <div class="col-md-12">

        </div>

      </div>
      <div class="row">

        <div class="col-md-3">

          <div class="box">

            <!-- /.box-header -->
            <div class="box-body">
              <ul class="nav nav-pills nav-stacked">
                <li class="active"><a data-toggle="tab" href="#inquiries">Inquiries</a></li>
                <li><a data-toggle="tab" href="#jobseeker">Jobseekers</a></li>
                <li><a data-toggle="tab" href="#client">Clients</a></li>

              </ul>
            </div>
            

            </div>
              
        </div>
        <div class="col-md-9">
          <div class="box">
            <div class="box-body">
                <div class="tab-content">
                  <div id="inquiries" class="tab-pane fade in active">
                    <h3>Inquiries</h3>
                    <table id="" class="datatables table table-bordered table-striped table-hover">
                      <thead>
                      <tr>
                        <th>Inquiry Id</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th></th>
                      </tr>
                      </thead>
                      <tbody>

                      <?php 
                      $inquiry_list =get_all_inquiries_in_archive();

                      while($inquiries = mysqli_fetch_assoc($inquiry_list)):?>
                      <tr>
                        <td><?php echo h($inquiries['inquiries_compo_id'])?></td>
                        <td><?php echo h($inquiries['name']);?></td>
                        <td><?php echo h($inquiries['email']);;?></td>
                        <td>
                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#readMessage<?php echo $inquiries['inquiries_id']?>">Read Message</button>
                          <!-- Modal -->
                          <div id="readMessage<?php echo $inquiries['inquiries_id']?>" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">Inquiry Detail</h4>
                                </div>
                                <div class="modal-body">
                                  <p><?php echo h($inquiries['message'])?></p>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                              </div>

                            </div>
                          </div>
                        </td>
                      
                        <td>
                        
                        </td>
                      </tr>
                    <?php endwhile;?>
                     
                      </tbody>
                    </table>
                  </div>
                  <div id="jobseeker" class="tab-pane fade">
                    <h3>Jobseekers</h3>
                    <table id="" class="datatables table table-bordered table-striped table-hover">
                      <thead>
                      <tr>
                        <th >Jobseeker Id</th>
                        <th >Full Name</th>
                        <th>Email</th>
                        <th>Resume</th>
                        <th></th>
                      </tr>
                      </thead>
                      <tbody>

                      <?php 
                      $jobseeker_list =get_all_jobseekers_in_archive();

                      while($jobseekers = mysqli_fetch_assoc($jobseeker_list)):?>
                      <tr>
                        <td><?php echo h($jobseekers['jobseeker_compo_id'])?></td>
                        <td><?php echo h($jobseekers['firstname'] .' '. $jobseekers['middlename'].' '.$jobseekers['lastname']);?></td>
                        <td><?php echo h($jobseekers['email']);;?></td>
                        <td>
                           <a data-tooltip="tooltip" data-title="Click here to download file" href="<?php echo url_for('admin/uploads/jobseeker_files/'.$jobseekers['file'])?>" class="mailbox-attachment-name"><i class="fa fa-paperclip" download></i> <?php echo h($jobseekers['file'])?></a>
                        </td>
                      
                        <td>
                        
                        </td>
                      </tr>
                    <?php endwhile;?>
                     
                      </tbody>
                    </table>
                  </div>
                  <div id="client" class="tab-pane fade">
                    <h3>Clients</h3>
                    <table id="" class="datatables table table-bordered table-striped table-hover">
                      <thead>
                      <tr>
                        <th>Client Id</th>
                        <th >Full Name</th>
                        <th>Email</th>
                        <th>MRF</th>
                        <th></th>
                      </tr>
                      </thead>
                      <tbody>

                      <?php 
                      $client_list =get_all_clients_in_archive();

                      while($clients = mysqli_fetch_assoc($client_list)):?>
                      <tr>
                        <td><?php echo h($clients['client_compo_id'])?></td>
                        <td><?php echo h($clients['firstname'] .' '. $clients['middlename'].' '.$clients['lastname']);?></td>
                        <td><?php echo h($clients['email']);;?></td>
                        <td>
                           <a data-tooltip="tooltip" data-title="Click here to download file" href="<?php echo url_for('admin/uploads/client_files/'.$clients['man_power_file'])?>" class="mailbox-attachment-name"><i class="fa fa-paperclip" download></i> <?php echo h($clients['man_power_file'])?></a>
                        </td>
                      
                        <td>
                        
                        </td>
                      </tr>
                    <?php endwhile;?>
                     
                      </tbody>
                    </table>
                  </div>
                </div>
            </div>
          
          </div>
          
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
