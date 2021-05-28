<?php include ('config.php'); 

$id = $_POST['id'];
	$sql = " DELETE FROM customer WHERE ID='$id' ";
	
$result = mysqli_query($con, $sql) ;
	
	mysqli_close($con);
				
	if ($result){
		echo "<script type='text/javascript'>";
	    echo"window.location = '../admin/admin-search.php';";
		echo "</script>";
		}
		else {
				echo "<script type='text/javascript'>";
				echo "alert('error!');";
				echo"window.location = '../admin/admin-search.php'; ";
				echo"</script>";
	}
?>