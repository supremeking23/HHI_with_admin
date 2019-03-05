  <header class="main-header">

    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>HHI</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Hunter's Hub</b></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <?php 
              $login_admin = get_admin_by_id($_SESSION['admin_id']);
          ?>

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <?php if(empty($login_admin['photo'])){ ?>
              <img src="<?php echo url_for(h('admin/uploads/images/guest2.jpg'));?>" class="user-image" alt="User Image">
             <?php }else{ ?>
              <img src="<?php echo url_for(h("admin/uploads/images/{$login_admin['photo']}"));?>" class="user-image" alt="User Image">
            <?php }?>
              <span class="hidden-xs"><?php echo h($_SESSION['admin_name'])?></span>
            </a>
            <ul class="dropdown-menu">


              <!-- User image -->
              <li class="user-header">

                <?php if(empty($login_admin['photo'])){ ?>
                  <img src="<?php echo url_for(h('admin/uploads/images/guest2.jpg'));?>" class="img-circle" alt="User Image">
                <?php }else{ ?>
                  <img src="<?php echo url_for(h("admin/uploads/images/{$login_admin['photo']}"));?>" class="img-circle" alt="User Image">
                <?php }?>
                

                <p>
                  <?php echo h($_SESSION['admin_name'])?>
                  <small></small>
                </p>
              </li>
              <!-- Menu Body -->

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo url_for('admin/profile.php');?>" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo url_for('admin/logout.php');?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>

    </nav>
  </header>
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
