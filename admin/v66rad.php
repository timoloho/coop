<?php include_once("../main.php");
session_start();

 if($_SESSION['level'] !== 3){
	header("location: ..\index.php");
	exit;
 }
		
	if(empty($_GET['sort'])){
		$sql = "SELECT v66rad_id, kauplus, ettevote, teostaja, dokumendi_nr, p6hjus, ligip22s, algus, l6pp, tulemine, status FROM v66rad ORDER BY v66rad_id DESC";
		
	}else{
		$sql = "SELECT v66rad_id, kauplus, ettevote, teostaja, dokumendi_nr, p6hjus, ligip22s, algus, l6pp, tulemine, status FROM v66rad WHERE kauplus ='" . $_GET['sort'] . "'ORDER BY v66rad_id DESC";
	}

	$result = $conn->query($sql);

	if($result->num_rows > 0) {
		$table ='<form method="POST">';
		$table .= '<table class="table table-striped table-bordered table-dark"><thead class="thead-dark">
			<tr>
				<th scope="col">Kinnitus</th>
				<th scope="col">Kauplus</th>
				<th scope="col">Ettevote</th>
				<th scope="col">Teostaja</th>
				<th scope="col">Dokumendi nr.</th>
				<th scope="col">Põhjus</th>
				<th scope="col">Ligipääs seadmetele</th>
				<th scope="col">Töö algus</th>
				<th scope="col">Töö lõpp</th>
				<th scope="col">Eeldatav tulemise kuupäev</th>
			</tr>
		</thead>
	<tbody>';
			while($row = $result->fetch_assoc()) {
					$table .= 
						'<tr>
							<td><button type="submit" name="nupp1" class="btn btn-' . ($row['status'] == 1 ? 'success' : 'danger') . ' container"
							value="' . $row['v66rad_id'] . '"' . ($row['status'] == 1 ? 'disabled' : 'disabled') . '/>' . $row['v66rad_id'] . '</button></td>
							<td>' . $row['kauplus'] . '</td>
							<td>' . $row['ettevote'] . '</td>
							<td>' . $row['teostaja'] . '</td>
							<td>' . $row['dokumendi_nr'] . '</td>
							<td style="word-break:break-word">' . $row['p6hjus'] . '</td>
							<td style="word-break:break-word">' . $row['ligip22s'] . '</td>
							<td>' . date("H:i d.m.Y", strtotime($row['algus'])) . '</td>
							<td>' . date("H:i d.m.Y", strtotime($row['l6pp'])) . '</td>
							<td>' . date("d.m.Y", strtotime($row['tulemine'])) . '</td>
						</tr>';
			}
			$table .='</tbody></table>';
			$table .='</form>';
	} else {
		echo "0 vastust";
	}

	if(!empty($_POST['nupp1'])){
		
		if(($_POST['aegalgus']) < ($_POST['aeglopp'])){
		
		$kinnitamine = $_POST['nupp1'];
		
			$kinnitus = "UPDATE v66rad SET status=1, algus='" . $_POST['aegalgus'] . "', l6pp='" . $_POST['aeglopp'] . "' WHERE v66rad_id=".$_POST['nupp1'];
		
			$run = mysqli_query($conn,$kinnitus) or die(mysqli_error());
			
			if($run){
				redirect("v66rad.php");
				
			}else{
				echo "wtf miks katki";
			}
		}else{
			$aeg_err = "Töö lõpp ei saa olla väiksem kui algus";
		}
	}
	function redirect($url) {
	if(!empty($url)) {
		echo '<META http-equiv="refresh" content="0;URL=' . $url . '">';
		exit();
	}
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Admin</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="../static/css/admin.css" rel="stylesheet">
  </head>
<body class="p-3 mb-2 bg-dark text-white">
        <main role="main" class="container">
			
				<br>
				<form method="GET">
					<h2 style="display:inline-block"><b>Võõrad</b></h2><select class="mb-3 custom-select w-25 float-right" name="sort">
					<option value="Kauplused"disabled selected hidden><? if (!empty($_GET['sort'])){
							echo $_GET['sort'];
						}else {
							echo "Kõik kauplused";
						} ?></option>
					<option value="">Kõik kauplused</option>
					<optgroup label="Konsumid">
					<option value="Kaubaait">Kaubaait</option> 
					<option value="Liiva Konsum">Liiva Konsum</option> 
					<option value="Orissaare Konsum">Orissaare Konsum</option>
					<option value="Port Artur Konsum">Port Artur Konsum</option>
					<option value="Rae Konsum">Rae Konsum</option>
					<option value="Tooma Konsum">Tooma Konsum</option> 
					</optgroup>
					<optgroup label="Kauplusesd">
					<option value="Aste kauplus">Aste kauplus</option>
					<option value="Eikla kauplus ">Eikla kauplus</option> 
					<option value="Hellamaa kauplus">Hellamaa kauplus</option>
					<option value="Kihekonna kauplus">Kihekonna kauplus</option> 
					<option value="Kärla kauplus">Kärla kauplus</option> 
					<option value="Leisi kauplus">Leisi kauplus</option> 
					<option value="Lümanda kauplus">Lümanda kauplus</option> 
					<option value="Mustjala kauplus">Mustjala kauplus</option> 
					<option value="Nasva kauplus">Nasva kauplus</option> 					
					<option value="Pihtla kauplus">Pihtla kauplus</option> 					 
					<option value="Pärsama kauplus">Pärsama kauplus</option> 					
					<option value="Ranna kauplus">Ranna kauplus</option> 
					<option value="Roomassaare kauplus">Roomassaare kauplus</option> 
					<option value="Saaremaa Kaubamaja">Saaremaa Kaubamaja</option> 
					<option value="Saikla kauplus">Saikla kauplus</option> 
					<option value="Salme kauplus">Salme kauplus</option> 					
					<option value="Tagavere kauplus">Tagavere kauplus</option> 					
					<option value="Tornimäe kauplus">Tornimäe kauplus</option> 					
					</optgroup>
					<optgroup label="Muu">				
					<option value="Maiasmokk">Maiasmokk</option>
					<option value="Rehemäe">Rehemäe</option>
					<option value="Tallinna tn.1">Tallinna tn.1</option>
					<option value="STÜ Tootmine">STÜ Tootmine</option>
					<option value="Tehnika 5">Tehnika 5</option>									
					</optgroup>
					</select>			
				</div>
				</form>
         
			<?php echo $table; ?>
        </main>
  </body>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.11.1/css/alertify.min.css" integrity="sha256-sWU2rI9NwiWVFCJE2roX/WU8vrGKshPV5zoH31X3gmQ=" crossorigin="anonymous" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.11.1/alertify.min.js" integrity="sha256-a5BJQEMVvKJbs38h5W3EFXI4svjVezJnZzK1YFF3Fm0=" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.6/flatpickr.min.css"/>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.6/flatpickr.min.js"></script>	
	
	<script>
	$('[name="sort"]').change(function() {
	$(this).closest('form').submit();
	});
	</script>
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
