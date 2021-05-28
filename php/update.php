<?php
include ('config.php'); 

    $ID = $_POST["ID"];
    $cu_name = $_POST["cu_name"];
    $cu_phone = $_POST["cu_phone"];
    $contact = $_POST["contact"];
    $cu_case = $_POST["cu_case"];
    $respondent = $_POST["respondent"];
    $answer = $_POST["answer"];
    $status = $_POST["status"];
    

    $sql = "UPDATE customer SET  
        cu_name= '$cu_name' , 
        cu_phone= '$cu_phone' , 
        contact='$contact' , 
        cu_case='$cu_case' , 
        respondent='$respondent' ,
        answer='$answer' ,
        status='$status'
        WHERE ID='$ID' ";
 
    $result = mysqli_query($con, $sql);
    mysqli_close($con);
    if ($result) {
      echo "<script type='text/javascript'>";
      echo "alert('ข้อมูลอัพเดตสำเร็จ');";
      echo "window.location = '../admin/admin-search.php'; ";
      echo "</script>";
    } else {
      echo "<script type='text/javascript'>";
      echo "alert('อัพเดตไม่สำเร็จ โปรดลองอีกครั้ง');";
      echo "window.location = '../admin/admin-search.php'; ";
      echo "</script>";
    }
