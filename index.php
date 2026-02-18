<?php require_once('./config.php'); ?>
<!DOCTYPE html>
<html lang="en" class="" style="height: auto;">

<head>
    <meta charset="UTF-8">
    <title><?php echo $_settings->info('name') ?></title>
    <!-- Add your existing CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Custom CSS for homepage -->
    <style>
      /* Homepage Background */
      #header {
        height: 70vh;
        width: calc(100%);
        position: relative;
        top: -1em;
      }

      #header:before {
        content: "";
        position: absolute;
        height: calc(100%);
        width: calc(100%);
        background-image: url('assets/img/school_background.jpg'); /* school background */
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center center;
      }

      #header>div {
        position: absolute;
        height: calc(100%);
        width: calc(100%);
        z-index: 2;
      }

      /* Logo */
      .school-logo {
        width: 120px;
        height: auto;
        margin-bottom: 1em;
      }

      /* Hero Text */
      #header h1 {
        color: #f7f7f7; /* white over background */
        font-size: 48px;
        font-weight: bold;
        text-align: center;
      }

      #header p {
        color: #ffffff; /* light green text */
        font-size: 20px;
        text-align: center;
      }

      /* Green theme for active nav links */
      #top-Nav a.nav-link.active {
        color: #0a5500; /* green theme */
        font-weight: 900;
        position: relative;
      }

      #top-Nav a.nav-link.active:before {
        content: "";
        position: absolute;
        border-bottom: 2px solid #0a5500; /* green theme */
        width: 33.33%;
        left: 33.33%;
        bottom: 0;
      }
    </style>
    <?php require_once('inc/header.php') ?>
</head>


<body class="layout-top-nav layout-fixed layout-navbar-fixed" style="height: auto;">
  <div class="wrapper">
    <?php $page = isset($_GET['page']) ? $_GET['page'] : 'home'; ?>
    <?php require_once('inc/topBarNav.php') ?>

    <?php if ($_settings->chk_flashdata('success')): ?>
    <script>
      alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
    </script>
    <?php endif;?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper pt-5">

      <?php if ($page == "home" || $page == "about_us"): ?>
      <div id="header" class="shadow mb-4">
        <div class="d-flex justify-content-center h-100 w-100 align-items-center flex-column px-3">
          <!-- School Logo -->
          <img src="assets/img/school_logo.png" class="school-logo" alt="School Logo">
          <!-- Welcome Text -->
          <h1>St. Dominic Savio College</h1>
          <p><?php echo $_settings->info('name') ?></p>
          <a href="./?page=projects" class="btn btn-lg btn-light rounded-pill w-25" id="enrollment"><b>Explore Projects</b></a>
        </div>
      </div>
      <?php endif; ?>

      <!-- Main content -->
      <section class="content">
        <div class="container">
          <?php 
            if(!file_exists($page.".php") && !is_dir($page)){
                include '404.html';
            } else {
                if(is_dir($page))
                  include $page.'/index.php';
                else
                  include $page.'.php';
            }
          ?>
        </div>
      </section>
      <!-- /.content -->

      <!-- Modals -->
      <div class="modal fade" id="confirm_modal" role='dialog'>
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Confirmation</h5>
            </div>
            <div class="modal-body">
              <div id="delete_content"></div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" id='confirm' onclick="">Continue</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="uni_modal" role='dialog'>
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"></h5>
            </div>
            <div class="modal-body"></div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" id='submit' onclick="$('#uni_modal form').submit()">Save</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="uni_modal_right" role='dialog'>
        <div class="modal-dialog modal-full-height modal-md" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span class="fa fa-arrow-right"></span>
              </button>
            </div>
            <div class="modal-body"></div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="viewer_modal" role='dialog'>
        <div class="modal-dialog modal-md" role="document">
          <div class="modal-content">
            <button type="button" class="btn-close" data-dismiss="modal"><span class="fa fa-times"></span></button>
            <img src="" alt="">
          </div>
        </div>
      </div>

    </div>
    <!-- /.content-wrapper -->

    <?php require_once('inc/footer.php') ?>
  </div>
</body>
</html>