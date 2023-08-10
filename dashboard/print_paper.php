<?php
session_start();
include '../model/db.php';

// get foodid,and id of the customer who order the food 
// get orderid from the url and change the complete _order status to accepted
// it means that the order is accepted and food its on his way to the custoemr
if(!isset($_SESSION['restid'])){
  header('location:../view/login.php');
}


// insert printable value to  
if(isset($_POST['invoice'])){
    if(isset($_GET['name']))
    $customername = $_GET['name'];
    if(isset($_GET['phone']))
    $customerphone = $_GET['phone'];
   
     

}

if(isset($_POST['print'])){
  $cphone = $_POST['phone'];
  if(empty($cphone)){
    echo "empty phone field";
  }else {
    header("location:receipt.php?phone=$cphone");
    die();
  }
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

    <title>Dashboard | View Order</title>

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
            <li class="menu-item <?php 
           
           if(parse_url($_SERVER['REQUEST_URI'])['path'] == '/dashboard/menu.php'){
            echo 'active';
           }else if(parse_url($_SERVER['REQUEST_URI'])['path'] == '/dashboard/add_new_menu.php'){
            echo "active";
           }else if(parse_url($_SERVER['REQUEST_URI'])['path'] == '/dashboard/view_tables.php'){
            echo 'active';
           }else if(parse_url($_SERVER['REQUEST_URI'])['path'] == '/dashboard/add_new_table.php'){
            echo 'active';
           }
            
            ?>">
              
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-package"></i>
                <div data-i18n="Layouts">Menu</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item <?php echo parse_url($_SERVER['REQUEST_URI'])['path'] == '/dashboard/menu.php'?'active':''?>">
                  <a href="menu.php" class="menu-link">
                    <div data-i18n="Without menu">View Menu</div>
                  </a>
                </li>
              
                <li class="menu-item <?php echo parse_url($_SERVER['REQUEST_URI'])['path'] == '/dashboard/add_new_menu.php'?'active':''?>">
                  <a href="add_new_menu.php" class="menu-link">
                    <div data-i18n="Without navbar">Add New Item</div>
                  </a>
                </li>
                <li class="menu-item <?php echo parse_url($_SERVER['REQUEST_URI'])['path'] == '/dashboard/view_tables.php'?'active':''?>">
                  <a href="view_tables.php" class="menu-link">
                    <div data-i18n="Container">View Rooms</div>
                  </a>
                </li>
                <li class="menu-item <?php echo parse_url($_SERVER['REQUEST_URI'])['path'] == '/dashboard/add_new_table.php'?'active':''?>">
                  <a href="add_new_table.php" class="menu-link">
                    <div data-i18n="Fluid">Add New Room</div>
                  </a>
                </li>
                
              </ul>
            </li>

            <!-- <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Pages</span>
            </li> -->
         
            <li class="menu-item  active">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dish"></i>
                <div data-i18n="Misc">Orders</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item active">
                  <a href="view_order.php" class="menu-link">
                    <div data-i18n="Error">View Order</div>
                  </a>
                </li>
               
               
              </ul>
            </li>
            
        
            <li class="menu-item 
            <?php 

            if(parse_url($_SERVER['REQUEST_URI'])['path'] == '/dashboard/view_customer_info.php'){
              echo 'active';
            }
            ?>
            ">
              <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-minus-front"></i>
                <div data-i18n="User interface">Customers</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item <?php echo parse_url($_SERVER['REQUEST_URI'])['path'] == '/dashboard/view_customer_info.php'?'active':''?>">
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
                      <a class="dropdown-item" href="print_paper.php?logout=true">
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
                    Generate Invoice Paper 
                  </h6>
                  <div class="card-body">
                    <?php 
                                        
                    if(isset($_POST['search'])){
                        $customer_phone = $_POST['phone'];
                        $sqls = "select * from userinfo where phone = '$customer_phone'";
                        $results = mysqli_query($conn,$sqls);
                        if($results){
                            $rows = mysqli_num_rows($results);
                            
                            if($rows == 0){
                                echo "<p class='text-danger fw-bold'>Customer Phone Number Not Found!!!</p> <br> <a href='print_paper.php' class='btn btn-secondary'>Refresh</a>";
                            }else{

                            
                            while($row2 = mysqli_fetch_assoc($results)){
                              
                                
                                ?>
                    <div class="form-group" id="hide">
                        <label class="form-label">Customer Name</label>
                        <input type="text" class="form-control" value="<?= $row2['fullname'];?>" readonly>
                    </div>
                    <div class="form-group mt-2" id="hide">
                        <label class="form-label">Phone Number</label>
                        <input type="text" class="form-control" value="<?= $row2['phone'];?>"readonly>
                    </div>
                    <div class="form-group mt-2" id="hide">
                        <label class="form-label">Room Number</label>
                        <input type="text" class="form-control" value="Room <?= $row2['table_number'];?>"readonly>
                    </div>
                    
                    <div style="display:flex; justify-content:space-between;align-item:start;">
                    <h4 class='mt-5'>Receipt</h4>
                      
                    <!-- below link is used to run when the invoice of  single customer is printing -->
                    <a  href="print_paper.php?customer_phone=<?php echo $row2['phone']?>" class="btn btn-primary fw-bold mt-5" >Generate Invoice</a>
                                  

                                    
                    </div>
                                  
                    <div class="table-responsive mt-2">
                 
                        <table class="table table-bordered mb-2" id="table">
                         
                            <thead>
                                <tr>
                                    <th>Food Name</th>
                                    <th>Food  Price</th>
                                    <th>Food Quantity</th>
                                    <th>Total</th>
                                  
                                </tr>
                            </thead>
                                <tbody id='invoice-data'>
                                    <!-- <form method="Post"> -->
                                    <?php
                                    $uid = $row2['user_id'];


                                    // update the foodorder of print_status and customer_phone in the foodorder table when the 
                                    // invoice or receipt paper is ordered
                                    if(isset($_GET['customer_phone'])){
                                      // check if the customer invoice already printed or not
                                      $customer_phone = $_GET['customer_phone'];
                                      $checkquery = "select * from foodorder where user_id = '$uid'";
                                      mysqli_multi_query($conn,$checkquery);
                                      
                                      $checkresult = mysqli_store_result($conn);
                                      if($checkresult){
                                        while($checkrow = mysqli_fetch_assoc($checkresult)){
                                          if($checkrow['print_status'] == 'not_printed'){
                                            $updatequery = "update foodorder set print_status = 'printed' , customer_phone = '$customer_phone' where user_id = '$uid'";
                                            $updateresult = mysqli_query($conn,$updatequery);
                                            if($updateresult){
                                              // header("location:receipt.php?id=$uid");
                                              // die();
                                              echo 'working';
                                            }else{
                                              header("location:print_paper.php?failed");
                                              die();
                                      
                                            }
                                        }else{
                                          // header("location:receipt.php?id=$uid");
                                          // die();  
                                        echo "failed";     
                                                                      }
                                      }
                                      }
                                    }
                                    // end of the code update
                                          $sql3 = "select * from foodorder where user_id ='$uid'";
                                          mysqli_multi_query($conn,$sql3);
                                          $result3 =mysqli_store_result($conn);
                                          if($result3){
                                            while($row3 = mysqli_fetch_assoc($result3)){
                                              // echo $row3['foodid'];
                                              if($row3['complete_order'] != "Accepted"){
                                                echo "Fadlan Dalabka Aqbal Si Aad U dabacdid Invoice Paper";
                                                // break;
                                            }else{  
                                              
                                              
                                    // $foodid = ;
                                    // echo $row3['foodid'];
                                    $sqlquery = "select * from foodmenu where id =".$row3['foodid']."";
                                    mysqli_multi_query($conn,$sqlquery);
                                    $queryresult = mysqli_store_result($conn);
                                    $foodinfo = array();
                                   
                                              while ($foodinfo = mysqli_fetch_assoc($queryresult)) {
                                                # code...
                                                // echo $foodinfo['foodname'];
                                              
                                      // echo ;
                                    
                                      
                                   
                                    ?>
                                 
                                    <tr >
                                        <td ><input type="text" readonly  class='form-control' name="foodname[]" value="<?php echo $foodinfo['foodname']?>"></td>
                                        <td ><input type="text" readonly  class='form-control price' name='foodprice[]' value="<?php echo $foodinfo['price']?>"  id="price"></td>
                                        <td><input type="text" readonly class='form-control qty' name='foodqty[]' value="<?php echo $row3['quantity']?>"></td>
                                        <td ><input type="text" readonly  class='form-control' id="total" name ='foodtotal[]' value="<?php 
                                             echo $row3['quantity']*$foodinfo['price']; ?>"></td>
                                    
                                        
                                    </tr>
                                 
                                    <?php }}}}?>
                                          
                                  </tbody>
                                  <tfoot>
                                  <tr>
                                       
                                        <td colspan="3" class="text-end fw-bold">Total</td>
                                        <td ><p id="grand_total" class="fw-bold mt-2" ></p></td>
                                    </tr>
                                    <!-- </form> -->
                                    
                                  </tfoot>
                                </table>
                                  
                              </div>
                       
                    </div>
                   <style>
                    @media print{
                      body{
                        background-color: red !important;
                      }
                    }
                   </style>
                    <!-- <script>
                      var printbtn = document.getElementById('print');
                      printbtn.addEventListener('click',function(){
                        var divToPrint=document.getElementById("table");
                        newWin= window.open("");
                        newWin.document.write('Receipt');
                        newWin.document.write(divToPrint.outerHTML);
                        newWin.print();
                        newWin.close();
                        
                      })
                     
                      // get the full total and display it
                      let total = document.querySelectorAll('#price');
                      var num= 0;
                      for(var i=0;i<total.length;i++){
                        num += Number(total[i].value);
                        // break;
                      }
                       let alltotal = document.querySelector('#grand_total');
                      alltotal.innerHTML = num+'  Sh';
                    </script> -->
                    <?php   
                                    
 }}}}else{?>
                      <form method="POST">
                       
                      <div class="col-md-6">
                        <div class="form-group">
                            <label class='form-label fw-bold'>Customer Phone</label>
                            <input type="text" placeholder="Enter Customer Phone Number" class='form-control' name="phone">
                        </div>
                        
                        <button class='btn btn-primary mt-2 fw-bold' name="search">Search</button>
                        <button  class="btn btn-secondary mt-2 fw-bold" name="print">Print Invoice</button>
                      </div>
                      </form>
                        <?php }?>
                    

                     
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

    <script src="assets/js/jquery.js"></script>
      
    <script>
        $(document).ready(function(){
      
        
                    $("body").on("keyup",".price",function(){
                        var price =  Number($(this).val());
                        var qty = Number($(this).closest("tr").find(".qty").val());
                        $(this).closest("tr").find("#total").val(price*qty);
                        grand_total();
                    });
                    $("body").on("keyup",".qty",function(){
                        var qty =  Number($(this).val());
                        var price = Number($(this).closest("tr").find(".price").val());
                        $(this).closest("tr").find("#total").val(price*qty);
                        grand_total();
                    });
           
        
        
      });
      // calculate the grand total of the food orders
      let total = 0;
      let grandtotals = document.querySelector('#grand_total');
      let totalprice = document.querySelectorAll('#total');
    
      for(var i=0; i<totalprice.length; i++){
        total += + totalprice[i].value;
      }
      // console.log(totalprice.value);
        
     
      grand_total.innerHTML = total + ' shilling';
      </script>

  </body>
</html>
