<?php
session_start();

$table = '';
$sql = "SELECT * FROM it_t66 WHERE kirjeldus LIKE '%" . $_POST['search'] . "%'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0) {
		$table .= '<table class="table table-striped table-bordered table-dark"><thead class="thead-dark">
			<tr>
				<th scope="col">Kinnitus</th>
				<th scope="col">Kauplus</th>
				<th scope="col">Kirjeldus</th>
				<th scope="col">Märkused</th>
				<th scope="col">Sündmus</th>
				<th scope="col">Sisestusaeg</th>
				<th scope="col">Kasutaja</th>

			</tr>
		</thead>
	<tbody>';
		
		while($row = mysqli_fetch_array($result)) {
				$table .= 
					'<tr id="' . $row['it_id'] . '">
						<td><button type="button" data-target="kinnitus" data-role="update" data-id="' . $row['it_id'] . '" class="btn btn-' . ($row['t66_status'] == 1 ? 'success' : 'danger') . ' container"
						value="' . $row['it_id'] . '"/>' . $row['it_id'] . '</td>										
						<td>' . $row['kauplus'] . '</td>
						<td style="word-wrap:break-word" data-target="kirjeldus">' . $row['kirjeldus'] . '</td>
						<td style="word-wrap:break-word" data-target="markused">' . $row['markused'] . '</td>
						<td>' . $row['syndmus'] . '</td>
						<td>' . $row['date'] . '</td>
						<td>' . $row['kasutaja'] . '</td>
					</tr>';
		}
		$table .='</tbody></table>';
			echo $table;
	} else {
		echo "0 vastust";
	}

?>