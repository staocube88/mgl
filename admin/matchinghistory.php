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
                    <h3 class="page-title"> Statistics <small>Matching History</small></h3>
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
<th> SL# </th>
<th> UserName </th>
<th> Amount  </th>
<th> Description </th>
<th> Time </th>

</tr>

</thead><tbody>

<?php
$i = 0;
$ddaa = mysql_query("SELECT `usid`, `amount`, `description`, `tm` FROM my_income WHERE typ='B' ORDER BY id");
    echo mysql_error();
    while ($data = mysql_fetch_array($ddaa))
    {
$i++;
$sl = str_pad($i, 5, '0', STR_PAD_LEFT);
$whoGot = mysql_fetch_array(mysql_query("SELECT username FROM users WHERE mid='".$data[0]."'"));
$dtm = date("Y-m-d H:i:s", $data[3]);
 echo "                                
 <tr>
 
    <td>$sl</td>
    <td>$whoGot[0]</td>
    <td>$data[1]</td>
    <td> $data[2] </td>
    <td>$dtm</td>




</tr>";
	
	}
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