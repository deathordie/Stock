<?php
if (($_GET['page']=="เพิ่ม")){
    $chk = checkdupserial($_GET['serial']);
   if($chk != 1){
        echo "<script lang='javascript'>alert('Serial นี้มีอยู่ในระบบแล้ว');</script>";
        echo "<script type='text/javascript'>window.location.href = 'index.php?page=receiveoldproduct';</script>";
    }
    else
        reciveoldproduct($_GET['prodid'], $_GET['serial']);
    
}
if (isset($_GET['supplierid']))
    $_SESSION['supplierid'] = $_GET['supplierid'];
else if (isset($_GET['brandid']))
    $_SESSION['brandid'] = $_GET['brandid'];
else if (isset($_GET['prodid']))
    $_SESSION['prodid'] = $_GET['prodid'];
?>

<script>
    function chkserial(){
        if(document.receiveoldpro.serial.value ==""){
            alert("กรุณากรอก Serial");
            return false;
        }
        return true;
    }
</script>
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
            <form name="receiveoldpro" class="form-signin" align="center" action="index.php" onsubmit="return chkserial()">
                <h2>รับสินค้าเดิมที่มีอยู่แล้ว</h2>
                <table class="table">
                    <tr><td>ผู้จัดจำหน่าย</td><td><select name="supplierid" onchange="window.location = 'index.php?page=receiveoldproduct&supplierid=' + this.value">
                                <?php
                                $result = view("select * from supplier order by supplier_id");
                                $i = 1;
                                echo "<option value=''>เลือกผู้จัดจำหน่าย</option>";
                                foreach ($result as $data) {
                                    if ($_SESSION['supplierid'] == $data['supplier_id'])
                                        echo "<option value='" . $data['supplier_id'] . "' selected>" . $data['supplier_name'] . "</option>";
                                    else
                                        echo "<option value='" . $data['supplier_id'] . "'>" . $data['supplier_name'] . "</option>";
                                    $i++;
                                }
                                echo "</select></td></tr>";
                                ?>
                                <tr><td>ยี่ห้อ</td><td><select name="brandid" onchange="window.location = 'index.php?page=receiveoldproduct&brandid=' + this.value">
                                            <?php
                                            $result = select("select DISTINCT a.brand_id,a.brand_name from brand a, product b,model c where b.model_id = c.model_id and a.brand_id = b.brand_id and b.supplier_id = '" . $_SESSION['supplierid'] . "' order by a.brand_name asc ");
                                            $i = 1;
                                            echo "<option value=''>เลือกยี่ห้อ</option>";
                                            foreach ($result as $data) {
                                                if ($_SESSION['brandid'] == $data['brand_id'])
                                                    echo "<option value='" . $data['brand_id'] . "' selected>" . $data['brand_name'] . "</option>";
                                                else
                                                    echo "<option value='" . $data['brand_id'] . "'>" . $data['brand_name'] . "</option>";
                                                $i++;
                                            }
                                            echo "</select></td></tr>";
                                            ?>           
                                            <tr><td>รุ่น</td><td><select name="prodid" onchange="window.location = 'index.php?page=receiveoldproduct&prodid=' + this.value">
                                                        <?php
                                                        $result = select("select DISTINCT a.brand_id,a.brand_name,c.model_name,b.prod_id from brand a, product b,model c where b.model_id = c.model_id and a.brand_id = b.brand_id and b.supplier_id = '" . $_SESSION['supplierid'] . "' and b.brand_id = '" . $_SESSION['brandid'] . "' order by a.brand_name asc");
                                                        $i = 1;
                                                        echo "<option value=''>เลือกรุ่น</option>";
                                                        foreach ($result as $data) {
                                                            if ($_SESSION['prodid'] == $data['prod_id'])
                                                                echo "<option value='" . $data['prod_id'] . "' selected>" . $data['model_name'] . "</option>";
                                                            else
                                                                echo "<option value='" . $data['prod_id'] . "'>" . $data['model_name'] . "</option>";
                                                            $i++;
                                                        }
                                                        echo "</select></td></tr>";
                                                        ?>
                                                        <tr><td>Serial</td><td><input type="text" name="serial"></td></tr>

                                                        </table>
                                                        <input class="btn" type="submit" name="page" value="เพิ่ม" >
                                                        </form>

                                                        </div>
                                                        </body>    

                                                        </html>