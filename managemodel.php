<!DOCTYPE html>
<html lang="en">

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
<link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
<link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<title>Manage Model</title>
    <body>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
        <div class="container-fluid" style="text-align:center">
            <form class="form-signin" align="center" action="index.php">
            <h2>รายชื่อรุ่น</h2>
            <table class="table">
                <tr><td>ลำดับ</td><td>รหัสรุ่น</td><td>ชื่อยี่ห้อ</td><td>ชื่อรุ่น</td><td>เครื่องมือ</td></tr>
                <?php
                $result = viewmodel();
				$i =1;
                foreach ($result as $data ) {
                    echo "<tr><td>".$i."</td><td>".$data['model_id']."</td><td>".$data['brand_name']."</td><td>".$data['model_name']."</td><td><a href='index.php?page=แก้ไขข้อมูลรุ่น&id=".$data['model_id']."   '>แก้ไข</a></td></tr>";
                    $i++;
                }
                
                ?>
            </table>
            <input class="btn" type="submit" name="page" value="เพิ่มข้อมูลรุ่น">
            </form>
            
        </div>
    </body>    
    
</html>