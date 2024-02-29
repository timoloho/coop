<?php include_once('../main.php');
include_once('php/ladu_insert.php');
session_start();

// Check if the user is logged in, if not then redirect him to login page
	if($_SESSION['level'] !== 3){
		header("location: ../index.php");
		exit;
	}

	$sql = "SELECT * FROM seadmed";
    

    $seadmed = $conn->query($sql);
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
				<?php if(!empty($success)){
							echo '<div class="alert alert-success">' . $success . '</div>';
						}
						if(!empty($error)){
							echo '<div class="alert alert-danger">' . $error . '</div>';
						}?>
				
				<form method="post">
                    <div class="form-group">
						<label for="sn"><b>Serial Number</b></label>
						<input class="form-control shadow bg-light" name="serialnumber" rows="4" cols="50" placeholder="S/N"></input>
					</div>
					<div class="form-group">
						<label for="nimi"><b>Seade</b></label>
							<select class="mb-5 custom-select shadow bg-light" name="seade" id="seade">
                                <option hidden value="">Seade</option>
                                <?php 

									if($seadmed->num_rows > 0)
									while($row = $seadmed->fetch_assoc())
											echo "<option value ='{$row['nimetus']}'>{$row['nimetus']}</option>";

								?>
                            </select>
							<button class="btn btn-warning" type="button" id="uus_seade_btn"
       							 onClick="document.getElementById('uus_seade_btn').style.display='none';document.getElementById('uus_seade').style.display='block'">Lisa uus seade</button>
							<input class="form-control" type="text" id="uus_seade" name="uus_seade" style="display: none" placeholder="Uus seade" />
							<?php

							/*echo '<pre>';
							print_r($seadmed);
							echo '</pre>';**/
							?>
                    </div>	
					<div class="form-group">    
                        <label for="nimi"><b>Mudel</b></label>
                            <select class="mb-5 custom-select shadow bg-light" name="mudel" placeholder="" id="mudel">
                                <option value="">Mudel</option>
                            </select>
                            <button class="btn btn-warning" type="button" id="uus_mudel_btn"
       							 onClick="document.getElementById('uus_mudel_btn').style.display='none';document.getElementById('uus_mudel').style.display='block'">Lisa uus mudel</button>
                            <input class="form-control" type="text" id="uus_mudel" name="uus_mudel" style="display: none" placeholder="Uus mudel" />
                    </div>
					<div class="form-group">
					    <label for="kirjeldus"><b>Kirjeldus</b></label>
					    <textarea class="form-control shadow bg-light" name="kirjeldus" rows="4" cols="50" placeholder="Kirjeldus"></textarea>
				    </div>	
					<div class="form-group">
						<label><b>Seisukord</b></label>
							<select class="form-control w-25 shadow bg-light" name="staatus">
								<option value="1">Laos</option>
                                <option value="2">Objektil</option>
								<option value="3">Parandada</option>
								<option value="4">Katki</option>
								<option value="5">Maha kantud</option>
							</select>
					</div>	
					<div class="form-group">
						<label><b>Riiul</b></label>
						<select class="form-control w-25 shadow bg-light" name="riiul">
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
							</select>
					</div>
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
					<!--<div class="form-control">
					<label for="pilt">Pilt</label>
						<input type="file" accept="image/*" name="files" multiple></input>
					</div>-->
					<input hidden type="text" class="form-control bg-light" value="<?=date('Y-m-d')?>" id="kuupaev" name="kuupaev">	
					<button type="submit" class="mt-3 mb-5 btn btn-success container shadow" value="Upload Image" name="ladu_insert"><b>SISESTA</b></button>
				</form>
	
	</body>	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.6/flatpickr.min.css"/>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.6/flatpickr.min.js"></script>	
	<script>


			if(window.history.replaceState ) {
			window.history.replaceState( null, null, window.location.href );
		}
	</script>
<script>
// Saa esimene select
const esimeneSelect = document.querySelector("#seade");

// Kontrolli, et ei oleks tühi
if(esimeneSelect != null) {

// Kui vajutatakse
esimeneSelect.onclick = () => {

// Tee päring PHP filele
const seadeID = document.querySelector("#seade").value;
console.log("SeadeID: ",seadeID);
fetch("api/paring.php", {
    method: 'post',
    body: JSON.stringify({
        seadeID
    })
})
    // Tavaline tekst tehakse programmi jaoks loetavaks, eeldan, et json formaadis
    .then(raw => raw.json())
    .then(data => {

        // Kontroll????
        if(data.status == 'success') {

            // Saame teise selecti
            const teineSelect = document.querySelector("#mudel");
            teineSelect.innerHTML = ''; // Teeme tühjaks teistest valikutest

            // Loopime neid valikuid mis tahad lisada selecti
            console.log("Valikud: ", data.valikud);
            data.valikud.forEach(item => {
                const option = document.createElement('option');
                option.textContent = item.name;

                // Lisame selecti sisse
                teineSelect.appendChild(option);
            });

        }
    });
}
}
</script>
<script>
		flatpickr("#kuupaev", {
			enableTime: false,
			time_24hr: true,
			defaultHour: parseInt("<?=date('H',strtotime('+1hour'))?>"),
			defaultMinute: parseInt("<?=date('i')?>"),
		});
		if(window.history.replaceState ) {
		window.history.replaceState( null, null, window.location.href );
	}
</script>
</html>