<!DOCTYPE html>
<html lang="en">

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
<link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
<link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<title>Manage User</title>
    <body>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
        <div class="container-fluid" style="text-align:center">
            <form class="form-signin" align="center" action="index.php">
            <h2>รายชื่อพนักงาน</h2>
            <table class="table">
                <tr><td>ลำดับ</td><td>ชื่อ</td><td>นามสกุล</td><td>ชื่อผู้ใช้</td><td>เครื่องมือ</td></tr>
                <?php
                $result = viewuser();
				$i =1;
                foreach ($result as $data ) {
                    echo "<tr><td>".$i."</td><td>".$data['emp_fname']."</td><td>".$data['emp_lname']."</td><td>".$data['emp_username']."</td><td><a href='index.php?page=แก้ไขข้อมูลพนักงาน&id=".$data['emp_id']."   '>แก้ไข</a></td></tr>";
                    $i++;
                }
                
                ?>
            </table>
            <input class="btn" type="submit" name="page" value="เพิ่มข้อมูลพนักงาน">
            </form>
            
        </div>
    </body>    
    
</html>