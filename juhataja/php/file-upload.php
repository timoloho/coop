<?php
session_start();
include_once('../connection.php');
	if(isset($_POST['submit'])){
		
		$extension=array('jpeg', 'jpg', 'png', 'gif');
		foreach($_FILES['image']['tmp_name'] as $key => $value){
			$filename=$_FILES['image']['name'][$key];
			$filename_tmp=$_FILES['image']['tmp_name'][$key];

			$ext=pathinfo($filename,PATHINFO_EXTENSION);
			
			$finalimg='';
			if(in_array($ext,$extension)){
				if(!file_exists('../admin/pildid/'.$filename)){
					move_uploaded_file($filename_tmp, '../admin/pildid/'.$filename);
					$finalimg=$filename;
				}else{
					$filename=str_replace('.','-',basename($filename,$ext));
					$newfilename=$filename.time().".".$ext;
					move_uploaded_file($filename_tmp, '../admin/pildid/'.$newfilename);
					$finalimg=$newfilename;
				}
				$creattime=date('Y-m-d h:i:s');
				$insertqry="INSERT INTO pildid (pildi_nimi, pildi_ts, pilt_id) VALUES ('$finalimg','$creattime','$pilt_id')";
				mysqli_query($conn,$insertqry);
			}else{
				//display error
			}
		}
	}
?>

