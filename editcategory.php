<?php
    if(isset($_GET['page']) && $_GET['categoryname'] != ''){
        editcategory($_GET['id'],$_GET['categoryname']);
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
            <h2>แก้ไขข้อมูลหมวดหมู่สินค้า</h2>
            <table class="table">
			<?php
                            
				$result = select("select * from category where category_id = ".$strid."");
				foreach ($result as $data ) {
                                    echo "<tr><td><label>รหัสหมดหมู่สินค้า</label></td><td><input type='text' name='id' value='".$data['category_id']."' readonly /></td></tr>";
                                    echo "<tr><td><label>ชื่อหมวดหมู่สินค้า</label></td><td><input type='text' name='categoryname' value='".$data['category_name']."'></td></tr>";
                }
                            
			?>
                           
            </table>
            <input class="btn" type="submit" name="page" value="แก้ไขข้อมูลหมวดหมู่สินค้า">
            </form>
            
        </div>
    </body>    
    
</html>