<?php
    
if (isset($_GET['id']))
    selectitem($_GET['id']);
if (isset($_GET['catid']))
    $_SESSION['catid'] = $_GET['catid'];
if ($_GET['orderby'] == "model")
    $order = "c.model_id";
else
    $order = "b.brand_id";
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
            <h2>เบิกสินค้า</h2>
            <tr><td>เลือกหมวดหมู่สินค้า</td><td><select name="catid" onchange="window.location = 'index.php?page=เบิกสินค้า&catid=' + this.value">
                        <option>เลือกหมวดหมู่สินค้า</option>
                        <?php
                        $result = view("select * from category order by category_name asc");
                        foreach ($result as $data) {
                            if ($_GET['catid'] == $data['category_id'])
                                echo "<option value='" . $data['category_id'] . "' selected>" . $data['category_name'] . "</option>";
                            else
                                echo "<option value='" . $data['category_id'] . "' >" . $data['category_name'] . "</option>";
                        }
                        ?>

                    </select></td></tr>
            <form class="form-signin" align="center" action="index.php">
                <h2>รายการสินค้า</h2>
                <table class="table">
                    <tr><td>ลำดับ</td><td>ผู้จัดจำหน่าย</td><td><a href ="index.php?page=เบิกสินค้า&orderby=brand">ยี่ห้อ</a></td><td><a href ="index.php?page=เบิกสินค้า&orderby=model">รุ่น</a></td><td>จำนวนคงเหลือ</td><td>เครื่องมือ</td></tr>
                    <?php
                    $result = view("select * from product a,brand b,model c,category d,supplier e where a.supplier_id = e.supplier_id and a.category_id = d.category_id and a.model_id = c.model_id and a.brand_id = b.brand_id and a.amount > 0 and a.category_id = " . $_SESSION['catid'] . " order by $order asc");
                    $i = 1;
                    foreach ($result as $data) {
                        echo "<tr><td>" . $i . "</td><td>".$data['supplier_name']."</td><td>" . $data['brand_name'] . '</td><td> ' . $data['model_name'] . "</td><td>" . $data['amount'] . "</td><td><a href='index.php?page=เบิกสินค้า&id=" . $data['prod_id'] . "'>เลือกสินค้า</a></td></tr>";

                        $i++;
                    }
                    ?>
                </table>
                <input class="btn" type="submit" name="page" value="รายการสินค้าที่เลือก">
            </form>

        </div>
    </body>    

</html>