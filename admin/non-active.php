<?php
include ('include/header.php');
?>





</head>
<!-- END HEAD -->

<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">



<?php
include ('include/sidebar.php');



//--------------------->> Page Number
$page= isset($_GET["page"]);
if($page<="0" || $page==""){
$page = 1;
}
$start = $page*30-30;
//--------------------->> Page Number
$ttl = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM users"));
$tpg = ceil($ttl[0]/30);
?>
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
<!-- BEGIN CONTENT BODY -->
<div class="page-content">
<!-- BEGIN PAGE HEADER-->

<!-- BEGIN PAGE TITLE-->
<h3 class="page-title"><i class="fa fa-users"></i> View FREE USERS <small></small></h3>
<hr>
<!-- END PAGE TITLE-->
<!-- END PAGE HEADER-->




<div class="portlet box blue">
<div class="portlet-title">
<div class="caption">
<i class="fa fa-file"></i>PAGE # <?php echo $page; ?> OF <?php echo $tpg; ?> </div>
</div>

<div style="display: block;" class="portlet-body">
<div class="table-responsive">
<table class="table table-bordered">

<thead>

<tr>
<th> UserName </th>
<th> Ref By </th>
<th> Position </th>
<th> Activate Code </th>
<th> EDIT </th>
</tr>

</thead><tbody>

<?php
$ddaa = mysql_query("SELECT mid, refid, posid, position, username, mallu, vercode FROM users WHERE paid_status='0' ORDER BY mid DESC LIMIT ".$start.",30");
echo mysql_error();
while ($data = mysql_fetch_array($ddaa)){


$refBy = mysql_fetch_array(mysql_query("SELECT username FROM users WHERE mid='".$data[1]."'"));
$posUnder = mysql_fetch_array(mysql_query("SELECT username FROM users WHERE mid='".$data[2]."'"));


echo "                                
<tr>

	<td>$data[4]</td>
	<td>$refBy[0]</td>
	<td>$posUnder[0] - $data[3]</td>

	<td><b>$data[vercode]</b></td>
	<td><a href='editusr.php?userid=$data[0]' class='btn btn-primary btn-block'>EDIT</a></td>

</tr>";

}
?>



</tbody> </table>
</div>
</div>
</div>



<div class="row">								
<div class="col-md-8 col-md-offset-2">								
<?php
//-----------------------previous	
$prevnum=$page-1;
$prev ="<a class=\"btn btn-success btn-md\" href=\"?page=$prevnum\">PREV</a>&nbsp;&nbsp;&nbsp;";
if($page<="1"){
$prev ="";
}
//-----------------------previous

//-----------------------NEXT	
$nextnum=$page+1;
$next ="&nbsp;&nbsp;&nbsp;<a class=\"btn btn-success btn-md\" href=\"?page=$nextnum\">NEXT</a>";
$stlast = $start+30;
if($stlast>=$ttl[0]){
$next ="";
}
//-----------------------NEXT

echo " <div class=\"row\">  ";
echo " <div class=\"col-md-2\">  ";

echo "$prev";

echo " </div><div class=\"col-md-2\">  ";

echo "<b class=\"pull-right\">JUMP TO:</b> 
</div><div class=\"col-md-3\"> 
<form action=\"\" method=\"get\">
<input type=\"number\" class=\"form-control\" placeholder=\"Page Number\" name=\"page\">
</div><div class=\"col-md-2\"> 
<button type=\"submit\" class=\"btn btn-primary btn-md\">go</button>
</form>

";
echo " </div><div class=\"col-md-2\">  ";

echo "$next";
echo " </div>";
echo " </div>";

?>







</div>									
</div>									
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

</body>
</html>