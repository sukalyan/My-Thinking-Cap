<?php
header('Content-type: application/javascript');
include_once("dbconnection.php");
$name=$_GET['name'];
$website=$_GET['website'];
$email=$_GET['email'];
$details=$_GET['details'];

$timezone = "Australia/ACT";
if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
$date= date('Y-m-d H:i:s');

$myquery ="insert into `business` set `name`='$name',`website`='$website',`email`='$email',`details`='$details',`datetime`='$date'";
mysql_query($myquery)or die(mysql_error());

$subj="Thank You For Submitting New Business";

$message="Dear $name, \r\n
Thankyou for submitting your expression of interest\r\n
to promote your business with My Thinking Cap.\r\n
Please visit our official website at\r\n
http://www.MyThinkingCap.net for further information \r\n\r\n
regarding the promotion of your business with the My Thinking Cap App
\r\n\r\n
Regards\r\n
The My Thinking Cap Team\r\n";


$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
$headers .= "From: Thinking Cap<no-reply@.com>\n";

$to=$email;

if(mail($to,$subj,$message,$headers))

echo '({"status":"1"})';
?>
