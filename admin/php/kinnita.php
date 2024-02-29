<?php
include_once("../../connection.php");
session_start();

if(isset($_POST['kirjeldus'])){
	
	$id = $_POST['id'];
	$kirjeldus = $_POST['kirjeldus'];
	$markused = $_POST['markused'];
    
	$result = mysqli_query($conn, "UPDATE it_t66 SET kirjeldus='$kirjeldus' , markused='$markused', t66_status= 1 WHERE it_id='$id'");
}

?>