<?php include_once("../../connection.php");
session_start();

$kauplus=$_POST['sort'];
$syndmus=$_POST['syndmus'];
$filter=$_POST['tehteg'];

if(isset($_POST['otsi'])){
	if(!empty($kauplus) || !empty($syndmus) || isset($filter)){
		$sql = "SELECT * FROM it_t66 WHERE (IF('$kauplus' = '', 1, kauplus = '$kauplus')) AND (IF('$syndmus' = '', 1, syndmus = '$syndmus')) AND (IF('$filter' = '', 1, t66_status = '$filter')) ORDER BY it_id DESC";
	}
}else {
	$sql = "SELECT * FROM it_t66 ORDER BY it_id DESC";

}
	$result = $conn->query($sql);
	
	if($result->num_rows > 0) 
	print_r($_POST);
		$table ='<form method="POST">';
		$table .= '<table class="table table-striped table-bordered table-dark"><thead class="thead-dark">
			<tr>
				<th scope="col">Kinnitus</th>
				<th scope="col">Kauplus</th>
				<th scope="col">Sündmus</th>
				<th scope="col">Kirjeldus</th>
				<th scope="col">Märkused</th>
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
						<td>' . $row['syndmus'] . '</td>
						<td class="word-wrap:break-word" data-target="kirjeldus">' . $row['kirjeldus'] . '</td>
						<td style="word-wrap:break-word" data-target="markused">' . $row['markused'] . '</td>
						<td>' . date("d.m.Y H:i", strtotime($row['date'])) . '</td>
						<td>' . $row['kasutaja'] . '</td>
						<td><img src="pildid/' . $row['pilt'] . '" class="pildike" loading="lazy" data-target="pilt" height="50px" width="70"/></td>
					</tr>';
		}
		$table .='</tbody></table>';
		$table .='</form>';
	echo $table;
?>
<html>
    
<style>
    td {
  font-size: .900rem;
}
    
    </style>
</html>