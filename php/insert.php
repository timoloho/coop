<?php include_once('connection.php');
session_start();

		if(isset($_POST['submit'])){
	
				$username = stripslashes($_SESSION['username']) ;
				$kirjeldus = $_POST['kirjeldus'] ;
				$algus_kuupaev = $_POST['aegalgus'] ;
				$lopp_kuupaev = $_POST['aeglopp'] ;
				$kauplus = $_POST['kauplus'] ;
				$kinnitus = $_POST['status'] ;
				$pilt = $_FILES["fileToUpload"]["name"] ;
				

				
				$algus = new DateTime($algus_kuupaev);
				$lopp = new DateTime($lopp_kuupaev);
				
				$vahe = $lopp->diff($algus);
				
				$minut = $vahe->days * 24 * 60;
				$minut += $vahe->h * 60;
				$minut += $vahe->i;
				
				$tund = $minut / 60;
				
				$tunnid = number_format($tund, 2, '.', '');
		
	
			if(!empty($_POST['kirjeldus'] && $_POST['aeglopp'] && $_POST['aegalgus']) && $_POST['aeglopp'] > $_POST['aegalgus'] && $tunnid < 15){
			
			
				$sql = "INSERT INTO tehtud_t66 (kasutaja, kirjeldus, algus_kuupaev, lopp_kuupaev, tunnid, kauplus, pildinimi) VALUES ('$username', '$kirjeldus', '$algus_kuupaev', '$lopp_kuupaev', '$tunnid', '$kauplus', '$pilt')";
			
				$run = mysqli_query($conn,$sql) or die(mysqli_error());
				
				if($run){
					$success = "Andmed sisestatud" ;	
				}
		
			}else if(empty($_POST['kirjeldus'])){
				$kirjeldus_err = "Töö kirjeldus ei tohi olla tühi";
			}else if(empty($_POST['aegalgus'] && $_POST['aeglopp'])){
				$aegtyhi_err = "Kellaaeg ei tohi olla tühi";
			}else if($_POST['aeglopp'] < $_POST['aegalgus']){
				$aegvale_err = "Töö lõpetusaeg ei saa olla väiksem kui algus";
			}else if($tunnid > 15){
				$tunnid_err = "Sisestatud töö ei saa olla üle 15 tunni!";
			}
	}
?>