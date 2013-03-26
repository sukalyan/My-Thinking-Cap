<?php
include_once("dbconnection.php");
//ini_set('display_errors', '1');
$id=$_GET['ld'];
$ar=array();
if(isset($_GET['qno']))
$qno=$_GET['qno'];
else
$qno=0;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
<title> My Thinking Cap</title>
<link href="style.css"rel="stylesheet" type="text/css" />
<script type="text/javascript">
// Popup window code
function newPopup(url) {
	popupWindow = window.open(
		url,'popUpWindow','height=300,width=400,left=90,top=90,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
}
</script>
<script type="text/javascript" src="../../src/iscroll.js"></script>

<script type="text/javascript">

var myScroll;
function loaded() {
	myScroll = new iScroll('wrapper', {
		useTransform: false,
		onBeforeScrollStart: function (e) {
			var target = e.target;
			while (target.nodeType != 1) target = target.parentNode;

			if (target.tagName != 'SELECT' && target.tagName != 'INPUT' && target.tagName != 'TEXTAREA')
				e.preventDefault();
		}
	});
}

document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false);
document.addEventListener('DOMContentLoaded', loaded, false);

</script>

<style type="text/css" media="all">
body,ul,li {
	padding:0;
	margin:0;
	border:0;
}

body {
	font-size:12px;
	-webkit-user-select:none;
    -webkit-text-size-adjust:none;
	font-family:helvetica;
/*	padding-bottom:44px;	/*	This prevents the scroller to lock if the user swipes down outside of the screen.
							 	NOT needed if in home screen mode and on Android. */
}

#header {
	width:100%;
	height:auto;
	min-height:50px;
	line-height:45px;
	background-image:-webkit-gradient(linear, 0 0, 0 100%, color-stop(0, #fe96c9), color-stop(0.05, #d51875), color-stop(1, #7b0a2e));
	padding:0;
	color:#eee;
	font-size:20px;
	text-align:center;
}

#header a {
	color:#f3f3f3;
	text-decoration:none;
	font-weight:bold;
	text-shadow:0 -1px 0 rgba(0,0,0,0.5);
}

#footer {
	width:100%;
	height:65px;
	position:absolute; z-index:2;
	bottom:0;
	padding:0;
	border-top:1px solid #444;
	border-top:1px solid #0066CC;
}

#footer li {
	display:block;
	float:left;
}

#footer li {
	width:50%;
	text-align:center;
}

#footer a.remove {
	border-right:1px solid #333;
}

#footer a.add {
	border-left:1px solid #6a6a6a;
}

#footer a {
	display:block;
	text-decoration:none;
	font-size:12px;
	color:#eee;
	line-height:24px;
	text-shadow:0 -1px 0 #000;
}

#footer span {
	display:block;
	font-size:30px;
	font-weight:bold;
}

#wrapper {
	position:absolute; z-index:1;
	top:65px; bottom:65px;			
			/* it seems that recent webkit is less picky and works anyway. */

	width:100%;
	
	overflow:hidden;
}

#scroller {
/*	-webkit-touch-callout:none;*/
	-webkit-tap-highlight-color:rgba(0,0,0,0);

	float:left;
	width:100%;
	padding:0;

/*	-webkit-box-shadow:0 0 8px #555;	/* Don't use box shadows, they slow down drastically CSS animations */
}

#scroller ul {
	list-style:none;
	padding:0;
	margin:0;
	width:100%;
	text-align:left;
}

#scroller li {
	padding:0 10px;
	height:40px;
	line-height:40px;
	border-bottom:1px solid #ccc;
	border-top:1px solid #fff;
	background-color:#fafafa;
	font-size:14px;
}

#scroller li > a {
	display:block;
}
</style>

<style>
input[type=submit] {
     width: auto;
     padding: 0.25em 1em;
     line-height: 1.5em;
     background: -webkit-gradient(linear, left top, left bottom, from(#a00), to(#600));
     border: 2px solid #c00;
     text-shadow: 0 0 2px #300;
     font-weight: bold;
     -webkit-box-shadow: 1px 1px 3px #000;
     margin-right: 0.5em;
   }
</style>

<!-- preloader -->
<!-- Stylesheet -->
	  <link rel="stylesheet" href="css/styles.css" type="text/css" media="screen, print"/>

<style>
#preloader {
    position:absolute;
    top:0;
    left:0;
    right:0;
    bottom:0;
    background-color:#fff; /* change if the mask should have another color then white */
    z-index:999999; /* makes sure it stays on top */
}

#status {
    width:200px;
    height:200px;
    position:absolute;
    left:50%; /* centers the loading animation horizontally one the screen */
    top:50%; /* centers the loading animation vertically one the screen */
    background-image:url(img/status.gif); /* path to your loading animation */
    background-repeat:no-repeat;
    background-position:center;
    margin:-100px 0 0 -100px; /* is width and height divided by two */
}


	.button2 {
	 padding:5%;
	 height: 55px;
	 width:50%;
	 color: white;
	 text-decoration: none;
	 font-size: 14px;
	 font-family: helvetica, arial;

	 display: block;
	 text-align: center;
	 position: relative;

	 /* BACKGROUND GRADIENTS */
	
	 background:url(images/buttonbg.jpg) repeat-x;

	 /* BORDER RADIUS */
	
	 border: 1px solid #368DBE;
	 border-top: 1px solid #c3d6df;


	 /* TEXT SHADOW */

	 text-shadow: 1px 1px 1px black;

	 /* BOX SHADOW */
	 -moz-box-shadow: 0 1px 3px black;
	 -webkit-box-shadow: 0 1px 3px black;
	 box-shadow: 0 1px 3px black;
	 cursor:pointer;
	}
	
	/* WHILE HOVERED */
	
	
	/* WHILE BEING CLICKED */
	
	.button2:hover {
		 background:url(images/buttonbg1.jpg) repeat-x;
	}
	
</style>


<!-- popup window-->
<script>
var overlayElement = document.createElement("div");
overlayElement.className = 'modalOverlay';
document.body.appendChild(overlayElement);
</script>
<style>
.modalOverlay
{
  width:100%;
  height:100%;
  position:absolute;
  top:0;
  left:0;
  margin:0;
  padding:0;
  background:#000;
 opacity:0;
  -webkit-transition: opacity 0.3s ease-in;
  z-index:101;
}
.modalWindow
{
  position:fixed;
  top:150px;
  margin:0;
  border:2px solid #fff;
  width:180px;
  /*height:30px;*/
  text-align:center;
  word-spacing:2px;
  line-height:15px;
  font-weight:bold;
  font-size:13px;
  color:#8AE4EE;
  padding:10px;
  opacity:0;
  z-index:102;
  background: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, #7c9bc0), color-stop(2%, #416086), color-stop(100%, #293e56));
  -webkit-border-radius:8px;
  -webkit-box-shadow:-1px 2px 12px rgba(0, 0, 0, 0.91);
  -webkit-transition: opacity 0.3s ease-in;
}
</style>
<script>
var modalWindowElement = document.createElement("div");
modalWindowElement.className = 'modalWindow';
modalWindowElement.innerHTML = msg;
modalWindowElement.style.left = (window.innerWidth - 200) / 2 + "px";
document.body.appendChild(modalWindowElement);

setTimeout(function() {
  modalWindowElement.style.opacity = 1;
  overlayElement.style.opacity = 0.4;
  overlayElement.addEventListener("click", hidePopUpMessage, false);
}, 300);
</script>

<script type="text/javascript">
var overlayElement = null;
var modalWindowElement = null;
window.addEventListener('load', initApp, false);

function initApp() {
  setTimeout(function() { window.scrollTo(0, 1); }, 10);
  document.getElementById("popUpBtn").addEventListener("click", function() {
    showPopUpMessage("<p>Most Lucky Dips contain carefully worded questions. Put one question at a time into your internet search engine (eg: Google) and hit enter! There you will find your answers. Use common sense and discernment. If the Lucky Dip does not contain any questions, simply follow the instructions it will provide. For further information visit www.MyThinkingCap.net Enjoy expanding your mind! <br><span style='color:#CCCC00;'>'Click outside this popup to continue'</span></p>");
  }, false);
}
//show the modal overlay and popup window
function showPopUpMessage(msg) {
  overlayElement = document.createElement("div");
  overlayElement.className = 'modalOverlay';
  modalWindowElement = document.createElement("div");
  modalWindowElement.className = 'modalWindow';
  modalWindowElement.innerHTML = msg;
  modalWindowElement.style.left = (window.innerWidth - 200) / 2 + "px";
  document.body.appendChild(overlayElement);
  document.body.appendChild(modalWindowElement);
  setTimeout(function() {
    modalWindowElement.style.opacity = 1;
    overlayElement.style.opacity = 0.4;
    overlayElement.addEventListener("click", hidePopUpMessage, false);
  }, 300);
}
//hide the modal overlay and popup window
function hidePopUpMessage() {
  modalWindowElement.style.opacity = 0;
  overlayElement.style.opacity = 0;
  overlayElement.removeEventListener("click", hidePopUpMessage, false);
  setTimeout(function() {
    document.body.removeChild(overlayElement);
    document.body.removeChild(modalWindowElement);
  }, 400);
}
</script>
<!--popup window ends-->


<!-- popup window-->
<script>
var overlayElement = document.createElement("div");
overlayElement.className = 'modalOverlay1';
document.body.appendChild(overlayElement);
</script>
<style>
.modalOverlay1
{
  width:100%;
  height:100%;
  position:absolute;
  top:0;
  left:0;
  margin:0;
  padding:0;
  background:#000;
 opacity:0;
  -webkit-transition: opacity 0.3s ease-in;
  z-index:101;
}
.modalWindow1
{
  position:fixed;
  top:150px;
  margin:0;
  border:2px solid #fff;
  width:180px;
  /*height:30px;*/
  text-align:center;
  word-spacing:2px;
  line-height:15px;
  font-weight:bold;
  font-size:13px;
  color:#8AE4EE;
  padding:10px;
  opacity:0;
  z-index:102;
  background: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, #7c9bc0), color-stop(2%, #416086), color-stop(100%, #293e56));
  -webkit-border-radius:8px;
  -webkit-box-shadow:-1px 2px 12px rgba(0, 0, 0, 0.91);
  -webkit-transition: opacity 0.3s ease-in;
}
</style>
<script>
var modalWindowElement = document.createElement("div");
modalWindowElement.className = 'modalWindow';
modalWindowElement.innerHTML = msg;
modalWindowElement.style.left = (window.innerWidth - 200) / 2 + "px";
document.body.appendChild(modalWindowElement);

setTimeout(function() {
  modalWindowElement.style.opacity = 1;
  overlayElement.style.opacity = 0.4;
  overlayElement.addEventListener("click", hidePopUpMessage, false);
}, 300);
</script>

<script type="text/javascript">
var overlayElement = null;
var modalWindowElement = null;
window.addEventListener('load', initApp, false);

function initApp() {
  setTimeout(function() { window.scrollTo(0, 1); }, 10);
  document.getElementById("popUpBtn1").addEventListener("click", function() {
    showPopUpMessage("<p>If you are going to research this Lucky Dip, please take note of the questions or instructions BEFORE clicking “Put My Thinking Cap On”. When you click that, the App will record that you have researched 1 Lucky Dip, and you will be returned to the Category page.<br><span style='color:#CCCC00;'>'Click outside this popup to continue'</span></p>");
  }, false);
}
//show the modal overlay and popup window
function showPopUpMessage(msg) {
  overlayElement = document.createElement("div");
  overlayElement.className = 'modalOverlay1';
  modalWindowElement = document.createElement("div");
  modalWindowElement.className = 'modalWindow1';
  modalWindowElement.innerHTML = msg;
  modalWindowElement.style.left = (window.innerWidth - 200) / 2 + "px";
  document.body.appendChild(overlayElement);
  document.body.appendChild(modalWindowElement);
  setTimeout(function() {
    modalWindowElement.style.opacity = 1;
    overlayElement.style.opacity = 0.4;
    overlayElement.addEventListener("click", hidePopUpMessage, false);
  }, 300);
}
//hide the modal overlay and popup window
function hidePopUpMessage() {
  modalWindowElement.style.opacity = 0;
  overlayElement.style.opacity = 0;
  overlayElement.removeEventListener("click", hidePopUpMessage, false);
  setTimeout(function() {
    document.body.removeChild(overlayElement);
    document.body.removeChild(modalWindowElement);
  }, 400);
}
</script>
<!--popup window ends-->
</head>


<body >
<div id="preloader">
	<div id="status">&nbsp;</div>
</div>
     <div id="fb-root"></div>
       <script type="text/javascript">
 window.fbAsyncInit = function() {
   FB.init({
     appId      : '143118829183236',
     channelUrl : 'http://'+ window.location.host +'/channel.html',
     status     : true,
     cookie     : true,
     xfbml      : true,
     oauth      : true
   });
 };

 (function(d){
    var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;}
    js = d.createElement('script'); js.id = id; js.async = true;
    js.src = "//connect.facebook.net/en_US/all.js";
    d.getElementsByTagName('head')[0].appendChild(js);
  }(document));
  
  
  function FBShare(title, link, picture, msg, caption) {
   //FB.login(function(data) {
	  // alert('helloopp');
	/*    if (response.authResponse) {
    alert('Welcome!  Fetching your information.... ');
     FB.api('/me', function(response) {
       alert('Good to see you, ' + response.name + '.');
     });
   } else {
     alert('User cancelled login or did not fully authorize.');
   }
	*/   
   postSocialMsg(title, link, picture, msg, caption);
  // }, {scope: 'publish_stream'});
 }
 
 
 function postSocialMsg(title, link, picture, msg, caption) {
   var body={
     message: msg,
    // picture: picture,
     link: 'http://'+ window.location.host +'/'+ link,
     name: title,
     caption: caption
   }

   FB.api('/me/feed', 'post', body, function(response) {
     if (!response || response.error) {
       // Error
	   alert('Error');
     } else {
       // Successful
	   alert('successful');
     }
   });
 }
 
</script>
<script type="text/javascript">
            function setStatus(){
                showLoader(true);
               
                status1 = document.getElementById('q1').innerHTML + " " +document.getElementById('q2').innerHTML + " " + document.getElementById('q3').innerHTML;
				var body={
     message: status1,
    // picture: picture,
    // link: 'http://'+ window.location.host +'/'+ link,
     //name: title,
    // caption: caption
   }
     FB.api('/me/feed', 'post', body, function(response) {
     if (!response || response.error) {
       // Error
	   alert(response.error);
     } else {
       // Successful
	   alert('successful');
     }
   }
                );
//twitterpost();

            }
			var response;
 function seturl(){
	// alert('help');
var paramsLocation=window.location.toString().indexOf('?');
	  var params="";
	  if (paramsLocation>=0)
	  params=window.location.toString().slice(paramsLocation);
	  window.location.assign( 'https://graph.facebook.com/oauth/authorize?client_id=143118829183236&scope=publish_stream&redirect_uri=http://50.56.237.229/scroll/examples/simple/put_mythinking.php'+params); 
	 
	 
	
	 }
function twitterpost()
{

var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    //document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
//alert(xmlhttp.responseText);
    }
  }
status1 = document.getElementById('q1').innerHTML + " " +document.getElementById('q2').innerHTML + " " + document.getElementById('q3').innerHTML;
//alert("http://krititech.com/demos/twitterphp/send.php?status="+status1);
xmlhttp.open("GET","http://krititech.com/demos/twitterphp/send.php?status="+status1,true);
xmlhttp.send();
}
            
            function showLoader(status){
                if (status)
                    document.getElementById('loader').style.display = 'block';
                else
                    document.getElementById('loader').style.display = 'none';
            }
            
        </script>
        <script>
            function disable_button()
            {
            //alert("dfvs");
            document.getElementById('btn1').style.display="none";
              document.getElementById('btn3').style.display="block";          
            }        
        </script>
        
        <div id="loader" style="display:none">
            
        </div>
        
        <div id="debug"></div>
        
        <div id="other" style="display:none">
         <div id="other1" style="display:none">
            <a href="#" onclick="showStream(); return false;">Publish Wall Post</a> |
            <a href="#" onclick="share(); return false;">Share With Your Friends</a> |
            <a href="#" onclick="graphStreamPublish(); return false;">Publish Stream Using Graph API</a> |
            <a href="#" onclick="fqlQuery(); return false;">FQL Query Example</a>
            </div>
            <br />
            <textarea style="display:none" id="status" cols="50" rows="5">My Status</textarea>
            <br />
        </div>
		<div id="header" style="background:#666666; text-align:left;">
<a href="index.php"><img src="images/logo1.jpg" style="width:100%; height:auto; float:left; " /></a>
</div>

<div id="wrapper">
	<div id="scroller">
			<div id="container" style="padding-top:20px;">
						
						
							
						
						
						
						<div id="content" style="margin-bottom:50px; font-size:20px; font-family:'Times New Roman', Times, serif; ">
<?php 
$u_id=$_COOKIE['cookie']['one'];
//echo $u_id."user id";
//echo "select `ques_ids` from `user` where `id`='$u_id'";
$q2=mysql_query("select `ques_ids` from `user` where `id`='$u_id'") or die(mysql_error());
$r2=mysql_fetch_array($q2);
$a="";
$q=mysql_query("select `id` from `promote` where `category_id` like '%|$id|%' and `status`='1' ") or die(mysql_error());
$cnt=mysql_num_rows($q);
//echo $cnt.'cnt';
if($cnt>0)
{
while($r=mysql_fetch_array($q))
{
$ar[]=$r['id'];
}
//print_r($ar);
$ques_ids=$r2['ques_ids'];
                            //echo $ques_ids.'asddx<br />';

		if($ques_ids!="")
		{
		//echo $ques_ids.'dc';
		$user_ex_ids=explode(",",$ques_ids);
		//print_r($user_ex_ids);
		//echo "<br />";
		
		$result=array_intersect($ar,$user_ex_ids);
		//print_r($result);
		//echo "<br />";
		$ar_count=count($result);
		                     // echo $ar_count."count";
							  //echo "<br />";
								if($ar_count!="0")
								{
								
								                   // echo "if";
											foreach($result as $res_id)
											{
											
											$a=$res_id;
											
											
											}
											//echo $a."aval";
											//echo "<br />";
											//echo "select * from `promote` where `id`>'$a' and `status`='1' and `category_id` like '%|$id|%'";
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

//echo $r1['id']."<br />aaaaa";
$ques_ids_final=str_replace($a,$r1['id'],$ques_ids);
                       // echo $ques_ids_final.'final';
                       //echo "update `user` set `ques_ids`='$ques_ids_final' where `id`='$u_id'";
mysql_query("update `user` set `ques_ids`='$ques_ids_final' where `id`='$u_id'") or die(mysql_error());

											
								}
								
								
								
								else
								
								
								{
								                    //echo "else";
													//echo "select * from `promote` where `id`>'0' and `status`='1' and `category_id` like '%|$id|%'";
								$q1=mysql_query("select * from `promote` where `id`>'0' and `status`='1' and `category_id` like '%|$id|%'") or die(mysql_error());
								$r1=mysql_fetch_array($q1);
								$ques_ids=$ques_ids.",".$r1['id'];
								                  //echo $ques_ids;
								                    //echo "update `user` set `ques_ids`='$ques_ids' where `id`='$u_id'";
								mysql_query("update `user` set `ques_ids`='$ques_ids' where `id`='$u_id'") or die(mysql_error());
								}
		
		}
			else
			{
			                               //echo "elseif";
			$q1=mysql_query("select * from `promote` where `id`>'0' and `status`='1' and `category_id` like '%|$id|%'") or die(mysql_error());
								$r1=mysql_fetch_array($q1);
								$ques_ids1=$ques_ids.",".$r1['id'];
								                        //echo $ques_ids1;
								                           //echo "update `user` set `ques_ids`='$ques_ids1' where `id`='$u_id'";
								mysql_query("update `user` set `ques_ids`='$ques_ids1' where `id`='$u_id'") or die(mysql_error());
			
			}

//echo $r1['id']."present id";
//if(isset($_COOKIE['ldid']))
//{
//echo $_COOKIE['ldid'].'kkkkkkkkk<br />';
//}
//else
//setcookie('ldid', 'x', time()+(3600*24*7));

//echo "select * from `promote` where `id`>'$a' and `status`='1' and `category_id` like '%|$id|%'";


//$_COOKIE['ldid']=$qno;

$s2= str_replace("%93", "%22", "$r1[question1]");
      $s3= str_replace("%94", "%22", $s2);
      
      
      $s4= str_replace("%93", "%22", "$r1[question2]");
      $s5= str_replace("%94", "%22", $s4);
	  
	  
	  $s= str_replace("%93", "%22", $r1['question3']);
      $s1= str_replace("%94", "%22", $s);
$final_ques=explode("%0D%0A","$r1[question3]");

?>


<div style="width:85%; height:50px;  margin:auto; color:#ffffff; font-family:Arial, Helvetica, sans-serif; font-size:18px; font-weight:bold; margin-top:2%; text-align:center; ">
<input type="button" id="postit" style="display:block" value="Post On My Wall" onclick="setStatus(); return false;" />  <a href="https://www.facebook.com/dialog/feed?
  app_id=554795447887712&
  link=https://50.56.237.229//&
  picture=http://50.56.237.229/scroll/logo.jpg&
  name=Put%20My %20ThinkingCap&
  caption=Reference%20Documentation&
  description=<?php echo $s3."<br/> ".$s5."<br/>".$s1;?>.&
  redirect_uri=http://50.56.237.229/scroll/examples/simple/put_mythinkingface.php?ld=34"> testfacebook link</a>
									<div style="50%; float:left;"><button id="fb-auth"  onclick="return seturl();" style="border:0px"> <img  src="images/facebook1.png"  style="width:100%; height:auto;"   align="left"   /></button>
									</div>
									<div style="50%; float:right;">
									<a href="JavaScript:newPopup('https://twitter.com/intent/tweet?original_referer=https%3A%2F%2Fdev.twitter.com%2Fdocs%2Ftweet-button&amp;text=<?php echo $s3." ".$s5."  ".$s1;?>');" class="btn" id="b" target="new"><i></i><img src="images/twitter2.png"    align="left" style="width:100%; height:auto; "  /></a>
									
							</div>		
						
						
						</div> <div id="user-info"></div>

<div style="background:url(images/tcrepeat1.png) repeat; width:98%; padding:1%; float:left;  height:auto; padding-bottom:2%; border-radius:3px; -moz-border-radius:3px; ">
<div style="width:100%;font-size:16px;float:left; padding-bottom:10px; font-weight:bold; border-bottom:1px solid #CCCC00;  ">
This Lucky Dip has been researched<br/>
<span style="font-size:14px; line-height:1.0; color:#CCCC00; font-weight:bold;">
 			<?php echo $r1['no_of_attempts']; ?> times.
</span>

</div>
<div style="width:100%;color:#FFFFFF; float:left; font-size:16px; margin-top:5px; padding-bottom:10px; border-bottom:1px solid #CCCC00;">
<span style="font-weight:bold;">Submitted by:</span>  <br/>
<span style="font-size:14px; line-height:1.0; color:#CCCC00; font-weight:bold;">
<?php echo $r1['first_name']?>&nbsp;&nbsp;&nbsp;<?php if(!empty($r1['age']) )  echo ','.$r1['age']; ?>&nbsp;&nbsp;&nbsp;<?php if(!empty($r1['state']) ) echo ','.$r1['state']; ?>&nbsp;&nbsp;&nbsp;<?php if(!empty($r1['country']) ) echo ','.$r1['country'];?>
</span>
<br />

</div>

<div style="width:100%;color:#CCCC00; float:left; font-size:16px; font-weight:bold; margin-top:5px;">
This Lucky Dip has been viewed <?php echo $r1['viewed'];?> times.<br/>
<span id="popUpBtn" style="color:#8AE4EE;">"Click Here and learn what to do with this Lucky Dip"</span><br/>

</div>
</div>


<div style="width:70%; height:30px; padding-top:10px; background:url(images/repeat1.png) repeat-x; float:left; margin-left:15%; margin-top:3%; color:#ffffff; font-family:Arial, Helvetica, sans-serif; font-size:15px; text-align:center; font-weight:bold; ">
									Your Lucky Dip
						</div>



<div style=" height:auto; width:98%; float:left; padding:1%; margin-top:3%; font-family:Arial, Helvetica, sans-serif; font-size:16px; font-weight:bold;  line-height:1.5; background:url(images/tcrepeat1.png) repeat;   border-radius:3px; -moz-border-radius:3px; ">
<?php 

?>
																																						<p id="q1" style="font-size:16px; font-family:Arial, Helvetica, sans-serif; color:#8AE4EE;"><?php echo urldecode($s3);?></p>
																																												<p id="q2" style="font-size:16px; font-family:Arial, Helvetica, sans-serif;  color:#8AE4EE;"><?php echo urldecode($s5);?></p>
	<?php 
	
	
	
	
	//echo $r1['question3'];
	//echo $que2;
	//$question=str_replace("<br/>"," <div style='width:100%; height:20px; float:left;'> &nbsp ; 23567i899fghh</div> ",$que2);
	//echo $question;
	//$each=explode("<br/>",$que2);
	
	?>																																											
	<p id="q3" style="font-size:16px; font-family:Arial, Helvetica, sans-serif;  color:#8AE4EE;"><?php
	
	foreach($final_ques as $final_ques1)
	{
	$s= str_replace("%93", "%22", $final_ques1);
      $s1= str_replace("%94", "%22", $s);
	$que2=trim(urldecode($s1));
	echo $que2;
	}
	
	
	 //foreach($each as $each1)
//	{
//	echo $each1.'<br/>';
//	
//	}?></p>
			<!--<input type="text" id="q3" name="question3"	style="font-size:16px; font-family:Arial, Helvetica, sans-serif;  color:#8AE4EE; border:none;  width:100px; background:none;" value="<?php echo $question;?>"	 />		-->																																			
			<br />
</div>

<table style="width:100%;" height="330" align="center"  >
<tr>
<td align="center" style="font-family:Arial, Helvetica, sans-serif; font-size:14px;  font-weight:bold;color:#B6F02F;">Want different questions?</td>
</tr>
<tr>
<td align="center" ><a href="put_mythinking.php?ld=<?php echo "$id";?>&qno=<?php echo $r1['id'];?>"><input type="button" name="btn1" id="btn1" value="Dip Again" class="button2" onclick="return disable_button();"></a><input type="button" name="btn3" id="btn3" value="Dip Again" class="button2" style="display:none;"></td>
</tr>
<tr>
<td align="center" style="font-family:Arial, Helvetica, sans-serif; font-size:14px;  font-weight:bold;color:#B6F02F;"><span id="popUpBtn1" style="color:#8AE4EE;">"How do I record my research? Click Here"</span> </td>
</tr>
<tr>
<td align="center" ><a href="thinking.php?ld=<?php echo $r1['id'];?>"><button name="btn" class="button2" onClick="document.location.reload(true)" style="font-size:12px;">  Put My<br/>Thinking Cap On </button></a></td>
</tr>
<tr>
<td align="center"><a href="category.php"><button  name="btn2"  class="button2" onClick="document.location.reload(true)">Change<br/> Category</button></a></td>
</tr>


</table>
<?php 

$exist_ld_view=mysql_query("select `viewed` from `promote` where `id`='$r1[id]'") or die(mysql_error());
$res_exist_ld_view=mysql_fetch_array($exist_ld_view);
$view_count=$res_exist_ld_view['viewed']+1;
$ld_view=mysql_query("update `promote` set `viewed`='$view_count' where `id`='$r1[id]'") or die(mysql_error());

} 
else
{
?>
There Are No Lucky Dips In This Category..
<a href="category.php"><input type="button" name="btn3" value="exit"></a>
<?php } ?>
</div>
</div>
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
</div>
						</div>
			</div>
			<?php include_once("bottom_bar.php");?>
			<!-- jQuery Plugin -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js"></script>

<!-- Preloader -->
<script type="text/javascript">
	//<![CDATA[
		$(window).load(function() { // makes sure the whole site is loaded
			$("#status").fadeOut(); // will first fade out the loading animation
			$("#preloader").delay(350).fadeOut("slow"); // will fade out the white DIV that covers the website.
			
		})
	//]]>
</script> 
</body>
</html>
<?php  ob_flush(); ?>
