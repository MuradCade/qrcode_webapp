<?php

include('../../model/db.php');



if(isset($_POST['submit'])){
    $foodname = $_POST['foodname'];
    $fooddesc = $_POST['fooddesc'];
    $foodprice = $_POST['foodprice'];
    $currency = $_POST['currency'];
    $category = $_POST['category'];
    $food_status = $_POST['food_status'];
    $img = $_FILES["file"]["name"];
    $tempname = $_FILES["file"]["tmp_name"];
    $folder = "../upload_images/" . $img;
    

    if(empty($foodname)){
        header('location:../add_new_menu.php?errorinput');
            die();
    }
    else  if(empty($fooddesc)){
        header('location:../add_new_menu.php?errorinput');
        die();
    }
    else  if(empty($foodprice)){
        header('location:../add_new_menu.php?errorinput');
        die();
    }
    else  if(empty($currency)){
        header('<location: class="">add_new_menu.php?errorinput');
        die();
    }
    else  if(empty($img)){
        header('location:../add_new_menu.php?errorinput');
        die();
    }
    else  if(empty($category)){
        header('location:../add_new_menu.php?errorinput');
        die();
    }
   else if(empty($food_status)){
    header('location:../add_new_menu.php?errorinput');
    die();
   }
    else{
        $sql = "insert into foodmenu(foodimage,foodname,fooddesc,category,price,currency_type,food_status)value('$img','$foodname','$fooddesc','$category','$foodprice','$currency','$food_status')";
        $resul = mysqli_query($conn,$sql);
        if($resul){
            if (move_uploaded_file($tempname, $folder)) {
                header('location:../add_new_menu.php?sucess');
                die();
            
            } else {
                header('location:../add_new_menu.php?errorimg');
                die();
        
            }
            }else{
                header('location:../add_new_menu.php?dbfail');
                die();
            }
    }
   
   
 
}