<?php

if(isset($_POST['ladu_insert'])) {
    $sn = $_POST['serialnumber'];
    $seade = $_POST['seade'];
    $uus_seade = $_POST['uus_seade'];
    $mudel = $_POST['mudel'];
    $uus_mudel = $_POST['uus_mudel'];
    $kirjeldus = $_POST['kirjeldus'];
    $staatus = $_POST['staatus'];
    $riiul = $_POST['riiul'];
    $kauplus = $_POST['kauplus'];
    $pilt = $_FILES['files']['name'];
    $kuupaev = $_POST['kuupaev'];

    if(!empty($sn)){
        if(!empty($seade) && !empty($mudel) && empty($uus_mudel) && empty($uus_seade)){
            $conn->query("INSERT INTO ladu (seade, mudel, sn, kirjeldus, kauplus, kuupaev_sisse, riiul, pilt, status) VALUES ('{$seade}', '{$mudel}', '{$sn}', '{$kirjeldus}', '{$kauplus}', '{$kuupaev}', '{$riiul}', '{$pilt}', '{$staatus}')");
            if($conn->error){
                $error = "Andmebaasi ühenduse viga";
            }else{
                $success = "Andmed sisestatud!";
            }
        }
    
        elseif(!empty($uus_mudel) && !empty($seade) && empty($uus_seade)){
            $conn->query("INSERT INTO ladu (seade, mudel, sn, kirjeldus, kauplus, kuupaev_sisse, riiul, pilt, status) VALUES ('{$seade}', '{$uus_mudel}', '{$sn}', '{$kirjeldus}', '{$kauplus}', '{$kuupaev}', '{$riiul}', '{$pilt}', '{$staatus}')");
            $conn->query("INSERT INTO mudel (mudel, seade) VALUES ('{$uus_mudel}', '{$seade}')");
            if($conn->error){
                $error = "Andmebaasi ühenduse viga";
            }else{
                $success = "Andmed sisestatud!";
            }   
        }elseif(!empty($uus_mudel) && !empty($uus_seade)){
            $conn->query("INSERT INTO ladu (seade, mudel, sn, kirjeldus, kauplus, kuupaev_sisse, riiul, pilt, status) VALUES ('{$uus_seade}', '{$uus_mudel}', '{$sn}', '{$kirjeldus}', '{$kauplus}', '{$kuupaev}', '{$riiul}', '{$pilt}', '{$staatus}')");
            $conn->query("INSERT INTO seadmed (nimetus) VALUES ('{$uus_seade}')");
            $conn->query("INSERT INTO mudel (mudel, seade) VALUES ('{$uus_mudel}', '{$uus_seade}')");
            if($conn->error){
                $error = "Andmebaasi ühenduse viga";
            }else{
                $success = "Andmed sisestatud!";
            }   
        }
    }elseif(!empty($uus_seade) && !empty($uus_mudel)){
        $conn->query("INSERT INTO mudel (mudel, seade) VALUES ('{$uus_mudel}', '{$uus_seade}')");
        $conn->query("INSERT INTO seadmed (nimetus) VALUES ('{$uus_seade}')");
        if($conn->error){
            $error = "Andmebaasi ühenduse viga";
        }else{
            $success = "Andmed sisestatud!";
        }  

    }elseif(!empty($uus_seade) && empty($uus_mudel)){
        $conn->query("INSERT INTO seadmed (nimetus) VALUES ('{$uus_seade}')");
        if($conn->error){
            $error = "Andmebaasi ühenduse viga";
        }else{
            $success = "Andmed sisestatud!";
        }  
    }elseif(empty($uus_seade) && !empty($uus_mudel) && !empty($seade)){
        $conn->query("INSERT INTO mudel (mudel, seade) VALUES ('{$uus_mudel}', '{$seade}')");
        if($conn->error){
            $error = "Andmebaasi ühenduse viga";
        }else{
            $success = "Andmed sisestatud!";
        }  
    }else{
        $error = "Pole täidetud vajalikud väljad";
    } 
}
?>
