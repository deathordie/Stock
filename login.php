<?php
include 'function.php';
include 'connect.php';
    if(isset($_GET['login'])){
        $result = login($_GET['username'], $_GET['password']);
		if($result == false)
			echo "<script lang='javascript'>alert('ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง');</script>";
		else		
		header( "location: index.php" );
    }
?>
<script lang="javascript">
    function checkvalue(){
        if(document.login.username.value =="" || document.login.password.value == ""){
            alert("กรุณากรอกข้อมูลให้ครบ");
            return false;
            }
        else
            return true;
    }
</script>
<!DOCTYPE html>
<html lang="en">

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
<link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
<link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<title>Tacinfo Stock System</title>
    <body>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
        <div class="container-fluid" style="text-align:center">
            <form class="form-signin" name="login" align="center" onsubmit="return checkvalue()">
            <h2>Login</h2>
            <label>Username</label><input type="text" name="username"><br>
            <label>Password</label><input type="password" name="password"><br>
            <input class="btn" type="submit" name="login" value="Login">
            </form>
            
        </div>
    </body>    
    
</html>