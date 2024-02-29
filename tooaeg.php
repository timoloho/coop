<?php include_once('connection.php');
include_once('php/insert.php');
// Initialize the session
session_start();
 

 
// Check if the user is logged in, if not then redirect him to login page
	if($_SESSION['kasutaja_id'] == 25){
	header("location: admin/kubjas.php");
		exit;
	}else if($_SESSION['level'] == 3){
		header("location: admin/it_t66.php");
		exit;
	}else if($_SESSION['kasutaja_id'] == 20){
		header("location: juhataja/ohuolukorrad.php");
		exit;
	}else if($_SESSION['level'] == 2){
		header("location: juhataja/index.php");
		exit;
	}else if($_SESSION['level'] < 1){
		header("location: index.php");
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
	
	    <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark shadow p-0 justify-content-between">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" style="text-align:center" href="tooaeg.php"><h3><b>COOP</b></h3></a>
	  	<ul class="navbar-nav px-3 float-left">
			<li class="nav-item nav-item active">
			  <a class="nav-link" href="tooaeg.php"><b>Tööleht</b><span class="sr-only">(current)</span></a>
			</li>

      </ul>
	  <ul class="navbar-nav px-3 float-left">
	  		<li class="nav-item col-mm-4">
			  <a class="nav-link" href="tooajad.php"><b>Tehtud tööd</b></a>
			</li>
			</ul>
	  <ul class="navbar-nav px-3 ">
        <li class="nav-item text-nowrap ">
          <a class="nav-link" href="logout.php"><b>Logi välja</b></a>
        </li>
      </ul>
    </nav>
	
		<body class="container mt-5 bg-secondary text-white">
			<br>
			<br>
			<br>
				<?php if(!empty($success)){
							echo '<div class="alert alert-success">' . $success . '</div>';
						}?>
						<?php if(!empty($tunnid_err)){
							echo '<div class="alert alert-danger"><h4><b>' . $tunnid_err . '</b></h4></div>';
						}?>
						
		    <form method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="nimi"><b>Kauplus</b></label>
							<select class="mb-5 custom-select shadow bg-dark text-white" name="kauplus">
							<optgroup label="Kauplused" style="background-color: darkgray">
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
								<option value="Salme kauplus">Salme kauplus</option>
								<option value="Tagavere kauplus">Tagavere kauplus</option>
								<option value="Tornimäe kauplus">Tornimäe kauplus</option>
								<option value="Valjala kauplus">Valjala kauplus</option>
							</optgroup>
								<optgroup label="Konsumid" style="background-color: darkgray">
								<option value="Kaubaait">Kaubaait</option>
								<option value="Liiva Konsum">Liiva Konsum</option>
								<option value="Orissaare Konsum">Orissaare Konsum</option>
								<option value="Port Artur Konsum">Port Artur Konsum</option>
								<option value="Tooma Konsum">Tooma Konsum</option>
							</optgroup>
								<optgroup label="Muu" style="background-color: darkgray">
								<option value="Maiasmokk">Maiasmokk</option>
								<option value="Rehemäe">Rehemäe</option>
								<option value="Saaremaa Kaubamaja">Saaremaa Kaubamaja</option>
								<option value="STÜ Tootmine">STÜ Tootmine</option>
								<option value="Tallinna tn.1">Tallinna tn 1</option>
								<option value="Tehnika 5">Tehnika 5</option
								<option value="Toidumaailm">Toidumaailm</option>
							</optgroup>
						</select>
					</div>
				
					<div class="form-group">
						<label for="kirjeldus"><b>Töö kirjeldus</b></label>
						
						<textarea class="form-control shadow bg-dark text-white" name="kirjeldus" rows="4" cols="50" placeholder="Kirjelda tehtud tööd"></textarea>
						<?php if(!empty($kirjeldus_err)){
							echo '<div class="alert alert-danger">' . $kirjeldus_err . '</div>';
						}?>
					</div>
					<br>
				
					<label for="aegalgus"><b>Algus</b></label>
					<input type="text" class="form-control bg-dark text-white" value="<?=date('Y-m-d H:i',strtotime('+0 hour'))?>" id="aegalgus" name="aegalgus">	
					
						<?php if(!empty($aegtyhi_err)){
							echo '<div class="alert alert-danger">' . $aegtyhi_err . '</div>';
						}?>
						
					<label for="aeglopp"><b>Lõpp</b></label>
					<input type="text" class="form-control bg-dark text-white" value="<?=date('Y-m-d H:i',strtotime('+3 minute'))?>" id="aeglopp" name="aeglopp">
					
						<?php if(!empty($aegvale_err)){
							echo '<div class="alert alert-danger">' . $aegvale_err . '</div>';
						}?>
					<br>
					
					Pilt:
					<input type="file" accept="image/*" name="fileToUpload" id="fileToUpload"></input>
					
					<button type="submit" class="mt-3 mb-5 btn btn-info container shadow" value="Upload Image" name="submit" /><b>SISESTA</b></button>
				
			</form> 
	</body>	
	
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.6/flatpickr.min.css"/>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.6/flatpickr.min.js"></script>	
	<script>
			flatpickr("#aegalgus", {
				enableTime: true,
				time_24hr: true,
				defaultHour: parseInt("<?=date('H',strtotime('+1hour'))?>"),
				defaultMinute: parseInt("<?=date('i')?>"),
			});

			flatpickr("#aeglopp", {
				enableTime: true,
				time_24hr: true,
				defaultHour: parseInt("<?=date('H',strtotime('+1hour'))?>"),
				defaultMinute: parseInt("<?=date('i')?>"),
			});

			if(window.history.replaceState ) {
			window.history.replaceState( null, null, window.location.href );
		}
	</script>
</html>