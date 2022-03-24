<?php 
$pgtitle = "Binary Summery";
include('include-header.php');
?>

</head>
<body class="header-fixed">


<?php
include('include-navbar.php');
?>


<!--=== Breadcrumbs v4 ===-->
<div class="breadcrumbs-v4">
<div class="container">
<span class="page-name">&nbsp;</span>
<h1>Binary  <span class="shop-green">Summery</span></h1>
</div><!--/end container-->
</div>
<!--=== End Breadcrumbs v4 ===-->




<!--=== Registre ===-->
<div class="log-reg-v3 content-md margin-bottom-30">
<div class="container">
<div class="row">








<?php 
$cbv = mysql_fetch_array(mysql_query("SELECT lbv, rbv FROM member_bv WHERE mid='".$uid."'"));
?>
<div class="col-md-8 col-md-offset-2 col-sm-12">
<div class="panel panel-primary">
<div class="panel-heading"> <h1 style="color:#fff;">Your Current BV</h1></div>
<div class="panel-body">
<div class="row">
<div class="col-md-6">
<b class="btn btn-success btn-block btn-lg"> LEFT SIDE <br><?php echo $cbv[0]; ?></b>
</div>	
<div class="col-md-6">
<b class="btn btn-info btn-block btn-lg"> RIGHT SIDE <br><?php echo $cbv[1]; ?></b>
</div>	
</div>
</div>
</div><div style="margin-top:60px;"></div>
</div>


<?php 
$bmmbr = mysql_fetch_array(mysql_query("SELECT lpaid, rpaid, lfree, rfree FROM member_below WHERE mid='".$uid."'"));
?>
<div class="col-md-8 col-md-offset-2 col-sm-12">
<div class="panel panel-primary">
<div class="panel-heading"> <h1 style="color:#fff;"> PAID Member On Your Tree</h1></div>
<div class="panel-body">
<div class="row">
<div class="col-md-6">
<b class="btn btn-success btn-block btn-lg"> LEFT SIDE <br><?php echo $bmmbr[0]; ?></b>
</div>	
<div class="col-md-6">
<b class="btn btn-info btn-block btn-lg"> RIGHT SIDE <br><?php echo $bmmbr[1]; ?></b>
</div>	
</div>
</div>
</div><div style="margin-top:60px;"></div>
</div>


<?php 
$cbv = mysql_fetch_array(mysql_query("SELECT lbv, rbv FROM member_bv WHERE mid='".$uid."'"));
?>
<div class="col-md-8 col-md-offset-2 col-sm-12">
<div class="panel panel-primary">
<div class="panel-heading"> <h1 style="color:#fff;"> FREE Member On Your Tree</h1></div>
<div class="panel-body">
<div class="row">
<div class="col-md-6">
<b class="btn btn-success btn-block btn-lg"> LEFT SIDE <br><?php echo $bmmbr[2]; ?></b>
</div>	
<div class="col-md-6">
<b class="btn btn-info btn-block btn-lg"> RIGHT SIDE <br><?php echo $bmmbr[3]; ?></b>
</div>	
</div>
</div>
</div>
</div>









</div><!--/end row-->
</div><!--/end container-->
</div>
<!--=== End Registre ===-->

<div style="margin-top:230px;"></div>
<?php
include("include-footer.php");
?>
</body>
</html>