<!doctype html>
<html lang="en">

  <?php 
  include('includes/header.php');?>
  <body id="jobseeker">
   <?php include('includes/navigation.php');?>






    <section class="section-jobseeker-form">

        <section id="title-bar-jobseeker-form">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1>For Jobseekers</h1>
                        </div>
                    </div>
                </div>
        </section>

        <div class="container" id="jobseeker-form">

            <div class="row">
                <div class="offset-lg-2 col-lg-8">
                    <form>
                        <div class="form-group">
                            
                            <input type="text" class="form-control input-text-color" placeholder=" Full Name" id="fullname" name="fullname">
                        </div>

                        <div class="form-group">
                                
                                <input type="email" class="form-control input-text-color" placeholder="Email Address" id="email" name="email">
                        </div> 
                        
                        

                        <div class="form-group" style="background:#999;padding:10px">
                            <label style="color:#FFF">
                                Attach Resume Here
                            </label>
                            <input type="file" name="file">
                        </div>
                        
                        <div class="form-group">
                            
                                <input type="text" class="form-control input-text-color" placeholder=" Subject" id="subject" name="subject">
                        </div>

                        <div class="form-group">
                            
                                <textarea class="form-control input-text-color" placeholder="Enter Message"></textarea>
                        </div>


                        <input type="submit" class="btn btn-outline-secondary" value="Submit" name="submit" style="color:#fff">
                    </form>
                </div>


            </div>
        </div>
    </section>


    <footer>
        <div class="container-fluid " >
  
  
          <div class="row ">
                  <div class="col-md-8">
                          <div class="site-map-div">
                                  <a href="index.html" class="">Home</a>
                                  <a href="about.html" class="">About</a>
                                  <a href="contact.html" class="">Contact Us</a>
                                  <a href="services.html" class="">Services</a>
                                  <a href="client.html" class="">Clients</a>
                                  <a href="jobseeker.html" class="">Jobseekers</a>
                                </div>
                  </div>

                  <div class="col-md-4">
                    <div class="social-icons">
                      <ul class="social-links">
                        <li><a href="https://www.facebook.com/Hunters-Hub-Incorporated-208732030013230/" title="Visit us on Facebook" target="_blank"><i class="fa fa-facebook ion-fonts"></i></a></li>
                        <li><a href="https://www.linkedin.com/company/hunter-s-hub-incorporated/about/" title="Visit us on LinkedIn" target="_blank"><i class="fa fa-linkedin ion-fonts"></i></a></li>
                        <li><a href="https://www.indeedjobs.com/hunters-hub-inc/_hl/en_PH?cpref=JXWAtnzf3XW5aRnY2g_zonsfzg9-fxtSRiWa1kaGqGU" title="Visit us on Indeedjobs" target="_blank"><i class="fa fa-lightbulb-o ion-fonts"></i></a></li>
                      </ul>
                    </div>
                  </div>
                 
          </div>
  
  
          <div class="row text-center" style="margin-top:30px">
                  <div class="col-md-12">   
                      <p>Copyright &copy;2019 Hunter's Hub Inc. All Rights Reserved</p>
                  </div>
              </div>
              <div class="row text-center">
                  <div class="col-md-12">
                      <p>Designed by: Ivan Christian Jay Funcion and Dominic Nanz Saronitman</p>
                  </div>
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

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery.min.js" ></script>
    <script src="js/tether.min.js" ></script>
    <script src="js/bootstrap.min.js" ></script>
    <script src="js/jquery.waypoints.min.js" ></script>
    <script src="js/scripts.js"></script>
    

    <script>

            $().ready(function() {
                $('.file-upload').css('display','none');
                $('#submit-file').click(function(){
                    $('.file-upload').css('display','block');
                    $('#cancel-submit').css('display','inline-block');
                    //alert('1');
                    $('#submit-file').css('display','none');
                });
            
                $('#cancel-submit').click(function(){
                    $('.file-upload').css('display','none');
                    $('#cancel-submit').css('display','none');
                    //alert('1');
                    $('#submit-file').css('display','inline-block');
                });
            
            
            });
            </script>
  </body>
</html>