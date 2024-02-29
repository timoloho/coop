<?php include_once('connection.php');
session_start();

 if($_SESSION['level'] !== 1){
	header("location: index.php");
	exit;
 }

	
	$sql = "SELECT * FROM (tehtud_t66, kasutajad) WHERE kasutaja_id =".$_SESSION['kasutaja_id'] ." AND username = kasutaja AND algus_kuupaev >= '2023-01-01' ORDER BY ID DESC";
	$result = $conn->query($sql);

	if($result->num_rows > 0) {
		$table ='<form method="POST">';
		$table .= '<table class="table table-striped table-bordered table-dark"><thead class="thead-dark">
			<tr>
				<th scope="col">Kinnitus</th>
				<th scope="col">Kasutaja</th>
				<th scope="col">Kirjeldus</th>
				<th scope="col">Juhataja tagasiside</th>
				<th scope="col">Algus</th>
				<th scope="col">Lõpp</th>
				<th scope="col">Tunnid</th>
				<th scope="col">Kauplus</th>
				<th scope="col">Pilt</th>
			</tr>
		</thead>
	<tbody>';
		
		while($row = $result->fetch_assoc()) {
				$table .= 
					'<tr>
						<td><button type="submit" name="" class="btn btn-' . ($row['t66_status'] == 1 ? 'success' : 'danger') . ' container"
		value="' . $row['ID'] . '"' . ($row['t66_status'] == 1 ? ' disabled' : ' disabled') . '/>' . $row['ID'] . '</button></td>
						<td>' . $row['kasutaja'] . '</td>
						<td style="word-break:break-word">' . $row['kirjeldus'] . '</td>
						<td style="word-break:break-word">' . $row['markused'] . '</td>
						<td>' . $row['algus_kuupaev'] . '</td>
						<td>' . $row['lopp_kuupaev'] . '</td>
						<td>' . $row['tunnid'] . '</td>
						<td>' . $row['kauplus'] . '</td>
						<td><img src="pildid/' . $row['pildinimi'] . '" class="pildike" loading="lazy" height="50px" width="50px"/></td>
					</tr>';
		}
		$table .='</tbody></table>';
		$table .='</form>';
	} else {
		echo "0 vastust";
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <!-- Custom styles for this template -->
	  <link href="static/css/admin.css" rel="stylesheet">
  </head>
<body class="p-3 mb-2 bg-secondary text-white">
 
	    <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark shadow p-0 justify-content-between">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" style="text-align:center" href=""><h3><b>COOP</b></h3></a>
	  	<ul class="navbar-nav px-3 float-left">
			<li class="nav-item">
			  <a class="nav-link" href="tooaeg.php"><b>Tööleht</b><span class="sr-only">(current)</span></a>
			</li>

		</ul>
		<ul class="navbar-nav px-3 float-left">
	  		<li class="nav-item col-mm-4 nav-item active">
			  <a class="nav-link" href="tooajad.php"><b>Tehtud tööd</b><span class="sr-only">(current)</span></a>
			</li>
		</ul>
		<ul class="navbar-nav px-3 ">
			<li class="nav-item text-nowrap ">
			<a class="nav-link" href="logout.php"><b>Logi välja</b></a>
			</li>
		</ul>
    </nav>
	
	
	<main role="main" class="container">
	<br>
	<br>
		<div class="table-responsive"
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
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</html>
