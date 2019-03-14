  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <?php if(empty($login_admin['photo'])){ ?>
          <img src="<?php echo url_for(h('admin/uploads/images/guest2.jpg'));?>" class="img-circle" alt="User Image">
          <?php }else{ ?>
           <img src="<?php echo url_for(h("admin/uploads/images/{$login_admin['photo']}"));?>" class="img-circle" alt="User Image">
         <?php }?>
        </div>
        <div class="pull-left info">
          <p><?php echo h($login_admin['firstname']);?></p>
          <!--<a href="#"><i class="fa fa-circle text-success"></i> Online</a> -->
        </div>
      </div>


      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>


        <li><a href="<?php echo url_for('admin/dashboard.php');?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        
       <!-- <li><a href="<?php echo url_for('admin/message.php');?>"><i class="fa fa-inbox"></i> <span>Message</span></a></li> -->

       <?php if($_SESSION['admin_type'] == "SUPERADMIN"):?>
        <li><a href="<?php echo url_for('admin/inquiries.php');?>"><i class="fa fa-question-circle"></i> <span>Inquiries</span></a></li>
       <?php endif; ?>
        <li><a href="<?php echo url_for('admin/jobseeker.php');?>"><i class="fa fa-users"></i> <span>Jobseeker</span></a></li>

        <li><a href="<?php echo url_for('admin/client.php');?>"><i class="fa fa-users"></i> <span>Client</span></a></li>

        <?php if($_SESSION['admin_type'] == "SUPERADMIN"):?>
        <li><a href="<?php echo url_for('admin/user-management.php');?>"><i class="fa fa-user-secret"></i> <span>User Management</span></a></li>
      <?php endif; ?>
        <!--<li><a href="<?php echo url_for('admin/chatbot.php');?>"><i class="fa fa-user-secret"></i> <span>Chatbot</span></a></li> -->
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>