<?php

include_once("../../connection.php");

if(isset($_POST['id'])){
	
	$id = $_POST['id'];
    
	$result = mysqli_query($conn, "DELETE FROM ladu WHERE id = '$id'");
	
}

?>