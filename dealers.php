<?php require('includes/connectDB.php'); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
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
<style>
<?php
$index = 1;
		mysql_select_db($database_tes, $tes);
 		$selectSQL="SELECT * FROM banner WHERE type='dealer_banner'";
 		$queryset='';
 		$queryset=mysql_query($selectSQL,$tes);
		while($row = mysql_fetch_assoc($queryset))
{?>
.slide<?php echo $index; ?> {
  background:url(media/home/banner/<?php echo $row['image']; ?>) no-repeat center center;
}
<? $index++; } ?>
</style>
</head>

<body id="dealers">
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
        <div class="one-col-big">
          <div id="slider-with-blocks-1" class="royalSlider rsMinW  ">
           <?php
        $index2 = 1;
		mysql_select_db($database_tes, $tes);
 		$selectSQL="SELECT * FROM banner WHERE type='dealer_banner'";
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
            </div>  -->
             <? $index2++; } ?>
          </div>
        </div>
        <div class="dealers">
        <div class="col_12 mB0 ml0">
        <?php
		mysql_select_db($database_tes, $tes);
 		$selectSQL="SELECT * FROM dealer  ORDER BY sort ";
 		$queryset='';
 		$queryset=mysql_query($selectSQL,$tes);
		while($row = mysql_fetch_assoc($queryset))
{?>

          <div class="dealerswrapper col_6 ml0">
            <div class="col_12">
            <div class="dcaption-head "><?php echo $row["name"]?></div>
            <div class="dcaption-small"><?php echo $row["address"]?></br>
              <?php echo $row["city"]?>, <?php echo $row["state"]?>,<?php echo $row["zip"]?> </br>
              <?php echo $row["country"]?></div>
              </div>
          </div>
                 <?php } ?>
          <div class="clr"></div>

        </div>
        </div></div>
        <div class="col_12" id="newsletter">
        <div class="col_4">
          <img src="media/images/home/live-the-life.png" />
        </div>
        <div class="col_8">
          <form>
            <div class="col_9" id="newsletter1"><input type="email" value="Email Address...." class="col_12" /></div>
            <div class="col_3"><input type="submit" value="subscribe" class="col_12" /></div>
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