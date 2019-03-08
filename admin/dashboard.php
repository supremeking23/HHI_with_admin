<?php 
  require_once('initialize.php');
  //echo dirname(__FILE__);
  //constant
  /*define("SITE_URL",dirname(__FILE__));
  //echo SITE_URL;
  define("SHARED_PATH",dirname(__FILE__).'\includes_admin');
 // echo SHARED_PATH;*/
  //print_r($_SESSION);
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
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->

  <!-- fullCalendar -->
  <link rel="stylesheet" href="bower_components/fullcalendar/dist/fullcalendar.min.css">
  <link rel="stylesheet" href="bower_components/fullcalendar/dist/fullcalendar.print.min.css" media="print">
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
      .fc-time{
    display: none;
  }
  </style>
</head>
<body class="hold-transition skin-blue sidebar-mini" id="dashboard">
<div class="wrapper">

<?php include(SHARED_PATH.'/header.php');?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php include(SHARED_PATH.'/sidebar.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Version 2.0</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
       
        <div class="col-md-12">
          <?php 
            echo display_errors($errors);
            echo display_session_message();
            echo display_error_message();
          ?>
        </div>
      </div>

      <div class="row">
        <div class="col-md-8">
          <div class="box ">
            <div class="box-body">
              <div class="row">
                <div class="col-md-3">
                  <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#add-event" style="margin-bottom: 10px">Add event</button>
                    <div class="modal fade" id="add-event">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Event Details</h4>
                          </div>
                          <div class="modal-body">

                              <table class="table table-striped table-hover"> 


                                 <form action="<?php echo url_for('admin/includes_admin/calendar_functions.php');?>" method="post" enctype="multipart/form-data">


                                    <tr>
                                      <td><b>Event Name</b></td>
                                      <td><input type="text" class="form-control" name="event_name" id="">
                                          <input type="hidden" name="event_compo_id" id="event_compo_id" value="">
                                      </td>
                                    </tr>
                                   
                                    <tr>
                                      <td><b>Event Description</b></td>
                                      <td><textarea class="form-control" cols="100" rows="10" style="resize: none;" id="event_description" name="event_description"></textarea></td>
                                    </tr>

                                    <tr>
                                      <td><b>Date:</b></td>
                                      <td><input type="date" class="form-control" name="event_datestart" id="event_datestart"></td>
                                    </tr>

                                    <tr>
                                      <td><b>Time:</b></td>
                                      <td>
                                        <label>From</label><input type="time" class="form-control" name="event_timestart" id="event_timestart">
                                        <br />
                                        <label>To:</label><input type="time" class="form-control" name="event_timeend" id="event_timeend">
                                      </td>
                                    </tr>

                                    <tr>
                                      <td></td>
                                      <td><button type="button" class="btn btn-danger" class="close" data-dismiss="modal" aria-label="Close">Cancel</button> &nbsp;<input type="submit" name="submit_event" class="btn btn-success" value="Submit"></td>
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
                </div>
              </div>
              <!-- THE CALENDAR -->
              <div id="calendar"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->

        <div class="col-md-4">
          <div class="box ">
            <div class="box-header">
              <h3 class="lead">Today's Event</h3>
            </div>
            <div class="box-body">
              <ul class="nav nav-pills nav-stacked">
                <?php 
                  $event_list = get_event_for_this_day();
                  while($events = mysqli_fetch_assoc($event_list)):
                ?>
                  <li>
                    <a role="button" data-toggle="modal" data-target="#event-detail<?php echo $events['event_id']?>"><?php echo h($events['event_name']);?></a>
                    <div class="modal fade" id="event-detail<?php echo $events['event_id']?>">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Event Detail</h4>
                          </div>
                          <div class="modal-body">
                            <p><?php //echo h($events['event_name']);?>&hellip;</p>
                            <table width="100%" class="table table-striped table-bordered table-hover ">
                                  <tbody>
                                    <tr>
                                      <td><b>Event Name:</b></td>
                                      <td><?php echo h($events['event_name'])?></td>
                                    </tr>
                                    <tr>
                                      <td><b>Event Description:</b></td>
                                      <td><?php echo h($events['event_description'])?></td>
                                    </tr>
                                                                                                                                            
                                  </tbody>
                                         
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
                  </li>
                <?php endwhile;?>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>         
        </div>
      </div>


      <div class="row">
        <div class="col-md-12">


          <div class="modal fade" id="show-event">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Event Details </h4>
                </div>
                <div class="modal-body">

                      <table width="100%" class="table table-striped table-bordered table-hover ">
                            <tbody>
                              <tr>
                                <td><b>Event Name:</b></td>
                                <td><p class="event_name"></p></td>
                              </tr>
                              <tr>
                                <td><b>Event Description:</b></td>
                                <td><p class="event_description"></p></td>
                              </tr>
                                                                                                                                      
                            </tbody>
                                   
                      </table> 
                  
                </div>
                <div class="modal-footer">
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
        </div>
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
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap  -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS -->
<script src="bower_components/chart.js/Chart.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

<!-- fullCalendar -->
<script src="bower_components/moment/moment.js"></script>
<script src="bower_components/fullcalendar/dist/fullcalendar.min.js"></script>

<script src="dist/js/adminjs.js"></script>

<script>
  $(function () {

    var event_compo_id = document.getElementById("event_compo_id");
    event_compo_id = "<?= 'EVENT'.date("ymdhis") . abs(rand('0','9'));  ?>";
    $('#event_compo_id').val(event_compo_id);



    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()
    $('#calendar').fullCalendar({
      header    : {
        left  : 'prev,next today',
        center: 'title',
        right : 'month,agendaWeek'
      },
      buttonText: {
        today: 'today',
        month: 'month',
        week : 'week',
        day  : 'day'
      },
      //Random default events
      events    : 'includes_admin/load_calendar.php' ,
      eventLimit:3,
      selectable:true,
      selectHelper:true,
      /*select:function(){
        //var title = prompt("Ano");
        
        $('#add-event').modal({
          show:true
        });

      },*/

      eventClick:function(event, jsEvent, view){

        $('.event_name').html(event.title);
        $('.event_description').html(event.event_description);
        $('#show-event').modal({show:true});        
      },

      /*editable  : true,
      droppable : true, // this allows things to be dropped onto the calendar !!!
      drop      : function (date, allDay) { // this function is called when something is dropped

        // retrieve the dropped element's stored Event Object
        var originalEventObject = $(this).data('eventObject')

        // we need to copy it, so that multiple events don't have a reference to the same object
        var copiedEventObject = $.extend({}, originalEventObject)

        // assign it the date that was reported
        copiedEventObject.start           = date
        copiedEventObject.allDay          = allDay
        copiedEventObject.backgroundColor = $(this).css('background-color')
        copiedEventObject.borderColor     = $(this).css('border-color')

        // render the event on the calendar
        // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
        $('#calendar').fullCalendar('renderEvent', copiedEventObject, true)

        // is the "remove after drop" checkbox checked?
        if ($('#drop-remove').is(':checked')) {
          // if so, remove the element from the "Draggable Events" list
          $(this).remove()
        }

      }*/
    })

    

  })
</script>
</body>
</html>
