<?php include_once('../connection.php');
session_start();

		if(isset($_POST['submit'])){
	
				$username = stripslashes($_SESSION['username']) ;
				$esitaja = $_POST['esitaja'] ;
				$datetime = $_POST['datetime'] ;
				$piirkond = $_POST['piirkond'] ;
				$olu_kirjeldus = $_POST['olu_kirjeldus'] ;
				$pilt = $_FILES['files']['name'] ;
				$likvi = $_POST['likvi'] ;
				$suur_oht = $_POST['suur_oht'] ;
					
	
			if(!empty($_POST['esitaja'] && $_POST['datetime'] && $_POST['piirkond'] && $_POST['olu_kirjeldus'] && $_POST['likvi'] && $_POST['suur_oht'])){
			
			
				$sql = "INSERT INTO ohuolukord (esitaja, datetime, osakond, piirkond, olu_kirjeldus, likvideeritud_kohe, suur_oht, pilt) VALUES ('$esitaja', '$datetime', '$username', '$piirkond', '$olu_kirjeldus', '$likvi', '$suur_oht', '$pilt')";
			
				$run = mysqli_query($conn,$sql) or die(mysqli_error($conn));
				
				if($run){
					$success = "Andmed sisestatud" ;	
				}else {
					echo "Midagi läks valesti" ;
					}
		
	       	}else{
				$empty = "Täidke kõik lahtrid!" ;
			}

}
		
?>