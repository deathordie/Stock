<?php
    if(isset($_GET['supplierid']))
    $_SESSION['supplierid'] = $_GET['supplierid'];
    else if(isset($_GET['brandid']))
    $_SESSION['brandid'] = $_GET['brandid'];
    else if(isset($_GET['modelid']))
    $_SESSION['modelid'] = $_GET['modelid'];
?>
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
                <tr><td>ผู้จัดจำหน่าย</td><td><select name="supplierid" onchange="window.location='index.php?page=order&supplierid='+this.value ">
                <?php
                $result = viewsupplier();
				$i =1;
                foreach ($result as $data ) {
                    if($_SESSION['supplierid'] == $data['supplier_id'])
                         echo "<option value='".$data['supplier_id']."' selected>".$data['supplier_name']."</option>";
                    else    
                        echo "<option value='".$data['supplier_id']."'>".$data['supplier_name']."</option>";
                    $i++;
                }
                    echo "</select></td></tr>";
                ?>
                <tr><td>ยี่ห้อ</td><td><select name="prodid" onchange="window.location='index.php?page=order&brandid='+this.value ">
                <?php
                $result = selectbrandonorder($_SESSION['supplierid']);
				$i =1;
                foreach ($result as $data ) {
                    echo "<option value='".$data['brand_id']."'>".$data['brand_name']."</option>";
                    $i++;
                }
                    echo "</select></td></tr>";            
                ?>           
                <tr><td>รุ่น</td><td><select name="prodid" onchange="window.location='index.php?page=order&modelid='+this.value ">
                <?php
                $result = viewproduct();
				$i =1;
                foreach ($result as $data ) {
                    echo "<option value='".$data['prod_id']."'>".$data['model_name']."</option>";
                    $i++;
                }
                    echo "</select></td></tr>";            
                ?>
            </table>
            <input class="btn" type="submit" name="page" value="เพิ่มข้อมูลยี่ห้อ">
            </form>
            
        </div>
    </body>    
    
</html>