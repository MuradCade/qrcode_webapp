<?php
session_start();
include('../model/db.php');



if(isset($_SESSION['restid'])){
  header('location:/dashboard/');
  die();
}
if(isset($_POST['submit'])){
  $email = $_POST['email'];
  $pwd = $_POST['pwd'];
  $sql = "select * from restinfo";
  $result = mysqli_query($conn,$sql);

  if($result){
    if(empty($email)){
      header("location:login.php?inputerror");
            exit();
    }else if(empty($pwd)){
      header("location:login.php?inputerror");
      exit();
    }else{
    while($row = mysqli_fetch_assoc($result))
        if($row["restemail"] == $email && $row["pwd"] == $pwd){
            session_start();
            $_SESSION["restid"] = $row["id"];
            $_SESSION["restname"] = $row["restname"];

            header("location:../dashboard/");
            exit();
        }
        else{
            header("location:login.php?erroremailandpwd");
            exit();
        }

      }
    
}else{
  header("location:login.php?error");
  exit();
}



}

?>
<!DOCTYPE html>
<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />
    <meta name="description"/>
   
    <title>Login</title>


    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="../assets/vendor/css/pages/page-auth.css" />
    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js"></script>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/custom.css">
  </head>

  <body>
  
    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <a href="menu.php"><img src="../img/back-btn.png" alt="" width="20" style="float:left;"></a>
              <div class="app-brand justify-content-center">
                <a href="index.html" class="app-brand-link gap-2">
                  
                <img src="../img/logo.png" alt="returant logo" width="50">
                  
                </a>
              </div>
              <!-- /Logo -->
              <?php if(isset($_GET['erroremailandpwd'])){?>
                  <p class="bg-danger p-2 fw-bold text-white">Wrong Email And Password</p>
                  <?php  }else if(isset($_GET['inputerror'])){?>
                    <p class="bg-danger p-2 fw-bold text-white">Empty Email And Password Field</p>


                <?php } ?>
              <h4 class="mb-2">Login</h4>
              <p class="mb-4">Get Unlimited Access To Your Account</p>

              <form id="formAuthentication" class="mb-3"  method="POST">
                <div class="mb-3">
                  <label for="email" class="form-label" style="text-transform:  none !important; font-size:12.5px; letter-spacing: 1px;">Email</label>
                  <input
                    type="text"
                    class="form-control"
                    id="email"
                    style="font-size:13px !important;"

                    placeholder="Enter your Email"
                    name="email"
                  />
                </div>
                <div class="mb-3 form-password-toggle">
                  <div class="d-flex justify-content-between">
                    <label class="form-label" for="password" style="text-transform:  none !important; font-size:12.5px; letter-spacing: 1px;">Password</label>
                    <a href="auth-forgot-password-basic.html">
                      <!-- <small>Forgot Password?</small> -->
                    </a>
                  </div>
                  <div class="input-group input-group-merge">
                    <input
                    style="font-size:13px !important;"
                      type="password"
                      id="password"
                      class="form-control"
                      placeholder="Enter Your Password"
                      aria-describedby="password"
                      name="pwd"
                    />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                </div>
                <div class="mb-3">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="remember-me" />
                    <label class="form-check-label" for="remember-me" style="font-size:12px;"> Remember Me </label>
                  </div>
                </div>
                <div class="mb-3">
                  <button class="btn btn-primary d-grid w-100 fw-bold" type="submit" name="submit">Sign in</button>
                </div>
              </form>

          
            </div>
          </div>
          <!-- /Register -->
        </div>
      </div>
    </div>

                    <script></script>
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <!-- <script src="../js/bootstrap.bundle.js"></script> -->
    <!-- <script src="../js/bootstrap.min.js"></script> -->

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <!-- <script async defer src="https://buttons.github.io/buttons.js"></script> -->
  </body>
</html>
