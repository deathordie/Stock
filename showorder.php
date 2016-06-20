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
            <h2>รายการการสั่งซื้อเลขที่ <?php echo $_GET['id'];?></h2>
            <table class="table">
                <tr><td>ลำดับ</td><td>ยี่ห้อ</td><td>รุ่น</td><td>จำนวน</td><td>ราคาต่อชิ้น</td></tr>
                <?php
                $result = view("select d.brand_name,e.model_name,b.amount,b.priceperunit from orders a,orderdetail b,product c,brand d,model e where a.order_id = '".$_GET['id']."' and a.order_id = b.order_id and b.prod_id = c.prod_id and c.brand_id = d.brand_id and c.model_id = e.model_id order by c.prod_id asc");
				$i =1;
                foreach ($result as $data ) {
                    echo "<tr><td>".$i."</td><td>".$data['brand_name']."</td><td>".$data['model_name']."</td><td>".$data['amount']."</td><td>".$data['priceperunit']."</td></tr>";
                    $i++;
                }
                
                ?>
            </table>
            <input class="btn" type="submit" name="page" value="ย้อนกลับ" onClick="history.back()" >
            </form>
            
        </div>
    </body>    
    
</html>