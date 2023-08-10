<?php
include '../model/db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
     <title>Print Receipt</title>
    <link rel="stylesheet" href="../css/receipt.css">
</head>
<body onload="print()">
    <?php
    
        if(isset($_GET['phone'])){
        
            $phone = $_GET['phone'];

            // echo $phone;
            $sql = "select * from foodorder where customer_phone = '$phone'";
            $result = mysqli_query($conn,$sql);
            $check = mysqli_num_rows($result);

            if($check <=0){
                echo "<script>";
                echo "alert('Nothing Found For Specified Number');";
                echo  "window.location.href = 'print_paper.php'";
                echo "</script>";
            }else{
             
               
             

            
     ?>
   <div class="center">
   <div class="containers">
        <div class="header">
       
            <div class="borders">
            <h5>Reciept</h5>
            </div>
            </div>
            <?php 
            while($row = mysqli_fetch_assoc($result)){
            $foodquery = "select * from foodmenu where id = ".$row['foodid']."";
            mysqli_multi_query($conn,$foodquery);
                                      
            $foodresult = mysqli_store_result($conn);
           
            while($data = mysqli_fetch_assoc($foodresult)){
               
            ?>
            <div class="invoice-body">
                <p><?= $data['foodname'] ?> <span id="price"><?= $data['price'];?></span></p>
            
            </div>
           <p> <?php
      
            ?></p>
            <?php }}}?>
            <div class="line"></div>
            <div class="total"><p>Total <span id="total"></span></p></div>
            <div class="sign"><p>Signuture <span>-----------------------</span></p></div>
                <div class="text-end">
            

                </div>
        </div>
    </div>
   <div class="text-center">
   <?php }else{
            echo "<div class='text-center mt-5'>";
            echo "<h6 class='fw-bold'>Error , Please Provide Phone Number To Print receipt</h6>";
            echo "<a href='print_paper.php' class='btn btn-primary '>Go Back</a>";
            echo '</div>';
    }?>
   </div>
   <script>
     // calculate the grand total of the food orders
     let total = 0;
      let grandtotals = document.querySelector('#total');
      let totalprice = document.querySelectorAll('#price');
    
      for(var i=0; i<totalprice.length; i++){
        total += + totalprice[i].innerText;
      }
      // console.log(totalprice.value);
        
     
      grandtotals.innerHTML = total + ' shilling';
   </script>
</body>
</html>