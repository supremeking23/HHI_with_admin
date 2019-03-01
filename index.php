<!doctype html>
<html lang="en">

  <?php 
  include('includes/header.php');?>
  <body id="home">
   <?php include('includes/navigation.php');?>


  <!--<div class="jumbotron">
      <div class="container">
        <div class="row">
          <div class="col-lg-5">
            <h1>Hunter's <span class="em-text">Hub</span></h1>
            <p>Your company of choice, for Headhunting & Sourcing Services in all industries</p>
            <button type="button" class="btn btn-sm btn-flat btn-success">Know More</button>
            <a role="button" class="btn btn-sm btn-flat btn-success a-button" href="about.html">Know More</a>
          </div>
        </div>
      </div>
  </div> -->
    
  <div id="slides" class="carousel slide" data-ride="carousel">
    <ul class="carousel-indicators">
      <li data-target="#slides" data-slide-to="0" class="active"></li>
      <li data-target="#slides" data-slide-to="1"></li>
      <li data-target="#slides" data-slide-to="2"></li>
    </ul>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="img/hr-assistant-opacity.jpg">
        <div class="carousel-caption">
          <h1 style="font-weight: bold;" class="text-center text-uppercase  animated fadeInLeft">Hunter's Hub </h1>
              <h3 style="font-weight: bold" class="text-center animated fadeInDown">Incorporated</h3>

        </div>
      </div>

      <div class="carousel-item ">
        <img src="img/banner-two-gray.jpg">
        <div class="carousel-caption">
         <h3 style="font-weight: bold;" class="text-center animated fadeInUp ">Your company of choice, <br />for Headhunting & Sourcing Services in all industries</h3>
        </div>       
      </div>

      <div class="carousel-item ">
        <img src="img/banner-three-opacity.jpg">
        <div class="carousel-caption">
          <h1 style="font-weight: bold;color: " class="text-center text-uppercase  animated fadeInLeft">Work with us</h1>

        </div>
      </div>
    </div>
  </div>


    <section id="feature">
      <div class="container">

      <div class="why-hunter">
        <div class="row ">
          <div class="col-lg-12">
            <h1 class="text-center">Why Hunter's Hub</h1>
            <p align="justify">The world is moving so fast; it’s sometimes easy to lose sight of the things that truly matter. That’s why at Hunter's Hub we created "The Hunter’s hub way – a strong set of company values that drives everything we do." Everything we do comes back to our values. They are real. They are important.</p>

            <ul class="list-items">
              <li><i class="fa fa-check-square check" style="font-size: 30px;color: green"></i>Our corporate efforts include strong human resources that have focus and benefits that are rare in our industry. Hunter’s Hub values its employees that in turn know how to value our clients.</li>
              <li><i class="fa fa-check-square check" style="font-size: 30px;color: green"></i> Our employees have developed vast skills under the Hunter's Hub's strong culture of employee respect and appreciation. Likewise, Hunter’s Hub employs and sources out only the best candidates that are fit for the job positions needing to be filled.</li>
              <li><i class="fa fa-check-square check" style="font-size: 30px;color: green"></i>Our long range strategy at Hunter’s Hub is focused on our essential need to position ourselves to be an employer of choice for our industry and to not only meet, but exceed client expectations.</li>
            </ul> 
          </div>
        </div>

      </div>

      </div>
    </section>

    <section id="middle-pillars">
      <div class="container-fluid">
        <div class="row ">
          <div class="col-md-1"></div>
          <div class="col-md-3   pillars text-center" style="margin-left: 10px">
             <img src="img/team_2.png" class="demo">
             <h2>Total Commitment</h2>
             <p>to service  <b><i>INTEGRITY</i></b> and <b><i>QUALITY</i></b>.</p>
          </div>

          <div class="col-md-3 pillars text-center">
            <img src="img/growth.png" class="demo">
            <h2>Excellent Performance</h2>
            <p>which is geared towards <b><i>DILIGENCE</i></b>, <b><i>DIVERSITY</i></b> and <b><i>CREATIVITY</i></b>.</p>
         </div>

         <div class="col-md-3 pillars text-center">
          <img src="img/brainstorm.png" class="demo">
          <h2>Business Innovation</h2>
          <p>in response to the <b><i>"RIGHT NOW, RIGHT AWAY"</i></b> trend.</p>
         </div>

        </div>
      </div>
    </section>

   <!-- <div class="container">
      <hr style="    background-color: #eee;
      border: 0 none;
      color: #eee;
      height: 3px;">
    </div> -->

    <section class="client-jobseeker">
      <div class="container">
        <div class="row">
        
          <div class="col-lg-6 quick-link">
              <a href="client.php">
             
                <img src="img/client-parallax-bg.jpg" class="quick-link-image" alt="Clients" title="Clients" style="width:100%">
                <div class="quick-link-textbackground-clients">
                  <div class="quick-link-text"><h4 class="text-center"><b>For Clients</b></h4> </div>
                </div>
              
            </a>
          </div>

          <div class="col-lg-6 quick-link">
              <a href="jobseeker.php">
             
                <img src="img/jobseeker-parallax-bg.jpg" class="quick-link-image" alt="Jobseekers" title="Jobseekers" style="width:100%">
                <div class="quick-link-textbackground-jobseekers">
                  <div class="quick-link-text"><h4 class="text-center"><b>For Jobseekers</b></h4> </div>
                </div>
              
            </a>
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
    <script src="https://static.landbot.io/landbot-widget/landbot-widget-1.0.0.js"></script>
    <script>
     /* var myLandbotLivechat = new LandbotLivechat({
        index: 'https://landbot.io/u/H-130804-J3BXTGYR4GF7NNY8/index.html',
      });*/
    </script>
    <script>
      // Show a proactive message after 2 seconds
     /* setTimeout(() => {
        myLandbotLivechat.sendProactive("Hello there!");
      }, 2000);*/
    </script>
    <script src="js/scripts.js"></script>


    <script>
      
    </script>
  </body>
</html>