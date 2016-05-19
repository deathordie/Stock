<?php
	if(isset($_GET['page']) && $_GET['categoryname'] != '' ){
		addcategory($_GET['categoryname']);
	}
?>
<script lang="javascript">
    function checkname(){
        if(document.addcategory.categoryname.value == ''){
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
            <form name="addcategory" class="form-signin" align="center" method="get" onsubmit="return checkname()">
            <h2>เพิ่มข้อมูลหมวดหมู่สินค้า</h2>
            <table class="table">
                <tr><td><label>ชื่อหมวดหมู่สินค้า</label></td><td><input type="text" name="categoryname"></td></tr>
            </table>
            <input class="btn" type="submit" name="page" value="บันทึกข้อมูลหมวดหมู่สินค้า">
            </form>
            
        </div>
    </body>    
    
</html>