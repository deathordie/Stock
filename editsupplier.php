<?php
    if(isset($_GET['page']) && $_GET['suppliername'] != ''){
        editsupplier($_GET['id'],$_GET['suppliername']);
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
            <form name="editbrand" class="form-signin" align="center" method="get" >
            <h2>แก้ไขข้อมูลผู้จัดจำหน่าย</h2>
            <table class="table">
			<?php
                            
				$result = selecteditsupplier($_SESSION['tmp']);
				foreach ($result as $data ) {
                                    echo "<tr><td><label>รหัสผู้จัดจำหน่าย</label></td><td><input type='text' name='id' value='".$data['supplier_id']."' readonly /></td></tr>";
                                    echo "<tr><td><label>ชื่อผู้จัดจำหน่าย</label></td><td><input type='text' name='suppliername' value='".$data['supplier_name']."'></td></tr>";
                }
                            
			?>
                           
            </table>
            <input class="btn" type="submit" name="page" value="แก้ไขข้อมูลผู้จัดจำหน่าย">
            </form>
            
        </div>
    </body>    
    
</html>