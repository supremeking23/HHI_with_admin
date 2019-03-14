<?php 
  require_once('initialize.php');
  require_login();
  

  if(!isset($_GET['event_id'])){
    redirect_to('dashboard.php');
  }

  $event_compo_id = $_GET['event_id'];

  if(is_post_request()){
    $event = [];
    $event['event_compo_id'] = $event_compo_id;
    $event['event_status'] = $_POST['event_status'] ?? '';
    $event['event_type'] = $_POST['event_type'] ?? '';
    $event['event_name'] = $_POST['event_name'] ?? '';
    $event['event_description'] = $_POST['event_description'] ?? '';
    $event['event_datestart'] = $_POST['event_datestart'] ?? '';
    $event['event_dateend'] = $_POST['event_dateend'] ?? '';  
    $event['event_timestart'] = $_POST['event_timestart'] ?? '';
    $event['event_timeend'] = $_POST['event_timeend'] ?? '';

    $result = update_event($event);
    if($result === true){
        $log = [];
        $log['log_compo_id'] = 'LOG'.date("ymdhis") . abs(rand('0','9'));
        $now = date('Y-m-d H:i:s');
        $log['log_date'] = $now;
        $log['log_userid'] = $_SESSION['admin_compo_id'];
        $log['log_user'] = $admin['username'];
        $log['log_usertype'] = $admin['admin_type'];
        $log['log_action'] = "Update Event information for event: ". $event['event_compo_id'];
        insert_log($log);
      $_SESSION['message'] = 'Event information has been updated.';
      redirect_to(url_for('admin/update-event.php?event_id='. h(u($event['event_compo_id']))));
    }else{
       $event =get_event_by_event_compo_id($event_compo_id);
      $errors = $result;
    }
  }else{
    //$admin = get_admin_by_admin_compo_id($admin_compo_id);
    $event =get_event_by_event_compo_id($event_compo_id);
  }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>HHI | Event Detail</title>
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
<body class="hold-transition skin-blue sidebar-mini" id="dashboard">
<div class="wrapper">

<?php include('includes_admin/header.php');?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php include('includes_admin/sidebar.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">


    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Event Detail for <?php echo $event['event_name'];?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-users"></i> HHI</a></li>
        <li><a href="<?php echo url_for('admin/dashboard.php')?>">Event</a></li>
        <li class="active">Event Detail</li>
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
          <div class="box">
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                <!--
                <li><a data-toggle="pill" href="#menu1">E</a></li>
                <li class="active"><a data-toggle="pill" href="#menu2">Menu 2</a></li>
                <li><a data-toggle="pill" href="#menu3">Menu 3</a></li>
                -->
                <li><a href="<?php echo h('dashboard.php')?>"><span class="fa fa-arrow-circle-left"></span>Back to List
                  </a>
              </ul> 

              
                </li>
            </div>
          </div>
        </div>
          <!-- /.box -->
        <div class="col-md-9">
          <div class="box">
            <div class="box-header">
              
            </div>
            <div class="box-body">
  <!--<div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <h3>HOME</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </div>
    <div id="menu1" class="tab-pane fade">
      <h3>Menu 1</h3>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>
    <div id="menu2" class="tab-pane fade">
      <h3>Menu 2</h3>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
    </div>
    <div id="menu3" class="tab-pane fade">
      <h3>Menu 3</h3>
      <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
    </div>
  </div> -->
                <form action="<?php echo $_SERVER['PHP_SELF'];?>?event_id=<?php echo h(u($event_compo_id));?>"  method="POST" class="form-horizontal">

                  <div class="form-group">
                    <label for="event_status" class="col-sm-2 control-label">Event Status</label>

                    <div class="col-sm-10">
                      <select class="form-control" id="event_status" name="event_status" placeholder="">
                        <option value="1" <?php if($event['event_status'] == 1) echo "selected";?> >Active</option>
                        <option value="0" <?php if($event['event_status'] == 0) echo "selected";?>>Not Active</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="admin_status" class="col-sm-2 control-label">Event Type</label>

                    <div class="col-sm-10">
                      <select class="form-control" id="event_type" name="event_type" placeholder="">
                        <option value="1" <?php if($event['event_type'] == 'urgent') echo "selected";?> >Urgent</option>
                        <option value="0" <?php if($event['event_type'] == 'normal') echo "selected";?>>Normal</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="event_name" class="col-sm-2 control-label">Event Name</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="event_name" name="event_name" placeholder="Event Name" value="<?php echo h($event['event_name']); ?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="event_description" class="col-sm-2 control-label">Event Description</label>

                    <div class="col-sm-10">
                      <textarea class="form-control" cols="100" rows="10" style="resize: none;" id="event_description" name="event_description"><?php echo $event['event_description'];?></textarea>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="event_datestart" class="col-sm-2 control-label">Event Date (Start)</label>

                    <div class="col-sm-10">
                      <input type="date" class="form-control" id="event_datestart" name="event_datestart" placeholder="Event Date" value="<?php echo h($event['event_datestart']); ?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="event_dateend" class="col-sm-2 control-label">Event Date (End)</label>

                    <div class="col-sm-10">
                      <input type="date" class="form-control" id="event_dateend" name="event_dateend" placeholder="Event Date" value="<?php echo h($event['event_dateend']); ?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="event_timestart" class="col-sm-2 control-label">Event Time (Start)</label>

                    <div class="col-sm-10">
                      <input type="time" class="form-control" id="event_timestart" name="event_timestart" placeholder="Event Time" value="<?php echo h($event['event_timestart']); ?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="event_timeend" class="col-sm-2 control-label">Event Time (End)</label>

                    <div class="col-sm-10">
                      <input type="time" class="form-control" id="event_timeend" name="event_timeend" placeholder="Event Time" value="<?php echo h($event['event_timeend']); ?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <input type="submit" name="submit" value="Save" class="btn btn-primary">
                    </div>
                  </div>
                </form>

            </div>
          </div>
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
