<?php 
$pgtitle = "";
include('include-header.php');
?>



</head>
<body class="header-fixed">


<?php
include('include-navbar.php');

$iidd = mysql_real_escape_string($_GET['id']);
$details = mysql_fetch_array(mysql_query("SELECT name, btext FROM menus WHERE id='".$iidd."'"));


$fst = explode(' ',trim($details[0]));
$lst = substr(strstr($details[0]," "), 1);

?>


<!--=== Breadcrumbs v4 ===-->
<div class="breadcrumbs-v4">
<div class="container">
<span class="page-name">&nbsp;</span>
<h1><?php echo $fst[0]; ?>  <span class="shop-green"><?php echo $lst; ?> </span></h1>
</div><!--/end container-->
</div>
<!--=== End Breadcrumbs v4 ===-->








<!--=== Registre ===-->
<div class="log-reg-v3 content-md margin-bottom-30">
<div class="container">
<div class="row">



<?php 



echo "$details[1]";



 ?>






</div><!--/end row-->
</div><!--/end container-->
</div>
<!--=== End Registre ===-->


<div style="min-height:200px;"></div>



<?php 
include('include-footer.php');
?>




</body>
</html>
