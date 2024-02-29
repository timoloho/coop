<?php include_once('../connection.php');
session_start();

		if(isset($_POST['submit'])){
				
				$username = stripslashes($_SESSION['username']) ;
				$kuupaev = $_POST['datetime'] ;
				$posneg = $_POST['posneg'] ;
					
	
			if(!empty($_POST['datetime'] && $_POST['posneg'])){
				
				if($username == "inga.pusi"){
					
					$sql = "INSERT INTO covid_testid (kauplus, kuupaev, testi_tulemus, sisestaja) VALUES ('Kontor', '$kuupaev', '$posneg', '$username')";
			
					$run = mysqli_query($conn,$sql) or die(mysqli_error($conn));
					
					if($run){
						$success = "Andmed sisestatud" ;	
					}else {
						echo "Midagi läks valesti" ;
						}
				}else {
					$sql = "INSERT INTO covid_testid (kauplus, kuupaev, testi_tulemus, sisestaja) VALUES ('$username', '$kuupaev', '$posneg', '$username')";
				
					$run = mysqli_query($conn,$sql) or die(mysqli_error($conn));
					
					if($run){
						$success = "Andmed sisestatud" ;	
					}else {
						echo "Midagi läks valesti" ;
					}
				}
	       	}else{
				$empty = "Täidke kõik lahtrid!" ;
			}
		}	
?>