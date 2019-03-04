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

  <!-- Nav tabs -->
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link active" href="#clientform">Client Information</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#manpower">Man Power Request Form</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#cont">Qualification and Job Description</a>
    </li>
  </ul>



    <!-- Tab panes -->
  <div class="tab-content">
    <div id="clientform" class="container tab-pane active"><br>
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
    </div>
    <div id="manpower" class="container tab-pane fade"><br>

        <div class="form-group">
            <input type="text" class="form-control input-text-color" placeholder="Position" id="position" name="position">
        </div>     



        <!-- Checkboxes -->
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="new_requirements" value="">
            <label class="form-check-label" style="color: #ffffff">New Requirement</label>
        </div>

        <!-- Checkboxes -->
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="replacement_form" value="">
            <label class="form-check-label" style="color: #ffffff">Replacement Form</label>
        </div>



        <div class="form-group">
            <input type="text" class="form-control input-text-color" placeholder="Company Name" id="company_name" name="company_name">
        </div> 

        <div class="form-group">
            <input type="text" class="form-control input-text-color" placeholder="Department" id="department" name="department">
        </div>

        

        <div class="form-group">
            <input type="text" class="form-control input-text-color" placeholder="Work Location" id="work_location" name="work_location">
        </div>  


        <div class="form-group">
            <input type="text" class="form-control input-text-color" placeholder="Work Duration" id="work_duration" name="work_duration">
        </div>  

        <div class="form-group">
            <input type="text" class="form-control input-text-color" placeholder="Requestor" id="requestor" name="requestor">
        </div> 

        <div class="form-group">
            <input type="text" class="form-control input-text-color" placeholder="Budget Allocated" id="budget_allocated" name="budget_allocated">
        </div> 


        <!-- Checkboxes -->

        <div class="form-group"  style="background:#999;padding:10px">
          <label class="form-check-label" style="color:#eee">Reporting Schedule</label>
        </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="fixed_hour" value="">
            <label class="form-check-label" style="color: #eee">Fixed Hour</label>
        </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="flexible_time" value="">
            <label class="form-check-label" style="color: #eee">Flexible Time</label>
        </div>


        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="shifting" value="">
            <label class="form-check-label" style="color: #eee">Shifting</label>
        </div>



        <div class="form-group" style="background:#999;padding:10px">
          <label class="form-check-label" style="color:#eee">Billing Procedure</label>
        </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="monthly_billing" value="">
            <label class="form-check-label" style="color: #eee">Monthly Billing</label>
        </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="hourly_billing" value="">
            <label class="form-check-label" style="color: #eee">Hourly Billing</label>
        </div>


        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="daily_billing" value="">
            <label class="form-check-label" style="color: #eee">Daily Billing</label>
        </div>


        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="no_work_no_pay" value="">
            <label class="form-check-label" style="color: #eee">No work no pay</label>
        </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="paid_holiday" value="">
            <label class="form-check-label" style="color: #eee">Paid Holiday</label>
        </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="night_differential" value="">
            <label class="form-check-label" style="color: #eee">Night Differential</label>
        </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="overtime_pay" value="">
            <label class="form-check-label" style="color: #eee">Overtime Pay</label>
        </div>
    </div>

    <div id="cont" class="container tab-pane fade" >
      <br />
        <div class="form-group">
            <input type="text" class="form-control input-text-color" placeholder="Qualifications" id="qualification" name="qualification">
        </div> 


        <div class="form-group">
           <textarea class="form-control input-text-color" placeholder="Job Description"></textarea>
        </div> 

        <br />
        <input type="submit" class="btn btn-primary" value="Submit" name="submit">
    </div>


    <div id="menu2" class="container tab-pane fade"><br>
    </div>
  </div>



                      
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
            
             $(".nav-tabs a").click(function(e){
              e.preventDefault();
                $(this).tab('show');
              });
            });
            </script>
  </body>
</html>