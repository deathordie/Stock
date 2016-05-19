<?php
	if(isset($_GET['page']) && $_GET['brandid'] != '' && $_GET['modelname'] != ''){
		addmodel($_GET['brandid'],$_GET['modelname']);
	}
?>
<script lang="javascript">
    function checkname(){
        if(document.addmodel.modelname.value == ''){
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
<title>Add Model</title>
    <body>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
        <div class="container-fluid" style="text-align:center">
            <form name="addmodel" class="form-signin" align="center" method="get" onsubmit="return checkname()">
            <h2>เพิ่มข้อมูลรุ่น</h2>
            <table class="table">
                <tr><td><label>ชื่อยี่ห้อ</label></td><td><select name='brandid'>
														<?php
														$result = modelselectbrand();
														foreach ($result as $data ) {
															echo "<option value=".$data['brand_id'].">".$data['brand_name']."</option>";
                   										}
														?>
													</select></td></tr>
				<tr><td><label>ชื่อรุ่น</label></td><td><input type="text" name="modelname"></td></tr>
            </table>
            <input class="btn" type="submit" name="page" value="บันทึกข้อมูลรุ่น">
            </form>
            
        </div>
    </body>    
    
</html>