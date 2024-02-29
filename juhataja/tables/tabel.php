	<?php include_once('../connection.php');
	
	if(!empty($_POST['syndmus'])){
		$sql = "SELECT it_id, kirjeldus, markused, date, syndmus, kasutaja, t66_status FROM it_t66, kauplused WHERE kauplus_id =" . $_SESSION['kasutaja_id'] . " AND kaupluse_nimi = kauplus AND syndmus ='" . $_POST['syndmus'] . "' ORDER BY it_id DESC";
	}else if(isset($_POST['tegemata'])){
		$sql = "SELECT it_id, kirjeldus, markused, date, syndmus, kasutaja, t66_status FROM it_t66, kauplused WHERE kauplus_id =" . $_SESSION['kasutaja_id'] . " AND kaupluse_nimi = kauplus AND t66_status = 0 ORDER BY it_id DESC";	
	}else if(isset($_POST['tehtud'])){
		$sql = "SELECT it_id, kirjeldus, markused, date, syndmus, kasutaja, t66_status FROM it_t66, kauplused WHERE kauplus_id =" . $_SESSION['kasutaja_id'] . " AND kaupluse_nimi = kauplus AND t66_status = 1 ORDER BY it_id DESC";	
	}
	else{
		$sql = "SELECT it_id, kirjeldus, markused, date, syndmus, kasutaja, t66_status FROM it_t66, kauplused WHERE kauplus_id =" . $_SESSION['kasutaja_id'] . " AND kaupluse_nimi = kauplus ORDER BY it_id DESC";	
	}
		
	
	$result = $conn->query($sql);

	if($result->num_rows > 0) {
		$table ='<form method="POST">';
		$table .= '<table class="table table-striped table-bordered table-dark"><thead class="thead-dark">
			<tr>
				<th scope="col">Kinnitus</th>
				<th scope="col">Kirjeldus</th>
				<th scope="col">Märkused</th>
				<th scope="col">Sündmus</th>
				<th scope="col">Sisestusaeg</th>
				<th scope="col">Kasutaja</th>
				

			</tr>
		</thead>
	<tbody>';
		
		while($row = $result->fetch_assoc()) {
				$table .= 
					'<tr id="' . $row['it_id'] . '">
						<td><button type="button" data-target="kinnita" data-role="update" data-id="' . $row['it_id'] . '" class="btn btn-' . ($row['t66_status'] == 1 ? 'success' : 'danger') . ' container"
						value="' . $row['it_id'] . '"' . ($row['t66_status'] == 1 ? ' disabled' : '') .'' .  ($row['kasutaja'] == $_SESSION['username'] ? '' : ' disabled ') . '/>' . $row['it_id'] . '</td>										
						<td style="word-wrap:break-word" data-target="kirjeldus">' . $row['kirjeldus'] . '</td>
						<td style="word-wrap:break-word" data-target="markused">' . $row['markused'] . '</td>
						<td>' . $row['syndmus'] . '</td>
						<td>' . date("H:i d.m.Y", strtotime($row['date'])) . '</td>
						<td>' . $row['kasutaja'] . '</td>
						
					</tr>';
		}
		$table .='</tbody></table>';
		$table .='</form>';
	} else {
		echo "0 vastust";
	}
	echo $table;
?>
