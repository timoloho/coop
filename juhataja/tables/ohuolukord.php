	<?php include_once('../connection.php');
	
	
	if(!empty($_GET['sort']) && ($_POST['syndmus'])){
		$sql = "SELECT * FROM it_t66 WHERE kauplus ='" . $_GET['sort'] . "' AND syndmus ='" . $_POST['syndmus'] . "' ORDER BY it_id DESC";
	}else if(!empty($_GET['sort']) && empty($_POST['syndmus'])){
		$sql = "SELECT * FROM it_t66 WHERE kauplus ='" . $_GET['sort'] . "' ORDER BY it_id DESC";
	}else if(empty($_GET['sort']) && !empty($_POST['syndmus'])){
		$sql = "SELECT * FROM it_t66 WHERE syndmus ='" . $_POST['syndmus'] . "' ORDER BY it_id DESC";
	}else if(isset($_POST['tegemata'])){
		$sql = "SELECT * FROM it_t66 WHERE t66_status = 0 ORDER BY it_id DESC";	
	}
	else if(isset($_POST['tehtud'])){
		$sql = "SELECT * FROM it_t66 WHERE t66_status = 1 ORDER BY it_id DESC";	
	}else if(!empty($_POST['search'])){
		$sql = "SELECT * FROM it_t66 WHERE kirjeldus LIKE '%" . $_POST['search'] . "%' ORDER BY it_id DESC";
	}
	else{
		$sql = "SELECT * FROM it_t66 ORDER BY it_id DESC";	
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
						value="' . $row['it_id'] . '"/>' . $row['it_id'] . '</td>										
						<td>' . $row['kauplus'] . '</td>
						<td style="word-wrap:break-word" data-target="kirjeldus">' . $row['kirjeldus'] . '</td>
						<td style="word-wrap:break-word" data-target="markused">' . $row['markused'] . '</td>
						<td>' . $row['syndmus'] . '</td>
						<td>' . $row['date'] . '</td>
						<td>' . $row['kasutaja'] . '</td>
						<td><img src="pildid/' . $row['pilt'] . '" class="pildike" loading="lazy" height="50px" width="50"/></td>
					</tr>';
		}
		$table .='</tbody></table>';
		$table .='</form>';
	} else {
		echo "0 vastust";
	}
	echo $table;
?>
