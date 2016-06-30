<?php
    if(!isset($_GET['num']) || $_GET['num'] == 1)
        $start = 0;
    else if ($_GET['num'] != 1)
        $start = ((10*$_GET['num'])) - 10;
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
<link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
<link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<title>Manage Brand</title>
    <body>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
        <div class="container-fluid" style="text-align:center">
            <form class="form-signin" align="center" action="index.php">
            <h2>รายการรับสินค้า</h2>
            <table class="table">
                <tr><td>ลำดับ</td><td>รหัสการสั่งซื้อสินค้า</td><td>สถานะ</td><td>วันที่รับสินค้า</td><td>เครื่องมือ</td></tr>
                <?php
                $result = view("select a.order_id,b.order_id as ordid,b.receive_date from orders a LEFT JOIN receive b on a.order_id = b.order_id order by a.order_id asc limit ".$start.",10 ");
				$i =1;
                foreach ($result as $data ) {
                    echo "<tr><td>".$i."</td><td>".$data['order_id']."</td>";
                    if($data['ordid'] == NULL)
                        echo "<td>ยังไม่ได้รับสินค้า</td><td><a href='index.php?page=รับสินค้า&id=".$data['order_id']."'>รับสินค้า</a></td></tr>";
                    else
                        echo "<td>รับสินค้าเรียบร้อยแล้ว</td>";
                    echo "<td>".$data['receive_date']."</td></tr>";
                    $i++;
                }
                
                ?>
                <tr><td colspan=11>หน้า<select name=num onchange="window.location = 'index.php?page=managereceive&num=' + this.value">
                                              
                <?php
                    $result = view("select * from receive");
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
            
            </form>
            
        </div>
    </body>    
    
</html>