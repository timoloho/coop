<?php
include_once("../../connection.php");
session_start();

	if(isset($_POST['kirjeldus'])){
		$id = $_POST['id'];
		$kirjeldus = $_POST['kirjeldus'];
		$markused = $_POST['markused'];
		$pilt = $_POST['files'];
		$result = mysqli_query($conn, "UPDATE it_t66 SET kirjeldus='$kirjeldus' , markused='$markused' , pilt='$pilt' WHERE it_id='$id'");	
	}
?>