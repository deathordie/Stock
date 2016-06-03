<?php
    if($_GET['page'] == "แก้ไขรายละเอียดสินค้าที่สั่งซื้อ"){
        editchangeorder($_GET['id'], $_GET['amount'], $_GET['price']);
    }
    
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
            <h2>รายละเอียดสินค้าที่สั่งซื้อ</h2>
            <table class="table">
                <?php
                    $result = editorder($_GET['id']);
                    $result1 = view("SELECT a.prod_id ,b.brand_name,c.model_name from product a,brand b,model c where a.prod_id = '".$_SESSION['orderprodid'][$result]."' and a.brand_id = b.brand_id and a.model_id = c.model_id");
                    foreach ($result1 as $data ) {
                         echo "<tr><td>รหัสสินค้า</td><td><input type='text' name='id' value='".$data['prod_id']."' readonly></td></tr>";
                         echo "<tr><td>ชื่อสินค้า</td><td><input type='text' name='name' value='".$data['brand_name'].' '.$data['model_name']."' readonly></td></tr>";
                    }
                       
                        echo "<tr><td>จำนวน</td><td><input type='text' name='amount' value='".$_SESSION['orderamount'][$result]."'></td></tr>";
                        echo "<tr><td>ราคา</td><td><input type='text' name='price' value='".$_SESSION['orderprice'][$result]."'></td></tr>";
                    
                    
                ?>
                
            </table>
            <input class="btn" type="submit" name="page" value="แก้ไขรายละเอียดสินค้าที่สั่งซื้อ"> 
            </form>
            
        </div>
    </body>    
    
</html>