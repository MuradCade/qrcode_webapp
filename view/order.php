<?php
// ini_set('display_errors', 0);

session_start();
include('../model/db.php');

// delete from cart table
if(isset($_GET['del'])){

  echo $_GET['del'];
  $delid = $_GET['del'];
  $sql = "DELETE FROM foodorder WHERE  id ='$delid'";
  $result = mysqli_query($conn,$sql);
  if($result){

  ?>
      <script>
        alert('Item Delete From Card');
        window.location.href = 'order.php';
      </script>
  <?php
   }
}


 // update the status of the order when complete button clicks
  if(isset($_GET['porder'])){
  
    $orderid = $_GET['porder'];
  $sql = "update foodorder set complete_order = 'waiting' where id = '$orderid'";
                              $queryresult = mysqli_query($conn,$sql);
  if($queryresult){
       ?>
      <script>
        alert('Macmiil Dalabkaga  Wa La Gudbiyay');
        window.location.href="order.php";
        </script>
  <?php } else{?>
      <script>
       alert('Sorry , Dalabkaga  Wa La Gudbin Wayay ,Fadlan Markale Ku Celi');
       window.location.href="order.php";
       </script>
       <?php }
                           
     }
                           

  
  ?>
  
 




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/custom.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Order</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/orderfood.css">
    <!-- <title>Orders</title> -->
</head>
<body>
<nav class="navbar navbar-expand-lg">
      <div class="container-fluid">
        <a class="navbar-brand text-white ft-bold" href="menu.php"><img src="../img/logo.png" alt="website logo" class="img"></a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item ml-2">
              <a class="nav-link" href='order.php' id="order"><img src="../img/cart-shopping-solid.svg" alt="orders" width="22" style="color:#0b5ed7 !important"></a>
            </li>
            <li class="nav-item ml-2">
              <a class="nav-link  text-primarys" aria-current="page" href="login.php" style="font-weight:600;">Login</a>
            </li>
            
          </ul>
        </div>
      </div>
    </nav>

<?php if(!isset($_SESSION['id'])){?>
<div class="container text-center">


    <div class="bigcart mt-5"></div>
    <h3 style=" font-weight:bold;">Your Orders cart</h3>
    <p class="text-secondary">Cunta walba oo aad dalbato waxad ka heli donata halkan</p>
   
</div>

<?php  die();} else {?>
<div class="container px-3 my-5 clearfix">
    <!-- Shopping cart table -->
    <div class="card">
        <div class="card-header">
            <h2 style="font-size:17px; font-weight:bold"> <a href="menu.php"><img src="../img/back-btn.png" alt="" width="20"></a> &numsp; Ordered Food</h2>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <h5 style='font-size:13px !important; line-height:18px;'>Markan dhamayso doorashada cuntada aad donaysid , Fadlan buttonka order taabo si order kaga loo gudbiyo, Mahadsanid.</h5>  
            <table class="table table-bordered m-0">

                <thead>
                
                  <tr>
                    <!-- Set columns width -->
                    <th class="text-center py-3 px-4" style="min-width: 400px;">Food Name &amp; Details</th>
                    <th class="text-right py-3 px-4" style="width: 100px;">Price</th>
                    <th class="text-center py-3 px-4" style="width: 120px;">Quantity</th>
                    <th class="text-right py-3 px-4" style="width: 100px;">Status</th>
                    <th class="text-center align-middle py-3 px-3" style="width: 40px;">Action</th>
                  </tr>
                </thead>
                <tbody>
               
                
                  <!-- <tr> -->
                  <?php 
                     // fecth card data and get the food id for the specific user_id
                    $uid = $_SESSION['id'];
                    $sql = "select * from foodorder where user_id = '$uid'";
                    // mysqli_multi_query();
                    $result = mysqli_query($conn,$sql);
                    if($result){
                      while($row = mysqli_fetch_assoc($result)){
                        // echo $row['foodid'];
                      
                        $query = "select * from foodmenu where id = ".$row['foodid']."";
                        mysqli_multi_query($conn,$query);
                        $queryresult = mysqli_store_result($conn);
                        if($queryresult){
                          while($fooddata = mysqli_fetch_assoc($queryresult)){
                            // echo $fooddata['foodname'];
                            ?>
                               <tr>
                              <td class="d-flex align-items-center"> <img src="../dashboard/upload_images/<?= $fooddata['foodimage']; ?>" alt="food-image" width="90" class="py-2 rounded">
                            <p style="font-size:18px; margin-left:20px;margin-top:12px; font-weight:600"><?= $fooddata['foodname']; ?></p></td>
                            <td><input type="text" value="<?php
                              if($fooddata['currency_type'] == 'shilling'){
                                echo $fooddata['price'];
                              }else if($fooddata['currency_type'] == 'dollar'){
                                echo $fooddata['price'];
                              }
                            ?>" style="border:none" id="totalprice"></td>
                            <td><p class="text-center"><?= $row['quantity']?></p></td>
                            <td><p>
                              <?php
                              if($row['complete_order'] == 'hide'){
                                echo "<p class='text-secondary fw-bold'>Weli Dalab kaga Lama Gudbin</p>";
                              }else if($row['complete_order'] == 'waiting'){
                                
                                echo "<p class='text-success fw-bold'>Dalab kaga  Waa La Gudbiyay</p>";
                              }else if($row['complete_order'] == 'Accepted'){
                                echo "<p class='text-success fw-bold'>Dalabkaga Waa La Aqbalay</p>";
                              }else if($row['complete_order'] == 'Cancelled'){
                                echo "<p class='text-danger fw-bold'>Dalabkaga Waa La Aqbali Wayay</p>";
                              }
                              
                              
                              ?>     
                            </p></td>
                            <td>
                              <?php
                              // echo $row['complete_order'];
                                if($row['complete_order'] == 'hide'){?>
                                  <a href="order.php?del=<?= $row['id'];?>" class="btn btn-danger">Delete</a> 
                                <?php }else{?>
                                  <a href="#" class="btn btn-danger">Delete</a> 
                                <?php }
                              ?>
                              <?php
                                  if($row['complete_order'] == 'hide'){?>
                                    <a href="order.php?porder=<?=$row['id'];?>" class='btn btn-primary mt-2'>order</a>
                                  <?php } ?>
                              
                          </td>
                            </tr>
                       
                           <?php
                           }
                            }
                            }
                            }
                  ?>
                </tbody>
                <tfoot>
                                  <tr>
                                       
                                        <td colspan="1" class="text-end fw-bold">Total</td>
                                        <td ><p id="grand_total" class="fw-bold mt-2" >jj</p></td>
                                    </tr>
                                    <!-- </form> -->
                                    
                                  </tfoot>
              </table>
            </div>
            <!-- / Shopping cart table -->
        
            <div class="d-flex flex-wrap justify-content-between align-items-center pb-4">
              <div class="mt-4">
                <!-- <label class="text-muted font-weight-normal">Promocode</label>
                <input type="text" placeholder="ABC" class="form-control"> -->
              </div>
              <div class="d-flex">
                <div class="text-right mt-4 mr-5">
                  <!-- <label class="text-muted font-weight-normal m-0">Discount</label>
                  <div class="text-large"><strong>$20</strong></div> -->
                </div>
                <div class="text-right mt-4">
                  <!-- <label class="text-muted font-weight-normal m-0">Total price</label> -->
                  <!-- <div class="text-large"><strong><?php $total = 0;  $total +=$rows['price']; echo $total ?></strong></div> -->
                </div>
              </div>
            </div>
                    <!-- check if the complete_order is clicked -->
            <div class=" text-end">
              <!-- <button type="button" class="btn btn-lg btn-default md-btn-flat mt-2 mr-3 text-primary"  style="font-size:14px;">Order New Food</button> -->
              
            </div>
        
          </div>
      </div>
  </div>

  <?php
                  
                }
                          ?>

<script>
       // calculate the grand total of the food orders
       let total = 0;
      let grandtotals = document.querySelector('#grand_total');
      let totalprice = document.querySelectorAll('#totalprice');
    
      for(var i=0; i<totalprice.length; i++){
        total += + totalprice[i].value;
      }
      // console.log(totalprice.value);
        
     
      grand_total.innerHTML = total + ' shilling';
</script>
<script src="../js/bootstrap.bundle.js"></script>

</body>
</html>