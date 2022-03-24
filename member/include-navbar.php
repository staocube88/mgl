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
<a class="navbar-brand" href="<?php echo $baseurl; ?>">
<img id="logo-header" src="<?php echo $baseurl; ?>/assets/img/logo.png" alt="Logo">
</a>
</div>





<!-- Shopping Cart -->
<div class="shop-badge badge-icons pull-right">
<a href="#"><i class="fa fa-user"></i><span class="hidden-sm hidden-xs"> <?php echo $user; ?></span></a>
<div class="badge-open">
<div class="subtotal">
<div class="row">

<div class="col-xs-12"><br>
<a href="<?php echo $baseurl; ?>/SupportTicket" class="btn-u btn-brd btn-brd-hover btn-u-sea-shop btn-block">
Support Ticket</a><br><br>
</div>

<div class="col-xs-12">
<a href="<?php echo $baseurl; ?>/ChangePassword" class="btn-u btn-brd btn-brd-hover btn-u-sea-shop btn-block">
Change Password</a><br><br>
</div>


<div class="col-xs-12">
<a href="<?php echo $baseurl; ?>/EditProfile" class="btn-u btn-brd btn-brd-hover btn-u-sea-shop btn-block">
Edit Profile</a><br><br>
</div>

<div class="col-xs-12">
<a href="<?php echo $baseurl; ?>/signout" class="btn-u btn-brd btn-brd-hover btn-u-sea-shop btn-block">Logout</a>
</div>




</div>
</div>
</div>
</div>
<!-- End Shopping Cart -->










<div class="collapse navbar-collapse navbar-responsive-collapse">
<ul class="nav navbar-nav">


<li><a href="<?php echo $baseurl; ?>/dashboard">Dashboard</a></li>

<li class="dropdown">
<a href="javascript:void(0);" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">Markteing</a>
<ul class="dropdown-menu">

<li><a href="<?php echo $baseurl; ?>/BinarySummery">Binary Summery</a></li>
<li><a href="<?php echo $baseurl; ?>/Tree">My Tree</a></li>
<li><a href="<?php echo $baseurl; ?>/RefByMe">My Referral</a></li>

</ul>
</li>



<li class="dropdown">
<a href="javascript:void(0);" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">My Income</a>
<ul class="dropdown-menu">

<li><a href="<?php echo $baseurl; ?>/ReferralBonus">Referral Commission</a></li>
<li><a href="<?php echo $baseurl; ?>/BinaryBonus">Binary commission</a></li>


</ul>
</li>



<li class="dropdown">
<a href="javascript:void(0);" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">
Finance [ ₦<?php echo $mallu; ?>]</a>
<ul class="dropdown-menu">

<li><a href="<?php echo $baseurl; ?>/AddFund">Add Fund</a></li>
<li><a href="<?php echo $baseurl; ?>/WithdrawFund">Request  Withdraw</a></li>
<li><a href="<?php echo $baseurl; ?>/FundTransfer">Fund Transfer</a></li>
<li><a href="<?php echo $baseurl; ?>/TransactionPIN">Transaction PIN</a></li>
<li><a href="<?php echo $baseurl; ?>/TransactionHistory">Transaction History</a></li>
</ul>
</li>









</ul>
</div>




</div>
</div>
<!-- End Navbar -->
</div>
<!--=== End Header v5 ===-->
