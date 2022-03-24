<?php
include ('include/header.php');
?>

</head>
<body class="page-header-fixed page-sidebar-closed-hide-logo">


<?php
include ('include/sidebar.php');
?>

 

        
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                   
                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title"> GENERATE
                        <small>Matching</small>
                    </h3>
                    <!-- END PAGE TITLE-->

                    <hr>



                    
                    

<div class="row">
<div class="col-md-12">
<!-- BEGIN SAMPLE FORM PORTLET-->
<div class="portlet light bordered">

<div class="portlet-body form">
<form class="form-horizontal" action="" method="post" role="form" enctype="multipart/form-data">
<div class="form-body">

           
<?php



if($_POST)
{


$err1=0;


$sure = $_POST["sure"];

if(strtoupper($sure)!="SURE"){
    $err1 = 1;
}



$error = $err1;


if ($error == 0){
$gen = mysql_fetch_array(mysql_query("SELECT comitree FROM general_setting WHERE id='1'"));

////////=================>>>>>>>> GENERATE
$ddaa = mysql_query("SELECT mid, lbv, rbv FROM member_bv WHERE lbv>='1' AND rbv>='1' ORDER BY id DESC");
    while ($data = mysql_fetch_array($ddaa))
    {




$lbv = $data[1];
$rbv = $data[2];
$lowest = ($lbv<$rbv)? $lbv : $rbv;

$bonus = $gen[0]*$lowest;    
$bvp = $lowest;    


//////----------------------->>>>>FLASH
$nlbv = $data[1]-$lowest;
$nrbv = $data[2]-$lowest;
$flash = mysql_query("UPDATE member_bv SET lbv='".$nlbv."', rbv='".$nrbv."' WHERE mid='".$data[0]."'");
//////----------------------->>>>>FLASH

if(!$flash){
echo "<div class=\"alert alert-danger alert-dismissable\">  
ERROR: FLASH NOT EXECUTED -  Contact Developer
</div>";
}





$paidid = mysql_fetch_array(mysql_query("SELECT paid_status FROM users WHERE mid='".$data[0]."'"));


if($paidid[0]==1){

//////////---------------------------------------->>>> ADD THE BALANCE 
$cbal = mysql_fetch_array(mysql_query("SELECT mallu FROM users WHERE mid='".$data[0]."'"));
$newbal = $cbal[0]+$bonus;
$res = mysql_query("UPDATE users SET mallu='".$newbal."' WHERE mid='".$data[0]."'");
//////////---------------------------------------->>>> ADD THE BALANCE

if($res){

$a1 = date("ymdH", time());
$a2 = rand(1000,9999);
$txn_id = "$a1$a2";

$des = "Matching Bonus Of $bvp Users";
////------------------------------>>>>>>>>>TRX
$ttrrxx = mysql_query("INSERT INTO trx SET usid='".$data[0]."', trx='".$txn_id."', tm='".time()."', description='".$des."', amount='".$bonus."', nbal='".$newbal."', acctyp='1'");
////------------------------------>>>>>>>>>TRX

if(!$ttrrxx){
echo "<div class=\"alert alert-danger alert-dismissable\">  
ERROR: TRX LOG NOT CREATED -  Contact Developer
</div>";
}



////------------------------------>>>>>>>>>INCOME
$iinncc = mysql_query("INSERT INTO my_income SET usid='".$data[0]."', amount='".$bonus."', description='".$des."', tm='".time()."', typ='B'");
////------------------------------>>>>>>>>>INCOME


if(!$iinncc){
echo "<div class=\"alert alert-danger alert-dismissable\">  
ERROR: INCOME LOG NOT CREATED -  Contact Developer
</div>";
}




$userDeta = mysql_fetch_array(mysql_query("SELECT username, fname, lname, mobile, email FROM users WHERE mid='".$data[0]."'"));



echo "<div class=\"alert alert-success alert-dismissable\">

<b>$userDeta[0]: </b><br> Get $bonus USD for $bvp Point <br>
Balance Updated FORM  ---- $cbal[0] USD ------- To ---- $newbal USD !

</div>";
}else{
$userDeta = mysql_fetch_array(mysql_query("SELECT username, fname, lname, mobile, email FROM users WHERE mid='".$data[0]."'"));
echo "<div class=\"alert alert-danger alert-dismissable\">  
<b>$userDeta[0]: </b>: Contact Developer<br>
Balance Updated FORM  ---- $cbal[0] USD ------- To ---- $newbal USD !
</div>";
}







}









    }//WHILE


} else {
    
if ($err1 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>    
PLEASE TYPE 'SURE'
</div>";
}       

}




}

$potential = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM member_bv WHERE lbv>='1' AND rbv>='1' ORDER BY id"));
echo "<div class='col-md-6 col-md-offset-3'><h1>POTENTIAL MEMBER: $potential[0]</h1></div>";
?>                                      
                                        
                                        







<div class="form-group">
<div class="col-md-6 col-md-offset-3">
<input class="form-control input-lg" name="sure" type="text" placeholder="Type 'SURE'">
</div>
</div>





<div style="margin-top:20px;"></div>




<div class="row">
<div class="col-md-offset-3 col-md-6">
<button type="submit" class="btn blue btn-lg btn-block">GENERATE NOW</button>
</div>
</div>

</div>
</form>
</div>
</div>
</div>      
</div><!---ROW-->       


                    
                    
                    
                    
            
                    

                    
                    
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
            


<?php
 include ('include/footer.php');
 ?>


</body>
</html>