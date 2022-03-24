<?php
include ('include/header.php');
?>
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap-summernote/summernote.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->


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
                    <h3 class="page-title"> Remove Balance From User
                        <small></small>
                    </h3>
                    <!-- END PAGE TITLE-->

					<hr>

					
					
					
					
					
			<div class="row">
			<div class="col-md-12">
                            <!-- BEGIN SAMPLE FORM PORTLET-->
                            <div class="portlet light bordered">
                                
                                <div class="portlet-body form">
                                    <form class="form-horizontal" action="" method="post" role="form">
                                        <div class="form-body">

		   
<?php

if($_POST)
{

$username = mysql_real_escape_string($_POST["username"]);
$amount = mysql_real_escape_string($_POST["amount"]);


$err1=0;
$err2=0;


$exist = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM users WHERE username='".$username."'"));

if($exist[0]!=1)
      {
$err1=1;
}

if($amount<=0){
    $err2=1;
}



$error = $err1+$err2;


if ($error == 0){





$midOfUsername = mysql_fetch_array(mysql_query("SELECT mid FROM users WHERE username='".$username."'"));


$cbal = mysql_fetch_array(mysql_query("SELECT mallu FROM users WHERE mid='".$midOfUsername[0]."'"));
$newbal = $cbal[0]-$amount;
$res = mysql_query("UPDATE users SET mallu='".$newbal."' WHERE mid='".$midOfUsername[0]."'");
echo mysql_error();
if($res){
	
	
echo "<div class=\"alert alert-success alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	
$amount USD Successfully Removed FROM $username ! <br>
Balance Updated $cbal[0] USD TO $newbal USD 
</div>";



$a1 = date("ymdH", time());
$a2 = rand(1000,9999);
$txn_id = "$a1$a2";

$des = "Fund Removed By Admin";
////------------------------------>>>>>>>>>TRX
mysql_query("INSERT INTO trx SET usid='".$midOfUsername[0]."', trx='".$txn_id."', tm='".time()."', description='".$des."', amount='-".$amount."', nbal='".$newbal."'");
////------------------------------>>>>>>>>>TRX









}else{
	echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	

Some Problem Occurs, Please Try Again. 

</div>";
}
} else {
	
if ($err1 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>    

User $email NOT FOUND !!!

</div>";
}       
    
if ($err2 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	

Amount Should Be a Positive Number!!!

</div>";
}		
	
}




}

?>										
										
										
										
										
										
                                        
                    <div class="form-group">
                    <label class="col-md-3 control-label"><strong>Username</strong></label>
                    <div class="col-md-6">
                     <input class="form-control input-lg" name="username" placeholder="" type="text">
                    </div>
                    </div>

                     
										
					<div class="form-group">
                    <label class="col-md-3 control-label"><strong>AMOUNT</strong></label>
                    <div class="col-md-6">

                    <div class="input-group mb15">
                      <input class="form-control input-lg" name="amount" placeholder="" type="text">
                      <span class="input-group-addon">USD</span>
                    </div>


                    </div>
                    </div>



					 
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-6">
                                                    <button type="submit" class="btn blue btn-block">Submit</button>
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

        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-markdown/lib/markdown.js" type="text/javascript"></script>
        <script src="./assets/global/plugins/bootstrap-markdown/js/bootstrap-markdown.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-summernote/summernote.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <script>
        
    
        
        </script>
        
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="assets/pages/scripts/components-editors.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->

</body>
</html>