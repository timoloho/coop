<?php
include_once("../../connection.php");
session_start();

	if(isset($_POST['kirjeldus'])){
		$id = $_POST['id'];
		$kirjeldus = $_POST['kirjeldus'];
		$sn = $_POST['sn'];
		$seade = $_POST['seade'];
		$kauplus = $_POST['kauplus'];
		$mudel = $_POST['mudel'];
		$status = $_POST['status'];
		$riiul = $_POST['riiul'];

		$result = mysqli_query($conn, "UPDATE ladu SET kirjeldus='$kirjeldus' , sn='$sn', seade='$seade', mudel='$mudel', kauplus='$kauplus',status='$status', riiul='$riiul' WHERE id='$id'");	
	}
?>