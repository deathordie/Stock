<?php
    if($_GET['page'] == 'ลบข้อมูลสั่งซื้อสินค้า')
        delorderprod($_GET['id']);
    else if($_GET['page'] == 'บันทึกข้อมูลการสั่งซื้อ')
        addorder($_SESSION['suppileridno'], $_SESSION['totalprice'], $_SESSION['orderprodid'], $_SESSION['orderamount'], $_SESSION['orderprice']);
        
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
            <h2>รายการสินค้าที่สั่งซื้อ</h2>
            <table class="table">
                <tr><td>ลำดับ</td><td>ผู้จัดจำหน่าย</td><td>ยี่ห้อ</td><td>รุ่น</td><td>จำนวน</td><td>ราคา</td><td colspan="2">เครื่องมือ</td>
                <?php
                    $num =1 ;
                    for($i=1;$i<=$_SESSION['intline'];$i++){
                        if($_SESSION['orderprodid'][$i] != ''){
                        $result = select("select supplier_name, brand_name, model_name from supplier a, brand b, model c , product d where d.prod_id = ".$_SESSION['orderprodid'][$i]." and d.supplier_id = a.supplier_id and d.brand_id = b.brand_id and d.model_id = c.model_id ");
                         foreach ($result as $data ) {
                             echo "<tr><td>".$num."</td><td>".$data['supplier_name']."</td><td>".$data['brand_name']."</td><td>".$data['model_name']."</td><td>".$_SESSION['orderamount'][$i]."</td><td>".$_SESSION['orderprice'][$i]."</td>"
                                     . "<td><a href='index.php?page=แก้ไขข้อมูลสั่งซื้อ&id=".$_SESSION['orderprodid'][$i]."'>แก่ไข</a>".' '."<a href='index.php?page=ลบข้อมูลสั่งซื้อสินค้า&id=".$_SESSION['orderprodid'][$i]."' >ลบ</a></td></tr>";
                         
                         }
                         $num++;
                        }  
                    }
                    echo "<tr><td colspan=3>ราคารวม</td><td colspan=4>".$_SESSION['totalprice']."</td></tr>";
                ?>
            </table>
            <input class="btn" type="submit" name="page" value="เลือกสินค้า"> <input class="btn" type="submit" name="page" value="บันทึกข้อมูลการสั่งซื้อ">
            </form>
            
        </div>
    </body>    
    
</html>