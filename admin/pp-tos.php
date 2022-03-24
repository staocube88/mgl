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
                    <h3 class="page-title"> Policy and Terms<small></small></h3>
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

$pp = $_POST["pp"];
$tos = $_POST["tos"];

$err1=0;
$err2=0;


if(trim($pp)==""){
$err1=1;
}

if(trim($tos)==""){
$err2=1;
}

$error = $err1+$err2;


if ($error == 0){
	
$res = mysql_query("UPDATE general_setting SET terms='".$tos."', policy='".$pp."' WHERE id='1'");
echo mysql_error();
if($res){
	
	
echo "<div class=\"alert alert-success alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	

Updated Successfully! 

</div>";
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

Privacy Policy Can Not be Empty!!!

</div>";
}		
	
if ($err2 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	

Terms of Service Can Not be Empty!!!

</div>";
}		

	

}


}


$old = mysql_fetch_array(mysql_query("SELECT policy, terms FROM general_setting WHERE id='1'"));


?>										
										
										
										
										
										
					 
                     
                    <div class="form-group">
                    <label class="col-md-2"><strong>Privacy Policy</strong></label>
                    <div class="col-md-10">
                    <textarea id="shaons" class="form-control" rows="10" name="pp"><?php echo $old[0]; ?></textarea>
                    </div>
                    </div>
 
 					 
					<div class="form-group">
                    <label class="col-md-2"><strong>Terms of Service</strong></label>
                    <div class="col-md-10">
                    <textarea id="abirs" class="form-control" rows="10" name="tos"><?php echo $old[1]; ?></textarea>
                    </div>
                    </div>
 
 
 <div style="margin-top:60px;"></div>
 
 

					 
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