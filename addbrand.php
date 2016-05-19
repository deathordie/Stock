<?php
	if(isset($_GET['page']) && $_GET['brandname'] != '' ){
		addbrand($_GET['brandname']);
	}
?>
<script lang="javascript">
    function checkname(){
        if(document.addbrand.brandname.value == ''){
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
            <form name="addbrand" class="form-signin" align="center" method="get" onsubmit="return checkname()">
            <h2>เพิ่มข้อมูลยี่ห้อ</h2>
            <table class="table">
                <tr><td><label>ชื่อยี่ห้อ</label></td><td><input type="text" name="brandname"></td></tr>
            </table>
            <input class="btn" type="submit" name="page" value="บันทึกข้อมูลยี่ห้อ">
            </form>
            
        </div>
    </body>    
    
</html>