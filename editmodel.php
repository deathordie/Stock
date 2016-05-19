<?php
    if(isset($_GET['page']) && $_GET['brandid'] != '' && $_GET['modelname'] != '' && $_GET['id'] != ''){
        editmodel($_GET['id'],$_GET['brandid'],$_GET['modelname']);
        echo "OK";
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
<link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
<link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<title>Edit Model</title>
    <body>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
        <div class="container-fluid" style="text-align:center">
            <form name="editmodel" class="form-signin" align="center" method="get" >
            <h2>แก้ไขข้อมูลรุ่น</h2>
            <table class="table">
			<?php
                            
				$result = selecteditmodel($_SESSION['tmp']);
				foreach ($result as $data ) {
					echo "<tr><td><label>รหัสรุ่น</label></td><td><input type='text' name='id' value='".$data['model_id']."' readonly /></td></tr>";
					echo "<tr><td><label>ชื่อยี่ห้อ</label></td><td><select name='brandid'>";
					$result1 = modelselectbrand();
					foreach ($result1 as $data1 ) {
						if($_SESSION['tmp'] == $data1['brand_id'])
							echo "<option value=".$data1['brand_id']." selected>".$data1['brand_name']."</option>";
						else
							echo "<option value=".$data1['brand_id']." >".$data1['brand_name']."</option>";
                   								}
					echo "</select></td></tr>";
                    echo "<tr><td><label>ชื่อรุ่น</label></td><td><input type='text' name='modelname' value='".$data['model_name']."'></td></tr>";
                }
                    unset($_SESSION['tmp']);
			?>
                           
            </table>
            <input class="btn" type="submit" name="page" value="แก้ไขข้อมูลรุ่น">
            </form>
            
        </div>
    </body>    
    
</html>