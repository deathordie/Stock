<?php
    if(isset($_GET['page']) && $_GET['fname'] != '' && $_GET['sname'] != '' && $_GET['id']){
        edituser($_GET['id'],$_GET['fname'],$_GET['sname']);
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
<link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
<link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<title>Edit User</title>
    <body>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
        <div class="container-fluid" style="text-align:center">
            <form name="adduser" class="form-signin" align="center" method="get" >
            <h2>แก้ไขข้อมูลพนักงาน</h2>
            <table class="table">
			<?php
                            
				$result = select("select * from employee where emp_id = ".$_SESSION['tmp']."");
				foreach ($result as $data ) {
                                    echo "<tr><td><label>รหัสพนักงาน</label></td><td><input type='text' name='id' value='".$data['emp_id']."' readonly /></td></tr>";
                                    echo "<tr><td><label>ชื่อ</label></td><td><input type='text' name='fname' value='".$data['emp_fname']."'></td></tr>";
                                    echo " <tr><td><label>นามสกุล</label></td><td><input type='text' name='sname' value='".$data['emp_lname']."'></td></tr>";
				}
                            
			?>
                           
            </table>
            <input class="btn" type="submit" name="page" value="แก้ไขข้อมูลพนักงาน">
            </form>
            
        </div>
    </body>    
    
</html>