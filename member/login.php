<?php 
$pgtitle = "Login";
include('include-header-nuser.php');
?>


<style>
	
.slow-spin {
  -webkit-animation: fa-spin 2s infinite linear;
  animation: fa-spin 2s infinite linear;
}

</style>

</head>
<body class="header-fixed">


<?php
include('include-navbar-nuser.php');
?>


<!--=== Breadcrumbs v4 ===-->
<div class="breadcrumbs-v4">
<div class="container">
<span class="page-name">&nbsp;</span>
<h1>Account  <span class="shop-green">Login</span></h1>
</div><!--/end container-->
</div>
<!--=== End Breadcrumbs v4 ===-->








<!--=== Registre ===-->
<div class="log-reg-v3 content-md margin-bottom-30">
<div class="container">
<div class="row">










		<div class="col-md-6 col-md-offset-3">





<form novalidate="novalidate" id="login-form" class="log-reg-block sky-form" action="" method="post">
<h2>Log in to your account</h2>

<section>

<div class="input-group">
<span class="input-group-addon"><i class="fa fa-user"></i></span>
<input placeholder="User Name" name="username" class="form-control" type="text" required="">
</div>

</section>


<section>
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-lock"></i></span>
<input placeholder="Password" name="password" class="form-control" type="password" required="">
</div>

</section>


<div class="row margin-bottom-5">
<div class="col-xs-6">
<label class="checkbox">
<input name="checkbox" type="checkbox">
<i></i>
Remember me
</label>
</div>
<div class="col-xs-6 text-right">
<a href="<?php echo "$baseurl/ForgotPassword"; ?>">Forgot Password?</a>
</div>
</div>
<button class="btn-u btn-u-sea-shop btn-block margin-bottom-20" type="submit" id="btn-login">Log in</button>


<div id="working"></div>
<div id="error">
<!-- error will be shown here ! -->
</div>


</div>

</form>


<div class="margin-bottom-20"></div>
<p class="text-center">Don't have account yet? Lets <a href="<?php echo "$baseurl/register"; ?>">Sign Up</a></p>





</div>




</div><!--/end row-->
</div><!--/end container-->
</div>
<!--=== End Registre ===-->


<div style="min-height:200px;"></div>



<?php 
include('include-footer.php');
?>


<script>
	
$(document).ready(function () {
  
setTimeout(function(){ 
          	    $("#load").hide();
           $("#result").show();
			
				}, 2000);

 });












$('document').ready(function()
{ 
     /* validation */
  $("#login-form").validate({
      rules:
   {
   password: {
   required: true,
   },
   username: {
            required: true,

            },
    },
       messages:
    {
            password:{
                      required: ""
                     },
            username: "",
       },
    submitHandler: submitForm 
       });  
    /* validation */
    
    /* login submit */
    function submitForm()
    {  
   var data = $("#login-form").serialize();
    
   $.ajax({
    
   type : 'POST',
   url  : 'checklogin.php',
   data : data,
   beforeSend: function()
   { 
    $("#error").fadeOut();
    $("#working").html('<div class="alert alert-info"><h4 class="block" style="font-weight: bold;">  <i class = "fa fa-spinner fa-2x slow-spin"></i>  Validating Your Data.... </h4></div>');
   },
   success :  function(response)
      {      
     if(response=="ok"){
         
      $("#working").html('<div class="alert alert-success alert-dismissable"><h4 class="block"> <i class="fa fa-check"></i> &nbsp; Success! Redirecting to Dashboard...</h4></div>');
      setTimeout(' window.location.href = "dashboard"; ',4000);
     }
     else{
         
      $("#error").fadeIn(1000, function(){      
    $("#error").html('<div class="alert alert-danger"> <i class="fa fa-times"></i> &nbsp; '+response+' !</div>');
           $("#working").html('');
         });
     }
     }
   });
    return false;
  }
    /* login submit */
});

</script>




</body>
</html>
