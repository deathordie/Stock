<?php
   if(isset($_GET['id']))
       selectitem($_GET['id']);
   if(isset($_GET['search']))
       echo "OK";
?>
<script>
    function checkdate(){
        if(document.report.type.value == 2){
            if(document.report.datebegin.value == '' || document.report.dateend.value == '' ){
                alert("กรุณาเลือกวันที่ด้วย");
                return false;
            }
            else
                return true;
        }
        
        
    }
</script>
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
            
            <form class="form-signin" align="center" action="report.php" target='_blank' name="report" onsubmit="return checkdate();">
            <h2>ออกรายงานการเบิกสินค้า</h2>
            <table class="table">
                <tr><td>วันที่เริ่มต้น</td><td><input type="date" name="datebegin"></td></tr>
                <tr><td>วันที่สิ้นสุด</td><td><input type="date" name="dateend"></td></tr>
                <tr><td>ประเภทรายงาน</td><td><select name="type">
                            <option value="1">รายงานสินค้าคงเหลือ</option>
                            <option value="2">รายงานการเบิกสินค้า</option>
                        </select></td></tr>
                <tr><td>รูปแบบรายงาน</td><td><select name="order">
                            <option value="1">แยกตาม Serial</option>
                            <option value="2">นับตามจำนวน</option>
                        </select></td></tr>
            </table>
            <input class="btn" type="submit" name="page" value="ตกลง">
            </form>
            
        </div>
    </body>    
    
</html>