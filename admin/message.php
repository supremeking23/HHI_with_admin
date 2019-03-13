<?php 
  require_once('initialize.php');
  //echo dirname(__FILE__);
  //constant
  /*define("SITE_URL",dirname(__FILE__));
  //echo SITE_URL;
  define("SHARED_PATH",dirname(__FILE__).'\includes_admin');
 // echo SHARED_PATH;*/
  require_login();
  /*if(is_post_request()){

  }else{
    
  }*/

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
 
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/skin-hhi.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
 
   <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
 <link rel="stylesheet" type="text/css" href="dist/css/hhiadmin.css">

  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini" id="message">
<div class="wrapper">

  <?php include('includes_admin/header.php');?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php include('includes_admin/sidebar.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Messages
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li class="active">Messages</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      
     <div class="row">
        <div class="col-md-3">
          <a href="<?php echo url_for('admin/compose-message.php')?>" class="btn btn-primary btn-block margin-bottom">Compose</a>

          <?php include(SHARED_PATH.'/message_folder.php');?>
          <!-- /. box -->

        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="box ">
            <div class="box-header with-border">
              <h3 class="box-title">Inbox</h3>

              <!--<div class="box-tools pull-right" style="">
                <div class="row">
                  <form class="" style="position: relative;right: 10px">
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Search">
                      <div class="input-group-btn">
                        <button class="btn btn-default" type="submit">
                          <i class="glyphicon glyphicon-search"></i>
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
                <br />
              </div> -->
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-controls">
                <!-- Check all button -->
                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
               
                </div>
                <!-- /.btn-group -->
                <button type="button" class="btn btn-default btn-sm" id="refresh"><i class="fa fa-refresh"></i></button>

                  <!-- /.btn-group -->
                </div>
                <!-- /.pull-right -->
              </div>
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <tbody>
                    <?php $inbox_list = get_inbox_for_current_user($_SESSION['admin_compo_id']);

                    ?>

                  <?php $num_row = mysqli_num_rows($inbox_list);
                      //echo $num_row;
                  $item_per_page = 3;
                  $totalpages = ceil($num_row/$item_per_page);
                  if(isset($_GET['page']) && !empty($_GET['page'])){
                    $page = $_GET['page'];
                    if($page > $totalpages){
                      redirect_to('message.php?page=1');
                    }
                  }else{
                    $page = 1;
                  }

                  $offset = ($page -1) * $item_per_page;
                  /*"SELECT a.sender_id, a.subject, a.message_body,a.date_send,b.recipient_id,b.recipient_message_status,a.message_compo_id FROM tbl_messages a JOIN tbl_message_recipients b ON a.message_compo_id = b.message_compo_id WHERE b.recipient_id = '"$_SESSION['admin_compo_id']"' ORDER BY a.message_id DESC*/
                  //$sql = "SELECT * FROM tbl_messages WHERE  ORDER BY message_id DESC LIMIT $item_per_page OFFSET $offset ";
                  $sql = "SELECT a.sender_id, a.subject, a.message_body,a.date_send,b.recipient_id,b.recipient_message_status,a.message_compo_id FROM tbl_messages a JOIN tbl_message_recipients b ON a.message_compo_id = b.message_compo_id WHERE b.recipient_id = '".$_SESSION['admin_compo_id']."' ORDER BY a.message_id DESC LIMIT $item_per_page OFFSET $offset";
                  $result = mysqli_query($db,$sql);
                  $row_count = mysqli_num_rows($result);
                  while($inbox= mysqli_fetch_assoc($result)):
                  ?>

                  <tr>
                    <td><input type="checkbox"></td>
                    <td class="mailbox-star"><a href="#"><i class="fa fa-star-o text-yellow"></i></a></td>
                    <?php $sender = get_admin_by_admin_compo_id($inbox['sender_id']);?>
                    <td class="mailbox-name"><a href="read-mail.php?message_id=<?php echo u($inbox['message_compo_id']);?>"><?php echo h($sender['firstname'].' '.$sender['middlename'].' '. $sender['lastname'])?></a></td>
                    <td class="mailbox-subject"><b><?php echo h($inbox['subject'])?></b> <?php echo limit_text($inbox['message_body'],10)?>
                    </td>

                    <td class="mailbox-date"><?php 
                      $date =date_create($inbox['date_send']);
                      echo  $formated_date= date_format($date,"F d, Y h:i:sa");
                    ?></td>
                  </tr>
                <?php endwhile;?>
                  </tbody>
                </table>


                <table class="table table-hover table-striped">
 
                  <tr></tr>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer no-padding">
              <div class="mailbox-controls">


                <div class="pull-right">

                <div class="pull-right">
                  <ul class="pagination">
                    <?php 
                    for($i=1;$i<$totalpages;$i++){
                      if($i == $page){ ?>
                        
                        <li class="active"><a href="#"><?php echo $i;?></a></li>
                    <?php }else{ ?>
                        <li><a href="message.php?page=<?php echo $i;?>"><?php echo $i;?></a></li>
                        
                    <?php   }
                    }
                    ?>
                    
                   
                  </ul> 
                </div>
                         
                  <?php 
                    /*for($i=1;$i<$totalpages;$i++){
                      if($i == $page){
                        echo "<a class=\"active\">".$i."</a>";
                      }else{
                        echo "<a href=\"message.php?page=".$i."\">".$i."</a>";
                      }
                    }*/
                  ?>
              
                  <!-- /.btn-group -->
                </div>
                <!-- /.pull-right -->
              </div>
            </div>
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
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
<!-- Sparkline -->

<!-- jvectormap  -->

<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS -->

<script src="plugins/iCheck/icheck.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

<script src="dist/js/adminjs.js"></script>

<script>
  $(function () {
    //Enable iCheck plugin for checkboxes
    //iCheck for checkbox and radio inputs
    $('.mailbox-messages input[type="checkbox"]').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass: 'iradio_flat-blue'
    });

    //Enable check and uncheck all functionality
    $(".checkbox-toggle").click(function () {
      var clicks = $(this).data('clicks');
      if (clicks) {
        //Uncheck all checkboxes
        $(".mailbox-messages input[type='checkbox']").iCheck("uncheck");
        $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
      } else {
        //Check all checkboxes
        $(".mailbox-messages input[type='checkbox']").iCheck("check");
        $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
      }
      $(this).data("clicks", !clicks);
    });

    //Handle starring for glyphicon and font awesome
    $(".mailbox-star").click(function (e) {
      e.preventDefault();
      //detect type
      var $this = $(this).find("a > i");
      var glyph = $this.hasClass("glyphicon");
      var fa = $this.hasClass("fa");

      //Switch states
      if (glyph) {
        $this.toggleClass("glyphicon-star");
        $this.toggleClass("glyphicon-star-empty");
      }

      if (fa) {
        $this.toggleClass("fa-star");
        $this.toggleClass("fa-star-o");
      }
    });


    $('#refresh').on('click',function(){
        location.reload();
        //alert('ivan');
    });
  });
</script>
</body>
</html>
