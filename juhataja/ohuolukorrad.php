<?php include_once('main.php');
session_start();

 if($_SESSION['kasutaja_id'] !== 20){
	header("location: ../index.php");
	exit;
 }
		
	if(empty($_GET['sort'])){
		$sql = "SELECT id, esitaja, datetime, osakond, piirkond, olu_kirjeldus, likvideeritud_kohe, suur_oht, status, pilt FROM ohuolukord ORDER BY id DESC";	
	}else{
		$sql = "SELECT id, esitaja, datetime, osakond, piirkond, olu_kirjeldus, likvideeritud_kohe, suur_oht, status, pilt FROM ohuolukord WHERE osakond ='" . $_GET['sort'] . "'ORDER BY id DESC";
	}

	$result = $conn->query($sql);

	if($result->num_rows > 0) {
		$table ='<form method="POST">';
		$table .= '<table class="table table-striped table-bordered table-dark"><thead class="thead-dark">
			<tr>
				<th scope="col">Kinnitus</th>
				<th scope="col">Esitaja</th>
				<th scope="col">Aeg</th>
				<th scope="col">Osakond</th>
				<th scope="col">Piirkond</th>
				<th scope="col">Olukorra kirjeldus</th>
				<th scope="col">Likvideeritud kohe?</th>
				<th scope="col">Suur oht?</th>
				<th scope="col">Pilt</th>

			</tr>
		</thead>
	<tbody>';
		
		while($row = $result->fetch_assoc()) {
				$table .= 
					'<tr>
						<td><button type="submit" name="nupp1" class="btn btn-' . ($row['status'] == 2 ? 'success' : ($row['status'] == 1 ? 'warning' : 'danger')) . ' container"
						value="' . $row['id'] . '"' . ($row['status'] == 2 ? ' disabled' : '') . '/>' . $row['id'] . '</button></td>						
						<td>' . $row['esitaja'] . '</td>
						<td>' . $row['datetime'] . '</td>
						<td>' . $row['osakond'] . '</td>
						<td>' . $row['piirkond'] . '</td>
						<td style="word-break:break-word">' . $row['olu_kirjeldus'] . '</td>
						<td>' . $row['likvideeritud_kohe'] . '</td>
						<td>' . $row['suur_oht'] . '</td>
						<td><img src="../pildid/' . $row['pildinimi'] . '" class="pildike" loading="lazy" height="50px" width="50"/></td>
					</tr>';
		}
		$table .='</tbody></table>';
		$table .='</form>';
	} else {
		echo "0 vastust";
	}
	

	if(!empty($_POST['nupp1'])){
		
		$kinnitamine = $_POST['nupp1'];
		
			$kinnitus = "UPDATE ohuolukord SET status= status +1 WHERE id=".$_POST['nupp1'];
		
			$run = mysqli_query($conn,$kinnitus) or die(mysqli_error($conn));
			
			if($run){
				redirect("ohuolukorrad.php");
			}else{
				echo "wtf status update katki";
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

    <title>Ohuolukorrad</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="../static/css/admin.css" rel="stylesheet">
  </head>
<body class="p-3 mb-2 bg-dark text-white">

	<nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark shadow p-0">

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<a class="navbar-brand col-sm-3 col-md-1 mr-0" style="text-align:center" href="index.php"><h3><b>COOP</b></h3></a>
				<ul class="navbar-nav mr-auto mt-2 mt-lg-0 ml-5 mr-3">
					<li class="nav-item mr-2 active">
						  <a class="nav-link" href="ohuolukorrad.php"><b>Ohuolukord</b></a>
					</li>
					<li class="nav-item mr-2">
						  <a class="nav-link" href="testidin.php"><b>Covid-19</b></a>
					</li>
					<li class="nav-item mr-2">
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

    <main role="main" class="container">
			<br>	
			<form method="GET">
				<h2 style="display:inline-block"><b>OHUOLUKORRAD</b></h2><select class="mb-3 custom-select w-25 float-right" name="sort" style="background-color: silver">
						<option value=""disabled selected hidden><? if (!empty($_GET['sort'])){
							echo $_GET['sort'];
						}else {
							echo "Kõik kauplused";
						} ?></option>
						<option value="">Kõik</option>
					<optgroup label="Konsumid">
						<option value="Kaubaait">Kaubaait</option> 
						<option value="Liiva.Konsum">Liiva Konsum</option> 
						<option value="Orissaare.Konsum">Orissaare Konsum</option>
						<option value="PortArtur.Konsum">Port Artur Konsum</option>
						<option value="Rae.Konsum">Rae Konsum</option>
						<option value="Tooma.Konsum">Tooma Konsum</option> 
					</optgroup>
					<optgroup label="Kauplusesd">
						<option value="Aste.kauplus">Aste kauplus</option>
						<option value="Eikla.kauplus ">Eikla kauplus</option> 
						<option value="Hellamaa.kauplus">Hellamaa kauplus</option>
						<option value="Kihekonna.kauplus">Kihekonna kauplus</option> 
						<option value="Kärla.kauplus">Kärla kauplus</option> 
						<option value="Leisi.kauplus">Leisi kauplus</option> 
						<option value="Lümanda.kauplus">Lümanda kauplus</option> 
						<option value="Mustjala.kauplus">Mustjala kauplus</option> 
						<option value="Nasva.kauplus">Nasva kauplus</option> 					
						<option value="Pihtla.kauplus">Pihtla kauplus</option> 					 
						<option value="Pärsama.kauplus">Pärsama kauplus</option> 					
						<option value="Ranna.kauplus">Ranna kauplus</option> 
						<option value="Roomassaare.kauplus">Roomassaare kauplus</option> 
						<option value="Saaremaa.Kaubamaja">Saaremaa Kaubamaja</option> 
						<option value="Saikla.kauplus">Saikla kauplus</option> 
						<option value="Salme.kauplus">Salme kauplus</option> 					
						<option value="Tagavere.kauplus">Tagavere kauplus</option> 					
						<option value="Tornimäe.kauplus">Tornimäe kauplus</option> 					
					</optgroup>
						<optgroup label="Muu">				
						<option value="Maiasmokk">Maiasmokk</option>
						<option value="STÜ.Tootmine">STÜ Tootmine</option>
						<option value="Kontor">Kontor</option>									
					</optgroup>
				</select>			
			</form>
		<div class="table-responsive">
			<?php echo $table; ?>	
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

	
	<script>
		$('[name="sort"]').change(function() {
		$(this).closest('form').submit();
		});
	</script>

