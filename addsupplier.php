<?php
	if(isset($_GET['page']) && $_GET['suppliername'] != '' ){
		addsupplier($_GET['suppliername']);
	}
?>
<script lang="javascript">
    function checkname(){
        if(document.addsupplier.suppliername.value == ''){
			alert("กรุณกรอกข้อมูลให้ครบ");
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
<title>Add Brand</title>
    <body>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
        <div class="container-fluid" style="text-align:center">
            <form name="addsupplier" class="form-signin" align="center" method="get" onsubmit="return checkname()">
            <h2>เพิ่มข้อมูลผู้จัดจำหน่าย</h2>
            <table class="table">
                <tr><td><label>ชื่อผู้จัดจำหน่าย</label></td><td><input type="text" name="suppliername"></td></tr>
            </table>
            <input class="btn" type="submit" name="page" value="บันทึกข้อมูลผู้จัดจำหน่าย">
            </form>
            
        </div>
    </body>    
    
</html>