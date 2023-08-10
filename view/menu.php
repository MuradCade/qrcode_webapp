<?php
// ini_set('display_errors', 0);

session_start();

include('../model/db.php');
// echo "Welcome To Menu Page";

// echo 'Session id'.$_SESSION['scanned'];

// read foodmenu data from the db
$sql = "SELECT * FROM foodmenu where category = 'food'";
$result = mysqli_query($conn,$sql);


// if the url contains scanned = true check if there is session exist if not create one 
if(isset($_GET["scanned"]) ){
    if(!isset($_SESSION["scanned"])){
        $_SESSION["scanned"] = true;
    }else{

        // echo $_SESSION['scanned'];
    }
}

if(!isset($_SESSION['scanned'])){?>

                <script>
                    alert("sorry you can't access this page with out scanning the qrcode")
                    window.location.href = "../index.php";
                </script>
    <?php }



$sqlquery = "select * from restinfo";
$resultquery = mysqli_query($conn,$sqlquery);
$row = mysqli_fetch_assoc($resultquery);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
     <title>Menu | Food</title>
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


<div class="heading">
            <h1><?= $row['restname'];?></h1>
            <h3>&mdash; MENU &mdash; </h3>
       
  </div>

<div class="food-category">
    <a href="menu.php" class=" btn btn-primary btncategory ml-2">Food</a>
    <a href="drink.php" class="btn btn-secondary ml-2">Drink</a>
</div>
<script>
 
    document.querySelectorAll("[name=menu-category]")[1].addEventListener('change',function(){
        // window.location.href = 'drink.php'
        console.log('working');
    });
    getOption();
</script>
<div class="menu">
    <div class="menu-column">
        <?php if($result) { while($row = mysqli_fetch_assoc($result)){?>
            <div class="single-card-menu">
                <?php if($row['food_status'] == 'U Dhamaday'){ ?>
                <div class='food-status-1 bg-danger'><p>U Dhamaday</p></div>
                <?php } else if($row['food_status'] == 'Wan Haynaa'){?>
                <div class='food-status-2 bg-success'><p>Wan Haynaa</p></div>
                <?php }?>
            <img src="../dashboard/upload_images/<?=$row['foodimage'];?>" alt="food-image">
            <div class="card-content">
            <h4><?= $row['foodname'];?> <span class='price'><?php echo  $row['currency_type']== 'dollar'? '$':'';?><?php echo number_format( $row['price']);?><?php echo  $row['currency_type'] == 'shilling'?'sh':'';?></span></h4>
            <p><?= $row['fooddesc'];?></p>
            <form action="menu.php?foodid= <?=  isset($_SESSION['id'])? $row['id']:'0' ?>&food_status=<?= $row['food_status'];?>" method="POST">
            <button name="orderbtn">Order Now</button>
            </form>
            </div>
        </div>
        <?php }}?>
    </div>

   
</div>


<!-- model popup -->
<div class="wrapper">
    <div class="popup">
        <h4 class="title">Fadlan form buuxi si aad u dalbato cuntada aad donaysid</h4>
        <form class="form-content" method="GET" action="menu.php">
                    
                    <label>Fullname</label>
                    <input type="text" class="error"  name="fullname" placeholder="Enter Fullname...">
                    <p class='validation'>Please Enter Your Fullname</p>
                   
               
                    <label>Number</label>
                    <input type="number" class="error" name="phone_number"  placeholder="Enter  Number...">
                    <p class='validation'>Please Enter Your  Number</p>
               
                             <!--  read table number from db-->
                            <?php  

                                $sqls = "select * from tables";
                                $resultes = mysqli_query($conn,$sqls);

                            
                            ?>
                    <label>Room Number</label>
                    <select  class="tables error" name="tables">
                        <option value="">Select  Room Number</option>
                        <?php while($data = mysqli_fetch_assoc($resultes)){
                                echo "<option value=".$data['tablename'].">".$data['tablename']."</option>";
                            }?>
                    </select>
                    <p class='validation'>Please Enter Phone Number</p>
                    
                    <div class="btns">
                        <button class='submit-btn' name="submit" value="true">Submit</button>
                        <button class='cancel-btn'>Cancel</button>
                    </div>
                </form>
    </div>
    <!-- <h4>he</h4> -->
</div>
<script>
    // close btn in model
    let wrapper = document.querySelector('.wrapper');
    let closebtn = document.querySelector('.cancel-btn');

    closebtn.addEventListener('click',function(){
        wrapper.style.display = 'none';
});
</script>

    <script src="../js/bootstrap.bundle.js"></script>
</body>
</html>

<?php
include('../model/db.php');

 // check if the popup form is submitted
 if(isset($_GET['submit'])){
   
    // generate 5 random digit as session id
    $id = rand(10000,99999);
    // echo $id;
    // form values
    $fullname = $_GET['fullname'];
    $phone = $_GET['phone_number'];
    $table_number = $_GET['tables'];
    if(empty($fullname) || empty($phone) || empty($table_number)){?>
        <script>
            alert('Please fill the form');
            // let validation = document.querySelector('.validation');
            // validation.style.display = 'block';
        </script>
    <?php die(); }else{
    $sql = "insert into userinfo(fullname,phone,table_number,user_id)values('$fullname','$phone','$table_number','$id')";
    $result = mysqli_query($conn,$sql);
    if($result){
        session_start();
        $_SESSION['id'] = $id;
        ?>
        <script>
            alert('User Created Successfully');
            window.location.href = 'menu.php';
        </script>
    <?php }
    }
}


// check if the order btn is clicked
if(isset($_GET['foodid'])){
    $foodid = $_GET['foodid'];
   
    
    // check if user has session or not (indicates that user exist or not)
    if(isset($_SESSION['id'])){?>
        <!-- echo "user already exist"; -->
        <script>
        //  let wrapper = document.querySelector('.wrapper');
         wrapper.style.display = 'none';
        //  console.log(wrapper);
        </script>;
    <?php 
        if(isset($_GET['food_status'])){
            $foodstatus = $_GET['food_status'];

            if($foodstatus == 'U Dhamaday'){?>
                
                <script>
                    alert('Macmill Cuntada Aad Dalbanaysid Uu Dhamaday, Fadlan Cunto Kale Dooro');

                </script>
            <?php }else{
                  // store food id to food card table
                  $userid = $_SESSION['id'];
                  $sql = "insert into foodorder(foodid,user_id,complete_order)values('$foodid','$userid','hide')";
                  $result = mysqli_query($conn,$sql);
               
                  if(!$result){?>
                      <script>
                          alert('Failed To Add Order To The Card');
                          window.location.href = 'menu.php';
                          </script>
                  <?php }else{?>
                      <script>
                          alert('Order Added To The Card Successfully');
                          window.location.href = 'menu.php';
                          </script>
                  <?php }
            }
        
      
              
            }
        
            




}else{?>
        <script>
        //  let wrapper = document.querySelector('.wrapper');
         wrapper.style.display = 'block';
        //  console.log(wrapper);
        </script>
        
    <?php 
   


}
    
    
}else{?>
  <script>
        //  let wrapper = document.querySelector('.wrapper');
         wrapper.style.display = 'none';
        //  console.log(wrapper);
        </script>
<?php } ?>