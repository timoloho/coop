<?php
session_start();

$table = '';
$sql = "SELECT * FROM ladu WHERE kirjeldus LIKE '%" . $_POST['search'] . "%'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0) {
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
echo "number of rows: " . $mysqli_query->num_rows;
while($row = $result->fetch_assoc()){
        $table .= 
            '<tr id="' . $row['id'] . '">
                <td><button type="button" data-target="kinnita" data-role="update" data-id="' . $row['id'] . '" class="btn btn-' . ($row['status'] == 1 ? 'success' : 'danger') . ' container"
                value="' . $row['id'] . '"/>' . $row['id'] . '</td>										
                <td>' . $row['seade'] . '</td>
                <td>' . $row['mudel'] . '</td>
                <td data-target="sn">' . $row['sn'] . '</td>
                <td class="word-wrap:break-word" data-target="kirjeldus">' . $row['kirjeldus'] . '</td>
                <td>' . $row['kauplus'] . '</td>
                <td>' . date("d.m.Y H:i", strtotime($row['kuupaev'])) . '</td>
                <td>' . $row['riiul'] . '</td>
                <td><img src="pildid/' . $row['pilt'] . '" class="pildike" loading="lazy" data-target="pilt" height="50px" width="70"/></td>
            </tr>';
}

$table .='</tbody></table>';
echo $table;
	} else {
		echo "0 vastust";
	}

?>