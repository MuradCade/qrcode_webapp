<?php

include('../../model/db.php');


if(isset($_POST['submit'])){
    $file = $_FILES["file"]["name"];
    $restname = $_POST['restname'];
    $restemail = $_POST['restemail'];
    $restorg = $_POST['restorg'];
    $restphone = $_POST['restphone'];
    $restaddress = $_POST['restaddress'];
    $restid = $_POST['restid'];

    $tempname = $_FILES["file"]["tmp_name"];
    $folder = "../upload_images/" . $file;
    // check if image holder is empty
    if(empty($file)){
    
        $sqlquery = "update restinfo set restname = '$restname', restemail = '$restemail', restorg = '$restorg', restphone = '$restphone',restaddress = '$restaddress' where id = '$restid'";
        $resultquery = mysqli_query($conn,$sqlquery);
        if($resultquery){?>
                <script>
                    alert('Food Item Updated Successfully');
                    window.location.href = '../profile.php?success';
                </script>
        <?php }else{?>
            <script>
                    alert('Failed To Update Food Item');
                    window.location.href = '../profile.php?error';
                </script>
        <?php }
    }else{
                
        $sqlquery = "update restinfo set restlogo = '$file' , restname = '$restname', restemail = '$restemail', restorg = '$restorg', restphone = '$restphone',restaddress = '$restaddress' where id = '$restid'";
        $results = mysqli_query($conn,$sqlquery);
        if($results){
            if (move_uploaded_file($tempname, $folder)) {?>
               <script>
                    alert('Food Item Updated Successfully');
                    window.location.href = '../profile.php?success';
                </script>
            
            <?php } else {?>
                <script>
                    alert('Failed To Update Food Item');
                    // window.location.href = '/dashboard/auth/profile?error';
                </script>
        
            <?php }
            }else{?>
                  <script>
                    alert('Failed To Update Food Item');
                    window.location.href = '../profile.php?error';
                </script>
           <?php }
    }

}