<?php include_once("../main.php");



session_start();



 if($_SESSION['level'] !== 3){
	header("location: ../index.php");
	exit;
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

    <title>Temperatuurid</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link href="../static/css/admin.css" rel="stylesheet">
    <!-- Custom styles for this template -->

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.11.1/css/alertify.min.css" integrity="sha256-sWU2rI9NwiWVFCJE2roX/WU8vrGKshPV5zoH31X3gmQ=" crossorigin="anonymous" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.11.1/alertify.min.js" integrity="sha256-a5BJQEMVvKJbs38h5W3EFXI4svjVezJnZzK1YFF3Fm0=" crossorigin="anonymous"></script>

  </head>
    
<body class="p-3 mb-2 bg-dark text-white">
	
    <main role="main" class="container">
          
			<br>
			<br>
      
		<div id="result" class="table-responsive">
			<form class="form-inline" method="post" action="php/generate_pdf.php">
				<label for="algus_kuupaev"><b>Alguse kuupäev</b></label>
				<input type="text" class="custom-select bg-light" value="<?= date('Y.m.d 00:00:00') ?>" id="algus_kuupaev" name="algus_kuupaev">
				<label for="lopp_kuupaev"><b>Lõpp kuupäev</b></label>
				<input type="text" class="custom-select bg-light" value="<?= date('Y.m.d 23:59:59') ?>" id="lopp_kuupaev" name="lopp_kuupaev">
				<button type="submit" id="pdf" name="generate_pdf" class="btn btn-primary"><i class="fa fa-pdf" aria-hidden="true"></i>
					PDF
				</button>
			</form>
                <?php
					include_once("tabelid/temp_tabel.php");
				?>
			</div>
		<div id="reload">
		
		</div>
	<!-- Modal -->
		<div id="myModal" class="modal fade" role="dialog">
		  <div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content bg-dark">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			  </div>
			  <div class="modal-body">
				<div class="form-group">
					<label>Kirjeldus</label>
					<textarea type="text" id="kirjeldus" class="form-control"></textarea>
				</div>	
				<div class="form-group">
					<label>Märkused</label>
					<textarea type="text" id="markused" class="form-control"></textarea>
				</div>

				<div class="form-group">
					<input type="file" accept="image/*" id="files" name="files" multiple></input>
				</div>						
					<input type="hidden" id="userId"></input>
			  </div>
			  <div class="modal-footer">
				<a name="save" id="save" class="btn btn-primary">Uuenda</a>
				<button type="button" name="nupp1" id="kinnita" class="btn btn-success pull-right" data-dismiss="modal">Kinnita</button>
			  </div>
			</div>
		  </div>
		</div>
    </main>
</body>
</html>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.6/flatpickr.min.css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.6/flatpickr.min.js"></script>	
<script>
		flatpickr("#algus_kuupaev", {
			enableTime: true,
			time_24hr: true,
			defaultHour: parseInt("<?=date('H',strtotime('+1hour'))?>"),
			defaultMinute: parseInt("<?=date('i')?>"),
		});

		if(window.history.replaceState ) {
		window.history.replaceState( null, null, window.location.href );
	}
</script>
<script>
		flatpickr("#lopp_kuupaev", {
			enableTime: true,
			time_24hr: true,
			defaultHour: parseInt("<?=date('H',strtotime('+1hour'))?>"),
			defaultMinute: parseInt("<?=date('i')?>"),
		});

		if(window.history.replaceState ) {
		window.history.replaceState( null, null, window.location.href );
	}
</script>
<script>
		$('[name="generate_pdf"]').change(function() {
		$(this).closest('form').submit();
		});
	</script>