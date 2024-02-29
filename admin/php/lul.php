session_start();

if(isset($_POST['ladu_insert'])){

        $username = stripslashes($_SESSION['username']) ;
        $kirjeldus = $_POST['kirjeldus'] ;
        $markused = $_POST['markused'] ;
        $kauplus = $_POST['kauplus'] ;
        $syndmus = $_POST['syndmus'] ;
        $kinnitus = $_POST['status'] ;
        $pilt = $_FILES["files"]["name"] ;
            
    if(!empty($_POST['kauplus'] && $_POST['syndmus'])){

        if(!empty($_POST['kirjeldus'] && $_POST['markused'])){
        
        
            $sql = "INSERT INTO it_t66 (kasutaja, kirjeldus, markused, kauplus, syndmus, pilt, pilt_id) VALUES ('$username', '$kirjeldus', '$markused', '$kauplus', '$syndmus', '$pilt', '$pilt')";
        
            $run = mysqli_query($conn,$sql) or die(mysqli_error($conn));
                            
            if($run){
                $success = "Andmed sisestatud" ;	
            }else {
                $error = "Midagi läks valesti" ;
                }
    
        } else if(!empty($_POST['kirjeldus'])){

            $sql = "INSERT INTO it_t66 (kasutaja, kirjeldus, kauplus, syndmus, pilt, pilt_id) VALUES ('$username', '$kirjeldus', '$kauplus', '$syndmus', '$pilt', '$pilt')";
        
            $run = mysqli_query($conn,$sql) or die(mysqli_error($conn));
            
            if($run){
                $success = "Andmed sisestatud" ;	
            }else {
                $error = "Midagi läks valesti" ;
                }
        } else if(!empty($_POST['markused'])){

            $sql = "INSERT INTO it_t66 (kasutaja, markused, kauplus, syndmus, pilt, pilt_id) VALUES ('$username', '$markused', '$kauplus', '$syndmus', '$pilt', '$pilt')";
        
            $run = mysqli_query($conn,$sql) or die(mysqli_error($conn));
            
            if($run){
                $success = "Andmed sisestatud" ;	
            }else {
                $error = "Midagi läks valesti" ;
                }
        }else {
            $sql = "INSERT INTO it_t66 (kasutaja, kauplus, syndmus, pilt, pilt_id) VALUES ('$username', '$kauplus', '$syndmus', '$pilt', '$pilt')";
        
            $run = mysqli_query($conn,$sql) or die(mysqli_error($conn));
            
            if($run){
                $success = "Andmed sisestatud" ;	
            }else {
                $error = "Midagi läks valesti" ;
                }
        }
    }else{
        $error = "Kauplus ja/või sündmus pole valitud!";
    }
}
