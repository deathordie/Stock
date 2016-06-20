<?php
    if(isset($_GET['id']))
        delwithdrawnprod($_GET['id']);
    else if($_GET['page'] == 'ยืนยันการเบิกสินค้า')
        withdraw();
?>
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
            <h2>รายการสินค้าที่ต้องการเบิก</h2>
            <table class="table">
                <tr><td>ลำดับ</td><td>ยี่ห้อ</td><td>รุ่น</td><td>จำนวน</td><td>เครื่องมือ</td></tr>
                <?php
                    viewwithdrawn();
                
                
                ?>
            </table>
            <input class="btn" type="submit" name="page" value="ย้อนกลับ"> <input class="btn" type="submit" name="page" value="ยืนยันการเบิกสินค้า">
            </form>
            
        </div>
    </body>    
    
</html>