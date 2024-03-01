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
				    <ul class="navbar-nav my-2 my-lg-0 mr-3 ml-3">
				        <li class="nav-item text-nowrap">
				            <a class="nav-link" href="/logout.php"><b>Logi välja</b></a>
				        </li>
				    </ul>
			</div>
	</nav>
    </head>
    
</html>