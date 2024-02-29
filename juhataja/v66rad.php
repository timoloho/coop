<?php include_once('main.php');
session_start();

	$time = date("Y.m.d H:i");
 if($_SESSION['level'] !== 2){
	header("location: ../index.php");
	exit;
 }
		
	if(empty($_GET['sort'])){
		$sql = "SELECT v66rad_id, kauplus, ettevote, teostaja, dokumendi_nr, p6hjus, ligip22s, algus, l6pp, v66rad.status, kauplus_id, kaupluse_nimi, kasutaja_id, tulemine FROM v66rad, kasutajad, kauplused WHERE kasutaja_id =".$_SESSION['kasutaja_id']." AND kauplus_id = kasutaja_id AND kaupluse_nimi = kauplus ORDER BY v66rad_id DESC";
	}

	$result = $conn->query($sql);

	if($result->num_rows > 0) {
		$table ='<form method="POST">';
		$table .= '<table class="table table-responsive table-striped table-bordered table-dark"><thead class="thead-dark">
			<tr>
				<th scope="col">Kinnitus</th>
				<th scope="col">Ettevote</th>
				<th scope="col">Teostaja</th>
				<th scope="col">Dokumendi nr.</th>
				<th scope="col">Põhjus</th>
				<th scope="col">Ligipääs seadmetele</th>
				<th scope="col">Eeldatav tulemise kuupäev</th>
				<th scope="col">Sisestage töö alguse aeg</th>
				<th scope="col">Sisestage töö lõpu aeg</th>
			</tr>
		</thead>
	<tbody>';
			while($row = $result->fetch_assoc()) {
					$table .= 
						'<tr>
							<td><button type="submit" name="nupp1" class="btn btn-' . ($row['status'] == 1 ? 'success' : 'danger') . ' container"
							value="' . $row['v66rad_id'] . '"' . ($row['status'] == 1 ? ' disabled' : '') . '/>' . $row['v66rad_id'] . '</button></td>
							<td>' . $row['ettevote'] . '</td>
							<td>' . $row['teostaja'] . '</td>
							<td>' . $row['dokumendi_nr'] . '</td>
							<td style="word-break:break-word">' . $row['p6hjus'] . '</td>
							<td style="word-break:break-word">' . $row['ligip22s'] . '</td>
							<td>' . date("d.m.Y", strtotime($row['tulemine'])) . '</td>
							<td>' . ($row['status'] == 1 ? '' . date("H:i d.m.Y", strtotime($row['algus'])) . '' : '<input type="text" class="form-control bg-light" id="aegalgus" name="aegalgus" value="' . date("Y.m.d H:i") . '">') . '</td>
							<td>' . ($row['status'] == 1 ? '' . date("H:i d.m.Y", strtotime($row['l6pp'])) . '' : '<input type="text" class="form-control bg-light" value="' . date("Y.m.d H:i") . '" id="aeglopp" name="aeglopp">')  .  '</td>
						</tr>';
			}
			$table .='</tbody></table>';
			$table .='</form>';
	} else {
		$tyhi = "Sissekanded puuduvad.";
	}

	if(!empty($_POST['nupp1'])){
		
		if(($_POST['aegalgus']) < ($_POST['aeglopp'])){
		
		$kinnitamine = $_POST['nupp1'];
		
			$kinnitus = "UPDATE v66rad SET status=1, algus='" . $_POST['aegalgus'] . "', l6pp='" . $_POST['aeglopp'] . "' WHERE v66rad_id=".$_POST['nupp1'];
		
			$run = mysqli_query($conn,$kinnitus) or die(mysqli_error());
			
			if($run){
				redirect("v66rad.php");
				
			}else{
				echo "miks katki";
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

    <title>Võõrad</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="../static/css/admin.css" rel="stylesheet">
  </head>
<body class="p-3 mb-2 bg-dark text-white">
        <main role="main" class="container">
			
				<?php if(!empty($aeg_err)){
					echo '<div class="alert alert-danger">' . $aeg_err . '</div>';
				}?>	
				<br>
				<?php 
                        echo $tyhi;
                        echo $table;
                ?>
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
			flatpickr("#aegalgus", {
				enableTime: true,
				time_24hr: true,
				altInput: true,
				altFormat: "H:i d.m",
				defaultHour: parseInt("<?=date('H',strtotime('+1hour'))?>"),
				defaultMinute: parseInt("<?=date('i')?>"),
			});

			flatpickr("#aeglopp", {
				enableTime: true,
				time_24hr: true,
				altInput: true,
				altFormat: "H:i d.m",
				defaultHour: parseInt("<?=date('H',strtotime('+1hour'))?>"),
				defaultMinute: parseInt("<?=date('i')?>"),
			});

			if(window.history.replaceState ) {
			window.history.replaceState( null, null, window.location.href );
		}
	</script>

</html>
