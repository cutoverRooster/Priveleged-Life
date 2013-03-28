
<?php
error_reporting(NULL);
?>
<!DOCTYPE HTML>
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
  $('#mobileGallery').royalSlider({
    arrowsNav: true,
    arrowsNavAutoHide: false,
    fadeinLoadedSlide: false,
    controlNavigationSpacing: 0,
    controlNavigation: 'thumbnails',
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
<?php include('common-js.php'); ?>
</head>

<body id="contact">
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
          <?php require('includes/connectDB.php'); ?>
          <div class="collectionPopupHide">
            <div id='inline_content<? echo $prodindex.$seasonIndex; ?>' style='padding:10px; background:#fff; position:relative;'>
              <div class="col_12">
                <div id="mobileGallery" class="royalSlider rsMinW fwImage">
                  <?php
$imageindex = 1;
$p_id = $_REQUEST['id'];
mysql_select_db($database_tes, $tes);
$selectSQL3="SELECT * FROM product_gallery WHERE p_id = $p_id";
$queryset3='';
$queryset3=mysql_query($selectSQL3,$tes);
while($row3 = mysql_fetch_assoc($queryset3))
{
$i_id = $row3['id'];
?>
                  <a class="rsImg"  data-rsDelay="1000" href="media/collection/gallery/image/<?php echo $row3['image']; ?>"><img class="rsTmb" src="media/collection/gallery/thumb/<?php echo $row3['thumb']; ?>" height="106" width="106"></a>
                  <?php } ?>
                </div>
              </div>
              <div class="col_12 collectionMobileContent">
			   <?php
 require('includes/connectDB.php'); 
mysql_select_db($database_tes, $tes);
$selectSQL4="SELECT * FROM products WHERE id= $p_id";
$queryset4='';
$queryset4=mysql_query($selectSQL4,$tes);
while($row4 = mysql_fetch_assoc($queryset4))

{
$sid=$row4['s_id'];
?>
                <div class="cpopbigcontMobile">Privileged Life</br>
				 <?php
			mysql_select_db($database_tes, $tes);		 
		 $queryrtitle="select title from seasons where id=$sid";
		 $queryset5='';
                $queryset5=mysql_query($queryrtitle,$tes);
                while($row5 = mysql_fetch_assoc($queryset5))
				{
                $title=$row5['title'];?>
                  <?php echo $row5['title'];?> - <?php echo $row4['title']; ?></div>
                <div class="col_6 mT4"><? echo $row4['description']; ?>
                  </div>
                
                <div class="col_12 mobileSocial">
                  <div class="popupSocialTitle col_5"><strong>Spread the word:</strong></div>
                  <div class="popupSocialIcon col_7"><a href="#"><img src="media/images/popup/fIcon.png" /></a> <a href="#"><img src="media/images/popup/tIcon.png" /></a> <a href="#"><img src="media/images/popup/pIcon.png" /></a></div>
                
				</div>
				<? } ?>
				<? } ?>
              </div>
            </div>
          </div>
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
</div>
<?php include('footer.php'); ?>
</div>
</body>
</html>