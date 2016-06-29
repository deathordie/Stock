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

function addproduct($strsupplierid,$strmodelid,$strcategoryid,$strwarranty,$warrantytype,$strbrandid,$strpoint){
    $str = "insert into product (supplier_id,model_id,category_id,warranty,warrantytype,brand_id,pointorder) values(".$strsupplierid.",".$strmodelid.",".$strcategoryid.",".$strwarranty.",".$warrantytype.",".$strbrandid.",".$strpoint.")";
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

function editproduct($strid,$strsupplierid,$strmodelid,$strcategoryid,$strwarranty,$warrantytype,$strpointorder,$strbrandid){
    $str = "update product set supplier_id = '".$strsupplierid."', model_id = '".$strmodelid."', category_id = '".$strcategoryid."' , warranty = '".$strwarranty."', warrantytype = '".$warrantytype."' , pointorder = '".$strpointorder."' ,brand_id = '".$strbrandid."' where prod_id = '".$strid."' ";
    $query = mysql_query($str)or die (mysql_error());
    echo "<script lang='javascript'>alert('แก้ไขข้อมูลเรียบร้อยแล้ว');</script>";
    echo "<script type='text/javascript'>window.location.href = 'index.php?page=manageproduct';</script>";
    mysql_close();
}

function order($supplier,$prodid,$amount,$price){
    if(!isset($_SESSION['orderintline'])){
        $_SESSION['orderintline'] = 1;
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
            $_SESSION['orderintline'] = $_SESSION['orderintline'] + 1;
            $_SESSION['orderprodid'][$_SESSION['orderintline']] = $prodid;
            $_SESSION['orderamount'][$_SESSION['orderintline']] = $amount;
            $_SESSION['orderprice'][$_SESSION['orderintline']] = $price;
            calprice();
        }    
         
    }
}

function showorder(){
     for($i=1;$i<=$_SESSION['orderintline'];$i++){
        echo $_SESSION['orderprodid'][$i].'  '. $_SESSION['orderamount'][$i].'<br>';
     }
}

function calprice(){
     $_SESSION['totalprice'] = 0;
     for($i=1;$i<=$_SESSION['orderintline'];$i++){
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
    if(!isset($_SESSION['orderintline'])){
        echo "<script lang='javascript'>alert('กรุณาเลือกสินค้าก่อน');</script>";
        echo "<script type='text/javascript'>window.location.href = 'index.php?page=manageorder';</script>";
    }
    else{
    date_default_timezone_set('asia/bangkok');
    $str= "insert into orders (supplier_id,totalprice) values ('".$supid."','".$totalprice."')";
    $query = mysql_query($str)or die (mysql_error());
    
    $str= "select order_id from orders order by order_id desc limit 1";
    $query = mysql_query($str)or die (mysql_error());
    $data = mysql_fetch_array($query);
      for($i=1;$i <= $_SESSION['orderintline'];$i++){
        if($_SESSION['orderprodid'][$i] != ''){
                
           $str= "insert into orderdetail (order_id,prod_id,amount,priceperunit) values ('".$data['order_id']."','".$prodid[$i]."','".$amount[$i]."','".$priceperunit[$i]."')";
           $query = mysql_query($str)or die (mysql_error());
            }
    }
        unset($_SESSION['orderintline']);
        unset($_SESSION['suppileridno']);
        unset($_SESSION['orderprodid']);
        unset($_SESSION['orderamount']);
        unset($_SESSION['orderprice']);
        unset($_SESSION['totalprice']);
    echo "<script lang='javascript'>alert('บันทึกข้อมูลเรียบร้อยแล้ว');</script>";
    echo "<script type='text/javascript'>window.location.href = 'index.php?page=manageorder';</script>";
    }
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
    countproductamount();
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
       $str1 = "select COUNT(prod_id) as amount from productdetail where prod_id = '".$result[$i][0]."' and status = 0 order by prod_id";
       $query1 = mysql_query($str1)or die (mysql_error());
       $data = mysql_fetch_array($query1);
       
       $str1 = "update product set amount = '".$data['amount']."' where prod_id = '".$result[$i][0]."' ";
       $query1 = mysql_query($str1)or die (mysql_error());
    }
    
}

function getserialamount($orderid,$prodid){
    $str = "select amount from orders a, orderdetail b where a.order_id = ".$orderid." and a.order_id = b.order_id and b.prod_id = ".$prodid." order by b.prod_id asc ";
    $query = mysql_query($str)or die (mysql_error());
    $result = mysql_fetch_array($query);
    return $result;
}

function selectitem($id){
    $str = "select amount from product where prod_id = ".$id." ";
    $query = mysql_query($str)or die (mysql_error());
    $result = mysql_fetch_array($query);    
    if(!isset($_SESSION['withdrawintline'])){
        $_SESSION['withdrawintline'] = 1;
        $_SESSION['withdrawprodid'][$_SESSION['withdrawintline']] = $id;
        $_SESSION['withdrawamount'][$_SESSION['withdrawintline']] = 1;
        
    }
    else{
        $key = array_search($id, $_SESSION['withdrawprodid']);
        if($_SESSION['withdrawamount'][$key] == $result['amount']){
            echo "<script lang='javascript'>alert('ไม่สามารถเลือกสินค้าเกินจำนวนที่มีอยู่ได้');</script>";
        }
        else{
            if($key)
            $_SESSION['withdrawamount'][$key]++;
        
            else{
                $_SESSION['withdrawintline'] = $_SESSION['withdrawintline'] + 1;
                $_SESSION['withdrawprodid'][$_SESSION['withdrawintline']] = $id;
                $_SESSION['withdrawamount'][$_SESSION['withdrawintline']]++;
        }
    }
    }
    
}

function viewwithdrawn(){
    for($i=1;$i <= $_SESSION['withdrawintline'];$i++){
        if($_SESSION['withdrawprodid'][$i] != ''){
        $str = "select b.model_name,c.brand_name,d.supplier_name from product a,model b ,brand c ,supplier d where a.supplier_id = d.supplier_id and a.model_id = b.model_id and a.brand_id = c.brand_id and a.prod_id = ".$_SESSION['withdrawprodid'][$i]." ";
        $query = mysql_query($str)or die (mysql_error());
        $result = mysql_fetch_array($query);
        echo "<tr><td>".$i."</td><td>".$result['supplier_name']."</td><td>".$result['brand_name']."</td><td>".$result['model_name']."</td><td>".$_SESSION['withdrawamount'][$i]."</td><td><a href='index.php?page=รายการสินค้าที่เลือก&id=".$_SESSION['withdrawprodid'][$i]."'>ลบ</a></td></tr>";
    
        }
    }
}

function  delwithdrawnprod($str){
    $key = array_search($str,$_SESSION['withdrawprodid']);
    unset($_SESSION['withdrawprodid'][$key]);
    unset($_SESSION['withdrawamount'][$key]);
}

function checkdupserial($serial){
    $str ="select * from withdrawdetail where serial = '".$serial."' ";
    $query = mysql_query($str)or die (mysql_error());
    $result = mysql_fetch_array($query);
    if($result['serial'] == "")
        return TRUE;
    else
        return FALSE;
}

function withdraw(){
    if(!isset($_SESSION['withdrawintline'])){
        echo "<script lang='javascript'>alert('กรุณาเลือกสินค้าก่อน');</script>";
        echo "<script type='text/javascript'>window.location.href = 'index.php?page=managewithdraw';</script>";
    }
    else{    
    date_default_timezone_set("asia/bangkok"); 
    $date = date("Y-m-d H:i:s");  
    $str1 = "insert into withdraw (withdraw_date,emp_id,detail,withdrawname) values ('".$date."',".$_SESSION['emp_id'].",'".$_GET['txt']."','".$_GET['withdrawname']."')";
    $query1 = mysql_query($str1)or die (mysql_error());
    
    for($i=1;$i<=$_SESSION['withdrawintline'];$i++){
        if($_SESSION['withdrawprodid'][$i] != ''){
            
            $str = "select a.prod_id ,b.serial,b.receive_id from product a LEFT JOIN productdetail b ON a.prod_id = b.prod_id LEFT JOIN receive c ON b.receive_id = c.receive_id where a.prod_id = ".$_SESSION['withdrawprodid'][$i]." and b.status = 0 order by c.receive_date limit ".$_SESSION['withdrawamount'][$i]." ";
            $query = mysql_query($str)or die (mysql_error());
            
            while($data = mysql_fetch_array($query)){
                
                $str1 = "update productdetail set status = 1 where prod_id = ".$data['prod_id']." and serial = '".$data['serial']."' ";
                $query1 = mysql_query($str1)or die (mysql_error());
                
                $str2 = "select withdraw_id from withdraw order by withdraw_id desc limit 1";
                $query2 = mysql_query($str2)or die (mysql_error());
                $result2 = mysql_fetch_array($query2);
                                
                $str1 = "insert into withdrawdetail (withdraw_id,prod_id,serial) values (".$result2['withdraw_id'].",".$data['prod_id'].",'".$data['serial']."')";
                $query1 = mysql_query($str1)or die (mysql_error());
                }
                
            
        }
    }
    countproductamount();
    unset($_SESSION['catid']);
    unset($_GET['orderby']);
    unset($date);
    unset($_SESSION['withdrawintline']);
    unset($_SESSION['withdrawprodid']);
    unset($_SESSION['withdrawamount']);
    echo "<script lang='javascript'>alert('บันทึกข้อมูลเรียบร้อยแล้ว');</script>";
    echo "<script type='text/javascript'>window.location.href = 'index.php?page=managewithdraw';</script>";
    }
}

function reciveoldproduct($prodid,$serial){
    $str ="insert into productdetail (prod_id,serial) values ('".$prodid."','".$serial."')";
    $query = mysql_query($str)or die (mysql_error());
    countproductamount();
    echo "<script lang='javascript'>alert('บันทึกข้อมูลเรียบร้อยแล้ว');</script>";
    echo "<script type='text/javascript'>window.location.href = 'index.php?page=receiveoldproduct';</script>";
}

function selecreturntitem($id,$serial){
    $str = "select amount from product where prod_id = ".$id." ";
    $query = mysql_query($str)or die (mysql_error());
    $result = mysql_fetch_array($query);    
    if(!isset($_SESSION['returnintline'])){
        $_SESSION['returnintline'] = 1;
        $_SESSION['returnprodid'][$_SESSION['returnintline']] = $id;
        $_SESSION['returnserial'][$_SESSION['returnintline']] = $serial;
        
    }
    else{
        
                $_SESSION['returnintline'] = $_SESSION['returnintline'] + 1;
                $_SESSION['returnprodid'][$_SESSION['returnintline']] = $id;
                $_SESSION['returnserial'][$_SESSION['returnintline']] = $serial;
          }
}

function viewreturn(){
    for($i=1;$i <= $_SESSION['returnintline'];$i++){
        if($_SESSION['returnprodid'][$i] != ''){
        $str = "select b.model_name,c.brand_name,d.supplier_name,e.serial from product a,model b ,brand c ,supplier d ,productdetail e where a.prod_id = e.prod_id and a.supplier_id = d.supplier_id and a.model_id = b.model_id and a.brand_id = c.brand_id and a.prod_id = ".$_SESSION['returnprodid'][$i]." and e.serial = '".$_SESSION['returnserial'][$i]."' order by a.prod_id ";
        $query = mysql_query($str)or die (mysql_error());
        $result = mysql_fetch_array($query);
        echo "<tr><td>".$i."</td><td>".$result['supplier_name']."</td><td>".$result['brand_name']."</td><td>".$result['model_name']."</td><td>".$result['serial']."</td><td><a href='index.php?page=รายการสินค้าที่คืน&serial=".$result['serial']."  '>ลบ</a></td></tr>";
    
        }
    }
}

function  delreturnprod($serial){
    $key = array_search($serial,$_SESSION['returnserial']);
    unset($_SESSION['returnprodid'][$key]);
    unset($_SESSION['returnserial'][$key]);
}

function returnproduct(){
    
    if(!isset($_SESSION['returnintline'])){
        echo "<script lang='javascript'>alert('กรุณาเลือกสินค้าก่อน');</script>";
        echo "<script type='text/javascript'>window.location.href = 'index.php?page=revertproduct';</script>";
    }
    else{    
    date_default_timezone_set("asia/bangkok"); 
    $date = date("Y-m-d H:i:s");  
    $str1 = "insert into returnproduct (return_date,emp_id) values ('".$date."',".$_SESSION['emp_id'].")";
    $query1 = mysql_query($str1)or die (mysql_error());
    
    for($i=1;$i<=$_SESSION['returnintline'];$i++){
        if($_SESSION['returnprodid'][$i] != ''){
            
            
                
                $str1 = "update productdetail set status = 0 where prod_id = ".$_SESSION['returnprodid'][$i]." and serial = '".$_SESSION['returnserial'][$i]."' ";
                $query1 = mysql_query($str1)or die (mysql_error());
                
                $str2 = "select return_id from returnproduct order by return_id desc limit 1";
                $query2 = mysql_query($str2)or die (mysql_error());
                $result2 = mysql_fetch_array($query2);
                                
                $str1 = "insert into returnproductdetail (return_id,prod_id,serial) values (".$result2['return_id'].",".$_SESSION['returnprodid'][$i].",'".$_SESSION['returnserial'][$i]."')";
                $query1 = mysql_query($str1)or die (mysql_error());
                
                
            
        }
    }
    countproductamount();
    unset($_SESSION['catid']);
    unset($_GET['orderby']);
    unset($date);
    unset($_SESSION['returnintline']);
    unset($_SESSION['returnprodid']);
    unset($_SESSION['returnserial']);
    echo "<script lang='javascript'>alert('บันทึกข้อมูลเรียบร้อยแล้ว');</script>";
    echo "<script type='text/javascript'>window.location.href = 'index.php?page=revertproduct';</script>";
    }
}


function login($strusr,$strpass){
    $str = "select emp_fname,emp_id from employee where emp_username = '".$strusr."' and emp_password = '".$strpass."'  ";
    $query = mysql_query($str)or die (mysql_error());
	$data = mysql_fetch_array($query);
	if($data == ""){		
		return false;
                mysql_close();
        }
	else{
		session_start();
		$_SESSION["loginname"] = $data['emp_fname'];
                $_SESSION["emp_id"] = $data['emp_id'];
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