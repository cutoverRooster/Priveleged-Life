<!DOCTYPE HTML>
<html><head>
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
        <div class="contact">
            <div class="col_6 mL2"><img src="media/images/contact/contact_01.png" class="fullWidth" /></div>
           <div class="col_6"> 
               
                   <div class="cbigcont">FOR GENERAL INQUIRIES</div>
              
               <div class="col_12 contactContent">
                    <div class="col_10">
                        <div class="col_2"><span class="locationIcon"></span></div>
                        <div class="col_9">1410 Broadway</br>New York, NY 10018</div>
                    </div>
                    <div class="col_10">
                        <div class="col_2"><span class="emailIcon"></span></div>
                        <div class="col_9">info@previlegedlife.com</div>
                    </div>
               </div>
            </div>
           
          
          <div class="clr"></div>
          </div>
        </div>
        
        <div class="col_12">
        <div class="c_contact">
        <form>
			 <div class="cbigcont">PLEASE FILL THE FORM BELOW</div>
                <div class="col_12">
                    <div class="col_4 textR pT15">Full Name </div>
                    <div class="col_6"><input type="text" id="full name" class="col_12" /></div>
                </div>
               <div class="col_12">
                    <div class="col_4 textR pT15">Email </div>
                    <div class="col_6"><input type="text" id="email" class="col_12"/></div>
                </div>
                <div class="col_12">
                    <div class="col_4 textR pT15">Telephone </div>
                    <div class="col_6"><input type="text" id="full name" class="col_12" /></div>
                </div>
               <div class="col_12">
                    <div class="col_4 textR">Purpose </div>
                    <div class="col_8">
                    <input type="radio" name="1" value="business" style="padding-right:20px;"><label class="lable"> Business</label>
                    <input type="radio" name="1" value="individual"><label class="lable">Individual</label>
                    <input type="radio" name="1" value="press" ><label class="lable"> Press</label>
                   </div>
               
              </div>
              <div class="col_12">
                   <div class="col_4 textR">Message</div>
                   <div class="col_6"><textarea name="comments" rows="10" class="col_12"></textarea>
                   					  <div class="sendButton"><a href="#">SEND</a></div>
                   </div>
                   
             </div> 
            </form>  
            
          <div class="clr"></div>
          </div>
        </div>
        
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
      
      
        </div>
      </section>
    </div>
    </div>
  </div>
  <?php include('footer.php'); ?>
</div>
</body>
</html>