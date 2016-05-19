<!DOCTYPE html>
<html lang="en">

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
<link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
<link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<title>Order</title>
    <body>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
        <div class="container-fluid" style="text-align:center">
            <form class="form-signin" align="center" action="index.php">
            <h2>สั่งซื้อสินค้า</h2>
            <table class="table">
                <tr><td>ผู้จัดจำหน่าย</td><td><select name="supplierid">
                <?php
                $result = viewsupplier();
				$i =1;
                foreach ($result as $data ) {
                    echo "<option value='".$data['supplier_id']."'>".$data['supplier_name']."</option>";
                    $i++;
                }
                
                ?>
                </select></td></tr>
            </table>
            <input class="btn" type="submit" name="page" value="เพิ่มข้อมูลยี่ห้อ">
            </form>
            
        </div>
    </body>    
    
</html>