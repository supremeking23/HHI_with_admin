<?php require_once('admin/initialize.php');?>
<!doctype html>
<html lang="en">

<?php 

    if(is_post_request()){
        $client = [];
        $client['client_compo_id'] = $_POST['client_compo_id'] ?? '';
        $client['firstname'] = $_POST['firstname'] ?? '';
        $client['middlename'] = $_POST['middlename'] ?? '';
        $client['lastname'] = $_POST['lastname'] ?? '';
        $client['company'] = $_POST['company'] ?? '';
        $client['position_in_company'] = $_POST['position_in_company'] ?? '';
        $client['company_size'] = $_POST['company_size'] ?? '';
        $client['industry'] = $_POST['industry'] ?? '';
        $client['email'] = $_POST['email'] ?? '';
        $client['contact'] = $_POST['contact'] ?? '';
        $client['zip_code'] = $_POST['zip_code'] ?? '';
        $client['message'] = $_POST['message'] ?? '';
        $client['data_status'] = 1;
       

        $now = date('Y-m-d H:i:s');
        $client['date_send'] = $now;

        
        $man_power_file = $_FILES['man_power_file']['name'];
        $man_power_file_tmp =$_FILES['man_power_file']['tmp_name'];
        $client['man_power_file'] = $man_power_file;

        /*$qualification_description_file = $_FILES['qualification_description_file']['name'];
        $qualification_description_file_tmp =$_FILES['qualification_description_file']['tmp_name'];
        move_uploaded_file($qualification_description_file_tmp, "admin/uploads/client_files/$qualification_description_file");

        $client['qualification_description_file'] = $qualification_description_file;*/
        
        $result = send_client_files($client);
        if($result === true){
          $_SESSION['message'] = "Data has been sent";
          move_uploaded_file($man_power_file_tmp, "admin/uploads/client_files/$man_power_file");
        }else{
          $errors = $result;
        }
    }else{
        $client = [];
        $client['firstname'] =  '';
        $client['middlename'] =  '';
        $client['lastname'] = '';
        $client['company'] =   '';
        $client['position_in_company'] =  '';
        $client['company_size'] =  '';
        $client['industry'] =  '';
        $client['email'] =  '';
        $client['contact'] =  '';
        $client['zip_code'] =  '';
        $client['message'] =  '';
    }
?>

  <?php 
  include('includes/header.php');?>
  <body id="client">
   <?php include('includes/navigation.php');?>

      <?php echo send_danger_modal($errors); 
      echo send_success_modal();?>
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
                <div class="offset-md-1">
                    <p class="alert alert-danger">All fields with (*) are required</p>
                </div>
                <div class="offset-lg-2 col-lg-8">
                    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="hidden" name="client_compo_id" id="client_compo_id">
                            <input type="text" class="form-control input-text-color" placeholder="First Name *" id="firstname" name="firstname" >
                        </div>

                        <div class="form-group">
                            
                            <input type="text" class="form-control input-text-color" placeholder="Middle Name *" id="middlename" name="middlename">
                        </div>
                        
                        <div class="form-group">
                            
                                <input type="text" class="form-control input-text-color" placeholder="Last Name *" 
                                id="lastname" name="lastname">
                        </div>

                            
                        <div class="form-group">
                                <input type="text" class="form-control input-text-color" placeholder="Company *"
                                id="company" name="company">
                        </div>

                        <div class="form-group">
                            
                                <input type="text" class="form-control input-text-color" placeholder="Position in the Company *" id="position_in_company" name="position_in_company">
                        </div>

                        <div class="form-group">
                            
                                <input type="text" class="form-control input-text-color" placeholder="Size of Company"
                                id="company_size" name="company_size">
                        </div>

                        <div class="form-group">
                                <input type="text" class="form-control input-text-color" placeholder="Industry *" id="industry" name="industry">
                        </div>

                        <div class="form-group">
                                
                                <input type="text" class="form-control input-text-color" placeholder="Email *" id="email" name="email">
                        </div> 

                        <div class="form-group">
                                <input type="text" class="form-control input-text-color" placeholder="Phone Number *" id="contact" name="contact">
                        </div>

                        <div class="form-group">
                                <input type="text" class="form-control input-text-color" placeholder="Zip Code" id="zip_code" name="zip_code">
                        </div>

                        <div class="form-group">
                            
                           <textarea class="form-control input-text-color" id="message" name="message" placeholder="Enter Message "></textarea>
                        </div>

                        <div class="form-group" style="background:#999;padding:10px">
                            <label style="color:#FFF">
                                Attach Man Power Request Form Here *
                            </label>
                            <input type="file" name="man_power_file" id="man_power_file" >
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


                        <br />



                        <!--<div class="form-group" style="background:#999;padding:10px">
                        
                            <label style="color:#eee">
                                Would you like to submit any available job description? <button type="button" class="btn btn-outline-success" style="color:#eee"  id="submit-file">Yes</button>
                                <button type="button" class="btn btn-outline-danger"  id="cancel-submit" style="display: none;">No</button> 
                            </label>

                        </div>
                        
                        <div class="form-group file-upload">
                                <input type="file" name="file">
                        </div>

                        <div class="form-group " style="display: none;">
                                
                        </div> -->
                        <input type="submit" class="btn btn-primary" id="button-submit" value="Submit" name="submit" style="color:#fff">
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
    <script src="js/jquery.steps.js"></script>
    <script src="admin/dist/js/adminjs.js"></script>

    <script>

            $().ready(function() {
                /*$('.file-upload').css('display','none');
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
            
             $(".nav-tabs a").click(function(e){
              e.preventDefault();
                $(this).tab('show');
              });*/
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

            $().ready(function() {
                var client_compo_id = document.getElementById("client_compo_id");
                client_compo_id = "<?= 'CLIENT'.date("ymdhis") . abs(rand('0','9'));  ?>";
                $('#client_compo_id').val(client_compo_id);
            });


 
            </script>
  </body>
</html>