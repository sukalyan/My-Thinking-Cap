<?php 
header('Content-type: application/javascript');
echo $_GET['jsoncallback']; 
include_once("dbconnection.php");

$ldid=$_GET['ld'];
//echo $ldid;
$query=mysql_query("select * from `promote` where `id`='$ldid'");
$res=mysql_fetch_array($query);
$cnt=$res['no_of_attempts']+1;
mysql_query("update `promote` set `no_of_attempts`='$cnt' where `id`='$ldid'");


$u_id=$_GET['uid'];
//echo $uid;
//echo "select `no_of_attempts`,`ques_ids` from `user` where `id`='$u_id'";
$q=mysql_query("select `no_of_attempts`,`attempted` from `user` where `id`='$u_id'") or die(mysql_error());
$r=mysql_fetch_array($q);

$attempts=$r['no_of_attempts']+1;
$ques_id=$r['attempted'];
//echo $ques_id.'ques_id';
$tot_ques_id=$ques_id.",".$ldid;

//echo $tot_ques_id;
//echo "update `user` set `no_of_attempts`='$attempts',`ques_ids`='$tot_ques_id' where `id`='$u_id'";
mysql_query("update `user` set `no_of_attempts`='$attempts',`attempted`='$tot_ques_id' where `id`='$u_id'") or die(mysql_error());

?>
({
"status":"1"

})