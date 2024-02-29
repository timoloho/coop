	<?php include_once('../connection.php');
	session_start();
	
			if(isset($_POST['otsi'])){
				if(!empty($_POST['sort']) && !empty($_POST['t66mees']) && $_POST['filter'] == "kinnitamata"){
					$sql = "SELECT id, kasutaja, kirjeldus, markused, algus_kuupaev, lopp_kuupaev, date, tunnid, kauplus, t66_status FROM tehtud_t66 WHERE kauplus ='" . $_POST['sort'] . "' AND kasutaja ='" . $_POST['t66mees'] . "' AND t66_status = 0 ORDER BY id DESC";
				}else if(!empty($_POST['sort']) && !empty($_POST['t66mees']) && $_POST['filter'] == "kinnitatud"){
					$sql = "SELECT id, kasutaja, kirjeldus, markused, algus_kuupaev, lopp_kuupaev, date, tunnid, kauplus, t66_status FROM tehtud_t66 WHERE kauplus ='" . $_POST['sort'] . "' AND kasutaja ='" . $_POST['t66mees'] . "' AND t66_status = 1 ORDER BY id DESC";
				}else if(!empty($_POST['sort']) && !empty($_POST['t66mees'])){
					$sql = "SELECT id, kasutaja, kirjeldus, markused, algus_kuupaev, lopp_kuupaev, date, tunnid, kauplus, t66_status FROM tehtud_t66 WHERE kauplus ='" . $_POST['sort'] . "' AND kasutaja ='" . $_POST['t66mees'] . "' ORDER BY id DESC";
				}else if(!empty($_POST['sort']) && !empty($_POST['t66mees'])){
					$sql = "SELECT id, kasutaja, kirjeldus, markused, algus_kuupaev, lopp_kuupaev, date, tunnid, kauplus, t66_status FROM tehtud_t66 WHERE kauplus ='" . $_POST['sort'] . "' AND kasutaja ='" . $_POST['t66mees'] . "' AND t66_status ='" . $_POST['filter'] . "' ORDER BY id DESC";
				}else if(!empty($_POST['sort']) && $_POST['filter'] == "kinnitamata"){
					$sql = "SELECT id, kasutaja, kirjeldus, markused, algus_kuupaev, lopp_kuupaev, date, tunnid, kauplus, t66_status FROM tehtud_t66 WHERE kauplus ='" . $_POST['sort'] . "' AND t66_status = 0 ORDER BY id DESC";
				}else if(!empty($_POST['sort']) && $_POST['filter'] == "kinnitatud"){
					$sql = "SELECT id, kasutaja, kirjeldus, markused, algus_kuupaev, lopp_kuupaev, date, tunnid, kauplus, t66_status FROM tehtud_t66 WHERE kauplus ='" . $_POST['sort'] . "' AND t66_status = 1 ORDER BY id DESC";
				}else if(!empty($_POST['sort'])){
					$sql = "SELECT id, kasutaja, kirjeldus, markused, algus_kuupaev, lopp_kuupaev, date, tunnid, kauplus, t66_status FROM tehtud_t66 WHERE kauplus ='" . $_POST['sort'] . "' ORDER BY id DESC";
				}else if(!empty($_POST['t66mees']) && $_POST['filter'] == "kinnitamata"){
					$sql = "SELECT id, kasutaja, kirjeldus, markused, algus_kuupaev, lopp_kuupaev, date, tunnid, kauplus, t66_status FROM tehtud_t66 WHERE kasutaja ='" . $_POST['t66mees'] . "' AND t66_status = 0 ORDER BY id DESC";
				}else if(!empty($_POST['t66mees']) && $_POST['filter'] == "kinnitatud"){
					$sql = "SELECT id, kasutaja, kirjeldus, markused, algus_kuupaev, lopp_kuupaev, date, tunnid, kauplus, t66_status FROM tehtud_t66 WHERE kasutaja ='" . $_POST['t66mees'] . "' AND t66_status = 1 ORDER BY id DESC";
				}else if(!empty($_POST['t66mees'])){
					$sql = "SELECT id, kasutaja, kirjeldus, markused, algus_kuupaev, lopp_kuupaev, date, tunnid, kauplus, t66_status FROM tehtud_t66 WHERE kasutaja ='" . $_POST['t66mees'] . "'ORDER BY id DESC";
				}else if($_POST['filter'] == "kinnitamata"){
					$sql = "SELECT id, kasutaja, kirjeldus, markused, algus_kuupaev, lopp_kuupaev, date, tunnid, kauplus, t66_status FROM tehtud_t66 WHERE t66_status = 0 ORDER BY id DESC";
				}else if($_POST['filter'] == "kinnitatud"){
					$sql = "SELECT id, kasutaja, kirjeldus, markused, algus_kuupaev, lopp_kuupaev, date, tunnid, kauplus, t66_status FROM tehtud_t66 WHERE t66_status = 1 ORDER BY id DESC";
				}else{
				$sql = "SELECT id, kasutaja, kirjeldus, markused, algus_kuupaev, lopp_kuupaev, date, tunnid, kauplus, t66_status FROM tehtud_t66 ORDER BY id DESC";
			}
			}else{
				$sql = "SELECT id, kasutaja, kirjeldus, markused, algus_kuupaev, lopp_kuupaev, date, tunnid, kauplus, t66_status FROM tehtud_t66 ORDER BY id DESC";
			}

	$result = $conn->query($sql);

	if($result->num_rows > 0) {
		$table ='<form method="POST">';
		$table .= '<table class="table table-striped table-bordered table-dark"><thead class="thead-dark">
			<tr>
				<th scope="col">Kinnitus</th>
				<th scope="col">Kasutaja</th>
				<th scope="col">Kirjeldus</th>
				<th scope="col">Märkused</th>
				<th scope="col">Algus</th>
				<th scope="col">Lõpp</th>
				<th scope="col">Sisestusaeg</th>
				<th scope="col">Tunnid</th>
				<th scope="col">Kauplus</th>
			</tr>
		</thead>
	<tbody>';
		
		while($row = $result->fetch_assoc()) {
				$table .= 
					'<tr>
						<td><button type="submit" name="nupp1" class="btn btn-' . ($row['t66_status'] == 1 ? 'success' : 'danger') . ' container"
						value="' . $row['id'] . '"' . ($row['t66_status'] == 1 ? ' disabled' : 'disabled') . '/>' . $row['id'] . '</button></td>						
						<td>' . $row['kasutaja'] . '</td>
						<td style="word-break:break-word">' . $row['kirjeldus'] . '</td>
						<td style="word-break:break-word">' . $row['markused'] . '</td>
						<td>' . $row['algus_kuupaev'] . '</td>
						<td>' . $row['lopp_kuupaev'] . '</td>
						<td>' . $row['date'] . '</td>
						<td>' . $row['tunnid'] . '</td>
						<td>' . $row['kauplus'] . '</td>
					</tr>';
		}
		$table .='</tbody></table>';
		$table .='</form>';
	} else {
		echo "0 vastust";
	}
	

	if(!empty($_POST['nupp1'])){
		
		$kinnitamine = $_POST['nupp1'];
		
			$kinnitus = "UPDATE tehtud_t66 SET t66_status=1 WHERE id=".$_POST['nupp1'];
		
			$run = mysqli_query($conn,$kinnitus) or die(mysqli_error($conn));
			
			if($run){
				redirect("index.php");
				
			}else{
				echo "wtf status update katki";
			}
			
		}
	echo $table;
?>
