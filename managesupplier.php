<!DOCTYPE html>
<html lang="en">

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
<link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
<link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<title>Manage Supplier</title>
    <body>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
        <div class="container-fluid" style="text-align:center">
            <form class="form-signin" align="center" action="index.php">
            <h2>รายชื่อผู้จัดจำหน่าย</h2>
            <table class="table">
                <tr><td>ลำดับ</td><td>รหัสผู้จัดจำหน่าย</td><td>ชื่อผู้จัดจำหน่าย</td><td>เครื่องมือ</td></tr>
                <?php
                $result = view("select * from supplier order by supplier_id asc");
				$i =1;
                foreach ($result as $data ) {
                    echo "<tr><td>".$i."</td><td>".$data['supplier_id']."</td><td>".$data['supplier_name']."</td><td><a href='index.php?page=แก้ไขข้อมูลผู้จัดจำหน่าย&id=".$data['supplier_id']."   '>แก้ไข</a></td></tr>";
                    $i++;
                }
                
                ?>
            </table>
            <input class="btn" type="submit" name="page" value="เพิ่มข้อมูลผู้จัดจำหน่าย">
            </form>
            
        </div>
    </body>    
    
</html>