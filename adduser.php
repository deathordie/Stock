<?php
	if(isset($_GET['page']) && $_GET['fname'] != '' && $_GET['sname'] != '' && $_GET['username'] != '' && $_GET['password'] != ''){
		adduser($_GET['fname'],$_GET['sname'],$_GET['username'],$_GET['password']);
		
	}
?>
<script lang="javascript">
    function checkpass(){
        if(document.adduser.fname.value == '' || document.adduser.sname.value == '' || document.adduser.username.value == '' || document.adduser.password.value == '' ){
			alert("กรุณกรอกข้อมูลให้ครบ");
			return false;
		}
		else{
			if(document.adduser.password.value != document.adduser.repassword.value){
            alert("รหัสผ่านไม่ตรงกัน");
            return false;
            }
			return true;
		}
		
        
            
    }
</script>
<!DOCTYPE html>
<html lang="en">

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
<link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
<link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<title>Add User</title>
    <body>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
        <div class="container-fluid" style="text-align:center">
            <form name="adduser" class="form-signin" align="center" method="get" onsubmit="return checkpass()">
            <h2>เพิ่มข้อมูลพนักงาน</h2>
            <table class="table">
                <tr><td><label>ชื่อ</label></td><td><input type="text" name="fname"></td></tr>
                <tr><td><label>นามสกุล</label></td><td><input type="text" name="sname"></td></tr>
                <tr><td><label>ชื่อผู้ใช้งาน</label></td><td><input type="text" name="username"></td></tr>
                <tr><td><label>รหัสผ่าน</label></td><td><input type="password" name="password"></td></tr>
                <tr><td><label>ยืนยันรหัสผ่าน</label></td><td><input type="password" name="repassword"></td></tr>
            </table>
            <input class="btn" type="submit" name="page" value="บันทึกข้อมูลพนักงาน">
            </form>
            
        </div>
    </body>    
    
</html>