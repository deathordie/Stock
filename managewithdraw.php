<?php
    if(!isset($_GET['num']) || $_GET['num'] == 1)
        $start = 0;
    else if ($_GET['num'] != 1)
        $start = ((10*$_GET['num'])) - 10;
   if(isset($_GET['id']))
       selectitem($_GET['id']);
   if(isset($_GET['search']))
       echo "OK";
   
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
            
            <form class="form-signin" align="center" action="">
            <h2>รายการเบิกสินค้า</h2>
            <table class="table">
                <tr><td>ลำดับ</td><td>รหัสการเบิก</td><td>ผู้เบิก</td><td>วันที่เบิก</td><td>หมายเหตุ</td><td>เครื่องมือ</td></tr>
                <?php
                $result = view("select * from withdraw a,employee b where a.emp_id = b.emp_id order by withdraw_id limit ".$start.",10");
				
                $i =1;
                foreach ($result as $data ) {
                    echo "<tr><td>".$i."</td><td><a href='index.php?page=รายละเอียดการเบิกสินค้า&id=".$data['withdraw_id']." '>".$data['withdraw_id'].'</a></td><td>'.$data['emp_fname'].'</td><td> '.$data['withdraw_date']."</td><td>".$data['detail']."</td><td><a href='report.php?id=".$data['withdraw_id']." ' target='_blank'>พิมพ์เอกสาร</a></td></tr>";
                    
                    $i++;
                }
                
                ?>
                <tr><td colspan=11>หน้า<select name=num onchange="window.location = 'index.php?page=managereceive&num=' + this.value">
                                              
                <?php
                    $result = view("select * from withdraw");
                    $num = count($result);
                    $num = ceil($num/10);
                    for($i=1;$i<=$num;$i++){
                        if($_GET['num'] == $i)
                            echo "<option value=".$i." selected>$i</option>";
                        else
                            echo "<option value=".$i." >$i</option>";
                }
                ?>
                </select></td></tr>
            </table>
            <input class="btn" type="submit" name="page" value="เบิกสินค้า">
            </form>
            
        </div>
    </body>    
    
</html>