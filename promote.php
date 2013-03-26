<?php
include_once("dbconnection.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
<title>My Thinking Cap</title>
<link href="style.css"rel="stylesheet" type="text/css" />
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
	top:45px; bottom:48px;			

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

	
	
<!-- code for contact form css -->
<style type="text/css" media="screen">
	
	 p {margin: 0 0 1em; font-size: 14px;}
	 
	 input, textarea, select {
	   border: 1px solid #111;
	   padding: 0.5em;
	   font-size: 15px;
     line-height: 1.2em;
     width: 80%;
     background: #444;
     color: #fff;
     font-family: helvetica, sans-serif;
     background: -webkit-gradient(linear, left top, left bottom, from(#222), to(#444));
     -webkit-appearance: none;
 	   -webkit-box-shadow: 1px 1px 1px #333;
	 }
	 
	 input:focus, textarea:focus, select:focus {outline-color: #c00;}
	 
	 textarea {
     height: 55px;
     background: -webkit-gradient(linear, left top, left bottom, color-stop(0, #222), color-stop(0.05, #333));
   }
   
   select {
     padding: 0.5em 1em 0.5em 0.75em;
     -webkit-background-size: 1600px 32px;
   }
	 
	 input[type=text] {
     background: -webkit-gradient(linear, left top, left bottom, color-stop(0, #222), color-stop(0.12, #333));
   }
   
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
   
   input[type=reset] {
      width: auto;
      padding: 0.25em 1em;
      line-height: 1.5em;
      background: -webkit-gradient(linear, left top, left bottom, from(#333), to(#222));
      border: 2px solid #444;
      text-shadow: 0 0 2px #300;
      font-weight: bold;
      color: #999;
      -webkit-box-shadow: 1px 1px 3px #000;
    }
   
   input[type=checkbox],
   input[type=radio] {
     display: inline-block;
     font-size: 15px;
     line-height: 1em;
     margin: 0 0.25em 0 0;
     padding: 0;
     width: 1.25em;
     height: 1.25em;
     -webkit-border-radius: 0.25em;
     vertical-align: text-top;
   }
   
   input[type=radio] {
      -webkit-border-radius: 2em;
    }

   input[type=checkbox]:checked {
     -webkit-background-size: 28px 28px;
   }
   
   input[type=radio]:checked {
      -webkit-background-size: 28px 28px;
    }
   
</style>
<!--<script>
function validate_form()

{
//alert('sdsd');
var q1=document.businessform.question1.value();
//alert(q1);
var name=document.businessform.fname.value();
var age=document.businessform.age.value();
var state=document.businessform.state.value();
var country=document.businessform.country.value();
var email=document.businessform.email.value();
var category=document.businessform.business_type.value();

if(q1=="Question Area")
{
alert("Please Enter First Question..");
return false;
}

if(name=="")
{
alert("Please Enter your name..");
return false;
}

if(age=="")
{
alert("Please Enter your age..");
return false;
}

if(state=="")
{
alert("Please Enter state");
return false;
}

if(country=="")
{
alert("Please Enter country");
return false;
}

if(email=="")
{
alert("Please Enter your mail id..");
return false;
}

if(category=="")
{
alert("Please select a category");
return false;
}

}

</script>-->
</head>


<body>
	<div id="header" style="background:#666666; text-align:left;">
<a href="index.php"><img src="images/logo1.jpg" style="width:100%; height:auto; float:left; " /></a>
</div>

<div id="wrapper">
	<div id="scroller">	
			<div id="container" style="padding-top:20px;">
						
						<div style="width:70%; height:30px; padding-top:10px; background:url(images/repeat1.png) repeat-x; margin:auto; color:#ffffff; font-family:Arial, Helvetica, sans-serif; font-size:15px; text-align:center; font-weight:bold; ">
									Submit a Lucky DIp
						</div>
						<div id="content" style="font-size:16px; font-family:'Times New Roman', Times, serif; ">
						<div style="background:url(images/tcrepeat1.png) repeat; width:98%; padding:1%; float:left; margin-top:2%;  height:auto; padding-bottom:2%; border-radius:3px; -moz-border-radius:3px; font-family:Arial, Helvetica, sans-serif; font-size:16px; color:#8AE4EE; ">
									Please enter your queston so that <span style="color:#CCCC00;"><strong>My Thinking Cap</strong></span> users can research it for themselves when they lucky dip.
									<br />
									<br />
									<form name="businessform" method="post" action="submit1.php" onsubmit="return validate_form();">
									
									<p><input type="text" placeholder="Question Area" name="question1" id="question1"></p>
									Leave another question to encourage further research. 
<p><input type="text" placeholder="Another Question" name="question2" ></p>
And one more to expand their horizons
<p><input type="text" placeholder="One more Question" name="question3" ></p>
<p><input type="text" placeholder="First name" name="fname" ></p>
<p><input type="text" placeholder="Age" name="age" ></p>
<p><input type="text" placeholder="State" name="state" ></p>
<p><input type="text" placeholder="Country" name="country" ></p>
Please provide your E-mail so that we can notify you when your questions are approved.
<p><input type="text" placeholder="Your E-mail" name="email" ></p>
<p><select name="business_type">
<option value="">Select A Category</option>
<?php
$q=mysql_query("select * from `category`");
while($r=mysql_fetch_array($q))
{
?>
<option value="<?php echo $r['id'];?>"><?php echo $r['category_name'];?>&hellip;</option>
<?php } ?>
<option value="0">Not Sure</option>
</select></p>
<p><input type="submit" value="Submit"> </p>

</form>
</div>
</div>
</div>				</div>
			</div>
			<?php include_once("bottom_bar.php");?>
</body>
</html>
