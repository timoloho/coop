<?php include_once('../../connection.php');

$post = empty($_POST) ? json_decode(file_get_contents('php://input'), true) : $_POST;
$seadeID = filter_var($post['seadeID'], FILTER_SANITIZE_SPECIAL_CHARS);
if(empty($seadeID)) {
    exit(json_encode([
        'status' => 'error',
        'msg' => 'Seade ID on valimata!'
    ]));
}

$sql = "SELECT id, mudel FROM mudel WHERE seade = '" . $seadeID . "'";
$data = $conn->query($sql);

$items = [];
if($data->num_rows > 0) 
while($row = $data->fetch_assoc()){
    $items[] = ['name' => $row['mudel'], 'ID' => $row['id']];
}   

exit(json_encode([
    'status' => 'success', 
    'valikud' => $items
]));
?>
