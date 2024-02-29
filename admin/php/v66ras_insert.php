<?php
session_start();
		if(isset($_POST['submit'])){
	
				$kauplus = $_POST['kauplus'] ;
				$ettevote = $_POST['ettevote'] ;
				$teostaja = $_POST['teostaja'] ;
				$dokument = $_POST['dokumendi_nr'] ;
				$p6hjus = $_POST['p6hjus'] ;
				$ligip22s = $_POST['ligip22s'] ;
				$kuupaev = $_POST['kuupaev'] ;
					
	
			if(!empty($_POST['ettevote'] && $_POST['teostaja'])){
			
			
				$sql = "INSERT INTO v66rad (kauplus, ettevote, teostaja, dokumendi_nr, p6hjus, ligip22s, tulemine) VALUES ('$kauplus', '$ettevote', '$teostaja', '$dokument', '$p6hjus', '$ligip22s', '$kuupaev')";
			
				$run = mysqli_query($conn,$sql) or die(mysqli_error($conn));
				
				if($run){
					$success = "Andmed sisestatud" ;	
				}else {
					echo "Midagi läks valesti" ;
					}
		
	       	} 
	}
		
?>