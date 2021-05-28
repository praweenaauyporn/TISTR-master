<?php
$con = mysqli_connect('localhost','root','12345678','tistr');
if($con -> connect_error > 0){
    die('เชื่อมต่อฐานข้อมูลไม่สำเร็จ'.$con->connect_error);
}
?>