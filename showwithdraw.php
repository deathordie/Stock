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
            <h2>รายละเอีกยดการเบิกสินค้าที่ <?php echo $_GET['id']; ?></h2>
            <table class="table">
                <tr><td>ลำดับ</td><td>ยี่ห้อ</td><td>รุ่น</td><td>Serial</td></tr>
                <?php
                $result = view("select b.brand_name, c.model_name, e.serial from product a, brand b, model c ,withdraw d, withdrawdetail e where a.brand_id = b.brand_id and a.model_id = c.model_id and d.withdraw_id = e.withdraw_id and a.prod_id = e.prod_id and d.withdraw_id = ".$_GET['id']." ");
				
                $i =1;
                foreach ($result as $data ) {
                    echo "<tr><td>".$i."</td><td>".$data['brand_name']."</td><td>".$data['model_name']."</td><td>".$data['serial']."</td></tr>";
                    
                    $i++;
                }
                
                ?>
            </table>
            <input class="btn" type="submit" name="page" value="ย้อนกลับ" onClick="history.back()">
            </form>
            
        </div>
    </body>    
    
</html>