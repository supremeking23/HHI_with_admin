<?php require_once('admin/initialize.php');?>
<!doctype html>
<html lang="en">

<?php 

    if(is_post_request()){
        $inquiry = [];
        $inquiry['inquiries_compo_id'] = $_POST['inquiries_compo_id'] ?? '';
        $inquiry['name'] = $_POST['name'] ?? '';
        $inquiry['email'] = $_POST['email'] ?? '';
        $inquiry['message'] = $_POST['message'] ?? '';
        $inquiry['data_status'] = 1;
        $now = date('Y-m-d H:i:s');
        $inquiry['date_send'] = $now;

        $result = send_inquiry($inquiry);
        if($result === true){
          $_SESSION['message'] = "Message has been sent";
        }else{
          $errors = $result;
        }
    }else{
        $inquiry = [];
        $inquiry['name'] = '';
        $inqiry['email'] =  '';
        $inquiry['message'] = '';
        $inquiry['date_send'] = '';
    }

//heck to make sure sure that a valid email address is submitted 

?>

<?php 
include('includes/header.php');?>
<body id="contact">
<?php include('includes/navigation.php');?>

      <?php echo send_danger_modal($errors); 
      echo send_success_modal();?>


    <section id="title-bar">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Contact Us</h1>
                </div>
            </div>
        </div>
    </section>

    <section id="contact">
        <div class="container contact-form">
            <div class="row">
                <div class="col-lg-8">
                    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="hidden" name="inquiries_compo_id" id="inquiries_compo_id">
                            <input type="text" class="form-control input-text-color" id="name" name="name" placeholder="Enter Name">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" id="email" name="email" class="form-control input-text-color" placeholder="Enter Email">
                        </div>
                        <div class="form-group">
                            <label>Message</label>
                            <textarea class="form-control input-text-color" id="message" name="message" placeholder="Enter Message"></textarea>
                            
                        </div>

                        <input type="submit" class="btn btn-outline-secondary" value="Submit" name="submit">
                    </form>
                </div>

                <div class="col-lg-4">

                    <img src="img/HHI Logo Small.png" width="250px" class="text-center" style="margin-left:40px">

                    <!--<p align="justify"><span class="fa fa-map-marker"></span> Unit 1902, Cityland 10 Tower 2, 154 H.V. Dela Costa, Bel-air,  
                        Makati City</p>
                        <p align="justify"><span class="fa fa-envelope"></span> info@huntershubinc.com</p>
                        <p align="justify"><span class="fa fa-phone"></span> 886-7123</a></p>
                        <p align="justify"><span class="fa fa-clock-o"></span> Mon - Fri 8:00 am - 5:00 pm</p> -->
                </div>
            </div>
        </div>
    </section>


    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3861.6769704956946!2d121.01506001410635!3d14.560456089828065!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c9096f41e023%3A0x4c8f3f5a1dd77144!2sCityland+10+Tower+2%2C+156+H.V.+Dela+Costa%2C+Makati%2C+Metro+Manila!5e0!3m2!1sen!2sph!4v1543821452774" style="width: 100%;height: 300px" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
                <div class="col-lg-4">
                        <p align="justify"><span class="fa fa-map-marker"></span> Unit 1902, Cityland 10 Tower 2, 154 H.V. Dela Costa, Bel-air,  
                            Makati City</p>
                            <p align="justify"><span class="fa fa-envelope"></span> info@huntershubinc.com</p>
                            <p align="justify"><span class="fa fa-phone"></span> (02)-403-0133</a></p>
                            <p align="justify"><span class="fa fa-clock-o"></span> Mon - Fri 8:00 am - 5:00 pm</p>
                </div>
            </div>
        </div>
    </section>


    <section>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Landmarks</h2>
                </div>
            </div>
            <div class="row">
                  <div class="col-md-4 landmark">
                    <a href=""></a><img src="img/building4.jpg" class="" alt="img1" title="img1" style="width:100%">

                    <div class="landmark-text">
                      <div class="skill-text"><h4 class="text-center"><b></b></h4> </div>
                    </div>
                  </div>

                  <div class="col-md-4 landmark">
                    <img src="img/building3.jpg" class="" alt="img2" title="img2" style="width:100%">

                    <div class="landmark-text">
                      <div class="skill-text"><h4 class="text-center"><b></b></h4> </div>
                    </div>
                  </div>

                  <div class="col-md-4 landmark">
                    <img src="img/citylandtower2.jpg" class="" alt="citylandtower2" title="citylandtower2" style="width:100%">

                    <div class="landmark-text">
                      <div class="skill-text"><h4 class="text-center"><b></b></h4> </div>
                    </div>
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
    <script src="admin/dist/js/adminjs.js"></script>
    <script src="js/jquery.lightbox.js"></script>
    <script>
        var inquiries_compo_id = document.getElementById("inquiries_compo_id");
        inquiries_compo_id = "<?= 'INQ'.date("ymdhis") . abs(rand('0','9'));  ?>";
        $('#inquiries_compo_id').val(inquiries_compo_id);


$(function() {
   
    $('.gallery2 a').lightbox({ nav : false }); 
    
  });

    </script>
  </body>
</html>