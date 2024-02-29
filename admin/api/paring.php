<?php

include_once('../connection.php');

/*$sql2 = "SELECT * FROM mudel";
$results = mysqli_query($conn, $sql2);
$json_array = array();

while($data = mysqli_fetch_assoc($results))
{
    $json_array[] = $data;
}
echo json_encode($json_array)**/

$post = empty($_POST) ? json_decode(file_get_contents('php://input'), true) : $_POST;
$seadeID = filter_var($post['seadeID'], FILTER_SANITIZE_SPECIAL_CHARS);
if(empty($seadeID)) {
    exit(json_encode([
        'status' => 'error', // Või 'status' => 0,
        'msg' => 'Seade ID on valimata!'
    ]));
}

// Sinu mingi andmebaasi loogika...
// See läheb siis $dbArray asemel
$sql = "SELECT id, mudel FROM mudel WHERE seade = '" . $seadeID . "'";
$data = $conn->query($sql);

$items = [];
if($data->num_rows > 0) 
while($row = $data->fetch_assoc()){
    $items[] = ['name' => $row['mudel'], 'ID' => $row['id']];
}   
// Näide kuidas andmed peaksid nagu olema
/* $data = [];
$data[] = ['ID' => 3, 'name' => 'Arduino seade'];
$data[] = ['ID' => 57, 'name' => 'UIPO'];
$data[] = ['ID' => 7, 'name' => '3D printer']; **/

exit(json_encode([
    'status' => 'success', // Või 'status' => 1,
    'valikud' => $items
]));
?>
