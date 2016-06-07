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

function add($str){
    $str = "insert into employee (emp_fname,emp_lname,emp_username,emp_password) values('".$strfname."','".$strlname."','".$strusr."','".$strpass."')";
    $query = mysql_query($str)or die (mysql_error());
    echo "<script lang='javascript'>alert('บันทึกข้อมูลเรียบร้อยแล้ว');</script>";
    echo "<script type='text/javascript'>window.location.href = 'index.php?page=manageuser';</script>";
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

function addmodel($strmodelname){
    $str = "insert into model (model_name) values('".$strmodelname."')";
    $query = mysql_query($str)or die (mysql_error());
    echo "<script lang='javascript'>alert('บันทึกข้อมูลเรียบร้อยแล้ว');</script>";
    echo "<script type='text/javascript'>window.location.href = 'index.php?page=managemodel';</script>";
    mysql_close();
}

function editmodel($strid,$strmodelname){
    $str = "update model set model_name = '".$strmodelname."' where model_id = ".$strid." ";
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

function addproduct($strsupplierid,$strmodelid,$strcategoryid,$strwarranty,$warrantytype,$strbrandid){
    $str = "insert into product (supplier_id,model_id,category_id,warranty,warrantytype,brand_id) values('".$strsupplierid."','".$strmodelid."','".$strcategoryid."','".$strwarranty."','".$warrantytype."','".$strbrandid."')";
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

function order($supplier,$prodid,$amount,$price){
    if(!isset($_SESSION['intline'])){
        $_SESSION['intline'] = 1;
        $_SESSION['suppileridno'] = $supplier;
        $_SESSION['orderprodid'][1] = $prodid;
        $_SESSION['orderamount'][1] = $amount;
        $_SESSION['orderprice'][1] = $price;
        calprice();
    }
    else{
        $key = array_search($prodid,$_SESSION['orderprodid']);
        if($key != ""){
            $_SESSION['orderamount'][$key] = $_SESSION['orderamount'][$key] + $amount;  
            calprice();
        }
        else{
            $_SESSION['intline'] = $_SESSION['intline'] + 1;
            $_SESSION['orderprodid'][$_SESSION['intline']] = $prodid;
            $_SESSION['orderamount'][$_SESSION['intline']] = $amount;
            $_SESSION['orderprice'][$_SESSION['intline']] = $price;
            calprice();
        }    
         
    }
}

function showorder(){
     for($i=1;$i<=$_SESSION['intline'];$i++){
        echo $_SESSION['orderprodid'][$i].'  '. $_SESSION['orderamount'][$i].'<br>';
     }
}

function calprice(){
     $_SESSION['totalprice'] = 0;
     for($i=1;$i<=$_SESSION['intline'];$i++){
        $_SESSION['totalprice'] += $_SESSION['orderamount'][$i] * $_SESSION['orderprice'][$i];
     }
}

function  delorderprod($str){
    $key = array_search($str,$_SESSION['orderprodid']);
    unset($_SESSION['orderamount'][$key]);
    unset($_SESSION['orderprice'][$key]);
    unset($_SESSION['orderprodid'][$key]);
    calprice();
}

function  editorder($str){
    $key = array_search($str,$_SESSION['orderprodid']);
    return $key;
    
}

function  editchangeorder($strid,$amount,$price){
    $key = array_search($strid,$_SESSION['orderprodid']);
    $_SESSION['orderamount'][$key] = $amount;
    $_SESSION['orderprice'][$key] = $price;
    calprice();
    echo "<script lang='javascript'>alert('แก้ไขข้อมูลเรียบร้อยแล้ว');</script>";
    echo "<script type='text/javascript'>window.location.href = 'index.php?page=ดูสินค้าที่เลือก';</script>";
}

function  addorder($supid,$totalprice,$prodid,$amount,$priceperunit){
    date_default_timezone_set('asia/bangkok');
    $str= "insert into orders (supplier_id,totalprice) values ('".$supid."','".$totalprice."')";
    $query = mysql_query($str)or die (mysql_error());
    
    $str= "select order_id from orders order by order_id desc limit 1";
    $query = mysql_query($str)or die (mysql_error());
    $data = mysql_fetch_array($query);
      for($i=1;$i <= $_SESSION['intline'];$i++){
        if($_SESSION['orderprodid'][$i] != ''){
                
           $str= "insert into orderdetail (order_id,prod_id,amount,priceperunit) values ('".$data['order_id']."','".$prodid[$i]."','".$amount[$i]."','".$priceperunit[$i]."')";
           $query = mysql_query($str)or die (mysql_error());
            }
    }
        unset($_SESSION['intline']);
        unset($_SESSION['suppileridno']);
        unset($_SESSION['orderprodid']);
        unset($_SESSION['orderamount']);
        unset($_SESSION['orderprice']);
        unset($_SESSION['totalprice']);
    echo "<script lang='javascript'>alert('บันทึกข้อมูลเรียบร้อยแล้ว');</script>";
    echo "<script type='text/javascript'>window.location.href = 'index.php?page=manageorder';</script>";
}

function addreceive($strprodid,$serial){
        if(!isset($_SESSION['reciveprodid'])){
        for($i=0;$i<count($serial);$i++){
            $_SESSION['serial'][$i] = $serial[$i];
            $_SESSION['reciveprodid'][$i] = $strprodid;
                }
            
            }
        else{
            $num = count($_SESSION['reciveprodid']);
            for($i=0;$i<count($serial);$i++){
                $_SESSION['serial'][$num] = $serial[$i];
                $_SESSION['reciveprodid'][$num] = $strprodid;
                $num++; 
            }
           
        }
     checkserial();        
}     

function show(){
    for($i=0;$i<=count($_SESSION['reciveprodid']);$i++){
            echo $_SESSION['reciveprodid'][$i].' '.$_SESSION['serial'][$i].'<br>';
    }
}

function checkreceiveprod($str){
    $key = array_search($str, $_SESSION['reciveprodid']);
    if($key == null && $key == ' ' || $key > 0)
        return true;
    else
        return false;
} 

function checkserial(){
   
    for($i=0;$i<=count($_SESSION['serial']);$i++){
        
        
        for($l=0;$l<=count($_SESSION['serial']);$l++){
            
            if($_SESSION['serial'][$i] == $_SESSION['serial'][$l+1]){
                echo "<script lang='javascript'>alert('Serial สินค้าซ้ำกัน');</script>";
                unset($_SESSION['reciveprodid']);
                unset($_SESSION['serial']);
                return false;
                break;
            }
        } 
        return true;
    }
}

function receiveproduct(){
    $str ="insert into receive (order_id) values (".$_SESSION['id'].")";
    $query = mysql_query($str)or die (mysql_error());
    
    $str ="select receive_id from receive order by receive_id desc limit 1";
    $query = mysql_query($str)or die (mysql_error());
    $data = mysql_fetch_array($query);
    
    for($i=0;$i<count($_SESSION['serial']);$i++){
        $str ="insert into productdetail (prod_id,serial,receive_id) values ('".$_SESSION['reciveprodid'][$i]."','".$_SESSION['serial'][$i]."','".$data['receive_id']."')";
        $query = mysql_query($str)or die (mysql_error());
    
    }
    
    unset($_SESSION['id']);
    unset($_SESSION['reciveprodid']);
    unset($_SESSION['serial']);
    echo "<script lang='javascript'>alert('บันทึกข้อมูลเรียบร้อยแล้ว');</script>";
    echo "<script type='text/javascript'>window.location.href = 'index.php?page=managereceive';</script>";
}

function countproductamount(){
    $str = "select prod_id from product order by prod_id";
    $query = mysql_query($str)or die (mysql_error());
    $result = array();
    while($data = mysql_fetch_array($query)){
           array_push($result,$data);
           }
    $num = count($result);
    for($i=0;$i<$num;$i++){
       $str = "select COUNT(prod_id) as amount from productdetail where '".$result[$i]."' order by prod_id";
       $query = mysql_query($str)or die (mysql_error());
       $data = mysql_fetch_array($query);
       
       $str = "update product set amount = '".$data."' ";
       $query = mysql_query($str)or die (mysql_error());
    }
    
}

function getserialamount($orderid,$prodid){
    $str = "select amount from orders a, orderdetail b where a.order_id = ".$orderid." and a.order_id = b.order_id and b.prod_id = ".$prodid." order by b.prod_id asc ";
    $query = mysql_query($str)or die (mysql_error());
    $result = mysql_fetch_array($query);
    return $result;
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