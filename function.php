<?php
function view($str){
    $query = mysql_query($str)or die (mysql_error());
    $result = array();
    while($data = mysql_fetch_array($query)){
           array_push($result,$data);
           }
    return $result;
    mysql_close();
}

function select($str){
    $query = mysql_query($str)or die (mysql_error());
    $result = array();
    while($data = mysql_fetch_array($query)){
           array_push($result,$data);
           }
	unset($_SESSION['tmp']);	   
	return $result;
        mysql_close();
}

function adduser($strfname,$strlname,$strusr,$strpass){
    $str = "insert into employee (emp_fname,emp_lname,emp_username,emp_password) values('".$strfname."','".$strlname."','".$strusr."','".$strpass."')";
    $query = mysql_query($str)or die (mysql_error());
    echo "<script lang='javascript'>alert('บันทึกข้อมูลเรียบร้อยแล้ว');</script>";
    echo "<script type='text/javascript'>window.location.href = 'index.php?page=manageuser';</script>";
    mysql_close();
}

function edituser($strid,$strfname,$strlname){
    $str = "update employee set emp_fname = '".$strfname."' ,emp_lname = '".$strlname."' where emp_id = '".$strid."' ";
    $query = mysql_query($str)or die (mysql_error());
    echo "<script lang='javascript'>alert('แก้ไขข้อมูลเรียบร้อยแล้ว');</script>";
    echo "<script type='text/javascript'>window.location.href = 'index.php?page=manageuser';</script>";
    mysql_close();
}

function addbrand($strbrandname){
    $str = "insert into brand (brand_name) values('".$strbrandname."')";
    $query = mysql_query($str)or die (mysql_error());
    echo "<script lang='javascript'>alert('บันทึกข้อมูลเรียบร้อยแล้ว');</script>";
    echo "<script type='text/javascript'>window.location.href = 'index.php?page=managebrand';</script>";
    mysql_close();
}

function editbrand($strid,$strbrandname){
    $str = "update brand set brand_name = '".$strbrandname."' where brand_id = '".$strid."' ";
    $query = mysql_query($str)or die (mysql_error());
    echo "<script lang='javascript'>alert('แก้ไขข้อมูลเรียบร้อยแล้ว');</script>";
    echo "<script type='text/javascript'>window.location.href = 'index.php?page=managebrand';</script>";
    mysql_close();
}

function addcategory($strcategoryname){
    $str = "insert into category (category_name) values('".$strcategoryname."')";
    $query = mysql_query($str)or die (mysql_error());
    echo "<script lang='javascript'>alert('เพิ่มข้อมูลเรียบร้อยแล้ว');</script>";
    echo "<script type='text/javascript'>window.location.href = 'index.php?page=managecategory';</script>";
    mysql_close();
}

function editcategory($strid,$strbrandname){
    $str = "update category set category_name = '".$strbrandname."' where category_id = '".$strid."' ";
    $query = mysql_query($str)or die (mysql_error());
    echo "<script lang='javascript'>alert('แก้ไขข้อมูลเรียบร้อยแล้ว');</script>";
    echo "<script type='text/javascript'>window.location.href = 'index.php?page=managecategory';</script>";
    mysql_close();
}

function viewmodelonproduct($strbrandid){
    $str = "select * from model where brand_id = ".$strbrandid." order by model_id asc";
    $query = mysql_query($str)or die (mysql_error());
    $result = array();
    while($data = mysql_fetch_array($query)){
           array_push($result,$data);
           }
    return $result;
    mysql_close();
}

function modelselectbrand(){
    $str = "select * from brand order by brand_id asc";
    $query = mysql_query($str)or die (mysql_error());
    $result = array();
    while($data = mysql_fetch_array($query)){
           array_push($result,$data);
           }
    return $result;
    mysql_close();
}

function addmodel($strbrandid,$strmodelname){
    $str = "insert into model (brand_id,model_name) values(".$strbrandid.",'".$strmodelname."')";
    $query = mysql_query($str)or die (mysql_error());
    echo "<script lang='javascript'>alert('บันทึกข้อมูลเรียบร้อยแล้ว');</script>";
    echo "<script type='text/javascript'>window.location.href = 'index.php?page=managemodel';</script>";
    mysql_close();
}

function editmodel($strid,$strbrandid,$strmodelname){
    $str = "update model set brand_id = ".$strbrandid." ,model_name = '".$strmodelname."' where model_id = ".$strid." ";
    $query = mysql_query($str)or die (mysql_error());
    echo "<script lang='javascript'>alert('แก้ไขข้อมูลเรียบร้อยแล้ว');</script>";
    echo "<script type='text/javascript'>window.location.href = 'index.php?page=managemodel';</script>";
    mysql_close();
}

function addsupplier($strsuppliername){
    $str = "insert into supplier (supplier_name) values('".$strsuppliername."')";
    $query = mysql_query($str)or die (mysql_error());
    echo "<script lang='javascript'>alert('บันทึกข้อมูลเรียบร้อยแล้ว');</script>";
    echo "<script type='text/javascript'>window.location.href = 'index.php?page=managesupplier';</script>";
    mysql_close();
}

function editsupplier($strid,$strsuppliername){
    $str = "update supplier set supplier_name = '".$strsuppliername."' where supplier_id = '".$strid."' ";
    $query = mysql_query($str)or die (mysql_error());
    echo "<script lang='javascript'>alert('แก้ไขข้อมูลเรียบร้อยแล้ว');</script>";
    echo "<script type='text/javascript'>window.location.href = 'index.php?page=managesupplier';</script>";
    mysql_close();
}

function addproduct($strsupplierid,$strmodelid,$strcategoryid,$strwarranty,$warrantytype){
    $str = "insert into product (supplier_id,model_id,category_id,warranty,warrantytype) values('".$strsupplierid."','".$strmodelid."','".$strcategoryid."','".$strwarranty."','".$warrantytype."')";
    $query = mysql_query($str)or die (mysql_error());
    echo "<script lang='javascript'>alert('บันทึกข้อมูลเรียบร้อยแล้ว');</script>";
    echo "<script type='text/javascript'>window.location.href = 'index.php?page=manageproduct';</script>";
    mysql_close();
}

function selecteditproduct($strid){
    $str = "select * from product a,brand b, model c ,supplier d where a.model_id = c.model_id and c.brand_id = b.brand_id and a.supplier_id = d.supplier_id and a.prod_id = ".$strid." order by a.prod_id ";
    $query = mysql_query($str)or die (mysql_error());
    $result = array();
    while($data = mysql_fetch_array($query)){
           array_push($result,$data);
           }
	unset($_SESSION['tmp']);	   
	return $result;
        mysql_close();
}

function editproduct($strid,$strsupplierid,$strmodelid,$strcategoryid,$strwarranty,$warrantytype){
    $str = "update product set supplier_id = '".$strsupplierid."', model_id = '".$strmodelid."', category_id = '".$strcategoryid."' , warranty = '".$strwarranty."', warrantytype = '".$warrantytype."' where prod_id = '".$strid."' ";
    $query = mysql_query($str)or die (mysql_error());
    echo "<script lang='javascript'>alert('แก้ไขข้อมูลเรียบร้อยแล้ว');</script>";
    echo "<script type='text/javascript'>window.location.href = 'index.php?page=manageproduct';</script>";
    mysql_close();
}

function selectbrandonorder($strsupplierid){
    $str = "select DISTINCT a.brand_id,a.brand_name from brand a, product b,model c where b.model_id = c.model_id and a.brand_id = '".$strsupplierid."' order by a.brand_id ";
    $query = mysql_query($str)or die (mysql_error());
    $result = array();
    while($data = mysql_fetch_array($query)){
           array_push($result,$data);
           }
		   
	return $result;
        mysql_close();
}

function login($strusr,$strpass){
    $str = "select emp_fname from employee where emp_username = '".$strusr."' and emp_password = '".$strpass."'  ";
    $query = mysql_query($str)or die (mysql_error());
	$data = mysql_fetch_array($query);
	if($data == ""){		
		return false;
                mysql_close();
        }
	else{
		session_start();
		$_SESSION["loginname"] = $data['emp_fname'];
		return true;
                mysql_close();
	}
}


function chkaccess(){
    if(!isset($_SESSION["loginname"]))
		header( "location: login.php" );
}

function logout(){
	session_destroy();
	header( "location: login.php" );
}

?>