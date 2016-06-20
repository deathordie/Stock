<!DOCTYPE html>
<html lang="en">

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
<link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
<link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<title>Home</title>
    <body>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
        <div class="container-fluid" style="text-align:center">
            <?php 
                                echo "ยินดีต้นรับคุณ " .$_SESSION["loginname"];
                                echo "<table class='table'>";
                                echo "<h2>จำนวนคงเหลือน้อยกว่าจุดสั่งซื้อ</h2>";
                                echo "<tr><td>ลำดับ</td><td>ยี่ห้อ</td><td>รุ่น</td><td>จำนวนคงเหลือ</td></tr>";
				$result = view("select * from product a, brand b ,model c where a.model_id = c.model_id and a.brand_id = b.brand_id and amount < pointorder order by a.prod_id");
                                $i=1;
                                foreach ($result as $value) {
                                    echo "<tr><td>".$i."</td><td>".$value['brand_name']."</td><td>".$value['model_name']."</td><td>".$value['amount']."</td></tr>";
                                 $i++;       
                                }
                                echo "</table>";
            ?>
            
        </div>
    </body>    
    
</html>