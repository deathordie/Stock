<?php
    if(isset($_GET['page']) && $_GET['warranty'] != '' && $_GET['modelid'] != '' && $_GET['id'] != ''){
        editproduct($_GET['id'],$_GET['supplierid'],$_GET['modelid'],$_GET['categoryid'],$_GET['warranty'],$_GET['warrantytype'],$_GET['pointorder'],$_GET['brandid']);
        
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
                            
				$result = select("select * from product a,brand b, model c ,supplier d where a.model_id = c.model_id and a.brand_id = b.brand_id and a.supplier_id = d.supplier_id and a.prod_id = ".$_GET['id']." order by a.prod_id");
				foreach ($result as $data ) {
					echo "<tr><td><label>รหัสสินค้า</label></td><td><input type='text' name='id' value='".$data['prod_id']."' readonly /></td></tr>";
					echo "<tr><td><label>ผู้จัดจำหน่าย</label></td><td><select name='supplierid'>";
					$result1 = view("select * from supplier order by supplier_id asc");
					foreach ($result1 as $data1 ) {
						if($data['supplier_id'] == $data1['supplier_id'])
							echo "<option value=".$data1['supplier_id']." selected>".$data1['supplier_name']."</option>";
						else
							echo "<option value=".$data1['supplier_id']." >".$data1['supplier_name']."</option>";
                   								}
					echo "</select></td></tr>";
                    echo "<tr><td><label>ยี่ห้อ</label></td><td><select name='brandid' >";
                                        $result1 = view("select * from brand order by brand_id asc");
					foreach ($result1 as $data1 ) {
						if($data['brand_id'] == $data1['brand_id'])
							echo "<option value=".$data1['brand_id']." selected>".$data1['brand_name']."</option>";
						else
							echo "<option value=".$data1['brand_id']." >".$data1['brand_name']."</option>";
                   								}
                                        echo "</select></td></tr>"; 
                                        echo "<tr><td><label>รุ่น</label></td><td><select name='modelid'>";
                                        if(isset($_GET['brandid'])){
                                            $result1 = viewmodelonproduct($_GET['brandid']);
                                            foreach ($result1 as $data1 ){
						echo "<option value=".$data1['model_id']." >".$data1['model_name']."</option>";
                                            
                                                
                                            }	
                                        echo "</select></td></tr>";
                                        }
                                        else{
                                        $result1 = view("select * from model order by model_id asc");
					foreach ($result1 as $data1 ) {
						if($data['model_id'] == $data1['model_id'])
							echo "<option value=".$data1['model_id']." selected>".$data1['model_name']."</option>";
						else
							echo "<option value=".$data1['model_id']." >".$data1['model_name']."</option>";
                   								}
                                        }
                                        echo "</select></td></tr>";
                                        echo "<tr><td><label>หมวดหมู่</label></td><td><select name='categoryid'>";
                                            $result1 = view("select * from category order by category_id asc");
                                            foreach ($result1 as $data1 ){
						if($data['category_id'] == $data1['category_id'])
							echo "<option value=".$data1['category_id']." selected>".$data1['category_name']."</option>";
						else
							echo "<option value=".$data1['category_id']." >".$data1['category_name']."</option>";
                                            
                                                
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
                                                echo "<option value=4 selected>Lifetime</option>";
                                            else
                                                 echo "<option value=4 >Lifetime</option>";
                                        echo "</td></tr>";
					echo "<tr><td><label>จุดสั่งซื้อ</label></td><td><input type ='text' name='pointorder' value='".$data['pointorder']."'></td></tr>";
                }                             
                
                    unset($_SESSION['tmp']);
			?>
                           
            </table>
            <input class="btn" type="submit" name="page" value="แก้ไขข้อมูลสินค้า">
            </form>
            
        </div>
    </body>    
    
</html>