<?php require('includes/connectDB.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Privileged Life</title>
<link href="media/preview-assets/css/reset.css" rel="stylesheet">
<link href="media/style/master.css" rel="stylesheet" type="text/css" />
<link href="media/style/slider.css" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Fjalla+One' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,400,300,700' rel='stylesheet' type='text/css'>
<!-- SLIDER -->
<!-- slider JS files -->

<link href="media/royalslider/royalslider.css" rel="stylesheet">
<script  src="media/royalslider/jquery-1.8.0.min.js"></script>
<script src="media/royalslider/jquery.royalslider.min.js"></script>
<script src="media/royalslider/jquery.easing-1.3.js"></script>

<!-- syntax highlighter -->
<script src="media/preview-assets/js/highlight.pack.js"></script>
<script src="media/preview-assets/js/jquery-ui-1.8.22.custom.min.js"></script>
<script> hljs.initHighlightingOnLoad();</script>

<!-- preview-related stylesheets -->

<link href="media/preview-assets/css/grid.css" rel="stylesheet">
<link href="media/preview-assets/css/smoothness/jquery-ui-1.8.22.custom.css" rel="stylesheet">
<link href="media/preview-assets/css/github.css" rel="stylesheet">

<!-- slider stylesheets -->

<link href="media/royalslider/minimal-white/rs-minimal-white.css" rel="stylesheet">
<!--<link href="media/preview-assets/css/main.css" rel="stylesheet">-->

<script id="addJS">jQuery(document).ready(function($) {
  $('#slider-with-blocks-1').royalSlider({
    arrowsNav: true,
    arrowsNavAutoHide: false,
    fadeinLoadedSlide: false,
    controlNavigationSpacing: 0,
    controlNavigation: 'bullets',
    imageScaleMode: 'none',
    imageAlignCenter:false,
    blockLoop: true,
    loop: true,
    numImagesToPreload: 4,
	height:460,
    transitionType: 'fade',
    keyboardNavEnabled: true,
    block: {
      delay: 400
    }
  });
});
</script>
<!-- END SLIDER -->
<!-- LOADING SCRIPT -->
<script type="text/javascript">
$(document).ready(function(){
	$("#wrapper").hide();
	$(".slider").hide();
	$("#loading").fadeIn(400);
	
	$('#nav > li').each(function(){
        var t = null;
        var li = $(this);
        li.hover(function(){
            t = setTimeout(function(){
                li.find("ul").slideDown(200);
                t = null;
            }, 300);
        }, function(){
            if (t){
                clearTimeout(t);
                t = null;
            }
            else
                li.find("ul").slideUp(200);
        });
    });

	
});
$(window).load(function(){
		$("#loading").fadeOut(500);
		$("#wrapper").fadeIn(500);
		$(".slider").delay(800).fadeIn(1500);
		
		
});
</script>
</head>

<body id="about">
<div id="loading"><img src="media/images/loading-logo.gif" /></div>
<div id="wrapper">
  <div id="topbar-wrapper">
    <div id="topbar-content">
      <div id="topbar-icons"><a href="#"><img src="media/images/icons/960_home_Instagram.png" /></a><a href="#"><img src="media/images/icons/960_home_Vimeo.png" /></a><a href="#"><img src="media/images/icons/960_home_Twitter.png" /></a><a href="#"><img src="media/images/icons/960_home_FB.png" /></a></div>
    </div>
  </div>
  <div id="content-wrapper">
    <div id="content">
      <?php include('header.php'); ?>
      <section>
  <!-------------------Content Start Here---------->

            	
        <div class="row big-row aboutusBanner">
          <?php
		mysql_select_db($database_tes, $tes);
 		$selectSQL="SELECT * FROM banner  WHERE type='about_us'";
 		$queryset='';
 		$queryset=mysql_query($selectSQL,$tes);
		while($row = mysql_fetch_assoc($queryset))
{?>
                <img src="media/home/banner/<?php echo $row["image"]?>" />

              	<div class="aboutContent">
                <div class="rsABlock aboutHeadline"><?php echo $row["title"]?></div>
                <div class="rsABlock">
               <?php echo $row["content"]?>
</div>
            </div>
          <div class="clr"></div>
             <?php } ?>
        </div>
  <!-------------------Content End Here------------->          
        
        <div class="row mini-row" id="newsletter">
          <div class="one-col-big box">
            <article><img src="media/images/home/live-the-life.png" /></article>
            <form>
              <input type="email" />
              <input type="submit" value="subscribe" />
            </form>
          </div>
        </div>
      </section>
    </div>
  </div>
  <?php include('footer.php'); ?>
</div>
</body>
</html>