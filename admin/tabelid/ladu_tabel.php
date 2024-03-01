<?php

$seade_sort=$_POST['seade_sort'];
$asukoht_sort=$_POST['asukoht_sort'];
$status_sort=$_POST['status_sort'];

if(isset($_POST['otsi'])){
	if(!empty($seade_sort) || !empty($asukoht_sort) || isset($status_sort)){
		$sql = "SELECT id, seade, mudel, sn, kirjeldus, kauplus, kuupaev, riiul, status, pilt FROM ladu WHERE (IF('$seade_sort' = '', 1, seade = '$seade_sort')) AND (IF('$asukoht_sort' = '', 1, kauplus = '$asukoht_sort')) AND (IF('$status_sort' = '', 1, status = '$status_sort')) ORDER BY id DESC";
	}
}else{

	$sql = "SELECT id, seade, mudel, sn, kirjeldus, kauplus, kuupaev, riiul, status, pilt FROM ladu ORDER BY id DESC";

}

	$result = $conn->query($sql);

	if($result->num_rows > 0)
		$table ='<form method="POST">';
		$table .= '<table class="table table-striped table-bordered table-dark"><thead class="thead-dark">
			<tr>
				<th scope="col">Olek</th>
				<th scope="col">Seade</th>
				<th scope="col">Mudel</th>
				<th scope="col">S/N</th>
				<th scope="col">Kirjeldus</th>
				<th scope="col">Kauplus</th>
				<th scope="col">Kuupäev</th>
				<th scope="col">Riiul</th>
                <th scope="col">Pilt</th>
			</tr>
		</thead>
	<tbody>';
		while($row = $result->fetch_assoc()){
				$table .= 
					'<tr id="' . $row['id'] . '">
						<td><button type="button" data-target="kinnita" data-target=status data-role="update" data-id="' . $row['id'] . '" class="btn btn-' . ($row['status'] == 2 ? 'info' : ($row['status'] == 3 ? 'warning' : ($row['status'] == 4 ? 'danger' : ($row['status']  == 5 ? 'secondary' : 'success')))) . ' container"
						value="' . $row['id'] . '"/>' . $row['id'] . '</td>										
						<td data-target="seade">' . $row['seade'] . '</td>
						<td data-target="mudel">' . $row['mudel'] . '</td>
                        <td data-target="sn">' . $row['sn'] . '</td>
						<td class="word-wrap:break-word" data-target="kirjeldus">' . $row['kirjeldus'] . '</td>
                        <td data-target="kauplus">' . $row['kauplus'] . '</td>
						<td>' . date("d.m.Y H:i", strtotime($row['kuupaev'])) . '</td>
						<td data-target="riiul">' . $row['riiul'] . '</td>
						<td hidden data-target="status">' . $row['status'] . '</td>
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