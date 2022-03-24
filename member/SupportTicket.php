<?php 
$pgtitle = "Support Ticket";
include('include-header.php');
?>


<!-- BEGIN PAGE LEVEL PLUGINS -->
<link href="<?php echo $adminurl; ?>/assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $adminurl; ?>/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL PLUGINS -->
<link href="<?php echo $adminurl; ?>/assets/global/css/components-rounded.min.css" rel="stylesheet" id="style_components" type="text/css" />


<style>
	
	
.dt-buttons {
    float: right !important;
    margin-top: -64px;

</style>





</head>
<body class="header-fixed">


<?php
include('include-navbar.php');
?>


<!--=== Breadcrumbs v4 ===-->
<div class="breadcrumbs-v4">
<div class="container">
<span class="page-name">&nbsp;</span>
<h1>Support   <span class="shop-green">Ticket</span></h1>
</div><!--/end container-->
</div>
<!--=== End Breadcrumbs v4 ===-->




<!--=== Registre ===-->
<div class="log-reg-v3 content-md margin-bottom-30">
<div class="container">
<div class="row">





















<div class="col-md-12">


<!-- BEGIN EXAMPLE TABLE PORTLET-->
<div class="portlet light bordered">
<div class="portlet-title">
<div class="caption font-dark">
<span class="caption-subject bold uppercase"> My Tickets</span>
        <a href="<?php echo $baseurl; ?>/OpenTicket" class="btn btn-success btn-md">Open New Ticket</a>
</div>
<div class="tool"> </div>
</div>
<div class="portlet-body">
<table class="table table-striped table-bordered table-hover" id="sample_1">
<thead>



<tr>
<th> SL# </th>
<th> Ticket ID </th>
<th> Subject </th>
<th> Raised On </th>
<th> Status </th>
<th> View </th>
</tr>

</thead><tbody>

<?php


$i = 1;
$ddaa = mysql_query("SELECT tid, subject, tm, status FROM ticket_main WHERE usid='".$uid."' ORDER BY id DESC");
while ($data = mysql_fetch_array($ddaa))
{


$sl = str_pad($i, 4, '0', STR_PAD_LEFT);

$dtm = date("Y-m-d H:i:s", $data[2]);

if($data[3]==0){
    $sts = "<b style='color:green;'> OPEN </b>";
}elseif($data[3]==1){
    $sts = "<b style='color:blue;'> ANSWERED </b>";
}elseif($data[3]==2){
    $sts = "<b style='color:orange;'> USER REPLY </b>";
}elseif($data[3]==9){
    $sts = "<b style='color:red;'> CLOSED </b>";
}




echo "                                
<tr>

<td>$sl</td>
<td>$data[0]</td>
<td>$data[1]</td>
<td>$dtm</td>
<td>$sts</td>
<td><a href=\"$baseurl/ViewTicket/$data[0]\" class='btn btn-primary btn-xs'> <i class='fa fa-desktop'></i> VIEW</a></td>




</tr>";

$i++;
}


?>                                           

</tbody>
</table>
</div>
</div>
<!-- END EXAMPLE TABLE PORTLET-->

</div>



















<div style="margin-top:100px;"></div>




</div><!--/end row-->
</div><!--/end container-->
</div>
<!--=== End Registre ===-->

<?php
include("include-footer.php");
?>


        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo $adminurl; ?>/assets/global/scripts/datatable.js" type="text/javascript"></script>
        <script src="<?php echo $adminurl; ?>/assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
        <script src="<?php echo $adminurl; ?>/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
		
		 <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo $adminurl; ?>/assets/pages/scripts/table-datatables-buttons.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->




</body>
</html>