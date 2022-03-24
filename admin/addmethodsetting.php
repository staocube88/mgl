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
                    <h3 class="page-title"> PM Setting
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

$pp = mysql_real_escape_string($_POST["pp"]);
$pm = mysql_real_escape_string($_POST["pm"]);
$pms = mysql_real_escape_string($_POST["pms"]);









$error = 0;


if ($error == 0){
	
$res = mysql_query("UPDATE general_setting SET pp='".$pp."',pmuid='".$pm."', pmsec='".$pms."' WHERE id='1'");
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

Name Can Not be Empty!!!

</div>";
}		
	
}


}


$old = mysql_fetch_array(mysql_query("SELECT pp, pmuid, pmsec FROM general_setting WHERE id='1'"));

?>										
										
										
										
										
					                   
                                        
                    <div class="form-group">
                    <label class="col-md-3 control-label"><strong>PayPal Email</strong></label>
                    <div class="col-md-6">
                     <input class="form-control input-lg" name="pp" value="<?php echo $old[0]; ?>" type="text">
                    </div>
                    </div>

                     
                     
                                        
                                        
                    <div class="form-group">
                    <label class="col-md-3 control-label"><strong>Perfect Money USD Account</strong></label>
                    <div class="col-md-6">
                     <input class="form-control input-lg" name="pm" value="<?php echo $old[1]; ?>" type="text">
                    </div>
                    </div>

                     
                     
                     					
										
					<div class="form-group">
                    <label class="col-md-3 control-label"><strong>Perfect Money Secret Code</strong></label>
                    <div class="col-md-6">
                     <input class="form-control input-lg" name="pms" value="<?php echo $old[2]; ?>" type="text">
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