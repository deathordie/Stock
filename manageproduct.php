<!DOCTYPE html>
<html lang="en">

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
<link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
<link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<title>Manage Product</title>
    <body>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
        <div class="container-fluid" style="text-align:center">
            <form class="form-signin" align="center" action="index.php">
            <h2>รายชื่อสินค้า</h2>
            <table class="table">
                <tr><td>ลำดับ</td><td>รหัสสินค้า</td><td>ยี่ห้อ</td><td>รุ่น</td><td>จำนวนคงเหลือ</td><td>ประกัน</td><td>หน่วย (ประกัน)</td><td>เครื่องมือ</td></tr>
                <?php
                $result = viewproduct();
				$i =1;
                foreach ($result as $data ) {
                    echo "<tr><td>".$i."</td><td>".$data['prod_id']."</td><td>".$data['brand_name']."</td><td>".$data['model_name']."</td><td>".$data['amount']."</td><td>".$data['warranty']."</td>";
                    if($data['warrantytype'] == 1)
                        echo "<td>วัน</td>";
                    else if($data['warrantytype'] == 2)
                        echo "<td>เดือน</td>";
                    else if($data['warrantytype'] == 3)
                        echo "<td>ปี</td>";
                    else if($data['warrantytype'] == 4)
                        echo "<td>Lifetime</td>";
                    
                    echo "<td><a href='index.php?page=แก้ไขข้อมูลรุ่น&id=".$data['model_id']."   '>แก้ไข</a></td></tr>";
                    $i++;
                }
                
                ?>
            </table>
            <input class="btn" type="submit" name="page" value="เพิ่มข้อมูลสินค้า">
            </form>
            
        </div>
    </body>    
    
</html>