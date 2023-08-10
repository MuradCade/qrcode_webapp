<?php
session_start();
include('../model/db.php');

if(!isset($_SESSION['restid'])){
  header('location:../view/login.php');
}








// delete customer info

if(isset($_GET['delcustomer'])){
  $customerid = $_GET['delcustomer'];

  $sql = "delete from userinfo where id = '$customerid'";
  $result = mysqli_query($conn,$sql);

  if($result){ ?>
      <script>
        alert('Customer Info Deleted Successfully');
        window.location.href = '/dashboard/view_customer_info.php';
      </script>
  <?php }else{?>
    <script>
        alert('Customer Info Failed To Delete');
        window.location.href = '/dashboard/view_customer_info.php';
      </script>
  <?php }
}

?>
<!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-menu-fixed"
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

    <title>Dashboard | View Customer Information</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link
      rel="icon"
      type="image/x-icon"
      href="../assets/img/favicon/favicon.ico"
    />

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
    <link
      rel="stylesheet"
      href="../assets/vendor/css/core.css"
      class="template-customizer-core-css"
    />
    <link
      rel="stylesheet"
      href="../assets/vendor/css/theme-default.css"
      class="template-customizer-theme-css"
    />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link
      rel="stylesheet"
      href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css"
    />

    <link
      rel="stylesheet"
      href="../assets/vendor/libs/apex-charts/apex-charts.css"
    />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
      <aside
<?php 

$id = $_SESSION['restid'];

$sqldata = "select * from restinfo";
$resultdata = mysqli_query($conn,$sqldata);




if($resultdata){
  while($row = mysqli_fetch_assoc($resultdata)){

 
?>
          id="layout-menu"
          class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="index.php" class="app-brand-link">
              <img src="upload_images/<?= $row['restlogo']; ?>" alt="resturant logo" width="40">
              <span style="font-size: 16px; font-weight: bold; color: #697a8d; position: relative;top:5px;"
                > <?= $row['restname']; ?></span
              >
            </a>
<?php  }
}
?>
            <a
              href="javascript:void(0);"
              class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none"
            >
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item <?php echo parse_url($_SERVER['REQUEST_URI'])['path'] == '/dashboard/'? 'active':''?>">
              <a href="index.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>

            <!-- Layouts -->
            <li class="menu-item ">
              
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-package"></i>
                <div data-i18n="Layouts">Menu</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="menu.php" class="menu-link">
                    <div data-i18n="Without menu">View Menu</div>
                  </a>
                </li>
              
                <li class="menu-item">
                  <a href="add_new_menu.php" class="menu-link">
                    <div data-i18n="Without navbar">Add New Item</div>
                  </a>
                </li>
                <li class="menu-item ">
                  <a href="view_tables.php" class="menu-link">
                    <div data-i18n="Container">View Rooms</div>
                  </a>
                </li>
                <li class="menu-item ">
                  <a href="add_new_table.php" class="menu-link">
                    <div data-i18n="Fluid">Add New Room</div>
                  </a>
                </li>
                
              </ul>
            </li>

            <!-- <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Pages</span>
            </li> -->
         
            <li class="menu-item  
            <?php
            
            if(parse_url($_SERVER['REQUEST_URI'])['path'] == '/dashboard/view_order.php'){         
                   echo "active";
            }else if(parse_url($_SERVER['REQUEST_URI'])['path'] == '/dashboard/pending_order.php'){
                  echo 'active';
            }
            
            
            ?>
            ">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dish"></i>
                <div data-i18n="Misc">Orders</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item <?php echo parse_url($_SERVER['REQUEST_URI'])['path'] == '/dashboard/view_order.php'?'active':''?>">
                  <a href="view_order.php" class="menu-link">
                    <div data-i18n="Error">View Order</div>
                  </a>
                </li>
                
               
              </ul>
            </li>
            
        
            <li class="menu-item active">
              <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-minus-front"></i>
                <div data-i18n="User interface">Customers</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item active">
                  <a href="view_customer_info.php" class="menu-link">
                    <div data-i18n="Accordion">View Customers</div>
                  </a>
                </li>
               
              </ul>
            </li>

            <!-- Extended components -->
            <li class="menu-item
            <?php

            if(parse_url($_SERVER['REQUEST_URI'])['path'] == '/dashboard/profile.php'){
              echo 'active';
            }
            else if(parse_url($_SERVER['REQUEST_URI'])['path'] == '/dashboard/change_pwd.php'){
              echo 'active';
            }


            ?>
            ">
              <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-cog"></i>
                <div data-i18n="Extended UI">Setting</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item <?php echo parse_url($_SERVER['REQUEST_URI'])['path'] == '/dashboard/profile.php'?'active':''?>">
                  <a
                    href="profile.php"
                    class="menu-link"
                  >
                    <div data-i18n="Perfect Scrollbar">Profile</div>
                  </a>
                </li>
                <li class="menu-item <?php echo parse_url($_SERVER['REQUEST_URI'])['path'] == '/dashboard/change_pwd.php'?'active':''?>">
                  <a href="change_pwd.php" class="menu-link">
                    <div data-i18n="Text Divider">Change Password</div>
                  </a>
                </li>
              </ul>
            </li>
            <!--  -->
            <li class="menu-item  <?php echo parse_url($_SERVER['REQUEST_URI'])['path'] == '/dashboard/report.php'?'active':''?>">
            <a href="report.php" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-archive"></i>
                            <div data-i18n="Misc">Report</div>
                          </a>
            </li>
          </ul>
        </aside>

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <?php 
include('../model/db.php');



if(isset($_GET['logout'])){
  if($_GET['logout'] == 'true'){
      session_destroy();
  
  
  ?>
    <script>
      window.location.href = '../view/login.php';
    </script>
<?php } }
// session_start();
$id = $_SESSION['restid'];

$sql = "select * from restinfo";
$result = mysqli_query($conn,$sql);





?>

<nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar">
            <div
              class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none"
            >
              <a
                class="nav-item nav-link px-0 me-xl-4"
                href="javascript:void(0)"
              >
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div
              class="navbar-nav-right d-flex align-items-center"
              id="navbar-collapse"
            >
              <!-- Search -->
              <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                  <!-- <i class="bx bx-search fs-4 lh-0"></i> -->
                  <!-- <input
                    type="text"
                    class="form-control border-0 shadow-none"
                    placeholder="Search..."
                    aria-label="Search..."
                  /> -->
                </div>
              </div>
              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->
                <!-- <li class="nav-item lh-1 me-3">
                  <a
                    class="github-button"
                    href="https://github.com/themeselection/sneat-html-admin-template-free"
                    data-icon="octicon-star"
                    data-size="large"
                    data-show-count="true"
                    aria-label="Star themeselection/sneat-html-admin-template-free on GitHub"
                    >Star</a
                  >
                </li> -->

                <!-- User -->
                <?php 
                
                if($result){
                  while($row = mysqli_fetch_assoc($result)){

                 

                ?>
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a
                    class="nav-link dropdown-toggle hide-arrow"
                    href="javascript:void(0);"
                    data-bs-toggle="dropdown"
                  >
                    <div class="avatar avatar-online">
                      <img
                        src="upload_images/<?= $row['restlogo']; ?>"
                        class="w-px-40 h-auto rounded-circle"
                      />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img
                                src="../upload_images/<?= $row['restlogo']; ?>"
                                alt
                                class="w-px-40 h-auto rounded-circle"
                              />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block"><?php echo $row['restname'];?></span>
                            <small class="text-muted">Admin</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="profile.php">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">My Profile</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="change_pwd.php">
                        <i class="bx bx-cog me-2"></i>
                        <span class="align-middle">Change Password</span>
                      </a>
                    </li>
                    <?php }} ?>
                    <!-- <li>
                      <a class="dropdown-item" href="#">
                        <span class="d-flex align-items-center align-middle">
                          <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
                          <span class="flex-grow-1 align-middle">Billing</span>
                          <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>
                        </span>
                      </a>
                    </li> -->
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="view_customer_info.php?logout=true">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Log Out</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>


          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <div class="col-lg-12 mb-4 order-0">
                <div class="card">
                    <h6 class="card-header fw-bold " style="font-size: 15px !important">
                      View Customer Information
                    </h6>
                    <div class="card-body">
                      <div class="Container text-end">
                        <input
                          type="text"
                          style="
                            width: 240px !important;
                            border: none;
                            outline: none;
                            background-color: #f1f1f6;
                            padding: 11px;
                            color: black;
                            font-weight: 600;
                            margin-bottom: 10px;
                            font-size: 14px;
                            border-radius: 2px;
                          "
                          placeholder="Search By Name"
                          id="myInput"
                          onkeyup="myFunction()"
                        />
                      </div>
                      <div class="table-responsive text-nowrap">
                        <table class="table table-bordered" id="myTable">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>customer name</th>
                              <th>customer phone</th>
                              <th>Room Number</th>
                              <th>Created_at</th>
                              <th>Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $sql = "select * from userinfo";
                            $result = mysqli_query($conn,$sql);
                            
                            
                            
                            $num = 1;
                            if($result){
                              while($row = mysqli_fetch_assoc($result)){
                            
                            ?>
                            <tr>
                              <td><?=  $num;?></td>
                              <td><p><?=  $row['fullname'];?></p></td>
                              <td><p><?=  $row['phone'];?></p></td>
                              <td><p class="text-wrap"><?=  'Room '.$row['table_number'];?></p></td>
                              <td><p class="text-wrap"><?=  date('d-m-Y',strtotime($row['created_at']));?></p></td>
                              <td>
                                <!-- <button class="btn btn-primary">Accept</button> -->
                                <a href='/dashboard/view_customer_info.php?delcustomer=<?= $row['id'];?>' class="btn btn-danger fw-bold">Delete</a>
                              </td>
                            </tr>
                            <?php $num++;}} ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div
                class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column"
              >
                <div class="mb-2 mb-md-0">
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  , made by
                  <a href="#" target="_blank" class="footer-link fw-bolder"
                    >Sahan Technology And Solution Company</a
                  >
                </div>
                <div>
                  <!-- <a
                    href="https://themeselection.com/license/"
                    class="footer-link me-4"
                    target="_blank"
                    >License</a
                  > -->
                  <!-- <a
                    href="https://themeselection.com/"
                    target="_blank"
                    class="footer-link me-4"
                    >More Themes</a
                  > -->

                  <!-- <a
                    href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/"
                    target="_blank"
                    class="footer-link me-4"
                    >Documentation</a
                  > -->

                  <a
                    href="https://github.com/themeselection/sneat-html-admin-template-free/issues"
                    target="_blank"
                    class="footer-link me-4"
                    style="font-weight: 600"
                    >Customer Support</a
                  >
                </div>
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>

    <script>
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  
  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}

</script>

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
