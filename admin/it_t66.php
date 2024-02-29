<?php include_once('../main.php');
session_start();

// Check if the user is logged in, if not then redirect him to login page
	if($_SESSION['level'] !== 3){
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
						<label for="nimi"><b>Kauplus</b></label>
							<select class="mb-5 custom-select shadow bg-light" name="kauplus">
								<optgroup label="Konsumid">
								<option value="" hidden>Kauplused</option>
									<option value="Kaubaait">Kaubaait</option>
									<option value="Liiva Konsum">Liiva Konsum</option>
									<option value="Orissaare Konsum">Orissaare Konsum</option>
									<option value="Port Artur Konsum">Port Artur Konsum</option>
									<option value="Rae Konsum">Rae Konsum</option>
									<option value="Salme kauplus">Salme Konsum</option>
									<option value="Tooma Konsum">Tooma Konsum</option>
								</optgroup>
								<optgroup label="Kauplused">
									<option value="Aste kauplus">Aste kauplus</option>
									<option value="Eikla kauplus">Eikla kauplus</option>
									<option value="Hellamaa kauplus">Hellamaa kauplus</option>		
									<option value="Kihelkonna kauplus">Kihelkonna kauplus</option>
									<option value="Kärla kauplus">Kärla kauplus</option>
									<option value="Leisi kauplus">Leisi kauplus</option>
									<option value="Lümanda kauplus">Lümanda kauplus</option>
									<option value="Mustjala kauplus">Mustjala kauplus</option>
									<option value="Nasva kauplus">Nasva kauplus</option>
									<option value="Pihtla kauplus">Pihtla kauplus</option>
									<option value="Pärsama kauplus">Pärsama kauplus</option>
									<option value="Ranna kauplus">Ranna kauplus</option>
									<option value="Roomassaare kauplus">Roomassaare kauplus</option>
									<option value="Saikla kauplus">Saikla kauplus</option>
									<option value="Tagavere kauplus">Tagavere kauplus</option>
									<option value="Tornimäe kauplus">Tornimäe kauplus</option>
									<option value="Valjala kauplus">Valjala kauplus</option>
								</optgroup>
									<optgroup label="Muu">
									<option value="Maiasmokk">Maiasmokk</option>
									<option value="Saaremaa Kaubamaja">Saaremaa Kaubamaja</option>
									<option value="STÜ Tootmine">STÜ Tootmine</option>
									<option value="Tehnika 5">Kontor</option>
									<option value="Toidumaailm">Toidumaailm</option>
								</optgroup>
							</select>
					</div>
					
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
						
						<textarea class="form-control shadow bg-light" name="kirjeldus" rows="4" cols="50" placeholder="Kirjeldus"></textarea>
						<?php if(!empty($kirjeldus_err)){
							echo '<div class="alert alert-danger">' . $kirjeldus_err . '</div>';
						}?>
					</div>
					<br>
					<div class="form-group">
						<label for="markused"><b>Märkused</b></label>
						<textarea class="form-control shadow bg-light" name="markused" rows="4" cols="50" placeholder="Märkusi?"></textarea>
					</div>
				
					<br>
			
					Pilt:
					<input type="file" accept="image/*" name="files" multiple></input>
					
					<button type="submit" class="mt-3 mb-5 btn btn-info container shadow" value="Upload Image" name="submit"><b>SISESTA</b></button>
			
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