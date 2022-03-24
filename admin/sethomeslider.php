<?php
include ('include/header.php');
?>
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap-summernote/summernote.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->


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
                    <h3 class="page-title"><i class="fa fa-edit"></i> SET Home Sliders
                        <small></small>
                    </h3>
                    <!-- END PAGE TITLE-->

          <hr>

          
          
          
          
          
      <div class="row">
      <div class="col-md-12">
                            <!-- BEGIN SAMPLE FORM PORTLET-->
                            <div class="portlet light bordered">
                                

     
<?php

if($_POST)
{
$err1 = 0;

if (empty($_FILES['bgimg']['name'])) {
$err1 = 1;
}else{
// IMAGE UPLOAD //////////////////////////////////////////////////////////
    $folder = "../slider/";
    $extention = strrchr($_FILES['bgimg']['name'], ".");
    $new_name = time();
    $bgimg = $new_name.'.jpg';
    $uploaddir = $folder . $bgimg;
    move_uploaded_file($_FILES['bgimg']['tmp_name'], $uploaddir);

    //------------------>>> RESIZE
include_once("abirimageclass.php");
$target_file = $folder.$bgimg;
$resized_file = $folder.$bgimg;
$wmax = 1920;
$hmax = 600;
$ext = ".jpg";
ak_img_resize($target_file, $resized_file, $wmax, $hmax, $ext);


//------------------>>> RESIZE
//////////////////////////////////////////////////////////////////////////
}

$error = $err1;


if ($error == 0){

$res = mysql_query("INSERT INTO slider_home SET img='".$bgimg."'");
echo mysql_error();
if($res){

echo "<div class=\"alert alert-success alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
New Slider Added Successfully! 
</div>";
}else{

echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>    
Some Problem Occurs, Please Try Again. 
</div>";
}
}else{
if ($err1 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>    

SLIDER IMAGE IS REQUIRED!!!

</div>";
} 

}
}

?>                  
                    
                    
    
                                <div class="portlet-body form">
                                    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">

                                        <div class="form-body"> 
                
     
                        <div class="form-group">
              <label class="col-sm-3 control-label"><strong>SLIDER IMAGE</strong></label>
              <div class="col-sm-3"><input type="file" name="bgimg"></div>
              <div class="col-sm-3"><b style="color:red; font-weight: bold;">.jpg Image Only || Will Resized To 1920 X 600</b></div>
          
                 </div>
             
<input type="hidden" name="aa" value="0">
        
           
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-6">
                                                    <button type="submit" class="btn blue btn-block">ADD NEW</button>
                                                </div>
                                            </div>
                      
                                        </div>
                                    </form>
                                </div>
                            </div>




<?php


          
//------------------------------------------->>> DELETE             

if(isset($_GET['did'])) {
$did = $_GET["did"];
$exist = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM slider_home WHERE id='".$did."'"));
if($exist[0]>=1){
    
$res = mysql_query("DELETE FROM slider_home WHERE id='".$did."'");

if($res){
echo "<div class=\"alert alert-success alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>    
DELETED Successfully! 
</div>";
}else{
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>    
Some Problem Occurs, Please Try Again. 
</div>";
}
}else{
    /*
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>    
NOT FOUND IN DATABASE (MAY ALREADY DELETED)
</div>";
*/
}   
}
//------------------------------------------->>> DELETE         



$ddaa = mysql_query("SELECT id, img FROM slider_home ORDER BY id");
echo mysql_error();
    while ($data = mysql_fetch_array($ddaa))
    {

echo "<div class=\"col-md-6 col-sm-12\">

<img src=\"../slider/$data[1]\" alt=\"IMG\" style=\"width:100%; height:260px;\"><br/>


<a href=\"?did=$data[0]\" class='btn purple btn-block'>DELETE</a>
<br><br><br><br>
</div>";





}
?>                    
                        </div>    
                        </div><!---ROW-->   





          
          
          
          
          
          
      
          
          
          
          
          
          
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
            
      


<?php
 include ('include/footer.php');
 ?>

        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-markdown/lib/markdown.js" type="text/javascript"></script>
        <script src="./assets/global/plugins/bootstrap-markdown/js/bootstrap-markdown.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-summernote/summernote.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <script>
        
    
        
        </script>
        
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="assets/pages/scripts/components-editors.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
<script src="http://www.appelsiini.net/projects/chained/jquery.chained.js"></script>
<script>
    $("#subcat").chained("#cat");
$("#child").chained("#subcat");
</script>
</body>
</html>