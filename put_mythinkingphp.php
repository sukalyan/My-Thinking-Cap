<?php
header('Content-type: application/javascript');
echo $_GET['jsoncallback']; 
include_once("dbconnection.php");
$id=$_GET['ld'];
$u_id=$_GET['uid'];
$ar=array();
$q2=mysql_query("select `ques_ids` from `user` where `id`='$u_id'") or die(mysql_error());
$r2=mysql_fetch_array($q2);
$a="";
$q=mysql_query("select `id` from `promote` where `category_id` like '%|$id|%' and `status`='1' ") or die(mysql_error());
$cnt=mysql_num_rows($q);
if($cnt>0)
{
			while($r=mysql_fetch_array($q))
			{
			$ar[]=$r['id'];
			}
			$ques_ids=$r2['ques_ids'];
			
					if($ques_ids!="")
					{
					$user_ex_ids=explode(",",$ques_ids);
					$result=array_intersect($ar,$user_ex_ids);
					$ar_count=count($result);
						
											if($ar_count!="0")
											{
											
															  
														foreach($result as $res_id)
														{
														
														$a=$res_id;
														
														
														}
								
													$q1=mysql_query("select * from `promote` where `id`>'$a' and `status`='1' and `category_id` like '%|$id|%' order by `id`") or die(mysql_error());
			
			$cnt2=mysql_num_rows($q1);
			
			if($cnt2==0)
			{
			$q11=mysql_query("select * from `promote` where `id`>'0' and `status`='1' and `category_id` like '%|$id|%'") or die(mysql_error());
			}
			else
			{
			$q11=mysql_query("select * from `promote` where `id`>'$a' and `status`='1' and `category_id` like '%|$id|%' order by `id`") or die(mysql_error());
			}
				
			$r1=mysql_fetch_array($q11);
			
			$ques_ids_final=str_replace($a,$r1['id'],$ques_ids);
								  
			mysql_query("update `user` set `ques_ids`='$ques_ids_final' where `id`='$u_id'") or die(mysql_error());
					
											}
											
											else
											
											{
											$q1=mysql_query("select * from `promote` where `id`>'0' and `status`='1' and `category_id` like '%|$id|%'") or die(mysql_error());
											$r1=mysql_fetch_array($q1);
											$ques_ids=$ques_ids.",".$r1['id'];
															
											mysql_query("update `user` set `ques_ids`='$ques_ids' where `id`='$u_id'") or die(mysql_error());
											}
					
					}
						else
						{
													  
						$q1=mysql_query("select * from `promote` where `id`>'0' and `status`='1' and `category_id` like '%|$id|%'") or die(mysql_error());
											$r1=mysql_fetch_array($q1);
											$ques_ids1=$ques_ids.",".$r1['id'];
																	
											mysql_query("update `user` set `ques_ids`='$ques_ids1' where `id`='$u_id'") or die(mysql_error());
						
						}
			
			$s2= str_replace("%93", "%22", "$r1[question1]");
				  $s3= str_replace("%94", "%22", $s2);
				  
				  
				  $s4= str_replace("%93", "%22", "$r1[question2]");
				  $s5= str_replace("%94", "%22", $s4);
				  
				  
				  $s= str_replace("%93", "%22", $r1['question3']);
				  $s1= str_replace("%94", "%22", $s);
			$final_ques=explode("%0D%0A","$r1[question3]");
			
			?>
			
			 ({
		
		"items": [
		 {
			
			"id": "<?php echo $r1['id'];?>"
	   },
	   {
			
			"count": "<?php echo $r1['no_of_attempts']; ?>"
	   },
	
	   {
			
			"submitted_by": "<?php echo $r1['first_name']?>&nbsp;&nbsp;&nbsp;<?php if(!empty($r1['age']) )  echo ','.$r1['age']; ?>&nbsp;&nbsp;&nbsp;<?php if(!empty($r1['state']) ) echo ','.$r1['state']; ?>&nbsp;&nbsp;&nbsp;<?php if(!empty($r1['country']) ) echo ','.$r1['country'];?>"
	   },
	  {
			
			"view": "<?php echo $r1['viewed'];?>"
	   },
	   {
			
			"question1": "<?php echo trim(urldecode($s3));?>"
	   },
	    {
			
			"question2": "<?php echo trim(urldecode($s5));?>"
	   },
	   {
			
			"question3": "<?php 
			foreach($final_ques as $final_ques1)
				{
				$s= str_replace('%93', '%22', $final_ques1);
				  $s1= str_replace('%94', '%22', $s);
				$que2=trim(urldecode($s1));
				echo $que2;
				}?>"
	   },
	   {
			
			"facebook": "<a href='https://www.facebook.com/dialog/feed?app_id=554795447887712&link=https://50.56.237.229//&picture=http://50.56.237.229/scroll/logo.jpg&name=Put%20My %20ThinkingCap&caption=Reference%20Documentation&description=<?php echo $s3.'<br/> '.$s5.'<br/>'.$s1;?>.&redirect_uri=http://50.56.237.229/scroll/examples/simple/put_mythinking.htm'><img  src='images/facebook1.png'  style='width:100%; height:auto;'   align='left'   /></a>"
	   },
	   {
	    "twitter": "<a href='https://www.facebook.com/dialog/feed?app_id=554795447887712&link=https://50.56.237.229//&picture=http://50.56.237.229/scroll/logo.jpg&name=Put%20My %20ThinkingCap&caption=Reference%20Documentation&description=<?php echo $s3.'<br/> '.$s5.'<br/>'.$s1;?>.&redirect_uri=http://50.56.237.229/scroll/examples/simple/put_mythinking.htm'><img  src='images/facebook1.png'  style='width:100%; height:auto;'   align='left'   /></a>"
	   },
		
	]
})

			<?php 
			
			$exist_ld_view=mysql_query("select `viewed` from `promote` where `id`='$r1[id]'") or die(mysql_error());
			$res_exist_ld_view=mysql_fetch_array($exist_ld_view);
			$view_count=$res_exist_ld_view['viewed']+1;
			$ld_view=mysql_query("update `promote` set `viewed`='$view_count' where `id`='$r1[id]'") or die(mysql_error());

} 
else
{
?>
({
		
		"items": [
	   {
			
			"description": "There Are No Lucky Dips In This Category..<br/>
  <a href='category.htm'><input type='button' name='btn3' value='exit'></a>"
	   }
	]
})
<?php }
ob_flush(); ?>