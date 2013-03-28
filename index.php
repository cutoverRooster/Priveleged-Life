<?php require('includes/connectDB.php'); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>Privileged Life</title>
<link href="media/preview-assets/css/reset.css" rel="stylesheet">
<link href="media/style/master.css" rel="stylesheet" type="text/css" />
<link href="media/style/slider.css" rel="stylesheet" type="text/css" />
<link href="media/style/responsive_grid.css" rel="stylesheet" type="text/css" />
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
    numImagesToPreload: 0,
	height:460,
    transitionType: 'fade',
    keyboardNavEnabled: true,
    block: {
      delay: 400
    }
  });
  $('#slider-with-blocks-2').royalSlider({
    arrowsNav: true,
    arrowsNavAutoHide: false,
    fadeinLoadedSlide: false,
    controlNavigationSpacing: 0,
    controlNavigation: 'none',
    imageScaleMode: 'none',
	autoScaleSlider: true,
    imageAlignCenter:false,
    blockLoop: true,
    loop: true,
    numImagesToPreload: 0,
	height:212,
    transitionType: 'slide',
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
<?php include('common-js.php'); ?>
<style>
<?php $index = 1;
 mysql_select_db($database_tes, $tes);
 $selectSQL="SELECT * FROM banner WHERE type='banner' ORDER BY sort ASC";
 $queryset='';
 $queryset=mysql_query($selectSQL, $tes);
 while($row = mysql_fetch_assoc($queryset)) {
?> .slide<?php echo $index;
?> {
 background:url(media/home/banner/<?php echo $row['image'];
?>) no-repeat center center;
}
<? $index++;
}
?> .pressSlide1 {
}
#slider-with-blocks-2 {
	width:100%;
	height:100%;
}
#slider-with-blocks-2 pressSlide1{
	width:100%;
	height:100%;
}
	
/*.pressSlider .royalSlider
{
	width:100%;
	height:auto;
}*/



</style>
</head>

<body id="home">
<div id="loading"><img src="media/images/loading-logo.gif" /></div>
<div id="wrapper">
  <?php include('topbar.php'); ?>
</div>
<div id="content-wrapper">
  <div class="grid"><!-- grid start -->
    <div id="content">
      <?php include('header.php'); ?>
      <section>
      <div class="gridInner">
        <div class="col_12">
          <div id="slider-with-blocks-1" class="royalSlider rsMinW  ">
            <?php
            $index2 = 1;
		mysql_select_db($database_tes, $tes);
 		$selectSQL="SELECT * FROM banner WHERE type='banner' ORDER BY sort ASC";
 		$queryset='';
 		$queryset=mysql_query($selectSQL,$tes);
		while($row = mysql_fetch_assoc($queryset))
{?>
            <div class="rsContent slide<?php echo $index2; ?>">
              <div class="bContainer">
                <div  class="titleBg">
                  <div class="rsABlock txtCent blockHeadline" data-move-effect="top"><? echo $row['title']; ?></div>
                  <div class="rsABlock txtCent blockSubHeadline" data-move-effect="left"><? echo $row['content']; ?></div>
                </div>
              </div>
            </div>
            <!--<div class="rsContent slide2">
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
            </div>-->
            <? $index2++; } ?>
          </div>
          <div class="clr"></div>
        </div>
        <!-- End Slider -->
        
        <div class="row col_12 mB0">
          <div class="col_8 allM">
            <article class="col_12 bigImage fullWidth allM">
              <?php
		mysql_select_db($database_tes, $tes);
 		$selectSQL="SELECT * FROM banner  WHERE type='collection'";
 		$queryset='';
 		$queryset=mysql_query($selectSQL,$tes);
		while($row = mysql_fetch_assoc($queryset))
{?>
              <a href="collection.php"><img src="./media/home/banner/<?php echo $row["image"]?>" class="fullWidth"/></a>
              <div class="text-area">
                <div class="caption-head"><?php echo $row["title"]?></div>
                <div class="caption-small"><?php echo $row["content"]?></div>
              </div>
              <?php } ?>
            </article>
          </div>
          <div class="col_4 small-art allM">
            <div class="col_12 fullWidth mL2 mB0 mT1"> <a href="http://vimeo.com/37819975" target="_blank"><img src="media/images/home/960_home_Image3.png" class="col_12 mT0 fullWidth" /></a>
              <div class="text-area">
                <div class="caption-head txt-center font-head-mid">Privileged life - Launch Party</div>
              </div>
            </div>
            <div class="col_12 fullWidth mL2 mT4 mB0"> <a href="about_us.php"> <img src="media/images/home/960_home_Image4.png" class="col_12 mT0 fullWidth"/></a>
              <div class="text-area">
                <div class="caption-head txt-center font-head-mid"><a style="text-decoration:none; color:#FFF;"href="about_us.php">Privileged life - ABOUT US</a></div>
              </div>
            </div>
          </div>
          <div class="clr"></div>
        </div>
        <div class="col_12 lookBook mT2">
          <div class="col_4 mL0 mR0 mT0 mB0 pressSlider">
            <div id="slider-with-blocks-2" class="royalSlider rsMinW col_12 mT0 mL0 mB0">
              <?php
		mysql_select_db($database_tes, $tes);
 		$selectSQL="SELECT * FROM press ORDER BY sort DESC LIMIT 4";
 		$queryset='';
 		$queryset=mysql_query($selectSQL,$tes);
		while($row = mysql_fetch_assoc($queryset))
{?>
              <div class="rsContent pressSlide1" style="background:URL('media/images/press/<?php echo $row["thumb"]?>') no-repeat center center;">
                <div class="bContainer">
                  <div class="pressTitle rsABlock txtCent">
                    <div class="caption-head txt-center font-head-mid"><a style="text-decoration:none; color:#FFF;"href="press.php">Press</a></div>
                  </div>
                </div>
              </div>
              <? $pressindex++; 
			  } ?>
              <!-- <a href="press.php"><img src="media/images/home/press_image.png" class="col_12 allM fullWidth" /></a> </div>--> 
            </div>
          </div>
          <div class="col_8 mid-art allM"> <a href="http://instagram.com/privileged_life/"><img src="media/images/home/lookbook_image.png" class="col_12 fullWidth mT0 mB0" /></a>
            <div class="text-area">
              <div class="caption-head"><a style="text-decoration:none; color:#FFF;"href="http://instagram.com/privileged_life/">LIFESTYLE</a> </div>
              <!---<div class="caption-small">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur consectetur, enim id sagittis gravida, odio dui dapibus neque.</div>---> 
            </div>
          </div>
          <div class="clr"></div>
        </div>
        <div class="col_12" id="newsletter">
          <div class="col_4"> <img src="media/images/home/live-the-life.png" /> </div>
          <div class="col_8">
            <form>
              <div class="col_9" id="newsletter1">
                <input type="email" value="Email Address...." class="col_12" />
              </div>
              <div class="col_3">
                <input type="submit" value="subscribe" class="col_12" />
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    </section>
  </div>
</div>
<!-- grid end-->

</div>
<?php include('footer.php'); ?>
</div>
</body>
</html>