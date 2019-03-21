    <footer>
      <div class="container-fluid " >


        <div class="row ">
                <div class="col-md-4">
                        <div class="">
                          <h2 style="border-bottom: 2px solid white;" class="text-center">HHI's upcomming event</h2>
                                <!--<a href="index.php" class="">Home</a>
                                <a href="about.php" class="">About</a>
                                <a href="contact.php" class="">Contact Us</a>
                                <a href="services.php" class="">Services</a>
                                <a href="client.php" class="">Clients</a>
                                <a href="jobseeker.php" class="">Jobseekers</a> -->

                          <ul class="event-list">
                            <!--<li><a href="index.php" class=""><span class="fa fa-home"></span>&nbsp;Home</a></li>
                            <li><a href="about.php" class=""><span class="fa fa-building"></span>&nbsp;About</a></li>
                            <li><a href="contact.php" class=""><span class="fa fa-book"></span>&nbsp;Contact Us</a></li>
                            <li><a href="services.php" class=""><span class="fa fa-server"></span>&nbsp;Services</a></li>
                            <li> <a href="client.php" class=""><span class="fa fa-users"></span>&nbsp;Clients</a></li>
                            <li><a href="jobseeker.php" class=""><span class="fa fa-search"></span>&nbsp;Jobseekers</a></li>-->

                            <?php 

                              $event_list = load_upcoming_event();
                              while($events = mysqli_fetch_assoc($event_list)):
                            ?>
                              <li>
                                <a role="button" data-toggle="modal" data-target="#eventDetail<?php echo $events['event_id']?>" href=""><?php echo h($events['event_name'])?></a>
                                <!-- Modal -->
                                <div id="eventDetail<?php echo $events['event_id']?>" class="modal fade" role="dialog" style="color:#000000">
                                  <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h4 class="modal-title"><?php echo h($events['event_name'])?></h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        
                                      </div>
                                      <div class="modal-body">
                                        <p><?php echo h($events['event_description'])?></p>
                                        <p>Event Date: <?php 
                                            $date =date_create($events['event_datestart']);
                                            echo  $formated_date= date_format($date,"F d, Y ");


                                            if($events['event_dateend'] != "0000-00-00"){
                                               $date =date_create($events['event_dateend']);
                                              $formated_date= date_format($date,"F d, Y ");
                                              echo " - " . $formated_date; 
                                            }
                    
                                        ?></p>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                      </div>
                                    </div>

                                  </div>
                                </div>
                              </li>
                          <?php endwhile;?>
                        </ul>
                        </div>





                </div>

                <div class="col-md-4">
                   <h2 style="border-bottom: 2px solid white;" class="text-center">Follow us on</h2>
                  <!--<div class="social-icons">
                    <ul class="social-links">
                      <li><a href="https://www.facebook.com/Hunters-Hub-Incorporated-208732030013230/" title="Visit us on Facebook" target="_blank"><i class="fa fa-facebook ion-fonts"></i></a></li>
                      <li><a href="https://www.linkedin.com/company/hunter-s-hub-incorporated/about/" title="Visit us on LinkedIn" target="_blank"><i class="fa fa-linkedin ion-fonts"></i></a></li>
                      <li><a href="https://www.indeedjobs.com/hunters-hub-inc/_hl/en_PH?cpref=JXWAtnzf3XW5aRnY2g_zonsfzg9-fxtSRiWa1kaGqGU" title="Visit us on Indeedjobs" target="_blank"><i class="fa fa-lightbulb-o ion-fonts"></i></a></li>
                    </ul>
                  </div> -->
                          <ul class="link-footer">
                            <li><a href="https://www.facebook.com/Hunters-Hub-Incorporated-208732030013230/" title="Visit us on Facebook" target="_blank"><span class="fa fa-facebook"></span>&nbsp;Facebook</a></li>
                            <li><a href="https://www.linkedin.com/company/hunter-s-hub-incorporated/about/" title="Visit us on LinkedIn" target="_blank"><span class="fa fa-linkedin"></span>&nbsp; Linkedin</li>
                            <li><a href="https://www.indeedjobs.com/hunters-hub-inc/_hl/en_PH?cpref=JXWAtnzf3XW5aRnY2g_zonsfzg9-fxtSRiWa1kaGqGU" title="Visit us on Indeedjobs" target="_blank"><span class="fa fa-lightbulb-o"></span>&nbsp; Indeed Jobs</a></li>
                           
                        </ul>
                </div>

                <div class="col-md-4">
                   <h2 style="border-bottom: 2px solid white;" class="text-center">Client Forms</h2>
                  <!--<div class="social-icons">
                    <ul class="social-links">
                      <li><a href="https://www.facebook.com/Hunters-Hub-Incorporated-208732030013230/" title="Visit us on Facebook" target="_blank"><i class="fa fa-facebook ion-fonts"></i></a></li>
                      <li><a href="https://www.linkedin.com/company/hunter-s-hub-incorporated/about/" title="Visit us on LinkedIn" target="_blank"><i class="fa fa-linkedin ion-fonts"></i></a></li>
                      <li><a href="https://www.indeedjobs.com/hunters-hub-inc/_hl/en_PH?cpref=JXWAtnzf3XW5aRnY2g_zonsfzg9-fxtSRiWa1kaGqGU" title="Visit us on Indeedjobs" target="_blank"><i class="fa fa-lightbulb-o ion-fonts"></i></a></li>
                    </ul>
                  </div> -->
                          <ul class="link-footer">
                            <li><a href="files/Man-Power-Request-Form.xlsm" title="Man Power Request Form" download><span class="fa fa-download"></span>&nbsp;Man Power Request Form</a></li>
                            
                        </ul>
                </div>

               
        </div>


        <div class="row text-center" style="margin-top:30px">
                <div class="col-md-12">   
                    <p>Copyright  &copy;2019 Hunter's Hub Inc. All Rights Reserved</p>
                </div>
        </div>
        <div class="row text-center">
            <div class="col-md-12">
                <p>Designed by: Ivan Christian Jay Funcion and Dominic Nanz Saronitman</p>
            </div>
        </div>

        <div class="row">
          
        </div>


       <!--<div class="row clearfix"></div>

        <div class="row">
                <div class="col-lg-12 col-md-12 col-xs-12">
                        <p>Copyright &copy;2019, All right Reserved.</p>
                        <p>Designed by: Ivan Christian Jay Funcion </p>
                </div>
        </div>

        --> 
      </div>
    </footer>
    <script src="https://static.landbot.io/landbot-widget/landbot-widget-1.0.0.js"></script>
    <script>
      var myLandbotLivechat = new LandbotLivechat({
        index: 'https://landbot.io/u/H-134254-JSSGZNTSBBPTDVR5/index.html',
      });
    </script>
    <script>
      // Show a proactive message after 1 seconds
      setTimeout(() => {
        myLandbotLivechat.sendProactive("Hello there!");
      }, 1000);
    </script>