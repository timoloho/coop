<?php include_once('../main.php');
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
$sql = "SELECT * FROM seadmed";
    $seadmed = $conn->query($sql);

$sql2 = "SELECT * FROM mudel";
    $mudelid = $conn->query($sql2);

$sql3= "SELECT status FROM ladu";
	$status = $conn->query($sql3);

$sql4 = "SELECT * FROM seadmed";
	$seadmed_sort = $conn->query($sql4);
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
			<form method="POST" enctype="multipart/form-data">
				<h2 style="display:inline-block"><b>Sündmused</b></h2>
				<div class="form-group">
					<select class="custom-select w-15 float-left bg-light mr-1" name="asukoht_sort">
						<option value="<?=$_POST['asukoht_sort']?>"><? if (!empty($_POST['asukoht_sort'])){
							echo $_POST['asukoht_sort'];
						}else {
							echo "Kõik kauplused";
						} ?>
						</option>
						<option value="">Kõik kauplused</option>
						<optgroup label="Konsumid">
						<option value="Kaubaait">Kaubaait</option>
							<option value="Kummeli Konsum">Kummeli Konsum</option> 						
							<option value="Liiva Konsum">Liiva Konsum</option> 
							<option value="Orissaare Konsum">Orissaare Konsum</option>
							<option value="Port Artur Konsum">Port Artur Konsum</option>
							<option value="Rae Konsum">Rae Konsum</option>
							<option value="Salme kauplus">Salme Konsum</option>
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
							<option value="Saikla kauplus">Saikla kauplus</option> 
							<option value="Tagavere kauplus">Tagavere kauplus</option> 					
							<option value="Tornimäe kauplus">Tornimäe kauplus</option>
							<option value="Valjala kauplus">Valjala kauplus</option>
						</optgroup>
							<optgroup label="Muu">				
							<option value="Maiasmokk">Maiasmokk</option>
							<option value="Rehemäe">Rehemäe</option>
							<option value="Tallinna tn.1">Tallinna tn.1</option>
							<option value="Saaremaa Kaubamaja">Saaremaa Kaubamaja</option> 
							<option value="STÜ Tootmine">STÜ Tootmine</option>
							<option value="Tehnika 5">Tehnika 5</option>
							<option value="Toidumaailm">Toidumaailm</option>						
						</optgroup>
					</select>
						<label for="nimi"></label>
							<select class="custom-select shadow w-15 float-left bg-light mr-1" name="seade_sort">
								<option value="<?=$_POST['seade_sort']?>"><? if (!empty($_POST['seade_sort'])){
									echo $_POST['seade_sort'];
								}else{	
									echo "Kõik sündmused";
							}?>
								</option>
								<option value="">Kõik sündmused</option>
							<?php 
								if($seadmed_sort->num_rows > 0)
								while($row = $seadmed_sort->fetch_assoc())
									echo "<option value ='{$row['nimetus']}'>{$row['nimetus']}</option>";
							?>
						</select>
						<select class="custom-select shadow w-15 bg-light font-weight-bold float-left mr-1" name="status_sort">
							<option class="font-weight-bold" value="<?=$_POST['status_sort']?>"><? if (!empty($_POST['status_sort']) && $_POST['status_sort'] == 1){
										echo "Kuva tehtud";
									} else if (!empty($_POST['status_sort'])){
										echo $_POST['status_sort'];
									} else {	
										echo "Kuva kõik";
									} ?>
							<option value="">Kuva kõik</option>
							<option value="1">Laos</option>
							<option value="2">Objektil</option>
							<option value="3">Üle vaadata</option>
							<option value="4">Katki</option>
							<option value="5">Maha kantud</option>	
						</select>
				<button type="submit" class="btn btn-primary" name="otsi">Otsi</button>
				</div>
			</form>

			<div id="result" class="table-responsive">
			<?php
			include_once("tabelid/ladu_tabel.php");?>
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
							<label for="nimi"><b>Seade</b></label>
								<select class="mb-5 custom-select shadow bg-light" name="seade" id="seade" >
                        	        <option hidden value="">Seade</option>
                        	        <?php 

									if($seadmed->num_rows > 0)
									while($row = $seadmed->fetch_assoc())
											echo "<option value ='{$row['nimetus']}'>{$row['nimetus']}</option>";

									?>
                          		</select>

							<?php
							/*echo '<pre>';
							print_r($seadmed);
							echo '</pre>';**/
							?>
            			</div>
						<div class="form-group">    
							<label for="nimi"><b>Mudel</b></label>
								<select class="mb-5 custom-select shadow bg-light" name="mudel" placeholder="" id="mudel">
									<option hidden value="">Mudel</option>
									<?php 

									if($mudelid->num_rows > 0)
									while($row = $mudelid->fetch_assoc())
											echo "<option value ='{$row['mudel']}'>{$row['mudel']}</option>";

									?>
								</select>
						</div>
					
						<div class="form-group">
							<label>S/N</label>
							<input type="text" id="sn" class="form-control"></input>
						</div>
						<div class="form-group">
							<label>Kirjeldus</label>
							<textarea type="text" id="kirjeldus" class="form-control"></textarea>
						</div>
						<div class="form-group">    
							<label for="nimi"><b>Kauplus</b></label>
								<select class="mb-5 custom-select shadow bg-light" name="kauplus" placeholder="" id="kauplus">
									<option value="">Kauplus</option>
									<optgroup label="Konsumid">
										<option value="Kaubaait">Kaubaait</option>
										<option value="Kummeli Konsum">Kummeli Konsum</option> 						
										<option value="Liiva Konsum">Liiva Konsum</option> 
										<option value="Orissaare Konsum">Orissaare Konsum</option>
										<option value="Port Artur Konsum">Port Artur Konsum</option>
										<option value="Rae Konsum">Rae Konsum</option>
										<option value="Salme kauplus">Salme Konsum</option>
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
										<option value="Saikla kauplus">Saikla kauplus</option> 
										<option value="Tagavere kauplus">Tagavere kauplus</option> 					
										<option value="Tornimäe kauplus">Tornimäe kauplus</option>
										<option value="Valjala kauplus">Valjala kauplus</option>
									</optgroup>
									<optgroup label="Muu">				
										<option value="Maiasmokk">Maiasmokk</option>
										<option value="Rehemäe">Rehemäe</option>
										<option value="Tallinna tn.1">Tallinna tn.1</option>
										<option value="Saaremaa Kaubamaja">Saaremaa Kaubamaja</option> 
										<option value="STÜ Tootmine">STÜ Tootmine</option>
										<option value="Tehnika 5">Tehnika 5</option>
										<option value="Toidumaailm">Toidumaailm</option>						
									</optgroup>
								</select>
						</div>
						<div class="form-group">
							<label for="status"><b>Staatus</b></label>
							<select class="mb-5 custom-select shadow bg-light" name="status" placeholder="" id="status">
								<option value="1">Laos</option>
								<option value="2">Objektil</option>
								<option value="3">Üle vaadata</option>
								<option value="4">Katki</option>
								<option value="5">Maha kantud</option>
							</select>
						</div>
						<div class="form-group">    
							<label for="riiul"><b>Riiul</b></label>
								<select class="mb-5 custom-select shadow bg-light" name="riiul" placeholder="" id="riiul">
									<option value="">Riiul</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="">6</option>
								</select>
						</div>		
								<!--<div class="form-group">
									<input type="file" accept="image/*" name="files" multiple></input>
								</div>-->
						
						<input type="hidden" id="userId"></input>
			  		</div>
					<div class="modal-footer">
						<button type="button" name="kustuta" id="kustuta" class="btn btn-danger" data-dismiss="modal">Kustuta</button>
						<a name="save" id="save" class="btn btn-primary">Uuenda</a>
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
</html>
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
	$(document).ready(function(){
		
		
		$(document).on('click','button[data-role=update]',function(){
			var id = $(this).data('id');
			var kirjeldus = $('#'+id).children('td[data-target=kirjeldus]').text();
			var sn = $('#'+id).children('td[data-target=sn]').text();
			var seade = $('#'+id).children('td[data-target=seade]').text();
			var mudel = $('#'+id).children('td[data-target=mudel]').text();
			var kauplus = $('#'+id).children('td[data-target=kauplus]').text();
			var status = $('#'+id).children('td[data-target=status]').text();
			var riiul = $('#'+id).children('td[data-target=riiul]').text();
			
			
			
			$('#kirjeldus').val(kirjeldus);
			$('#sn').val(sn);
			$('#userId').val(id);
			$('#seade').val(seade);
			$('#mudel').val(mudel);
			$('#kauplus').val(kauplus);
			$('#status').val(status);
			$('#riiul').val(riiul);
			$('#myModal').modal('toggle');
		});
		
		$('#save').click(function(){
			var id = $('#userId').val();
			var kirjeldus = $('#kirjeldus').val();
			var sn = $('#sn').val();
			var seade = $('#seade').val();
			var mudel = $('#mudel').val();
			var kauplus = $('#kauplus').val();
			var status = $('#status').val();
			var riiul = $ ('#riiul').val();
			
			$.ajax({
				url : 'php/ladu_update.php',
				method : 'post',
				data : {kirjeldus : kirjeldus , sn : sn , seade : seade, mudel : mudel, kauplus : kauplus, status : status, riiul : riiul, id : id},
				success : function(response){
					$('#'+id).children('td[data-target=kirjeldus]').text(kirjeldus);
					$('#'+id).children('td[data-target=sn]').text(sn);
					$('#'+id).children('td[data-target=seade]').text(seade);
					$('#'+id).children('td[data-target=mudel]').text(mudel);
					$('#'+id).children('td[data-target=kauplus]').text(kauplus);
					$('#'+id).children('td[data-target=status]').text(kauplus);
					$('#'+id).children('td[data-target=riiul]').text(riiul);
					$('#myModal').modal('toggle');
				}
			});
		});

		$('#kustuta').click(function() {
			var id = $('#userId').val();
			$.ajax({
				url : 'php/ladu_kustuta.php',
				method : 'post',
				data : {id : id},
				success : function(response){
						location.reload();
				}
			});
		});
	});
</script>
<!--<script> 
    $(document).ready(function(){
		setInterval(function(){
			$("#reload").load('tabel.php')
		}, 15000);
	});   
</script>-->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
<script>
	$(document).ready(function(){
		$('#search_text').keyup(function(){
			var txt = $(this).val();
			if(txt != ''){
				$.ajax({
					url:"tabelid/ladu_tabel.php",
					method:"post",
					data:{search:txt},
					dataType:"text",
					success:function(data){
						$('#result').html(data);
				}
			});
			}else{
					$('#result').html('');
				$.ajax({
					url:"tabelid/ladu_tabel.php",
					method:"post",
					data:{search:txt},
					dataType:"text",
					success:function(data){
						$('#result').html(data);
					}
				});
			}
		});
	});
    </script>
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
