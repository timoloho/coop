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

    <title>IT tööd</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="../static/css/admin.css" rel="stylesheet">
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
<body class="p-3 mb-2 bg-dark text-white">
    <main role="main" class="container-fluid">
			<br>
			 <h2 class=""><b>IT Tööd</b></h2>
			 	<form method="POST">	
					<div class="form-group">
						<label for="nimi"></label>
							<select class="custom-select shadow w-25 float-right bg-light" name="syndmus">
								<option value=""disabled selected><? if (!empty($_POST['syndmus'])){
							echo $_POST['syndmus'];
						}else {
							echo "Kõik sündmused";
						} ?></option>
							<option value="">Kõik sündmused</option>
							<optgroup label="Kassa">
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
				</form>
			<form method="POST">
				<input type="radio" name="k6ik">Kõik</input>
				<input type="radio" name="tegemata">Tegemata</input>
				<input type="radio" name="tehtud">Tehtud</input>
			</form>
			<div id="result" class="table-responsive">
			<?php
			include_once("tables/tabel.php");?>
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
				<label>Märkused</label>
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
<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

	<!-- Background of PhotoSwipe.
		 It's a separate element as animating opacity is faster than rgba(). -->
	<div class="pswp__bg"></div>

	<!-- Slides wrapper with overflow:hidden. -->
	<div class="pswp__scroll-wrap">

		<!-- Container that holds slides.
			PhotoSwipe keeps only 3 of them in the DOM to save memory.
			Don't modify these 3 pswp__item elements, data is added later on. -->
		<div class="pswp__container">
			<div class="pswp__item"></div>
			<div class="pswp__item"></div>
			<div class="pswp__item"></div>
		</div>

		<!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
		<div class="pswp__ui pswp__ui--hidden">

			<div class="pswp__top-bar">

				<!--  Controls are self-explanatory. Order can be changed. -->

				<div class="pswp__counter"></div>

				<button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
				<button class="pswp__button" id="custom-photo-close"></button>

				<!-- Preloader demo https://codepen.io/dimsemenov/pen/yyBWoR -->
				<!-- element will get class pswp__preloader--active when preloader is running -->
				<div class="pswp__preloader">
					<div class="pswp__preloader__icn">
						<div class="pswp__preloader__cut">
							<div class="pswp__preloader__donut"></div>
						</div>
					</div>
				</div>
			</div>

			<div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
				<div class="pswp__share-tooltip"></div>
			</div>

			<button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
			</button>

			<button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
			</button>

			<div class="pswp__caption">
				<div class="pswp__caption__center"></div>
			</div>

		</div>

	</div>

</div>
</body>

<script>

	$(".pildike").on("click", function() {
		openPhotoSwipe([{
			src: $(this).attr("src"),
			title: $(this).attr("src"),
			w: window.innerWidth, // image width
			h: window.innerHeight, // image height
		}]);
	});

	let gallery = null;
	function openPhotoSwipe(jsonData) {
		const options = {
			history: false,
			focus: false,
			showAnimationDuration: 0,
			hideAnimationDuration: 0
		};

		gallery = new PhotoSwipe(document.querySelector('.pswp'), PhotoSwipeUI_Default, jsonData, options);
		gallery.init();
	}
	
	window.addEventListener("resize", () => update(pswp.items));

	// Update inner width and inner height
	function update(items)
	{
		items.forEach(item =>
		{
			item.w = window.innerWidth;
			item.h = window.innerHeight;
		})
	}
	
	document.querySelector(".pswp__button--close").style.display = "none"
	const customPhotoClose = document.querySelector("#custom-photo-close");
	if(customPhotoClose != null) {
		customPhotoClose.onclick = function() {
			if(gallery != null) {
				gallery.close();
			}
		}
	}
</script>

</html>
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
				url : 'update.php',
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
				url : 'kinnita.php',
				method : 'post',
				data : {markused : markused , id : id},
				success : function(response){
					$('#'+id).children('td[data-target=kirjeldus]').text(kirjeldus);
					$('#'+id).children('td[data-target=markused]').text(markused);
				}
			});
		});
	});
</script>
	<script>
		$('[name="sort"]').change(function() {
		$(this).closest('form').submit();
		});
	</script>
	<script>
		$('[name="syndmus"]').change(function() {
		$(this).closest('form').submit();
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
