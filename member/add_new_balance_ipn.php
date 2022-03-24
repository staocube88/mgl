<?php
require_once('../function.php');
require_once("anotifier.php");
connectdb();
session_start();



$general = mysql_fetch_array(mysql_query("SELECT sitetitle, pmuid, pmsec FROM general_setting WHERE id='1'"));



$passphrase=strtoupper(md5($general[2]));
define('ALTERNATE_PHRASE_HASH',  $passphrase);
define('PATH_TO_LOG',  '/somewhere/out/of/document_root/');
$string=
      $_POST['PAYMENT_ID'].':'.$_POST['PAYEE_ACCOUNT'].':'.
      $_POST['PAYMENT_AMOUNT'].':'.$_POST['PAYMENT_UNITS'].':'.
      $_POST['PAYMENT_BATCH_NUM'].':'.
      $_POST['PAYER_ACCOUNT'].':'.ALTERNATE_PHRASE_HASH.':'.
      $_POST['TIMESTAMPGMT'];

$hash=strtoupper(md5($string));
$hash2 = $_POST['V2_HASH'];

if($hash==$hash2){

$payid = $_POST['PAYMENT_ID'];
$paidid =  substr($payid, 10);
$amo = $_POST['PAYMENT_AMOUNT'];
$unit = $_POST['PAYMENT_UNITS'];

if($unit=="NGR"){

$cbal = mysql_fetch_array(mysql_query("SELECT mallu FROM users WHERE mid='".$paidid."'"));
$will = $cbal[0]+$amo;
mysql_query("UPDATE users SET mallu='".$will."' WHERE mid='".$paidid."'");





$a1 = date("ymdH", time());
$a2 = rand(1000,9999);
$txn_id = "$a1$a2";

$des = "Add Fund - PM Automated";
////------------------------------>>>>>>>>>TRX
mysql_query("INSERT INTO trx SET usid='".$paidid."', trx='".$txn_id."', tm='".time()."', description='".$des."', amount='".$amo."', nbal='".$will."'");
////------------------------------>>>>>>>>>TRX


////------------------------------>>>>>>>>>ADD_BAL
mysql_query("INSERT INTO add_bal SET usid='".$paidid."', trx='".$txn_id."', tm='".time()."', amount='".$amo."', method='PM_Automated', status='1'");
////------------------------------>>>>>>>>>ADD_BAL



///////////////////------------------------------------->>>>>>>>>Send Email AND SMS

$userContact = mysql_fetch_array(mysql_query("SELECT fname, lname, mobile, email FROM users WHERE mid='".$paidid."'"));

$txt = "This is a soft notification that you just Add $amo NGR to your Account via PerfectMoney.";
abiremail($userContact[3], "You Just Add Fund", "$userContact[0] $userContact[1]", $txt);
///////////////////------------------------------------->>>>>>>>>Send Email AND SMS





}
}


$to = "abirkhan75@gmail.com";
$subject = 'PM notify';
$message = "   $string ---- $hash ---- $hash2";
$headers = 'From: ' . "i@abir.biz \r\n" .
    'Reply-To: ' . "i@abir.biz \r\n" .
    'X-Mailer: PHP/' . phpversion();
mail($to, $subject, $message, $headers);

?>