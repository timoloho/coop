	<?php include_once('../connection.php');
	session_start();
	
	if(isset($_POST['tegemata'])){
		$sql = "SELECT * FROM (tehtud_t66, kauplused, kasutajad) WHERE kasutaja_id =".$_SESSION['kasutaja_id']." AND kauplus_id = kasutaja_id AND kaupluse_nimi = kauplus AND t66_status = 0 ORDER BY ID DESC";
	}
	else if(isset($_POST['tehtud'])){
		$sql = "SELECT * FROM (tehtud_t66, kauplused, kasutajad) WHERE kasutaja_id =".$_SESSION['kasutaja_id']." AND kauplus_id = kasutaja_id AND kaupluse_nimi = kauplus AND t66_status = 1 ORDER BY ID DESC";
	}else{
		$sql = "SELECT * FROM (tehtud_t66, kauplused, kasutajad) WHERE kasutaja_id =".$_SESSION['kasutaja_id']." AND kauplus_id = kasutaja_id AND kaupluse_nimi = kauplus ORDER BY ID DESC";
	}
	
	$result = $conn->query($sql);

	if($result->num_rows > 0) {
		$table ='<form method="POST">';
		$table .= '<table class="table table-striped table-bordered table-dark"><thead class="thead-dark">
			<tr>
				<th scope="col">Kinnitus</th>
				<th scope="col">Töömees</th>
				<th scope="col">Kirjeldus</th>
				<th scope="col">Juhataja tagasiside</th>
				<th scope="col">Algus</th>
				<th scope="col">Lõpp</th>
				<th scope="col">Tunnid</th>
			</tr>
		</thead>
	<tbody>';
		
		while($row = $result->fetch_assoc()) {
				$table .= 
					'<tr id="' . $row['ID'] . '">
						<td><button type="button" data-target="kinnita" data-role="update" data-id="' . $row['ID'] . '" class="btn btn-' . ($row['t66_status'] == 1 ? 'success' : 'danger') . ' container"
					value="' . $row['ID'] . '"/>' . $row['ID'] . '</button></td>
						<td>' . $row['kasutaja'] . '</td>
						<td style="word-break:break-word">' . $row['kirjeldus'] . '</td>
						<td style="word-break:break-word" data-target="markused">' . $row['markused'] . '</td>
						<td>' . date("H:i d.m.Y", strtotime($row['algus_kuupaev'])) . '</td>
						<td>' . date("H:i d.m.Y", strtotime($row['lopp_kuupaev'])) . '</td>
						<td>' . $row['tunnid'] . '</td>
					</tr>';
		}
		$table .='</tbody></table>';
		$table .='</form>';
	} else {
		$tyhi = "Sissekanded puuduvad.";
	}
		echo $tyhi;
		echo $table;
		
?>
