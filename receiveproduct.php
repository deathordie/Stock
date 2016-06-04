<?php
    if(isset($_GET['id']) && $_GET['prodid'] == '')
        $_SESSION['id'] = $_GET['id'];
    else if($_GET['page'] == 'รับสินค้า' && $_GET['serial'])
        addreceive($_GET['prodid'], $_GET['serial']);
    
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
            <h2>รับสินค้ารายการที่ <?php echo $_SESSION['id']; ?></h2>
            <table class="table">
                <tr><td>รายการสินค้า</td><td><select name='prodid' onchange="window.location='index.php?page=รับสินค้า&prodid='+this.value ">
                <?php
                
                $result = select("select c.prod_id,d.brand_name,e.model_name,b.amount,b.priceperunit from orders a,orderdetail b,product c,brand d,model e where a.order_id = '".$_SESSION['id']."' and a.order_id = b.order_id and b.prod_id = c.prod_id and c.brand_id = d.brand_id and c.model_id = e.model_id order by c.prod_id asc");
		echo "<option value='' selected>เลือกสินค้า</option>";
                foreach ($result as $data ) {
                $check = checkreceiveprod($data['prod_id']);
                if($check == 1){
                   
                }
                else{
                    
                    if($_GET['prodid'] == $data['prod_id'])
                       echo "<option value=".$data['prod_id']." selected>".$data['brand_name'].' '.$data['model_name']."</option>"; 
                    else
                        echo "<option value=".$data['prod_id'].">".$data['brand_name'].' '.$data['model_name']."</option>";
                    }
                    
                }
                  if(isset($_GET['prodid'])){
                        for($i=1;$i<=$data['amount'];$i++){
                            echo "<tr><td>Serial</td><td><input type='text' name='serial[]'></td></tr>";
                        }
                    }
                ?>
                </select></td></tr>
            </table>
            <input class="btn" type="submit" name="page" value="รับสินค้า"><br><br>
            <input class="btn" type="submit" name="page" value="ยืนยันการรับสินค้า">
            </form>
            
        </div>
    </body>    
    
</html>