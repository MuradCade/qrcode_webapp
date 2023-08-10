<?php

include '../../model/db.php';

if(isset($_POST['submit'])){
    $tablename = $_POST['tablename'];
    

    if(empty($tablename)){?>
         <script>
        window.location.href = '../add_new_table.php?inputerror';
    </script>
    <?php }
    $sql = "insert into tables (tablename)value('$tablename')";
    $result = mysqli_query($conn,$sql);
    if($result){?>
    <script>
        window.location.href = '../add_new_table.php?success';
    </script>
        
   <?php }else{?>
    <script>
        window.location.href = '../add_new_table.php?error';
    </script>
    <?php }
}else{
    header('loacation:../add_new_table.php');
    die();
}