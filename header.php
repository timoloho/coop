<?php

?>
<html>
    <head>
	<nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark shadow p-0">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
			<img class=" mt-1 ml-1 mb-1 mr-0" width="130px" height="50px" src="../coopsaaremaa.png" alt="COOP">
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
	
				
					<ul class="navbar-nav mr-auto mt-2 mt-lg-0 ml-5 mr-3">
						<!--<li class="nav-item nav-item mr-2">
						  <a class="nav-link" href="it_t66.php"><b>Tööleht</b><span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item mr-2">
						  <a class="nav-link" href="it_t66d.php"><b>IT Töö</b></a>
						</li>

						<li class="nav-item mr-2 active">
							<a class="nav-link" href="index.php"><b>Töömehed</b></a>
						</li>-->
						<?php
							$headerArray = [
								'Tööleht' => 'it_t66.php',
								'IT Töö' => 'it_t66d.php',
								'Töömehed' => 'index.php',
								'Temperatuur' => 'temp.php',
							];
							
							foreach($headerArray as $nimetus => $url){
								echo '<li class="nav-item mr-2 ' . (strpos($_SERVER['REQUEST_URI'], $url) !== false ? 'active' : '') . '">
									<a class="nav-link" href="' . $url . '"><b>' . $nimetus . '</b></a>
								</li>';
								
							}
                        ?>
                           <li class="nav-item dropdown mr-2 nav-item">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <b>Võõrad</b>
                            </a>
								<div class="dropdown-menu bg-dark shadow border-white" aria-labelledby="navbarDropdown">
								  <?php
                                    $headerV66rad = [
                                        'Sisestamine' => 'v66ras.php',
                                        'Ülevaade' =>'v66rad.php', 
                                    ];
                        
                                    foreach($headerV66rad as $v66rad => $url2){
                                        echo '<a class="dropdown-item bg-dark" style="color:' . (strpos($_SERVER['REQUEST_URI'], $url2) !== false ? 'white' : 'silver') . '"">
									<a class="nav-link" href="' . $url2 . '"><b>' . $v66rad . '</b></a>
								</a>';
                            }
				        ?>
								</div>	
                           </li>
						   <li class="nav-item dropdown mr-2 nav-item">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <b>Ladu</b>
                            </a>
								<div class="dropdown-menu bg-dark shadow border-white" aria-labelledby="navbarDropdown">
								  <?php
                                    $headerLadu = [
                                        'Sisestamine' => 'ladu_sisse.php',
                                        'Ladu' =>'ladu.php', 
                                    ];
                        
                                    foreach($headerLadu as $ladu => $url3){
                                        echo '<a class="dropdown-item bg-dark" style="color:' . (strpos($_SERVER['REQUEST_URI'], $url3) !== false ? 'white' : 'silver') . '"">
									<a class="nav-link" href="' . $url3 . '"><b>' . $ladu . '</b></a>
								</a>';
                            }
				        ?>
								</div>	
                           </li>
					</ul>      
					   <input type="text" class="form-control form-control-dark w-25" id="search_text" name="search_text" placeholder="Otsi..">
					
				    <ul class="navbar-nav my-2 my-lg-0 mr-3 ml-3">
				        <li class="nav-item text-nowrap">
				            <a class="nav-link" href="/logout.php"><b>Logi välja</b></a>
				        </li>
				    </ul>
			</div>
	</nav>
    </head>
    
</html>