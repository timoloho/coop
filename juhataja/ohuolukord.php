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
						if(!empty($empty)){
							echo '<div class="alert alert-danger">' . $empty . '</div>';
						}?>
				<h2 class="border text-center" style="text-align: center"><b>OHUOLUKORRA TEATIS</b></h2>
				<h6 class="border text-center">Ohuolukord on töötaja tervist ohustav situatsioon, mis juhtub tööülesandeid täites ja mis võib lõppeda vaid ehmatusega või kerge kehavigastusega, mis ei vaja arstiabi.</h6>	
		    <form method="post" enctype="multipart/form-data">					
				<br>
					<div class="form-group">
						<label for="datetime"><b>Kellaaeg ja kuupäev</b></label>					
						<input type="text" class="form-control" value="<?=date('Y-m-d H:i',strtotime('+0 hour'))?>" id="datetime" name="datetime">	
					</div>
					<br>
					
					<div class="form-group">
						<label for="esitaja"><b>Teataja nimi</b></label>					
						<input class="form-control shadow bg-light" name="esitaja" rows="4" cols="50" placeholder=""></input>
					</div>
					<br>

					<div class="form-group">
						<label for="piirkond"><b>Piirkond</b></label>
						<input class="form-control shadow bg-light" name="piirkond" rows="4" cols="50" placeholder=""></input>
					</div>				
					<br>
					<div class="form-group">
						<label for="olu_kirjeldus"><b>Ohuolukorra kirjeldus</b></label>
						<textarea class="form-control shadow bg-light" name="olu_kirjeldus" rows="4" cols="50" placeholder=""></textarea>
					</div>				
					<br>
					
					<b>Pilt:(kui võimalik)</b>
					<input type="file" accept="image/*" name="files" id="files"></input>
					<br>
					<br>
					<div class="border">
					<div class="row">
					<div class="col-sm-4"><b>Oli võimalus likvideerida ohuolukord koheselt?</b></div>     
						<div class="col-sm-8">					
						  <label class="radio-inline ml-5">
							<input type="radio" id="likvi_jah" name="likvi" value="jah"><b> Jah</b>
						  </label>  
						  <label class="radio-inline ml-5">
							<input type="radio" id="likvi_ei" name="likvi" value="ei"><b> Ei</b>
						  </label>
						</div>
					<br>
					<br>
					<div class="col-sm-4"><b>Suurem oht .....</b> </div>   
					 <div class="col-sm-8">
						  <label class="radio-inline ml-5">
							<input type="radio" id="suur_oht_jah" name="suur_oht" value="jah"><b> Jah</b>
						  </label>  
						  <label class="radio-inline ml-5">
							<input type="radio" id="suur_oht_ei" name="suur_oht" value="ei"><b> Ei</b>
						  </label>
					</div>
					
					</div>
					</div>
					<button type="submit" class="mt-3 mb-5 btn btn-info container shadow"  name="submit"><b>SISESTA</b></button>
			</form> 
	</body>	
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.6/flatpickr.min.css"/>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.6/flatpickr.min.js"></script>	
			<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
			<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
	<script>
			flatpickr("#datetime", {
				enableTime: true,
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