<?php
	ob_start();
	session_start();
	include 'connect.php';
    include 'function.php';
	chkaccess();
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
<link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
<link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<title>Tacinfo Stock System</title>
    <body>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
        <div class="container-fluid" style="text-align:center">
            <div class="row" >
                <?php include 'header.php'; ?>
            </div>
            <div class="row">
                <div class="col-sm-2">
                    <ul class="nav nav-pills nav-stacked">
                        <?php 
                            if($_GET['page'] == 'home')
                                echo "<li class='active'>";
                            else
                                echo "<li>";
                        ?>
                            <a href="index.php?page=home">Home</a>
                        </li>
                        <?php 
                            if($_GET['page'] == 'manageuser' || $_GET['page'] == 'เพิ่มข้อมูลพนักงาน' || $_GET['page'] == 'บันทึกข้อมูลพนักงาน' || $_GET['page'] == 'แก้ไขข้อมูลพนักงาน')
                                echo "<li class='active'>";
                            else
                                echo "<li>";
                        ?>
                            <a href="index.php?page=manageuser">จัดการข้อมูลผู้ใช้</a>
                        </li>
                        <?php 
                            if($_GET['page'] == 'managebrand' || $_GET['page'] == 'เพิ่มข้อมูลยี่ห้อ' || $_GET['page'] == 'บันทึกข้อมูลยี่ห้อ' || $_GET['page'] == 'แก้ไขข้อมูลยี่ห้อ')
                                echo "<li class='active'>";
                            else
                                echo "<li>";
                        ?>
                            <a href="index.php?page=managebrand">จัดการข้อมูลยี่ห้อ</a>
                        </li>
                        <?php 
                            if($_GET['page'] == 'managemodel' || $_GET['page'] == 'เพิ่มข้อมูลรุ่น' || $_GET['page'] == 'บันทึกข้อมูลรุ่น' || $_GET['page'] == 'แก้ไขข้อมูลรุ่น')
                                echo "<li class='active'>";
                            else
                                echo "<li>";
                        ?>
                            <a href="index.php?page=managemodel">จัดการข้อมูลรุ่น</a>
                        </li>
                        <?php 
                            if($_GET['page'] == 'managecategory' || $_GET['page'] == 'เพิ่มข้อมูลหมวดหมู่สินค้า' || $_GET['page'] == 'บันทึกข้อมูลหมวดหมู่สินค้า' || $_GET['page'] == 'แก้ไขข้อมูลหมวดหมู่สินค้า')
                                echo "<li class='active'>";
                            else
                                echo "<li>";
                        ?>
                            <a href="index.php?page=managecategory">จัดการข้อมูลหมวดหมู่สินค้า</a>
                        </li>
                        <?php 
                            if($_GET['page'] == 'managesupplier' || $_GET['page'] == 'เพิ่มข้อมูลผู้จัดจำหน่าย' || $_GET['page'] == 'บันทึกข้อมูลผู้จัดจำหน่าย' || $_GET['page'] == 'แก้ไขข้อมูลผู้จัดจำหน่าย')
                                echo "<li class='active'>";
                            else
                                echo "<li>";
                        ?>
                            <a href="index.php?page=managesupplier">จัดการข้อมูลผู้จัดจำหน่าย</a>
                        </li>
                        <?php 
                            if($_GET['page'] == 'manageproduct' || $_GET['page'] == 'เพิ่มข้อมูลสินค้า' || $_GET['page'] == 'บันทึกข้อมูลสินค้า' || $_GET['page'] == 'แก้ไขข้อมูลสินค้า')
                                echo "<li class='active'>";
                            else
                                echo "<li>";
                        ?>
                            <a href="index.php?page=manageproduct">จัดการข้อมูลสินค้า</a>
                        </li>
                        <?php 
                            if($_GET['page'] == 'order' || $_GET['page'] == 'สั่งซื้อสินค้า' || $_GET['page'] == 'บันทึกข้อมูลพนักงาน' || $_GET['page'] == 'แก้ไขข้อมูลพนักงาน')
                                echo "<li class='active'>";
                            else
                                echo "<li>";
                        ?>
                            <a href="index.php?page=order">สั่งซื้อสินค้า</a>
                        </li>
						<li>
                            <a href="index.php?page=logout">ออกจากระบบ</a>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-10">
                    <?php
                        if(isset($_GET['page'])){
                           if($_GET['page'] == "home")
                              include 'home.php';
                           else if($_GET['page'] == "manageuser")
                               include 'manageuser.php';
                            else if($_GET['page'] == "เพิ่มข้อมูลพนักงาน")
                               include 'adduser.php';
                            else if($_GET['page'] == "บันทึกข้อมูลพนักงาน")
                               include 'adduser.php';
                            else if($_GET['page'] == "แก้ไขข้อมูลพนักงาน"){
								$_SESSION['tmp'] = $_GET['id'];
								include 'edituser.php';
							}
							else if($_GET['page'] == "managebrand")
                               include 'managebrand.php';
						   else if($_GET['page'] == "เพิ่มข้อมูลยี่ห้อ")
                               include 'addbrand.php';
						   else if($_GET['page'] == "บันทึกข้อมูลยี่ห้อ")
                               include 'addbrand.php';
						   else if($_GET['page'] == "แก้ไขข้อมูลยี่ห้อ"){
								$_SESSION['tmp'] = $_GET['id'];
								include 'editbrand.php';
						   }
						   else if($_GET['page'] == "managemodel")
                               include 'managemodel.php';
						   else if($_GET['page'] == "เพิ่มข้อมูลรุ่น")
                               include 'addmodel.php';
						   else if($_GET['page'] == "บันทึกข้อมูลรุ่น")
                               include 'addmodel.php';
						   else if($_GET['page'] == "แก้ไขข้อมูลรุ่น"){
								$_SESSION['tmp'] = $_GET['id'];
								include 'editmodel.php';
						   }
                                                   else if($_GET['page'] == "managecategory")
                               include 'managecategory.php';
						   else if($_GET['page'] == "เพิ่มข้อมูลหมวดหมู่สินค้า")
                               include 'addcategory.php';
						   else if($_GET['page'] == "บันทึกข้อมูลหมวดหมู่สินค้า")
                               include 'addcategory.php';
						   else if($_GET['page'] == "แก้ไขข้อมูลหมวดหมู่สินค้า"){
								$_SESSION['tmp'] = $_GET['id'];
								include 'editcategory.php';
						   }
                                                   else if($_GET['page'] == "managesupplier")
                               include 'managesupplier.php';
                                                   else if($_GET['page'] == "เพิ่มข้อมูลผู้จัดจำหน่าย")
                               include 'addsupplier.php';
                                                    else if($_GET['page'] == "บันทึกข้อมูลผู้จัดจำหน่าย")
                                                   include 'addsupplier.php';
                                                    else if($_GET['page'] == "แก้ไขข้อมูลผู้จัดจำหน่าย"){
								$_SESSION['tmp'] = $_GET['id'];
								include 'editsupplier.php';
						   }
                                                   else if($_GET['page'] == "manageproduct")
                               include 'manageproduct.php';
                                                   else if($_GET['page'] == "เพิ่มข้อมูลสินค้า")
                               include 'addproduct.php';
                                                    else if($_GET['page'] == "บันทึกข้อมูลสินค้า")
                                                   include 'addproduct.php';
                                                    else if($_GET['page'] == "แก้ไขข้อมูลสินค้า"){
								$_SESSION['tmp'] = $_GET['id'];
								include 'editproduct.php';
						   }
						   else if($_GET['page'] == "order")
                               include 'orderproduct.php';
							else if($_GET['page'] == "logout")
                                logout();
                           
                        }
                       else
                           include 'home.php';
                        
                    ?>
                </div>
            </div>
            <div class="row" >
                <?php include 'footer.php'; ?>
            </div>
        </div>
    </body>    
    
</html>