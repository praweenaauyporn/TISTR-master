<?php
        $conn = new mysqli('localhost','root','12345678','tistr');

        if($conn->connect_error > 0){
            die('เชื่อมต่อฐานข้อมูลไม่สำเร็จ'.$conn->connect_error);
           
        } 
        
        mysqli_set_charset($conn, "utf8");
?>