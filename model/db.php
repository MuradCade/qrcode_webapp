<?php


$servername = 'localhost';
$username='root';
$pwd = '';
$dbname = 'qrcodewebapp';

$conn = new mysqli($servername,$username,$pwd,$dbname);
if(!$conn){
    echo "Failed to connect to db".mysqli_error($conn);
}
