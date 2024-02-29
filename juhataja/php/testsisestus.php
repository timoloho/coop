<?php include_once('testid_insert.php');
include_once('../connection.php');
// Initialize the session
session_start();
 

 
// Check if the user is logged in, if not then redirect him to login page
	if($_SESSION['kasutaja_id'] !== 20){
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
	
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark shadow p-0">

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<a class="navbar-brand col-sm-3 col-md-1 mr-0" style="text-align:center" href="index.php"><h3><b>COOP</b></h3></a>
				<ul class="navbar-nav mr-auto mt-2 mt-lg-0 ml-5 mr-3">
					<li class="nav-item mr-2">
						  <a class="nav-link" href="ohuolukorrad.php"><b>Ohuolukord</b></a>
					</li>
					<li class="nav-item mr-2">
						  <a class="nav-link" href="testidin.php"><b>Covid-19</b></a>
					</li>
					<li class="nav-item mr-2 active">
						  <a class="nav-link" href="testsisestus.php"><b>Testi sisestus</b></a>
					</li>
				</ul>
				<ul class="navbar-nav my-2 my-lg-0 mr-3 ml-3">
					<li class="nav-item text-nowrap">
						 <a class="nav-link" href="../logout.php"><b>Logi välja</b></a>
					</li>
				</ul>
		</div>
	</nav>
	
		<body class="container mt-5 bg-dark text-white">
			<br>
			<br>
			<br>
				<?php if(!empty($success)){
							echo '<div class="alert alert-success">' . $success . '</div>';
						}
						if(!empty($empty)){
							echo '<div class="alert alert-danger">' . $empty . '</div>';
						}?>
		    <form method="post" enctype="multipart/form-data">					
				<br>
				<div class="border">
					<div class="ml-2 mr-2 text-center">
					<br>
						<label for="datetime"><b>Testi kuupäev:</b></label>	
							<div class="row justify-content-center align-items-center">
								<input type="text" class="form-control w-25 text-center form-inline" value="<?=date('Y-m-d')?>" id="datetime" name="datetime">	
							</div>
					<br>
					<div class=""><b>Testi tulemus:</b></div>     
						<div class="row justify-content-center align-items-center">					
						  <label class="radio-inline ml-2">
							<input type="radio" id="positiivne" name="posneg" value="Positiivne"><b> Positiivne</b>
						  </label>  
						  <label class="radio-inline ml-5">
							<input type="radio" id="negatiivne" name="posneg" value="Negatiivne"><b> Negatiivne</b>
						  </label>
						</div>
					<br>
					</div>
				</div>
				<div class="text-center">
					<button type="submit" class="mt-3 mb-5 btn btn-success shadow w-25"  name="submit"><b>SISESTA</b></button>
				</div>	
			</form> 
	</body>	
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.6/flatpickr.min.css"/>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.6/flatpickr.min.js"></script>	
			<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
			<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
	<script>
			flatpickr("#datetime", {
				enableTime: false,
				time_24hr: true,
				defaultHour: parseInt("<?=date('H',strtotime('+1hour'))?>"),
				defaultMinute: parseInt("<?=date('i')?>"),
			});

	</script>
	<script>
			if(window.history.replaceState ) {
			window.history.replaceState( null, null, window.location.href );
		}
	</script>
</html>