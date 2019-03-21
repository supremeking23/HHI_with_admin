<?php require_once('admin/initialize.php');?>
<!doctype html>
<html lang="en">

<?php 

    if(is_post_request()){
        $jobseeker = [];
        $jobseeker['jobseeker_compo_id'] = $_POST['jobseeker_compo_id'] ?? '';
        $jobseeker['firstname'] = $_POST['firstname'] ?? '';
        $jobseeker['middlename'] = $_POST['middlename'] ?? '';
        $jobseeker['lastname'] = $_POST['lastname'] ?? '';
        $jobseeker['gender'] = $_POST['gender'] ?? '';
        $jobseeker['contact'] = $_POST['contact'] ?? '';
        $jobseeker['email'] = $_POST['email'] ?? '';
        $jobseeker['subject'] = $_POST['subject'] ?? '';
        $jobseeker['message'] = $_POST['message'] ?? '';
        $jobseeker['data_status'] = 1;
       


        $now = date('Y-m-d H:i:s');
        $jobseeker['date_send'] = $now;

        
        $resume_file = $_FILES['resume_file']['name'];
        $resume_file_tmp =$_FILES['resume_file']['tmp_name'];
        $jobseeker['file'] = $resume_file;
        
        $result = send_jobseeker_files($jobseeker);
        if($result === true){
          $_SESSION['message'] = "Data has been sent";
          move_uploaded_file($resume_file_tmp, "admin/uploads/jobseeker_files/$resume_file");
        }else{
          $errors = $result;
        }
    }else{
        $jobseeker = [];
        $jobseeker['firstname'] =  '';
        $jobseeker['middlename'] =  '';
        $jobseeker['lastname'] = '';
        $jobseeker['gender'] =   '';
        $jobseeker['contact'] =  '';
        $jobseeker['email'] =  '';
        $jobseeker['subject'] =  '';
        $jobseeker['message'] =  '';
    }
?>

  <?php 
  include('includes/header.php');?>
  <body id="jobseeker">
   <?php include('includes/navigation.php');?>

<?php echo send_danger_modal($errors); 
      echo send_success_modal();?>

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

                <div class="offset-md-1">
                    <p class="alert alert-danger">All fields with (*) are required</p>
                </div>
                <div class="offset-lg-2 col-lg-8">
                    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="hidden" name="jobseeker_compo_id" id="jobseeker_compo_id">
                            <input type="text" class="form-control input-text-color" placeholder="Firstname *" id="firstname" name="firstname">
                        </div>

                        <div class="form-group">
                            
                            <input type="text" class="form-control input-text-color" placeholder="Middlename *" id="middlename" name="middlename">
                        </div>


                        <div class="form-group">
                            <input type="text" class="form-control input-text-color" placeholder="Lastname *" id="lastname" name="lastname">
                        </div>

                        <div class="form-group">
                           <select class="form-control" id="gender" name="gender">
                               <option value="">Gender *</option>
                               <option value="male">Male</option>
                               <option value="female">Female</option>

                           </select>
                        </div>

                        <div class="form-group">     
                            <input type="text" class="form-control input-text-color" placeholder="Contact Number *" id="contact" name="contact">
                        </div> 

                        <div class="form-group">     
                            <input type="text" class="form-control input-text-color" placeholder="Email Address *" id="email" name="email">
                        </div> 
                        
                        

                        <div class="form-group" style="background:#999;padding:10px">
                            <label style="color:#FFF">
                                Attach Resume Here *
                            </label>
                            <input type="file" name="resume_file" id="resume_file" >
                        </div>
                        
                        <div class="form-group">
                            
                                <input type="text" class="form-control input-text-color" placeholder="Subject" id="subject" name="subject">
                        </div>

                        <div class="form-group">
                            
                                <textarea class="form-control input-text-color" placeholder="Enter Message" id="message" name="message"></textarea>
                        </div>

                        <div style="width: 100%;background:#999;padding:10px">
                        <div class="form-check form-check-inline" style="">

                            <input class="form-check-input" type="checkbox" id="checkpolicy" value="1">
                            <label class="form-check-label" style="color: #FFF">I have agree to the <a href="" role="button" data-toggle="modal" data-target="#privacy">Privacy policy </a> of this company. 

                            </label>
                        <!-- The Modal -->
                        <div class="modal fade" id="privacy">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">

                              <!-- Modal Header -->
                              <div class="modal-header">
                                <h4 class="modal-title">Privacy Policy</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>

                              <!-- Modal body -->
                              <div class="modal-body">
                                <p>My Company (change this) ("us", "we", or "our") operates <a href="http://huntershubinc.com">Hunter's Hub Incorporated</a>. This page informs you of our policies regarding the collection, use and disclosure of Personal Information we receive from users of the Site. We use your Personal Information only for providing and improving the Site. By using the Site, you agree to the collection and use of information in accordance with this policy.
                                </p>

                                <h4>Information Collection And Use</h4>
                                <p>While using our Site, we may ask you to provide us with certain personally identifiable information that can be used to contact or identify you. Personally identifiable information may include, but is not limited to your name ("Personal Information").
                                </p>
                                <h4>Log Data</h4>
                                <p>Like many site operators, we collect information that your browser sends whenever you visit our Site ("Log Data").

                                This Log Data may include information such as your computer's Internet Protocol ("IP") address,
                                browser type, browser version, the pages of our Site that you visit, the time and date of your visit,
                                the time spent on those pages and other statistics.
                                In addition, we may use third party services such as Google Analytics that collect, monitor and
                                analyze this …
                                The Log Data section is for businesses that use analytics or tracking services in websites or
                                apps, like Google Analytics. For the full disclosure section, create your own Privacy Policy.

                                </p>


                                <h4>Communications</h4>
                                <p>We may use your Personal Information to contact you with newsletters, marketing or promotional
                                   materials and other information that ...
                                </p>  

                                <h4>Cookies</h4>
                                <p>
                                Cookies are files with small amount of data, which may include an anonymous unique identifier.
                                Cookies are sent to your browser from a web site and stored on your computer's hard drive.
                                Like many sites, we use "cookies" to collect information. You can instruct your browser to refuse all
                                cookies or to indicate when a cookie is being sent. However, if you do not accept cookies, you may
                                not be able to use some portions of our Site.
                                </p>



                                <h4>Security</h4>
                                <p>
                                The security of your Personal Information is important to us, but remember that no method of
                                transmission over the Internet, or method of electronic storage, is 100% secure. While we strive to
                                use commercially acceptable means to protect your Personal Information, we cannot guarantee its
                                absolute security.
                                </p>

                                <h4>Changes To This Privacy Policy</h4>
                                <p>
                                This Privacy Policy is effective as of (add date) and will remain in effect except with respect to any
                                changes in its provisions in the future, which will be in effect immediately after being posted on this
                                page.
                                We reserve the right to update or change our Privacy Policy at any time and you should check this
                                Privacy Policy periodically. Your continued use of the Service after we post any modifications to the
                                Privacy Policy on this page will constitute your acknowledgment of the modifications and your
                                consent to abide and be bound by the modified Privacy Policy.
                                If we make any material changes to this Privacy Policy, we will notify you either through the email
                                address you have provided us, or by placing a prominent notice on our website.
                                </p>


                                <h4>Contact Us</h4>
                                <p>If you have any questions about this Privacy Policy, please contact us.
                                </p>
                              </div>

                              <!-- Modal footer -->
                              <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                              </div>

                            </div>
                          </div>
                        </div>
                        </div>
                        </div>

                        <div class="form-group">
                            
                        </div>


                        <br />
                        <input type="submit" class="btn btn-primary" value="Submit" id="button-submit" name="submit" style="color:#fff">
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
    <script src="admin/dist/js/adminjs.js"></script>

    <script>

        $().ready(function() {
            var jobseeker_compo_id = document.getElementById("jobseeker_compo_id");
            jobseeker_compo_id = "<?= 'JOBSEEKER'.date("ymdhis") . abs(rand('0','9'));  ?>";
            $('#jobseeker_compo_id').val(jobseeker_compo_id);

            $('#button-submit').attr('disabled','disabled');

            var checkbox = document.getElementById("checkpolicy");
            checkbox.addEventListener('change', (event) => {
              if (event.target.checked) {
                $('#button-submit').removeAttr("disabled");
              } else {
                $('#button-submit').attr('disabled','disabled');
              }
            })
        });
    </script>
  </body>
</html>