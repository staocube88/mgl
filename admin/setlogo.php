<?php
include ('include/header.php');
if($usid[2]!=100){
redirect('home.php');
}
?>

</head>
<body class="page-header-fixed page-sidebar-closed-hide-logo">


<?php
include ('include/sidebar.php');
?>

 

		
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                   
                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title"> Set Logo
                        <small></small>
                    </h3>
                    <!-- END PAGE TITLE-->

					<hr>





    <?php
    
if($_POST)
{

// IMAGE UPLOAD //////////////////////////////////////////////////////////
    $folder = "../member/assets/img/";
    $extention = strrchr($_FILES['bgimg']['name'], ".");
    $new_name = "logo";
    $bgimg = $new_name.'.png';
    $uploaddir = $folder . $bgimg;
    move_uploaded_file($_FILES['bgimg']['tmp_name'], $uploaddir);
//////////////////////////////////////////////////////////////////////////


}
?>

<div class="row">
<div class="col-md-6">

<form action="" method="post" enctype="multipart/form-data" >
                 
            <div class="form-group">
              <div class="col-sm-12"><input name="bgimg" type="file" id="bgimg" /></div>
              <input name="abir" type="hidden" value="bgimg" />
              <br>
              <br>
              <div class="col-sm-6"> <button type="submit" class="btn btn-primary btn-block">UPLOAD</button></div>
            </div>
                
          </form>

</div>

          
        <div class="col-md-6">  
        
Current Image : <br/><br/><br/><img src="../member/assets/img/logo.png"  alt="IMG">
</div></div>


<?php
include ('include/footer.php');
?>


</body>
</html>