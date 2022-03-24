<?php 
$pgtitle = "HOME";
include('include-header.php');
?>

</head>
<body class="header-fixed">


<?php
include('include-navbar.php');
?>


	<!--=== Slider ===-->
		<div class="tp-banner-container">
			<div class="tp-banner">
				<ul>
<?php 

$ddaa = mysql_query("SELECT img FROM slider_home ORDER BY id");
    while ($data = mysql_fetch_array($ddaa))
    {

?>


<!-- SLIDE -->
<li class="revolution-mch-1" data-transition="fade" data-slotamount="5" data-masterspeed="1000" data-title="Slide 2">
<!-- MAIN IMAGE -->
<img src="slider/<?php echo $data[0];?>"  alt="darkblurbg"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
</li>
<!-- END SLIDE -->

<?php
}
?>





</ul>
<div class="tp-bannertimer tp-bottom"></div>
</div>
</div>
<!--=== End Slider ===-->










<!--=== Product Content ===-->
<div class="container content-md">


<div class="row margin-bottom-60">
<?php 
$htxt = mysql_fetch_array(mysql_query("SELECT btext FROM menus WHERE id='1'"));

echo "$htxt[0]";
?>

</div>










<div class="row margin-bottom-60">

			<div class="col-md-4 product-service md-margin-bottom-30">
			<div class="product-service-heading">
			<i class="fa fa-dollar"></i>
			</div>
			<div class="product-service-in">
			<h3>Bonus Income</h3>
			<p>Get Referral and Binary Bonus</p>
			</div>
			</div>

			<div class="col-md-4 product-service md-margin-bottom-30">
			<div class="product-service-heading">
			<i class="fa fa-users"></i>
			</div>
			<div class="product-service-in">
			<h3>Easy To Join</h3>
			<p>Our site is Very User Friendly. You will Enjoy</p>
			</div>
			</div>

			<div class="col-md-4 product-service md-margin-bottom-30">
			<div class="product-service-heading">
			<i class="fa fa-credit-card"></i>
			</div>
			<div class="product-service-in">
			<h3>Fund Transfar</h3>
			<p>You can transfar your fund very easily</p>
			</div>
			</div>




</div>




<div class="row margin-bottom-60">

			<div class="col-md-4 product-service md-margin-bottom-30">
			<div class="product-service-heading">
			<i class="fa fa-money"></i>
			</div>
			<div class="product-service-in">
			<h3>Fund Withdrawal</h3>
			<p>Withdraw your income in just one click</p>
			</div>
			</div>

			<div class="col-md-4 product-service md-margin-bottom-30">
			<div class="product-service-heading">
			<i class="fa fa-tree"></i>
			</div>
			<div class="product-service-in">
			<h3>Genealogy Tree</h3>
			<p>we have easy understandable Tree </p>
			</div>
			</div>

			<div class="col-md-4 product-service md-margin-bottom-30">
			<div class="product-service-heading">
			<i class="fa fa-heart"></i>
			</div>
			<div class="product-service-in">
			<h3>Your Trust is Our responsibility</h3>
			<p></p>
			</div>
			</div>




</div>






</div>

<!--=== End Product Content ===-->


















<?php 
include('include-footer.php');
?>


</body>
</html>
