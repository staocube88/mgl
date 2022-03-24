<?php
include ('include/header.php');
?>

        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
		
		
		
		</head>
    <!-- END HEAD -->

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        
		
	
<?php
include ('include/sidebar.php');
?>
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    
                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title"> ADD MONEY LOG <small></small></h3>
					<hr>
                    <!-- END PAGE TITLE-->
                    <!-- END PAGE HEADER-->
       			
					
					
                    <div class="row">
                        <div class="col-md-12">
                            
							
							<!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <!--i class="icon-settings font-dark"></i>
                                        <span class="caption-subject bold uppercase">AAA</span-->
                                    </div>
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-hover" id="sample_1">
                                        <thead>

										
										
<tr>
<th> USER </th>
<th> AMOUNT </th>
<th> METHOD</th>
<th> TRX ID </th>
<th> TIME </th>
</tr>

</thead><tbody>

<?php
$ddaa = mysql_query("SELECT id, usid, trx, tm, amount, method FROM add_bal ORDER BY id");
    echo mysql_error();
    while ($data = mysql_fetch_array($ddaa))
    {

$userdet = mysql_fetch_array(mysql_query("SELECT fname, lname, email FROM users WHERE mid='".$data[1]."'"));

$dtm = date("Y-m-d H:i:s", $data[3]);
 echo "                                
 <tr>
 
   <td>$userdet[0] $userdet[1] ($userdet[2]) </td>
   <td>$data[4] USD</td>
   <td>$data[5]</td>
   <td>$data[2]</td>
   <td>$dtm</td>
   


</tr>";
	
	}
	
//$edt = "<a href=\"editcat.php?id=$data[0]\"><button class=\"btn purple btn-xs\"> <i class=\"fa fa-edit\"></i> EDIT</button></a>";
	
?>
				
			

                                            

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                            
                        </div>
                    </div><!-- ROW-->
					
					
					
					
					
			
			
		
					
					
					
					
					
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
            
            
			
			
			
			
			
			
			
			
			
			
			
			
			
			
		
      <?php
 include ('include/footer.php');
 ?>
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="assets/global/scripts/datatable.js" type="text/javascript"></script>
        <script src="assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
		
		 <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="assets/pages/scripts/table-datatables-buttons.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
 
 </body>
</html>