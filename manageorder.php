<!DOCTYPE html>
<html lang="en">

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
<link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
<link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<title>Manage Brand</title>
    <body>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
        <div class="container-fluid" style="text-align:center">
            <form class="form-signin" align="center" action="index.php">
            <h2>รายการสั่งซื้อสินค้า</h2>
            <table class="table">
                <tr><td>ลำดับ</td><td>รหัสการสั่งซื้อ</td><td>ชื่อผู้จัดจำหน่าย</td><td>ราคาทั้งหมด</td><td>เวลา</td></tr>
                <?php
                $result = view("select * from orders a,supplier b where a.supplier_id = b.supplier_id order by order_id asc");
				$i =1;
                foreach ($result as $data ) {
                    echo "<tr><td>".$i."</td><td><a href='index.php?page=แสดงรายละเอียดการสั่งซื้อ&id=".$data['order_id']." '>".$data['order_id']."</a></td><td>".$data['supplier_name']."</td><td>".$data['totalprice']."</td><td>".$data['datetime']."</td></tr>";
                    $i++;
                }
                
                ?>
            </table>
            <input class="btn" type="submit" name="page" value="สั่งซื้อสินค้า">
            </form>
            
        </div>
    </body>    
    
</html>