<?php

require_once('../function.php');
connectdb();





function abirsms($to,$txt){



$sendtext = urlencode("$txt");

$sendsms = "https://api.infobip.com/api/v3/sendsms/plain?user=xpertcash&password=*****&sender=****&SMSText=$sendtext&GSM=$to&type=longSMS";


$result = file_get_contents($sendsms);

}

/////////////////////--------------------------------------------------------------------------------------------->>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>




function abiremail($to,$subject,$uname,$txt){
$general = mysql_fetch_array(mysql_query("SELECT sitetitle, notimail FROM general_setting WHERE id='1'"));

$headers = "From: $general[0] Team <".$general[1]."> \r\n";
$headers .= "Reply-To:  $general[0] Team <".$general[1]."> \r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";




$message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>[SUBJECT]</title>
  <style type="text/css">
    body {
     padding-top: 0 !important;
     padding-bottom: 0 !important;
     padding-top: 0 !important;
     padding-bottom: 0 !important;
     margin:0 !important;
     width: 100% !important;
     -webkit-text-size-adjust: 100% !important;
     -ms-text-size-adjust: 100% !important;
     -webkit-font-smoothing: antialiased !important;
   }
   .tableContent img {
     border: 0 !important;
     display: block !important;
     outline: none !important;
   }
   a{
    color:#382F2E;
  }

  p, h1,h2,ul,ol,li,div{
    margin:0;
    padding:0;
  }

  h1,h2{
    font-weight: normal;
    background:transparent !important;
    border:none !important;
  }

  .contentEditable h2.big,.contentEditable h1.big{
    font-size: 26px !important;
  }

  .contentEditable h2.bigger,.contentEditable h1.bigger{
    font-size: 37px !important;
  }

  td,table{
    vertical-align: top;
  }
  td.middle{
    vertical-align: middle;
  }

  a.link1{
    display:inline-block;
    font-size:13px;
    color:#d15d4d;
    line-height: 24px;
    text-decoration:none;
  }
  a{
    text-decoration: none;
  }

  .link2{
    display:inline-block;
    color:#ffffff;
    border-top:10px solid #d15d4d;
    border-bottom:10px solid #d15d4d;
    border-left:18px solid #d15d4d;
    border-right:18px solid #d15d4d;
    border-radius:3px;
    -moz-border-radius:3px;
    -webkit-border-radius:3px;
    background:#d15d4d;
  }

  .link3{
    display:inline-block;
    color:#555555;
    border:1px solid #cccccc;
    padding:10px 18px;
    border-radius:3px;
    -moz-border-radius:3px;
    -webkit-border-radius:3px;
    background:#ffffff;
  }

  .link4{
    display:inline-block;
    color:#d15d4d;
    line-height: 24px;
  }

  h2,h1{
    line-height: 20px;
  }
  p{
    font-size: 14px;
    line-height: 21px;
    color:#AAAAAA;
  }

  .contentEditable li{

  }

  .appart p{

  }
  .bgItem{
    background: #ffffff;
  }
  .bgBody{
    background: #f8e5d1;
  }

  a:hover{
    color: #d15d4d;
  }

  img { 
    outline:none; 
    text-decoration:none; 
    -ms-interpolation-mode: bicubic;
    width: auto;
    max-width: 100%; 
    clear: both; 
    display: block;
    float: none;
  }

  div{
    line-height: 120%;
  }
  
  @media only screen and (max-width:480px)
        
{
        
table[class="MainContainer"], td[class="cell"] 
    {
        width: 100% !important;
        height:auto !important; 
    }
td[class="specbundle"] 
    {
        width: 100% !important;
        float:left !important;
        font-size:13px !important;
        line-height:17px !important;
        display:block !important;
        padding-bottom:15px !important;
    }   
td[class="specbundle2"] 
    {
        width:90% !important;
        float:left !important;
        font-size:13px !important;
        line-height:17px !important;
        display:block !important;
        padding-bottom:10px !important;
        padding-left:5% !important;
        padding-right:5% !important;
    }
        
td[class="spechide"] 
    {
        display:none !important;
    }
        img[class="banner"] 
    {
              width: 100% !important;
              height: auto !important;
    }
        td[class="left_pad"] 
    {
            padding-left:15px !important;
            padding-right:15px !important;
    }
         
}
    
@media only screen and (max-width:540px) 

{
        
table[class="MainContainer"], td[class="cell"] 
    {
        width: 100% !important;
        height:auto !important; 
    }
td[class="specbundle"] 
    {
        width: 100% !important;
        float:left !important;
        font-size:13px !important;
        line-height:17px !important;
        display:block !important;
        padding-bottom:15px !important;
    }   
td[class="specbundle2"] 
    {
        width:90% !important;
        float:left !important;
        font-size:13px !important;
        line-height:17px !important;
        display:block !important;
        padding-bottom:10px !important;
        padding-left:5% !important;
        padding-right:5% !important;
    }
        
td[class="spechide"] 
    {
        display:none !important;
    }
        img[class="banner"] 
    {
              width: 100% !important;
              height: auto !important;
    }
        td[class="left_pad"] 
    {
            padding-left:15px !important;
            padding-right:15px !important;
    }
    .font{
        font-size:18px !important;
        line-height:23px !important;
        text-align:center !important;
        
        }
        
}

</style>


<script type="colorScheme" class="swatch active">
  {
    "name":"Default",
    "bgBody":"f8e5d1",
    "link":"d15d4d",
    "color":"AAAAAA",
    "bgItem":"ffffff",
    "title":"444444"
  }
</script>


</head>





<body paddingwidth="0" paddingheight="0" bgcolor="f8e5d1"  style="padding-top: 0; padding-bottom: 0; padding-top: 0; padding-bottom: 0; background-repeat: repeat; width: 100% !important; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-font-smoothing: antialiased;" offset="0" toppadding="0" leftpadding="0">

<table width="100%" bgcolor="f8e5d1" border="0" cellspacing="0" cellpadding="0" class="tableContent" align="center"  style="font-family:Helvetica, sans-serif;">
<tbody>
<tr>
<td align="center" height="10" style="background-color: #d15d4d"></td>
</tr>
<tr>
<td height="15"></td>
</tr>
<tr>
<td class="movableContentContainer">


<div class="movableContent" style="border: 0px; padding-top: 0px; position: relative;">
<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" style="font-family:Helvetica, sans-serif;">
<tr><td height="20"></td></tr>
<tr>
<td>
<table width="600" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff" align="center" style="border-radius:6px;-moz-border-radius:6px;-webkit-border-radius:6px" class="MainContainer">
<tr>



<td align="left">

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td valign="top" width="20">&nbsp;</td>
<td><table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
<tr><td height="20" colspan="3"></td></tr>
<tr>
<td align="center">
<table width="100%" border="0" cellpadding="0" cellspacing="0" style="border-radius:6px;-moz-border-radius:6px;-webkit-border-radius:6px; ">
<tr><td height="20" colspan="3"></td></tr>
<tr>
<td width="35"></td>
<td>
<div class="contentEditableContainer contentTextEditable">
<div class="contentEditable" style="text-align: left;">




<div class="contentEditableContainer contentImageEditable">
<div class="contentEditable">
<a target="_blank" href="http://idealbrothers.thesoftking.com/mlm/member">
<img src="http://idealbrothers.thesoftking.com/mlm/member/assets/img/logo.png" alt="Logo" style="width:360px;" ></a>
</div>
</div>
<br/><br/><br/><br/>


<h2 style="font-size: 20px;">Hi 


';

$message .= $uname;





$message .= ', </h2><br/><p>';


$message .= $txt;





$message .= '
</p>


<br><br><br>
<strong>Thanks,<br>';


$message .= $general[0];



$message .= ' Team</strong>
 <br><br><br>
<p style="color:red; text-align: center;">Please Do Not Reply To this Mail. Your Reply Will Go Nowhere!</p>



</div>
</div>
</td>
<td width="35"></td>
</tr>
<tr><td height="20" colspan="3"></td></tr>
</table>
</td>
</tr>
<tr><td height="20" colspan="3"></td></tr>
</table></td>
<td valign="top" width="20">&nbsp;</td>
</tr>
</table>

</td>
</tr>
</table>
</td>
</tr>
</table>
</div>










</div>







<div class="movableContent" style="border: 0px; padding-top: 0px; position: relative;">
<table width="100%" border="0" cellpadding="0" cellspacing="0" style="font-family:Helvetica, sans-serif;" >
<tr><td height="40" bgcolor="#f8e5d1"></td></tr>
<tr>
<td align="center" bgcolor="d15d4d">
<table width="600" cellpadding="0" cellspacing="0"  align="center" style="border-radius:6px;-moz-border-radius:6px;-webkit-border-radius:6px" class="MainContainer">

<tr>
<td><table width="92%" border="0" cellpadding="0" cellspacing="0"  align="center" style="border-radius:6px;-moz-border-radius:6px;-webkit-border-radius:6px" >
<tr><td height="20"></td></tr>
<tr>
<td align="center">
<table  width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
<tbody>
<tr>
<td align="left" style="font-size:11px;" class="specbundle2">
<div class="contentEditableContainer contentTextEditable" style="min-height: 0px;">
<div class="contentEditable">
<p style="color: #fff">
PS: This is not a marketing Email. You got this email Because You are registered and an active member of This. if you are not interested to get this type of email, Please <a target="_blank" href="mailto:info@thesoftking.com" style="text-decoration:underline; color: #fff;">Unsubscribe</a>.                         


</p>
</div>
</div>
</td>

</tr>
</tbody>
</table>
</td>
</tr>
<tr><td height="20"></td></tr>
</table></td>
</tr>
</table>
</td>
</tr>
</table>
</div>

</td>
</tr>
</tbody>
</table>




</body>
</html>

';


   if (mail($to, $subject, $message, $headers)) {
         //   echo 'Your message has been sent.';
            } else {
           // echo 'There was a problem sending the email.';
            }


}
?>