<?php include_once('../../connection.php');

if(isset($_POST['markused'])){
	
	$id = $_POST['id'];
	$markused = $_POST['markused'];
	
	$result = mysqli_query($conn, "UPDATE tehtud_t66 SET markused='$markused' WHERE ID='$id'");
	
	if($result){
		echo 'Andmed uuendatud';
	}
	
}

?>