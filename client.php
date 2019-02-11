<!doctype html>
<html lang="en">

  <?php 
  include('includes/header.php');?>
  <body id="client">
   <?php include('includes/navigation.php');?>







    <section class="section-client-form">

        <section id="title-bar-client-form">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1>For Clients</h1>
                        </div>
                    </div>
                </div>
        </section>

        <div class="container" id="client-form">

            <div class="row">
                <div class="offset-lg-2 col-lg-8
                ">
                    <form>
                        <div class="form-group">
                            
                            <input type="text" class="form-control input-text-color" placeholder=" First Name" id="firstname" name="firstname">
                        </div>
                        
                        <div class="form-group">
                            
                                <input type="text" class="form-control input-text-color" placeholder=" Last Name" 
                                id="lastname" name="lastname">
                        </div>

                            
                        <div class="form-group">
                            
                                <input type="text" class="form-control input-text-color" placeholder=" Company"
                                id="company" name="company">
                        </div>

                        <div class="form-group">
                            
                                <input type="text" class="form-control input-text-color" placeholder=" Position in the Company" id="position" name="position">
                        </div>

                        <div class="form-group">
                            
                                <input type="number" class="form-control input-text-color" placeholder=" Size of Company"
                                id="size" name="size">
                        </div>

                        <div class="form-group">
                            
                                <input type="text" class="form-control input-text-color" placeholder=" Industry" id="industry" name="industry">
                        </div>

                        <div class="form-group">
                                
                                <input type="email" class="form-control input-text-color" placeholder="Email" id="email" name="email">
                        </div> 

                        <div class="form-group">
                            
                                <input type="text" class="form-control input-text-color" placeholder=" Phone Number" id="phone_number" name="phone_number">
                        </div>

                        <div class="form-group">
                            
                                <input type="text" class="form-control input-text-color" placeholder=" Zip Code" id="zipcode" name="zipcode">
                        </div>

                        <div class="form-group">
                            
                           <textarea class="form-control input-text-color" placeholder="Enter Message"></textarea>
                        </div>


                        <div class="form-group" style="background:#999;padding:10px">
                        
                            <label style="color:#eee">
                                Would you like to submit any available job description? <button type="button" class="btn btn-outline-success" style="color:#eee"  id="submit-file">Yes</button>
                                <button type="button" class="btn btn-outline-danger"  id="cancel-submit" style="display: none;">No</button>
                                
                            </label>

       
                        </div>
                        
                        <div class="form-group file-upload">
                                <input type="file" name="file">
                        </div>

                        <div class="form-group " style="display: none;">
                                
                        </div>

                        <input type="submit" class="btn btn-outline-secondary" value="Submit" name="submit">
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