<?php include_once('main.php');
session_start();

 if($_SESSION['level'] !== 2){
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

    <title>Tööleht</title>

    <!-- Bootstrap core CSS -->
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="../static/css/admin.css" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.3/photoswipe.min.css" integrity="sha512-yxWNfGm+7EK+hqP2CMJ13hsUNCQfHmOuCuLmOq2+uv/AVQtFAjlAJO8bHzpYGQnBghULqnPuY8NEr7f5exR3Qw==" crossorigin="anonymous" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.3/photoswipe.min.js" integrity="sha512-2R4VJGamBudpzC1NTaSkusXP7QkiUYvEKhpJAxeVCqLDsgW4OqtzorZGpulE3eEA7p++U0ZYmqBwO3m+R2hRjA==" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.3/default-skin/default-skin.css" integrity="sha512-QwSfZXX2w9SDWSNBKpEos673LXajTJpYKwtG+zJNP9zHsgRrWtNSx1gKVyB6qWUP4wJ0Hfnk9KJzrB6IKrXmEQ==" crossorigin="anonymous" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.3/photoswipe-ui-default.min.js" integrity="sha512-SxO0cwfxj/QhgX1SgpmUr0U2l5304ezGVhc0AO2YwOQ/C8O67ynyTorMKGjVv1fJnPQgjdxRz6x70MY9r0sKtQ==" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.11.1/css/alertify.min.css" integrity="sha256-sWU2rI9NwiWVFCJE2roX/WU8vrGKshPV5zoH31X3gmQ=" crossorigin="anonymous" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.11.1/alertify.min.js" integrity="sha256-a5BJQEMVvKJbs38h5W3EFXI4svjVezJnZzK1YFF3Fm0=" crossorigin="anonymous"></script>

  </head>
<body class="bg-dark text-white">
        <main role="main" class="container">
		<br>
		 <h2 class=""><b>Töömehed</b></h2>
		 <form method="POST">
				<input type="radio" name="k6ik">Kõik</input>
				<input type="radio" name="tegemata">Kinnitamata</input>
				<input type="radio" name="tehtud">Kinnitatud</input>
		</form>
		<div class="">
			<?php include_once('tables/toomehed.php'); ?>
		</div>
			
		<div id="myModal" class="modal fade" role="dialog">
		  <div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content bg-dark">
			  <div class="modal-header">
			  Kinnitage või kirjutage põhjus miks ei kinnita
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			  </div>
			  <div class="modal-body">
				<div class="form-group">
					<label>Tagasiside</label>
					<textarea type="text" id="markused" class="form-control"></textarea>
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
<!--<script> 
		$("#nupp").click(function() {
			$("#test").load('tables/toomehed.php')
		});
</script>-->
<script>
	$(document).ready(function(){
		
		
		$(document).on('click','button[data-role=update]',function(){
			var id = $(this).data('id');
			var markused = $('#'+id).children('td[data-target=markused]').text();
			
			$('#markused').val(markused);
			$('#userId').val(id);
			$('#myModal').modal('toggle');
		});
		
		$('#save').click(function(){
			var id = $('#userId').val();
			var markused = $('#markused').val();
			
			$.ajax({
				url : 'php/update.php',
				method : 'post',
				data : {markused : markused , id : id},
				success : function(response){
					$('#'+id).children('td[data-target=markused]').text(markused);
					$('#myModal').modal('toggle');
				}
			});
		});
		
		$('#kinnita').click(function(){
			var id = $('#userId').val();
			var markused = $('#markused').val();
			$.ajax({
				url : 'php/kinnita.php',
				method : 'post',
				data : {markused : markused , id : id},
				success : function(response){
					$('#'+id).children('td[data-target=markused]').text(markused);
					location.reload();
				}
			});
			
		});
	});
</script>
<script>
let btnDanger = document.querySelector('.btn btn-danger');
let btnSuccess = document.querySelector('.btn btn-success');

btnSuccess.addEventListener('click', () => {
	btnDanger.classList.remove('btn-danger');
	btnDanger.classList.add('btn-success');
});
</script>
	<script>
		$('[name="tegemata"]').change(function() {
		$(this).closest('form').submit();
		});
	</script>
		<script>
		$('[name="tehtud"]').change(function() {
		$(this).closest('form').submit();
		});
	</script>
		<script>
		$('[name="k6ik"]').change(function() {
		$(this).closest('form').submit();
		});
	</script>
