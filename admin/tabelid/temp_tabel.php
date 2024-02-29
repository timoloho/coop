<?php
	
		$sql = "SELECT * FROM temp ORDER BY id DESC";	
	
	$result = $conn->query($sql);

	if($result->num_rows > 0) {
		$table ='<form method="POST">';
		$table .= '<table class="table table-striped table-bordered table-dark"><thead class="thead-dark">
			<tr>
				<th scope="col">Lugemise aeg</th>
				<th scope="col">Seade</th>
				<th scope="col">Temperatuur</th>
				<th scope="col">Niiskus</th>
			</tr>
		</thead>
	<tbody>';
		
		while($row = $result->fetch_assoc()) {
				$table .= 
					'<tr id="' . $row['id'] . '">
						<td>' . $row['reading_time'] . '</td>
						<td>' . $row['device'] . '</td>
						<td>' . $row['temperature'] . 'ºC</td>
						<td>' . $row['humidity'] . '%</td>
					</tr>';
		}
		$table .='</tbody></table>';
		$table .='</form>';
		echo $table;
	} else {
		echo "0 vastust";
	}
?>
<html>
    
<style>
    td {
  font-size: .900rem;
}
    
    </style>
</html>