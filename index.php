<?php 
session_start();
// Check if the user is already logged in, if yes then redirect him to welcome page
if(!empty($_SESSION['level'])){
    header("location: admin/ladu.php");
    exit;
}

// Include config file
require_once "connection.php";

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Sisesta kasutajanimi";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Sisesta parool";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT kasutaja_id, username, password, status FROM kasutajad WHERE username = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $kasutaja_id, $username, $hashed_password, $status);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["level"] = $status;
                            $_SESSION["kasutaja_id"] = $kasutaja_id;
                            $_SESSION["username"] = $username; 
                            
                            // Redirect user to welcome page
                            header("location: admin/ladu.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "Parool on vale";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "Kasutajanime pole olemas";
                }
            } else{
                echo "Midagi läks valesti, proovi uuesti";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($conn);
}
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body class="mt5 bg-dark text-white"">
    <div class="container">
        <br>
		<h2><b>Sisse logimine</b></h2>
		<br>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            
			<div class="form-group">
                <label><b>Kasutajanimi</b></label>
                <input type="text" name="username" autocomplete="username" class="form-control text-black shadow" style="background-color: silver" value="<?php echo $username; ?>">
                <span class="help-block"><?php if(!empty($username_err)){
				echo '<div class="alert alert-danger">' . $username_err . '</div>'; } ?> </span>
            </div>    
			<br>
            <div class="form-group">
                <label><b>Parool</b></label>
                <input type="password" name="password" autocomplete="current-password" class="form-control shadow" style="background-color: silver">
                <span class="help-block"><?php if(!empty($password_err)){
				echo '<div class="alert alert-danger">' . $password_err . '</div>'; } ?></span>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary" value="Sisene"><b>Sisene</b></button>
            </div>
        </form>
    </div>    
</body>
</html>
