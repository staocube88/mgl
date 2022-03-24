
	<div class="wrapper">
		<!--=== Header v5 ===-->
		<div class="header-v5 header-static">




<?php 
$wcmsg = mysql_fetch_array(mysql_query("SELECT wcmsg FROM general_setting WHERE id='1'"));
?>

<!-- Topbar v3 -->
<div class="topbar-v3">
<div class="container">
<div class="row">
<marquee behavior="scroll" direction="left" style="color:#fff;"><?php echo $wcmsg[0]; ?></marquee>
</div>
</div>
</div>
<!-- End Topbar v3 -->





<!-- Navbar -->
<div class="navbar navbar-default mega-menu" role="navigation">
<div class="container">
<!-- Brand and toggle get grouped for better mobile display -->
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="<?php echo $fronturl; ?>">
<img id="logo-header" src="assets/img/logo.png" alt="Logo">
</a>
</div>





<!-- Shopping Cart -->
<div class="shop-badge badge-icons pull-right">
<a href="#"><i class="fa fa-user"></i></a>
<div class="badge-open">
<div class="subtotal">
<div class="row">
<div class="col-xs-6">
<a href="register" class="btn-u btn-brd btn-brd-hover btn-u-sea-shop btn-block">Register</a>
</div>
<div class="col-xs-6">
<a href="login" class="btn-u btn-u-sea-shop btn-block">Login</a>
</div>
</div>
</div>
</div>
</div>
<!-- End Shopping Cart -->










<div class="collapse navbar-collapse navbar-responsive-collapse pull-right">
<ul class="nav navbar-nav">

<li style="float:left;"><a href="">Home</a></li>

</ul>
</div>




</div>
</div>
<!-- End Navbar -->
</div>
<!--=== End Header v5 ===-->


