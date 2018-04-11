
<?php include 'config/config.php';?>
<?php include 'lib/Database.php';?>
<?php include 'helpers/Format.php';?>
<?php 
$db=new Database();
$fm=new Format();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Tech Blog</title>
	<meta name="language" content="English">
	<meta name="description" content="It is a website about education">
	<meta name="keywords" content="blog,cms blog">
	<link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome.css">	
	<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="lessframework4.css">
	<script type="text/javascript">
	 var disqus_developer = 1; // this would set it to developer mode
	 </script> 
	    <!--Boothstrap-->
   <!-- <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">-->
	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/jquery.nivo.slider.js" type="text/javascript"></script>

<script type="text/javascript">
$(window).load(function() {
	$('#slider').nivoSlider({
		effect:'random',
		slices:10,
		animSpeed:500,
		pauseTime:5000,
		startSlide:0, //Set starting Slide (0 index)
		directionNav:false,
		directionNavHide:false, //Only show on hover
		controlNav:false, //1,2,3...
		controlNavThumbs:false, //Use thumbnails for Control Nav
		pauseOnHover:true, //Stop animation while hovering
		manualAdvance:false, //Force manual transitions
		captionOpacity:0.8, //Universal caption opacity
		beforeChange: function(){},
		afterChange: function(){},
		slideshowEnd: function(){} //Triggers after all slides have been shown
	});
});
</script>
</head>

<body>
	<div class="headersection templete clear">
		<a href="index.php">
			<div class="logo">
				<img src="images/logo.png" alt="Logo"/>
				<h2>Tech Blog</h2>
				<p>It's all about Technology</p>
			</div>
		</a>
		<div class="social clear">
			<div class="icon clear">
				<a href="http://facebook.com" target="_blank"><i class="fa fa-facebook"></i></a>
				<a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
				<a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
				<a href="#" target="_blank"><i class="fa fa-google-plus"></i></a>
			</div>
			<div class="searchbtn clear">
			<form action="search_post.php" method="get">
				<input type="text" name="search" placeholder="Search keyword..."/>
				<input type="submit" name="submit" value="Search"/>
			</form>
			</div>
		</div>
	</div>
	<?php $url=$_SERVER['PHP_SELF'];
	?>

<div class="navsection templete">
	<ul>
		<li><a
		<?php if($url=="/blog_final/index.php"){
			echo "id='active'";
			}?>  href="index.php">Home</a></li>
		<li><a <?php if($url=="/blog_final/about.php"){
			echo "id='active'";
			}?> href="about.php">About</a></li>	
		<li><a 
		<?php if($url=="/blog_final/contact.php"){
			echo "id='active'";
			}?> 
		href="contact.php">Contact</a></li>
		<li><a 
		<?php if($url=="/blog_final/application.php"){
			echo "id='active'";
			}?> href="application.php">Be a Writer</a></li>
	</ul>
</div>