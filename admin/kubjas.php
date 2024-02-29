<?php include_once('../connection.php');
session_start();

 if($_SESSION['kasutaja_id'] !== 25){
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

    <title>Töömehed</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <!-- Custom styles for this template -->
   	  <link href="../static/css/admin.css" rel="stylesheet">
  </head>
<body class="p-3 mb-2 bg-dark text-white">

	<nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark shadow p-0">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<a class="navbar-brand col-sm-3 col-md-1 mr-0" style="text-align:center" href="kubjas.php"><h3><b>COOP</b></h3></a>
					<ul class="navbar-nav mr-auto mt-2 mt-lg-0 ml-5 mr-3">
					</ul>
		
						<ul class="navbar-nav my-2 my-lg-0 mr-3 ml-3">
							<li class="nav-item text-nowrap">
							  <a class="nav-link" href="../logout.php"><b>Logi välja</b></a>
							</li>
						</ul>
			</div>
	</nav>

    <main role="main" class="container">
          
			<br>
			<br>	
			<form method="POST">
				<h2><b>Töömehed</b></h2>
			<div class="form-group" style="display:inline-block">
				<select class="custom-select bg-light" name="sort">
						<option value="">Kauplused</option>
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
						<option value="Saaremaa Kaubamaja">Saaremaa Kaubamaja</option> 
						<option value="Saikla kauplus">Saikla kauplus</option> 
						<option value="Salme kauplus">Salme kauplus</option> 					
						<option value="Tagavere kauplus">Tagavere kauplus</option> 					
						<option value="Tornimäe kauplus">Tornimäe kauplus</option> 					
					</optgroup>
						<optgroup label="Muu">				
						<option value="Maiasmokk">Maiasmokk</option>
						<option value="Rehemäe">Rehemäe</option>
						<option value="Tallinna tn.1">Tallina tn.1</option>
						<option value="STÜ Tootmine">STÜ Tootmine</option>
						<option value="Tehnika 5">Tehnika 5</option>									
					</optgroup>
				</select>			
			</div>
				<div class="form-group" style="display:inline-block">
					<select class="custom-select shadow bg-light" name="t66mees">
						<option value="">Töömehed</option>
						<option value="heiki.saaretalu">Heiki Saaretalu</option> 
						<option value="ojar.sepp">Ojar Sepp</option> 
						<option value="mati.jogi">Mati Jõgi</option>
					</select>
				</div>
			
			
				<div class="form-group" style="display:inline-block">
					<select class="custom-select shadow bg-light" name="filter">
						<option value="">Kinnitus</option>
						<option value="kinnitamata">Kinnitamata</option> 
						<option value="kinnitatud">Kinnitatud</option> 
					</select>
				</div>
				<div class="form-group" style="display:inline-block">
					<button type="submit" class="btn btn-success" name="otsi">Otsi</button>
				</div>
			</form>
		<div id="result" class="table-responsive">
			<?php
				include_once("tables/kubjastabel.php");
			?>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.3/photoswipe.min.css" integrity="sha512-yxWNfGm+7EK+hqP2CMJ13hsUNCQfHmOuCuLmOq2+uv/AVQtFAjlAJO8bHzpYGQnBghULqnPuY8NEr7f5exR3Qw==" crossorigin="anonymous" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.3/photoswipe.min.js" integrity="sha512-2R4VJGamBudpzC1NTaSkusXP7QkiUYvEKhpJAxeVCqLDsgW4OqtzorZGpulE3eEA7p++U0ZYmqBwO3m+R2hRjA==" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.3/default-skin/default-skin.css" integrity="sha512-QwSfZXX2w9SDWSNBKpEos673LXajTJpYKwtG+zJNP9zHsgRrWtNSx1gKVyB6qWUP4wJ0Hfnk9KJzrB6IKrXmEQ==" crossorigin="anonymous" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.3/photoswipe-ui-default.min.js" integrity="sha512-SxO0cwfxj/QhgX1SgpmUr0U2l5304ezGVhc0AO2YwOQ/C8O67ynyTorMKGjVv1fJnPQgjdxRz6x70MY9r0sKtQ==" crossorigin="anonymous"></script>
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

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.11.1/css/alertify.min.css" integrity="sha256-sWU2rI9NwiWVFCJE2roX/WU8vrGKshPV5zoH31X3gmQ=" crossorigin="anonymous" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.11.1/alertify.min.js" integrity="sha256-a5BJQEMVvKJbs38h5W3EFXI4svjVezJnZzK1YFF3Fm0=" crossorigin="anonymous"></script>

	
	<!--<script>
		$('[name="sort"]').change(function() {
		$(this).closest('form').submit();
		});
	</script>
	<script>
		$('[name="t66mees"]').change(function() {
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
	</script> -->

