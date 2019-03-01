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


                        <input type="submit" class="btn btn-primary" value="Submit" name="submit" style="color:#fff">
                    </form>
                </div>


            </div>
        </div>
    </section>


<?php include('includes/footer.php');?>

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