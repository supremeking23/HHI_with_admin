<?php 
  require_once('initialize.php');
  //echo dirname(__FILE__);
  //constant
  /*define("SITE_URL",dirname(__FILE__));
  //echo SITE_URL;
  define("SHARED_PATH",dirname(__FILE__).'\includes_admin');
 // echo SHARED_PATH;*/
  require_login();
  //echo $_SESSION['admin_compo_id'];

if(is_post_request()){
    $message = [];

    //validate_compose_message($message,$attachment,$recipient);
    
    $message['subject'] = $_POST['subject'] ?? '';
    $message['message_body'] = $_POST['message_body'] ?? '';
    $message['sender_id'] = $_SESSION['admin_compo_id'];
    $message['message_compo_id'] = 'MSG'.date("ymdhis") . abs(rand('0','9'));
    $now = date('Y-m-d H:i:s');
    $message['date_send'] = $now;
    /*
      message_status 
      1 = sent
      2 = draft;
      0 = trash
    */
    $message['message_status'] = 1;

    $send_result = insert_message_detail($message);

    if($send_result === true){
      //latest id added
      $new_id = mysqli_insert_id($db);
      $message_detail = search_message_detail_by_id($new_id);
      $attachment['message_compo_id'] = $message_detail['message_compo_id'];
      $total = count($_FILES['attachment']['name']);
      for($i = 0; $i< $total;$i++){
          $attachment['attachment'] =  $_FILES['attachment']['name'][$i];
          $attachment_file = $attachment['attachment'];
          $attachment_tmp =$_FILES['attachment']['tmp_name'][$i];
          //echo $ss  .'<br />';
          $attachment['message_files_compo_id'] =  'MSGFILE'.date("ymdhis") . abs(rand('0','9')) .'<br />';
          move_uploaded_file($attachment_tmp, "uploads/message_files/$attachment_file");
          
          $send_file_result = insert_message_file($attachment);
          if($send_file_result ===true){

          }else{
             $errors = $result;
          }
          //echo $i;
      } //end files saving

      
   
      
      /*foreach($recipient['recipient'] as $r){

      }*/ //foreach loop

        //echo $r .'<br />';
      $recipient['recipient'] = $_POST['recipient'] ?? '';
      $count_recipient = count($recipient['recipient']);
      for($i = 0 ; $i < $count_recipient; $i++){
          $recipient['message_compo_id'] = $message_detail['message_compo_id'];
       //compo_id
      /*
        recipient_message_status 
        1 = not seen
        2 = seen;
        0 = trash
      */  
          $recipient['recipient_message_status'] = 1;
          $recipient['recipient'] = $_POST['recipient'][$i] ?? '';
          $send_recipient_result = insert_message_recipient($recipient);
          if($send_recipient_result ===true){

          }else{
             $errors = $result;
          }
      }

       $_SESSION['message'] = "Message has been sent successfully";
    }else {
    $errors = $result;
    //error on tbl_messages
    }

    //$attachment = $_FILES['attachment']['name'];
    //$attachment['attachment'] = $attachment; 



    //recipients
    //compo_id
    



    //print_r($message);
  }else{
    $message = [];
    $message['recipient'] = $_POST['recipient'] ?? '';
    $message['subject'] = $_POST['subject'] ?? '';
    $message['message_body'] = $_POST['message_body'] ?? '';
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
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/skin-hhi.css">
  <link rel="stylesheet" type="text/css" href="dist/css/hhiadmin.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">

  <style type="text/css">
   .select2-container--default .select2-selection--multiple .select2-selection__choice {
    background: #1a2455;
    border-left: 1px box-solid #1a2455;
    }
  </style>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
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
       
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-users"></i> HHI</a></li>
        <li><a href="<?php echo url_for('admin/message.php')?>">Messages</a></li>
        <li class="active">Create Message</li>
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
        <div class="col-md-3">
          

        <?php include(SHARED_PATH.'/message_folder.php');?>

        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Compose New Message</h3>
            </div>
            <!-- /.box-header -->

            <form action="compose-message.php" method="POST" enctype="multipart/form-data" id="compose-message">
              <div class="box-body">

                <div class="form-group">

                  <?php $admin_list = get_all_admins();?>

                  <select class="form-control select2" multiple="multiple" data-placeholder="To"
                          style="width: 100%;" name="recipient[]" id="recipient">

                    <?php while($admins = mysqli_fetch_assoc($admin_list)):?>
                    <option value="<?php echo $admins['admin_compo_id'];?>"><?php echo $admins['email'];?></option>
                  <?php endwhile;?>

                  </select>
                </div>
                <div class="form-group">
                  <input class="form-control" placeholder="Subject:" id="subject" name="subject">
                </div>
                <div class="form-group">
                      <textarea id="message_body" class="form-control" style="height: 300px" name="message_body"  oninput="callthis();">
                        
                      </textarea>
                </div>
                <div class="form-group">
                  <div class="btn btn-default btn-file">
                    <i class="fa fa-paperclip"></i> Attachment
                    <input type="file" name="attachment[]" id="attachment" multiple="">
                  </div>
                  <p class="help-block" id="fp"></p>
             
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <div class="pull-right">
                  <button type="button" class="btn btn-default" id="draft"><i class="fa fa-pencil"></i> Draft</button>
                 
                  <button type="submit" class="btn btn-primary" id="send"><i class="fa fa-envelope-o"></i> Send</button>
                </div>
                <button type="reset" class="btn btn-default" id="reset_button"><i class="fa fa-times"></i> Discard</button>
              </div>
              <!-- /.box-footer -->
            </form>
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
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="dist/js/adminjs.js"></script>
<!-- Page Script -->
<script>
  $(function () {
    //Add text editor
    $("#message_body").wysihtml5();
    $('.select2').select2();

    /*var message_compo_id = document.getElementById("message_compo_id");
    message_compo_id = "<?= 'MSG'.date("ymdhis") . abs(rand('0','9'));  ?>";
    $('#message_compo_id').val(message_compo_id);*/

    //for file showing content
    var fi = document.getElementById('attachment');
    var fp = document.getElementById('fp');
    $("#attachment").on('change',function(){
      if(fi.files.length > 0){

        //the total file count
        fp.innerHTML = "Total Files <b>" + fi.files.length + "</b><br />";


        //Run a loop to check each selected file.
        for(var i = 0; i <= fi.files.length - 1; i++){
          var fname = fi.files.item(i).name;  // the name of the file
          var fsize = fi.files.item(i).size; // the size of the file

          //show the extracted details of the file
          //document.getElementById('fp').innerHTML = document.getElementById('fp').innerHTML = document.getElementById('fp').innerHTML +"<br /> " + fname + "(<b> " + fsize + "</b> bytes)";  
          fp.innerHTML = fp.innerHTML +"<br /> " + fname + "(<b> " + fsize + "</b> bytes)"; 
        }
      }
    });


    $('#reset_button').click(function(){
      location.reload();
    })


    var subject = $('#subject').val();
    /*$('#send').attr('disabled','disabled');
    $('#draft').on('click',function(){
        $('#send').removeAttr('disabled','');
        if(subject == ''){
          alert('wala laman');
        }
    })*/
    //$('#send').attr('disabled','disabled');
    //document.getElementById("message_body").oninput = function() {computeChange()};

    /*function computeChange() {

      /*var  cash = $('#message_body').val();
     console.log('vivan');
      if(cash.length != 0){
        
        $('#send').removeAttr('disabled','');
        
      }else{
        $('#send').attr('disabled','disabled');
      }
      //alert(total_amount);

      alert('ivam');
    }*/

  $('#subject').on('input',function(){
    /*var searchTerm = $(this).val().toLowerCase();
    $('.product-list .product-item').each(function(){
      var lineStr = $(this).text().toLowerCase();
      if(lineStr.indexOf(searchTerm) === -1){
        $(this).hide();
      }else{
        $(this).show();
      }
    });*/

    console.log('ivan');
  });

  function callthis(){
    alert('ivan');
  }

  });


  //not use
  function FileDetails(){

    //get the file input
    var fi = document.getElementById('attachment');

    //validate or check if any file is selected
    if(fi.files.length > 0){

      //the total file count
      document.getElementById('fp').innerHTML = "Total Files <b>" + fi.files.length + "</b><br />";


      //Run a loop to check each selected file.
      for(var i = 0; i <= fi.files.length - 1; i++){
        var fname = fi.files.item(i).name;  // the name of the file
        var fsize = fi.files.item(i).size; // the size of the file

        //show the extracted details of the file
        document.getElementById('fp').innerHTML = document.getElementById('fp').innerHTML = document.getElementById('fp').innerHTML +"<br /> " + fname + "(<b> " + fsize + "</b> bytes)";  
      }
    }else{
      alert('Please select a file');
    }
  }


</script>
</body>
</html>
