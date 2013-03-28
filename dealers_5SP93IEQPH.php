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

<body id="home">
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
        <div class="one-col-big slider">
          <div id="slider-with-blocks-1" class="royalSlider rsMinW  ">
            <div class="rsContent slide1">
              <div class="bContainer">
                <div class="rsABlock txtCent blockHeadline" data-move-effect="top">Spring 2011</div>
                <div class="rsABlock txtCent blockSubHeadline" data-move-effect="left">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur consectetur, enim id sagittis gravida, odio dui dapibus neque.</div>
              </div>
            </div>
            <div class="rsContent slide2">
              <div class="bContainer">
                <div class="rsABlock txtCent blockHeadline" data-move-effect="left">Spring 2011</div>
                <div class="rsABlock txtCent blockSubHeadline" data-move-effect="bottom">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur consectetur, enim id sagittis gravida, odio dui dapibus neque.</div>
              </div>
            </div>
            <div class="rsContent slide3">
              <div class="bContainer">
                <div class="rsABlock txtCent blockHeadline" data-move-effect="right">Spring 2011</div>
                <div class="rsABlock txtCent blockSubHeadline" data-move-effect="left">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur consectetur, enim id sagittis gravida, odio dui dapibus neque.</div>
              </div>
            </div>
          </div>
        </div>
        
      <div class="row small-row">
         
              <div class="dealerswrapper floatL  ">
                   
                     <div class="dcaption-head ">PL STORE #1</div>
                         <div class="dcaption-small">77 Meters Street</br> New York, New York, 20012 </br>United States</div>
                    
             </div>
               
               <div class="dealerswrapper floatR">
                  
                      <div class="dcaption-head">PL STORE #2</div>
                
                       <div class="dcaption-small">46 Jobs Lane,</br> Southhamption, New York, 11968 </br>United States</div>
                  
              </div>
              
              <div class="clr"></div>
        </div>
          <div class="row small-row">
         
              <div class="dealerswrapper floatL ">
                   
                     <div class="dcaption-head">PL STORE #3</div>
                         <div class="dcaption-small">46 Jobs Lane,</br> Southhamption, New York, 11968</br>United States</div>
                    
             </div>
               
               <div class="dealerswrapper floatR">
                  
                      <div class="dcaption-head">PL STORE #4</div>
                
                       <div class="dcaption-small">77 Meters Street</br>  New York, New York, 20012 </br>United States</div>
                  
              </div>
              
              
            
          
          
          <div class="clr"></div>
        </div>
        
        
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
<?php
echo "<mm:dwdrfml documentRoot=" . __FILE__ .">";$included_files = get_included_files();foreach ($included_files as $filename) { echo "<mm:IncludeFile path=" . $filename . " />"; } echo "</mm:dwdrfml>";
?>