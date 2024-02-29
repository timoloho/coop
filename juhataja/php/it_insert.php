<?php include_once('../connection.php');
session_start();

		
	
		if(isset($_POST['submit'])){
			
				$username = stripslashes($_SESSION['username']) ;
				$kirjeldus = $_POST['kirjeldus'] ;
				$markused = $_POST['markused'] ;
				$syndmus = $_POST['syndmus'] ;
				$kinnitus = $_POST['status'] ;
				$pilt = $_FILES["files"]["name"] ;
				//$pilt_id = uniqid();
					
			if(!empty($_POST['syndmus'])){
				
				if(!empty($_POST['kirjeldus']) && $_POST['markused']){
				
					$sql2 = "SELECT kaupluse_nimi FROM kasutajad, kauplused WHERE kauplus_id =".$_SESSION['kasutaja_id']." LIMIT 1 ";

						$result = $conn->query($sql2);
							
							if ($result->num_rows > 0) {
							  // output data of each row
								while($row = $result->fetch_assoc()) {
								  
									$kauplus = $row['kaupluse_nimi'];
								  
									$sql = "INSERT INTO it_t66 (kasutaja, kirjeldus, markused, kauplus, syndmus, pilt, pilt_id) VALUES ('$username', '$kirjeldus', '$markused', '$kauplus', '$syndmus', '$pilt', '$pilt')";
					
									$run = mysqli_query($conn,$sql) or die(mysqli_error($conn));
						
									if($run){
										$success = "Andmed sisestatud" ;	
									}else {
										$error = "Midagi läks valesti" ;
										}
							  
								}
							} 
				} else if(!empty($_POST['kirjeldus'])){
				
					$sql2 = "SELECT kaupluse_nimi FROM kasutajad, kauplused WHERE kauplus_id =".$_SESSION['kasutaja_id']." LIMIT 1 ";

						$result = $conn->query($sql2);
							
							if ($result->num_rows > 0) {
							  // output data of each row
								while($row = $result->fetch_assoc()) {
								  
									$kauplus = $row['kaupluse_nimi'];
								  
									$sql = "INSERT INTO it_t66 (kasutaja, kirjeldus, kauplus, syndmus, pilt, pilt_id) VALUES ('$username', '$kirjeldus', '$kauplus', '$syndmus', '$pilt', '$pilt')";
					
									$run = mysqli_query($conn,$sql) or die(mysqli_error($conn));
						
									if($run){
										$success = "Andmed sisestatud" ;	
									}else {
										$error = "Midagi läks valesti" ;
										}
							  
								}
							} 
				} else if(!empty($_POST['markused'])){
				
					$sql2 = "SELECT kaupluse_nimi FROM kasutajad, kauplused WHERE kauplus_id =".$_SESSION['kasutaja_id']." LIMIT 1 ";

						$result = $conn->query($sql2);
							
							if ($result->num_rows > 0) {
							  // output data of each row
								while($row = $result->fetch_assoc()) {
								  
									$kauplus = $row['kaupluse_nimi'];
								  
									$sql = "INSERT INTO it_t66 (kasutaja, markused, kauplus, syndmus, pilt, pilt_id) VALUES ('$username', '$markused', '$kauplus', '$syndmus', '$pilt', '$pilt')";
					
									$run = mysqli_query($conn,$sql) or die(mysqli_error($conn));
						
									if($run){
										$success = "Andmed sisestatud" ;	
									}else {
										$error = "Midagi läks valesti" ;
										}
							  
								}
							} 
				}
			}else{
				$error = "Sündmus pole valitud!";
			}	
	}
		
?>