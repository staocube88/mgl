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
                    <h3 class="page-title"> SET Charge/Commision
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

$tcrg = $_POST["tcrg"];
$wcrg = $_POST["wcrg"];
$uc = $_POST["uc"];
$comitree = $_POST["comitree"];
$comi = $_POST["comi"];


	
$res = mysql_query("UPDATE general_setting SET tcrg='".$tcrg."', wcrg='".$wcrg."', comi='".$comi."', uc='".$uc."', comitree='".$comitree."' WHERE id='1'");

if($res){
echo "<div class=\"alert alert-success alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	
UPDATED Successfully! 
</div>";
}else{
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	
Some Problem Occurs, Please Try Again. 
</div>";
}


}


$gen = mysql_fetch_array(mysql_query("SELECT tcrg, wcrg, uc, comitree, comi FROM general_setting WHERE id='1'"));


?>										
										
										
										
										

                     
								
                     
                                        
                    <div class="form-group">
                    <label class="col-md-3 control-label"><strong>Transfer Charge User To User:</strong></label>
                    
                    <div class="col-md-5">
                    <div class="input-group mb15">
                    <input class="form-control input-lg" name="tcrg" value="<?php echo $gen[0]; ?>" type="text">
                    <span class="input-group-addon">%</span>
                     </div>
                    </div>
                    

                    
                    </div>                    
                                        
                    <div class="form-group">
                    <label class="col-md-3 control-label"><strong>Withdraw Charge:</strong></label>
                    
                    <div class="col-md-5">
                    <div class="input-group mb15">
                    <input class="form-control input-lg" name="wcrg" value="<?php echo $gen[1]; ?>" type="text">
                    <span class="input-group-addon">%</span>
                     </div>
                    </div>
                    

                    
                    </div>
                     
                                <hr>
                        
                    
                                        
                    <div class="form-group">
                    <label class="col-md-3 control-label"><strong>UPGRADE Charge:</strong></label>
                    
                    
                    <div class="col-md-5">
                    <div class="input-group mb15">
                    <input class="form-control input-lg" name="uc" value="<?php echo $gen[2]; ?>"  type="text">
                    <span class="input-group-addon">$</span>
                     </div>
                    </div>  

                    
                    </div>
                     
                                         
                    <div class="form-group">
                    <label class="col-md-3 control-label"><strong>UPGRADE Commision To TREE:</strong></label>
                    
                    
                    <div class="col-md-5">
                    <div class="input-group mb15">
                    <input class="form-control input-lg" name="comitree" value="<?php echo $gen[3]; ?>"  type="text">
                    <span class="input-group-addon">$</span>
                     </div>
                    </div>  

                    
                    </div>
                     
                                         
                    <div class="form-group">
                    <label class="col-md-3 control-label"><strong>UPGRADE Commision To Sponsor:</strong></label>
                    
                    
                    <div class="col-md-5">
                    <div class="input-group mb15">
                    <input class="form-control input-lg" name="comi" value="<?php echo $gen[4]; ?>"  type="text">
                    <span class="input-group-addon">$</span>
                     </div>
                    </div>  

                    
                    </div>
                     
                                
                     


					 
										
					
                     


					 
										
				
                     
								
                     


					 
										
					
                     
								
                     


					 
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-5">
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


</body>
</html>