	<?php include_once('../connection.php');
	
	if(!empty($_POST['syndmus'])){
		$sql = "SELECT * FROM it_t66, kauplused WHERE syndmus ='" . $_POST['syndmus'] . "' AND kauplus_id =" . $_SESSION['kasutaja_id'] . " AND kaupluse_nimi = kauplus ORDER BY it_id DESC";
	}
	else if(!empty($_POST['tegemata'])){
		$sql = "SELECT it_id, kirjeldus, markused, date, syndmus, kasutaja, t66_status, kauplus_id FROM it_t66, kauplused WHERE t66_status = 0 AND kauplus_id =" . $_SESSION['kasutaja_id'] . " AND kaupluse_nimi = kauplus ORDER BY it_id DESC";	
	}
	else if(!empty($_POST['tehtud'])){
		$sql = "SELECT it_id, kirjeldus, markused, date, syndmus, kasutaja, t66_status, kauplus_id FROM it_t66, kauplused WHERE t66_status = 1 AND kauplus_id =" . $_SESSION['kasutaja_id'] . " AND kaupluse_nimi = kauplus ORDER BY it_id DESC";	
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
				<th scope="col">Kauplus</th>
				<th scope="col">Kirjeldus</th>
				<th scope="col">Märkused</th>
				<th scope="col">Sündmus</th>
				<th scope="col">Sisestusaeg</th>
				<th scope="col">Kasutaja</th>
				<th scope="col">Pilt</th>

			</tr>
		</thead>
	<tbody>';
		
		while($row = $result->fetch_assoc()) {
				$table .= 
					'<tr id="' . $row['it_id'] . '">
						<td><button type="button" data-target="kinnita" data-role="update" data-id="' . $row['it_id'] . '" class="btn btn-' . ($row['t66_status'] == 1 ? 'success' : 'danger') . ' container"
						value="' . $row['it_id'] . '"' . ($row['t66_status'] == 1 ? ' disabled' : '') .'' .  ($row['kasutaja'] == $_SESSION['username'] ? '' : ' disabled ') . '/>' . $row['it_id'] . '</td>										
						<td>' . $row['kauplus'] . '</td>
						<td style="word-wrap:break-word" data-target="kirjeldus">' . $row['kirjeldus'] . '</td>
						<td style="word-wrap:break-word" data-target="markused">' . $row['markused'] . '</td>
						<td>' . $row['syndmus'] . '</td>
						<td>' . $row['date'] . '</td>
						<td>' . $row['kasutaja'] . '</td>
						<td><img src="../admin/pildid/' . $row['pilt_id'] . '" class="pildike" loading="lazy" height="50px" width="50"/></td>
					</tr>';
		}
		$table .='</tbody></table>';
		$table .='</form>';
	} else {
		echo "0 vastust";
	}
	echo $table;
?>
