<?php
header('Content-type: application/javascript');
echo $_GET['jsoncallback']; 
ob_start();
include_once("dbconnection.php");
$date=date("Y-m-d H-i-s");
$uid=$_GET['uid'];
echo $u_id;

		

$q=mysql_query("select `no_of_attempts` from `user` where `id`='$uid'");

$cnt=mysql_num_rows($q);
if($cnt==0)
{
 mysql_query("insert into `user` set `id`='$uid',`no_of_attempts`='0',`created`='$date'") or die(mysql_error());
}
else
{
$r=mysql_fetch_array($q);

$n=$r['no_of_attempts'];
  ?>
   
  ({
		
		"items": [
	   {
			
			"description": "You have put on your Thinking Cap  <?php echo $n?> Times..<br />"
	   },
	
	  {
	  
	   "description": "<a href='feedback.htm'><button  name='feedback' class='button3' id='feedback'   >Leave Feedback About Your Last Lucky Dip</button></a>"
	  }
	]
})
    
   <?php } 
   

   ?>
   
   