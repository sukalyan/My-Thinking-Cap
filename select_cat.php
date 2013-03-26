<?php
header('Content-type: application/javascript');
echo $_GET['jsoncallback'];
include_once("dbconnection.php");
?>
({
		
		"items": [

<?php
$q=mysql_query("select * from `category`");
while($r=mysql_fetch_array($q))
{
$id=$r['id'];
?>


 {
			
			"description": "<option value='<?php echo $id;?>'><?php echo $r['category_name'];?>&hellip;</option>"
		
	   },
	




<?php } ?>

]
})
