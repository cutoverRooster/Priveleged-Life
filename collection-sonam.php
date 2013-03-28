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

<link href="media/royalslider/default/rs-default.css" rel="stylesheet">
<link href="media/royalslider/minimal-white/rs-minimal-white.css" rel="stylesheet" />
<!--<link href="media/preview-assets/css/main.css" rel="stylesheet">-->

<!-- END SLIDER -->
<!-- LOADING SCRIPT -->

<!-- lightbox --->
<link rel="stylesheet" href="media/style/colorbox.css" />
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>-->
<script src="media/js/jquery.colorbox.js"></script>

 <script language="javascript" type="text/javascript">

    function myFunction(){
    var ajaxRequest;

try{
    // Opera 8.0+, Firefox, Safari
    ajaxRequest = new XMLHttpRequest();
} catch (e){
    // Internet Explorer Browsers
    try{
        ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
        try{
            ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (e){
            // Something went wrong
            alert("Your browser has Failed");
            return false;
        }
    }
}

ajaxRequest.onreadystatechange = function(){
    if(ajaxRequest.readyState == 4){
        var ajaxDisplay = document.getElementById('ajaxDiv1');
        ajaxDisplay.innerHTML = ajaxRequest.responseText;
    }
}

    document.proffForm.submit();
ajaxRequest.open("GET", "proff/all_proff.php");
ajaxRequest.send(null);


    }

    </script>

    <form name='proffForm' >
    <a href="#" onclick='myFunction()' >List All Professions</a>
    </form>

    <div id='ajaxDiv1'></div></p>
<style>
<?/* $sindex = 1;
while ($sindex < 64){*/?>
#gallery-2 {
	width: 530px;
	height:490px !important;
	/*width: 100%;
	height: auto;*/
	margin: 0;
	padding: 0;
}
<? /*$sindex ++; 
} */?>
.rsDefault .rsThumb {
	width: 106px;
	height: 106px;
}
</style>
<script id="addJS">
jQuery(document).ready(function($) {
	$('#collection-tabs').royalSlider({
autoHeight: true,
arrowsNav: true,
fadeinLoadedSlide: true,
controlNavigationSpacing: 0,
controlNavigation: false,
imageScaleMode: 'none',
imageAlignCenter:false,
loop: false,
loopRewind: true,
//width:940,
numImagesToPreload: 6,
keyboardNavEnabled: true,
autoScaleSlider: false
});
/*$('#gallery-1').royalSlider({
fullscreen: {
enabled: false,
nativeFS: false
},
controlNavigation: 'thumbnails',
autoScaleSlider: true, 
autoScaleSliderWidth: 485,     
autoScaleSliderHeight: 520,
loop: false,
numImagesToPreload:4,
arrowsNavAutohide: true,
arrowsNavHideOnTouch: true,
keyboardNavEnabled: true
});
*/
	$('#gallery-2').royalSlider({
fullscreen: {
enabled: false,
nativeFS: false
},
controlNavigation: 'thumbnails',
autoScaleSlider: true, 
autoScaleSliderWidth: 485,     
autoScaleSliderHeight: 520,
loop: false,
numImagesToPreload:0,
arrowsNavAutohide: true,
arrowsNavHideOnTouch: true,
keyboardNavEnabled: true
});
});
</script>
<script id="addJS">$(window).load(function()  {
//$("#loading").fadeOut(500);
//$("#wrapper").fadeIn(500);
//$(".slider").delay(800).fadeIn(1500);

$('.royalSlider').royalSlider('updateSliderSize', true);


});

</script>
<script type="text/javascript">
$(document).ready(function(){
//$("#wrapper").hide();*/
/*$(".slider").hide();*/
//$("#loading").fadeIn(400);

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
</script>

<?php include('common-js.php'); ?>
</head>

<body id="collection">
<div id="loading"><img src="media/images/loading-logo.gif" /></div>
<div id="wrapper">
  <?php include('topbar.php'); ?>
  <div id="content-wrapper">
    <div class="grid">
      <div id="content">
        <?php include('header.php'); ?>
        <section>
          <div class="gridInner">
            <div class="col_12">
              <div id="collection-tabs" class="royalSlider contentSlider rsDefault">
                <?php
$seasonIndex = 1;
mysql_select_db($database_tes, $tes);
$selectSQL="SELECT * FROM seasons";
$queryset='';
$queryset=mysql_query($selectSQL,$tes);
while($row = mysql_fetch_assoc($queryset))
{?>
                <div>
                  <? $s_id = $row['id']; ?>
                  <div class="collect-toppart">
                    <div class="rsTmb"><? echo $row['title']; ?></div>
                    <div class="blockHeadline"><? echo $row['title']; ?></div>
                    <div class="blockSubHeadline"><? echo $row['content']; ?></div>
                    <div class="image-back rsImg" data-move-effect="bottom"><img src="media/collection/season/<? echo $row['image']; ?>" /></div>
                  </div>
                  <!-- END COLLECT TOPPART -->
                  <div class="row">
                    <?php
$prodindex = 1;
mysql_select_db($database_tes, $tes);
$selectSQL2="SELECT * FROM products WHERE s_id = $s_id";
$queryset2='';
$queryset2=mysql_query($selectSQL2,$tes);
while($row2 = mysql_fetch_assoc($queryset2))
{
$p_id = $row2['id'];
?>
                    <div class="col_6">
                      <div class="col_12 allM"> <a href="collection-sonam.php?collect=<?php echo $p_id;?>">
                        <figure> <img src="media/collection/product/<?php echo $row2['thumb']; ?>"  /> </figure>
                        </a> 
                        
                        <div class="clr"></div>

                      </div>
                    </div>
                    <!-- END COLLECTION THUMB -->
                    <? $prodindex++; } ?>
                  </div>
                  <!-- END ROW --> 
                </div>
                <!-- END SEASON TAB-->
                <? $seasonIndex++; } ?>
              </div>
              <!-- END COLLECTION TAB --> 
            </div>
            <!-- END SLIDER DIV -->
            
            <div class="col_12" id="newsletter">
              <div class="col_4"> <img src="media/images/home/live-the-life.png" /> </div>
              <div class="col_8">
                <form>
                  <div class="col_9">
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

    <?php
    if(isset($_REQUEST['collect'])){

   $c_id = $_REQUEST['collect'];
         ?>
         <script>
         $(document).ready(function(){
                 $.colorbox({inline:true, href:"#inline_content1"});
         });
         </script>

           <?
    }
      ?>
    <!-- LIGHTBOX START -->

                        <div style='display:none;' class="collectionPopupHide">
                          <div id='inline_content1' style='padding:10px; background:#fff; position:relative;'>
                            <div class="main mT20">
                              <div id="gallery-2" class="royalSlider rsMinW fwImage">

                                <?php
$imageindex = 1;
mysql_select_db($database_tes, $tes);
$selectSQL3="SELECT * FROM product_gallery WHERE p_id = $c_id";
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
                            <div class="contentR">
                              <div class="cpopbigcont">Preveleged Life</br>
                                Fall 2012 - Red Jacket</div>
                              <div class="smallcont floatL mT20 mL20">Item description goes here:</br>
                                </br>
                                Item Description #1</br>
                                Item Description #1</br>
                                Item Description #1</br>
                                <div class="buyButton mT10"><a href="#">BUY NOW</a></div>
                              </div>
                              <div class="popup_social floatL">
                                <div class="popupSocialTitle">Spread the word:</div>
                                <div class="popupSocialIcon"><a href="#"><img src="media/images/popup/fIcon.png" /></a> <a href="#"><img src="media/images/popup/tIcon.png" /></a> <a href="#"><img src="media/images/popup/pIcon.png" /></a></div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <!-- END LIGHTBOX  -->


  </div>
  <?php include('footer.php'); ?>
</div>
</body>
</html>