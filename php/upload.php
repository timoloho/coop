<?php
	
	session_start();
	ini_set('memory_limit', '256M');
	$target_dir = 'pildid/';
	$target_file = $target_dir . basename($_FILES["files"]["name"]);
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
		if(!empty($_FILES["files"]["name"])){
		  $check = getimagesize($_FILES["files"]["tmp_name"]);
			  if($check !== false) {
				  compressImage($_FILES['files']['tmp_name'],$target_file,60);

			  } else {
					echo "Valitud fail ei ole pildi formaat";
					}
		} 
	}

	function compressImage($source, $destination, $quality) {

	  $info = getimagesize($source);

	  if ($info['mime'] == 'image/jpeg') {
		$image = imagecreatefromjpeg($source); 
	  }
	  
	  $exif = exif_read_data($_FILES['files']['tmp_name']);
	  
	  if (!empty($exif['Orientation'])) {
		$imageResource = imagecreatefromjpeg($source); // provided that the image is jpeg. Use relevant function otherwise
		switch ($exif['Orientation']) {
        case 3:
        $image = imagerotate($imageResource, 180, 0);
        break;
        case 6:
        $image = imagerotate($imageResource, -90, 0);
        break;
        default:
        $image = $imageResource;
    } 
}
	  
	  
	  imagejpeg($image, $destination);
		
}
	
	


	/**if(isset($_POST['submit'])){ 
    // Include the database configuration file 
     
    // File upload configuration 
    $targetDir = "pildid/"; 
    $allowTypes = array('jpg','png','jpeg','gif'); 
     
    $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = ''; 
    $fileNames = array_filter($_FILES['files']['name']); 
    if(!empty($fileNames)){ 
        foreach($_FILES['files']['name'] as $key=>$val){ 
            // File upload path 
            $fileName = basename($_FILES['files']['name'][$key]); 
            $targetFilePath = $targetDir . $fileName; 
             
            // Check whether file type is valid 
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
            if(in_array($fileType, $allowTypes)){ 
                // Upload file to server 
                if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){ 
                    // Image db insert sql 
                    $insertValuesSQL .= "('".$fileName."'),"; 
                }else{ 
                    $errorUpload .= $_FILES['files']['name'][$key].' | '; 
                } 
            }else{ 
                $errorUploadType .= $_FILES['files']['name'][$key].' | '; 
            } 
        } 
         
        if(!empty($insertValuesSQL)){ 
            $insertValuesSQL = trim($insertValuesSQL, ','); 
            // Insert image file name into database 
            $insert = $conn->query("INSERT INTO it_t66 (pilt) VALUES $insertValuesSQL"); 
        } 
    }
} */
?>

