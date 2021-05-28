<meta charset="utf-8" />
<script type='text/javascript' src="../js/jQuery.js"></script>
<script type='text/javascript' src="../js/javascript.js"></script>

<?php
    session_start();

    include("include.php");

        $sql = "SELECT * FROM login WHERE username ='" . $conn->real_escape_string($_POST['username']) . "'
                    and password = '" . $conn->real_escape_string($_POST['password']) . "'";

        $objQuery = $conn->query($sql);
        $objResult = $objQuery->fetch_array();


            if (!$objResult) {
                echo "<script type='text/javascript'>";
                echo "alert('Username และ Password ไม่ถูกต้อง');";
                echo "window.location = '../index.html'; ";
                echo "</script>";
            } 
            else {
                $_SESSION["ID"] = $objResult["ID"];
                $_SESSION["username"] = $objResult["username"];
                $_SESSION["status"] = $objResult["status"];

                session_write_close();

                if ($objResult["status"] == "ADMIN") {
                    echo "<script type='text/javascript'>";
                    echo "alert('ยินดีต้อนรับ');";
                    echo "window.location = '../admin/admin-key.php'; ";
                    echo "</script>";
                } 
                else {
                    echo "<script type='text/javascript'>";
                    echo "alert('เข้าใช้งานได้เฉพาะ ADMIN');";
                    echo "window.location = '../index.html'; ";
                    echo "</script>";
                }
            }

    $conn->close();

?>