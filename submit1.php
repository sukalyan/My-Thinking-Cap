<?php
header('Content-type: application/javascript');
echo $_GET['jsoncallback'];
include_once("dbconnection.php");
$question1=urlencode($_GET['q1']);
$question2=urlencode($_GET['q2']);
$question3=urlencode($_GET['q3']);
$fname=$_GET['name'];
$state=$_GET['state'];
$country=$_GET['country'];
$email=$_GET['email'];
$business_type="|".$_GET['cat']."|";

$cattype=$_POST['business_type'];
if($cattype!=0)
{
$catstatus=1;
}
else
{
$catstatus=0;
}


$date=date("Y-m-d H-i-s");
$age=$_GET['age'];

$myquery = "insert into `promote` set `question1`='$question1',`question2`='$question2',`question3`='$question3',`age`='$age',`first_name`='$fname',`state`='$state',`country`='$country',`email`='$email',`category_id`='$business_type',`status`='0',`uploaded_by`='$email',`datetime`='$date',`no_of_attempts`='0',`assign_cat`='$catstatus'";
//echo $myquery;
mysql_query($myquery)or die(mysql_error());

$subj="Thank You For Submitting New Ld";

$message="Thank you for submitting your Lds. You shall be notified via E-mail if your question is approved for Lucky dip. \r\n";

$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
$headers .= "From: Thinking Cap<no-reply@.com>\n";

$to=$email;
mail($to,$subj,$message,$headers);

?>