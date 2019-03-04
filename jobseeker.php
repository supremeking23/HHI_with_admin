<?php require_once('admin/initialize.php');?>
<!doctype html>
<html lang="en">

<?php 

    if(is_post_request()){
        $jobseeker = [];
        $jobseeker['inquiries_compo_id'] = $_POST['inquiries_compo_id'] ?? '';
        $jobseeker['firstname'] = $_POST['firstname'] ?? '';
        $jobseeker['middlename'] = $_POST['middlename'] ?? '';
        $jobseeker['lastname'] = $_POST['lastname'] ?? '';
        $jobseeker['gender'] = $_POST['gender'] ?? '';
        $jobseeker['contact'] = $_POST['contact'] ?? '';
        $jobseeker['email'] = $_POST['email'] ?? '';
        $jobseeker['subject'] = $_POST['subject'] ?? '';
        $jobseeker['message'] = $_POST['message'] ?? '';
       


        $now = date('Y-m-d H:i:s');
        $inquiry['date_send'] = $now;

        /*
            $resume_file = $_FILES['resume_file']['name'];
            $resume_file_tmp =$_FILES['resume_file']['tmp_name'];
            move_uploaded_file($resume_file_tmp, "../uploads/jobseeker_files/$resume_file");
        */

        /*$result = send_inquiry($inquiry);
        if($result === true){
          $_SESSION['message'] = "Message has been sent";
        }else{
          $errors = $result;
        }*/
    }else{
        $inquiry = [];
        $inquiry['name'] = '';
        $inqiry['email'] =  '';
        $inquiry['message'] = '';
        $inquiry['date_send'] = '';
    }
?>

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
                    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="hidden" name="jobseeker_compo_id" id="jobseeker_compo_id">
                            <input type="text" class="form-control input-text-color" placeholder="Firstname" id="firstname" name="firstname">
                        </div>

                        <div class="form-group">
                            
                            <input type="text" class="form-control input-text-color" placeholder="Middlename" id="middlename" name="middlename">
                        </div>


                        <div class="form-group">
                            <input type="text" class="form-control input-text-color" placeholder="Lastname" id="lastname" name="lastname">
                        </div>

                        <div class="form-group">
                           <select class="form-control" id="gender" name="gender">
                               <option value="">Gender</option>
                               <option value="male">Male</option>
                               <option value="female">Female</option>

                           </select>
                        </div>

                        <div class="form-group">     
                            <input type="text" class="form-control input-text-color" placeholder="Contact Number" id="contact" name="contact">
                        </div> 

                        <div class="form-group">     
                            <input type="text" class="form-control input-text-color" placeholder="Email Address" id="email" name="email">
                        </div> 
                        
                        

                        <div class="form-group" style="background:#999;padding:10px">
                            <label style="color:#FFF">
                                Attach Resume Here
                            </label>
                            <input type="file" name="resume_file" id="resume_file">
                        </div>
                        
                        <div class="form-group">
                            
                                <input type="text" class="form-control input-text-color" placeholder="Subject" id="subject" name="subject">
                        </div>

                        <div class="form-group">
                            
                                <textarea class="form-control input-text-color" placeholder="Enter Message" id="message" name="message"></textarea>
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
            var jobseeker_compo_id = document.getElementById("jobseeker_compo_id");
            jobseeker_compo_id = "<?= 'JOBSEEKER'.date("ymdhis") . abs(rand('0','9'));  ?>";
            $('#jobseeker_compo_id').val(jobseeker_compo_id);
        });
            </script>
  </body>
</html>