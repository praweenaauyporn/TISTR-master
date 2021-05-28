<meta charset="utf-8" />
<script src="../js/jQuery.js"></script>
<script src="../js/javascript.js"></script>

<?php

include("include.php");

$cu_phone = $_POST["cu_phone"];
$cu_name = $_POST["cu_name"];
$contact = $_POST["contact"];
$cu_case = $_POST["cu_case"];
$status = $_POST["check"];

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO customer (cu_phone, cu_name, contact, cu_case, status) 
    VALUES ( '$cu_phone', '$cu_name', '$contact', '$cu_case', '$status')";

if ($conn->query($sql) === TRUE) {
    echo "<script type='text/javascript'>";
    echo "alert('เพิ่มข้อมูลสำเร็จ');";
    echo "window.location = '../admin/admin-key.php'; ";
    echo "</script>";
} else {
    echo "<script type='text/javascript'>";
    echo "alert('เพิ่มข้อมูลไม่สำเร็จ');";
    echo "window.location = '../admin/admin-key.php'; ";
    echo "</script>";
}

$conn->close();

?>