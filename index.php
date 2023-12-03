<?php 
///////Login Form To The System//////////////
session_start();
if(!empty($_SESSION['user'])){
  echo "<meta http-equiv='refresh' content='0; url=home/index.php?page=dashboard'>";
}
include 'int/message.php';
$msg = new MESSAGE();
include 'db/fn.php';
$db = new DataBase();
 $org_name = $db->_get("basic_info",$db->_toString(array("id"),array("1")),"organisation_name");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>FMS</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="./assets/img/favicon.png" rel="icon">
  <link href="./assets/img/logo.png" rel="apple-touch-icon">

  <link href="./assets/css/fonts.google.css" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="./assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="./assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="./assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="./assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="./assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="./assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="./assets/css/style.css" rel="stylesheet">
   <link href="./assets/css/custom.css" rel="stylesheet">
   <link href="./assets/css/message.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.5.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
  <?php include 'php/action.php'; ?>

  <main>
    <div class="container">
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.php" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">
                    <?php if($org_name == "null"){echo "FMS";}else{echo $org_name;} ?>
                  </span>
                </a>
              </div><!-- End Logo -->

              <!--Page Content -->
              <?php 
              if($db->_count("basic_info","") == 0){
                include './inc/new.php';
              }
              else if(isset($_GET['forgotLogins'])){
                include './inc/resetLogins.php';
              }
              else
              {
                include './inc/login.php';
              }

              ?>
              <!-- EOF page Content -->             

              <div class="credits">
              <?php              
              if($org_name == "null"){
                echo "All rights reserved by FM";
              }
              else{
                echo "All rights reserved by ".$org_name;
              }
              ?>                
                
              </div>

            </div>
          </div>
        </div>
        </section>
    </div>
  </main><!-- End #main -->
</body>
</html>