<?php
	if(isset($_GET['page']) && $_GET['warranty'] != '' && $_GET['modelid'] != ''){
		addproduct($_GET['supplierid'],$_GET['modelid'],$_GET['categoryid'],$_GET['warranty'],$_GET['warrantytype'],$_GET['brandid']);
	}
?>
<script lang="javascript">
    function checkname(){
        if(document.addproduct.warranty.value == ''){
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
            <form name="addproduct" class="form-signin" align="center" method="get" onsubmit="return checkname()">
            <h2>เพิ่มข้อมูลสินค้า</h2>
            <table class="table">
                <tr><td><label>ผู้จัดจำหน่าย</label></td><td><select name='supplierid'>
														<?php
														$result = view("select * from supplier order by supplier_id");
														foreach ($result as $data ) {
															echo "<option value=".$data['supplier_id'].">".$data['supplier_name']."</option>";
                   										}
														?>
													</select></td></tr>
                <tr><td><label>ยี่ห้อ</label></td><td><select name='brandid' >
														<?php
														$result = view("select * from brand order by brand_id");
														foreach ($result as $data ) {
                                                                                                                        if($_GET['brandid'] == $data['brand_id'])
                                                                                                                            echo "<option value=".$data['brand_id']." selected>".$data['brand_name']."</option>";
                                                                                                                        else
                                                                                                                            echo "<option value=".$data['brand_id'].">".$data['brand_name']."</option>";
                   										}
														?>
													</select></td></tr>
                <tr><td><label>รุ่น</label></td><td><select name='modelid' >
														<?php
                                                                                                               
                                                                                                                    $result = view("select * from model order by model_id");
                                                                                                                    foreach ($result as $data ) {
															echo "<option value=".$data['model_id'].">".$data['model_name']."</option>";
                   										}
                                                                                                                
														?>
													</select></td></tr>
                <tr><td><label>หมวดหมู่</label></td><td><select name='categoryid' >
														<?php
														$result = view("select * from category order by category_id");
														foreach ($result as $data ) {
                                                                                                                    echo "<option value=".$data['category_id'].">".$data['category_name']."</option>";
                                                                                                                }
														?>
													</select></td></tr>
				<tr><td><label>ระเวลาประกัน</label></td><td><input type="text" name="warranty"></td></tr>
                                <tr><td><label>ประเภทประกัน</label></td><td><select name="warrantytype">
                                            <option value="1">วัน</option>
                                            <option value="2">เดือน</option>
                                            <option value="3">ปี</option>
                                            <option value="4">Lifetime</option>
                                        </select></td></tr>
            </table>
            <input class="btn" type="submit" name="page" value="บันทึกข้อมูลสินค้า">
            </form>
            
        </div>
    </body>    
    
</html>