<?php require('includes/connectDB.php'); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>Privileged Life</title>
<link href="media/preview-assets/css/reset.css" rel="stylesheet">
<link href="media/style/master.css" rel="stylesheet" type="text/css" />
<link href="media/style/responsive_grid.css" rel="stylesheet" type="text/css" />
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
	$('.pcaption-small').show();
	$('.less').hide();
	$('.description').hide();
	  $('.more').click(function(){
		  //$('.pcaption-small').slideToggle();
		  $(this).hide();
		  $(this).next('.description').delay(200).slideDown(400);
		  $(this).nextAll('.less:first').delay(600).fadeIn(200);
		  
	  });
	  
		$('.less').click(function(){
			$(this).hide();
		  $(this).prev('.description').delay(200).slideUp(400);
		  $(this).prevAll('.more:first').delay(600).fadeIn(200);
		});

	
});
$(window).load(function(){
		$("#loading").fadeOut(500);
		$("#wrapper").fadeIn(500);
		$(".slider").delay(800).fadeIn(1500);
		
		
});
</script>
<style>
<?php $index = 1;
 mysql_select_db($database_tes, $tes);
 $selectSQL="SELECT * FROM banner WHERE type='press_banner'";
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
?>
</style>
<?php include('common-js.php'); ?>
</head>

<body id="press">
<div id="loading"><img src="media/images/loading-logo.gif" /></div>
<div id="wrapper">
  <?php include('topbar.php'); ?>
</div>
<div id="content-wrapper">
  <div class="grid">
    <div id="content">
      <?php include('header.php'); ?>
      <section>
        <div class="gridInner">
          <div class="col_12">
            <div id="slider-with-blocks-1" class="royalSlider rsMinW  ">
              <?php
        $index2 = 1;
		mysql_select_db($database_tes, $tes);
 		$selectSQL="SELECT * FROM banner WHERE type='press_banner'";
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
            </div> -->
              <? $index2++; } ?>
            </div>
          </div>
          <?php


		  $i = 1;
$class1;
$class2;
$what;
		mysql_select_db($database_tes, $tes);
 		$selectSQL="SELECT * FROM press  ORDER BY sort";
 		$queryset='';
 		$queryset=mysql_query($selectSQL,$tes);
		while($row = mysql_fetch_assoc($queryset))
{?>
          <?php

// let's say you have a number


// to test whether $number is odd you could use the arithmetic
// operator '%' (modulus) like this
if( $odd = $i%2 )
{
    // $odd == 1; the remainder of 25/2
	$class1 = 'odd';
	$class2 = 'even';
}
else
{
    // $odd == 0; nothing remains if e.g. $number is 48 instead,
    // as in 48 / 2
	$class1 = 'even';
	$class2 = 'odd';
}
?>
          <div class="grid_12 press-info" style="float:left;">
            <div class="grid_4 <? echo $class1; ?>"> <img src="./media/images/press/<?php echo $row["thumb"]?>" class="fullWidth" /> </div>
            <div class="grid_8 <? echo $class2; ?>">
              <article class="mid-art">
                <div class="pcontent">
                  <div class="pcaption-head"><?php echo $row["title"]?></div>
                  <p class="pre"><i><?php echo $row["date"]?> | <?php echo $row["author"]?></i></p>
                  <div class="pcaption-small"><?php echo $row["excerpt"]?></div>
                  <div class="pressReadmore more"><a class="moreBtn">Read More</a></div>
                  <div class="description"><?php echo $row["content"]?></div>
                  <div class="pressReadmore less"><a class="lessBtn">Read Less</a></div>
                </div>
              </article>
            </div>
            <div class="clr"></div>
          </div>
          <?php $i++; } ?>
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
      </section>
    </div>
  </div>
</div>
<?php include('footer.php'); ?>
</div>
</body>
</html>