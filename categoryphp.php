<?php
header('Content-type: application/javascript');
echo $_GET['jsoncallback']; 
include_once("dbconnection.php");
//if (!isset($_COOKIE["cookie"]))
//  {
//    header("location:firsttime.php");
//  }
 // else
//  {
  $ar=array();


//if (!isset($_COOKIE['tttt']['two']))
//  {



                 $q=mysql_query("select `id` from `category`");
                while($r=mysql_fetch_array($q))
								{
								$ar[]=$r['id'];
								
								}

$max=max($ar);
$x=0;
$val=rand(1,1000);
$a=($val/1000)*$max;

				foreach($ar as $b)
				{
				
				
									if($b>=$a)
									{
									$x= $b;
									
									break;
									
									} 
				
				}
?>
 ({
		
		"items": [
<?php
			
			$query=mysql_query("select * from `category` order by `serial_no`");
		while($result=mysql_fetch_array($query))
				{
				$q1=mysql_query("select `id` from `promote` where `category_id` like '%|$result[id]|%' and `status`='1'");
				$count=mysql_num_rows($q1);
				
					
						?>
						
	   {
			
			"description": "<a onclick='return set_cookie(&#39;<?php echo $result['id']?>&#39;);'><p id='<?php echo $result['id'];?>'><?php echo $result['category_name']; ?> &nbsp; &nbsp; (<?php echo $count?>)</p></a>"
		
	   },
	
 
   
						
						
						
						
						
							
					<?php
					}


			?>
			]
})
		<!--<a href="all.htm">Any Category</a>	-->
