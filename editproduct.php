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
<title>Edit Product</title>
    <body>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
        <div class="container-fluid" style="text-align:center">
            <form name="editmodel" class="form-signin" align="center" method="get" >
            <h2>แก้ไขข้อมูลสินค้า</h2>
            <table class="table">
			<?php
                            
				$result = selecteditproduct($_SESSION['tmp']);
				foreach ($result as $data ) {
					echo "<tr><td><label>รหัสสินค้า</label></td><td><input type='text' name='id' value='".$data['prod_id']."' readonly /></td></tr>";
					echo "<tr><td><label>ผู้จัดจำหน่าย</label></td><td><select name='supplierid'>";
					$result1 = viewsupplier();
					foreach ($result1 as $data1 ) {
						if($data['supplier_id'] == $data1['supplier_id'])
							echo "<option value=".$data1['supplier_id']." selected>".$data1['supplier_name']."</option>";
						else
							echo "<option value=".$data1['supplier_id']." >".$data1['supplier_name']."</option>";
                   								}
					echo "</select></td></tr>";
                    echo "<tr><td><label>ยี่ห้อ</label></td><td><select name='brandid'>";
                                        $result1 = viewbrand();
					foreach ($result1 as $data1 ) {
						if($data['brand_id'] == $data1['brand_id'])
							echo "<option value=".$data1['brand_id']." selected>".$data1['brand_name']."</option>";
						else
							echo "<option value=".$data1['brand_id']." >".$data1['brand_name']."</option>";
                   								}
                                        echo "</select></td></tr>"; 
                                        echo "<tr><td><label>รุ่น</label></td><td><select name='modelid'>";
                                        $result1 = viewmodel();
					foreach ($result1 as $data1 ) {
						if($data['model_id'] == $data1['model_id'])
							echo "<option value=".$data1['model_id']." selected>".$data1['model_name']."</option>";
						else
							echo "<option value=".$data1['model_id']." >".$data1['model_name']."</option>";
                   								}
                                        echo "</select></td></tr>";
                                        echo "<tr><td><label>ระยะเวลาประกัน</label></td><td><input type ='text' name='warranty' value='".$data['warranty']."'></td></tr>";
                                        echo "<tr><td><label>ประเภทประกัน</label></td><td><select name='warrantytype'>";
                                            if($data['model_id'] == 1)
                                                echo "<option value=1 selected>วัน</option>";
                                            else
                                            echo "<option value=1>วัน</option>";
                                            if($data['model_id'] == 2)
                                                echo "<option value=2 selected>เดือน</option>";
                                            else
                                                echo "<option value=2>เดือน</option>";
                                            if($data['model_id'] == 3)
                                                echo "<option value=3 selected>ปี</option>";
                                            else
                                                echo "<option value=3 selected>ปี</option>";
                                            if($data['model_id'] == 4)
                                                echo "<option value=4 selected>Lufetime</option>";
                                            else
                                                 echo "<option value=4 >Lifetime</option>";
                                        echo "</td></tr>";
					
                }                             
                
                    unset($_SESSION['tmp']);
			?>
                           
            </table>
            <input class="btn" type="submit" name="page" value="แก้ไขข้อมูลรุ่น">
            </form>
            
        </div>
    </body>    
    
</html>