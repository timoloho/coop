<?php include_once('main.php');
// Initialize the session
session_start();
 

 
// Check if the user is logged in, if not then redirect him to login page
	if($_SESSION['level'] !== 2){
		header("location: ../index.php");
		exit;
	}
?>
 
<html>

	<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	  <link href="../static/css/admin.css" rel="stylesheet">
	
	</head>
		<body class="container mt-5 bg-dark text-white">
			<br>
			<br>
			<br>
				<?php if(!empty($success)){
							echo '<div class="alert alert-success">' . $success . '</div>';
						}
						if(!empty($error)){
							echo '<div class="alert alert-danger">' . $error . '</div>';
						}?>
						
						
		    <form method="post" enctype="multipart/form-data">			
					<div class="form-group">
						<label for="nimi"><b>Sündmus</b></label>
							<select class="mb-5 custom-select shadow bg-light" name="syndmus">
							<optgroup label="Kassa">
								<option value="" hidden>Sündmused</option>
								<option value="kassa_arvuti">Arvuti</option>
								<option value="kassa_ekraan">Ekraan</option>
								<option value="kassa_kaal">Kassa kaal</option>		
								<option value="kassa_kliendiekraan">Kliendiekraan</option>
								<option value="kassa_klaviatuur">Klaviatuur</option>
								<option value="rahakontroll">Raha kontrollija</option>
								<option value="kassa_skanner">Skänner</option>
								<option value="terminal">Terminal</option>
								<option value="kassa_tsekiprinter">Tšekiprinter</option>
								<option value="kassa_zebra">Zebra</option>			
							</optgroup>
								<optgroup label="Kontor">
								<option value="arvuti">Arvuti</option>
								<option value="ekraan">Ekraan</option>
								<option value="hiir">Hiir</option>	
								<option value="klaviatuur">Klaviatuur</option>	
								<option value="printer">Printer</option>
								<option value="rahamasin">Rahalugemise masin</option>								
								<option value="skanner">Skänner</option>	
								<option value="telefon">Telefon</option>
								<option value="zebra">Zebra</option>									
							</optgroup>
							<optgroup label="Muu">
								<option value="kaal">Kaal</option>
								<option value="kaamera">Kaamerad</option>
								<option value="nutikassa">Nutikassa</option>
								<option value="pico">Pico/Scorpio</option>
								<option value="ups">UPS</option>
								<option value="vork">Võrk</option>
								<option value="muu"><b>Muu</b></option>
							</optgroup>	
						</select>
					</div>
				
					<div class="form-group">
						<label for="kirjeldus"><b>Töö kirjeldus</b></label>
						
						<textarea class="form-control shadow bg-light" name="kirjeldus" rows="4" cols="50" placeholder="Kirjelda tehtud tööd"></textarea>
						<?php if(!empty($kirjeldus_err)){
							echo '<div class="alert alert-danger">' . $kirjeldus_err . '</div>';
						}?>
					</div>
					<br>
					<div class="form-group">
						<label for="markused"><b>Märkused</b></label>
						<textarea class="form-control shadow bg-light" name="markused" rows="4" cols="50" placeholder="Märkusi? Ei pea täitma"></textarea>
					</div>
				
					<br>
					
					Pilt:
					<div class="form-group">
					<input type="file" accept="image/*" name="files" multiple></input>
				</div>
				<input type="submit" name="submit" value="Submit" class="btn btn-primary">
			</form> 
				

			
	</body>	
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
	<script>


			if(window.history.replaceState ) {
			window.history.replaceState( null, null, window.location.href );
		}
	</script>
</html>