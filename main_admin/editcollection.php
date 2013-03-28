<?php
session_start(); 
if(!isset($_COOKIE["mmadminset"]))
{
    $host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra='index.php';
    header("Location: http://$host$uri/$extra");
}
else
{
	$username='';
  if(isset($_GET['name']))
  {
    $username=$_GET['name'];	
  }
	$iteration=1;
	$success='style="display:none"';
	$failure='style="display:none"';
	if(isset($_GET['emsg']))
	{
		if($_GET['emsg']=='1')
		{
			$success='';
		}
		elseif($_GET['emsg']=='0')
		{
			$failure='';
		}
	}

  $id=0;
  if(isset($_GET['id']))
  {
    $id=$_GET['id'];
  }
	//$id=$_GET['id'];
	require('../includes/connectDB.php');
	mysql_select_db($database_tes, $tes);
	$selectSQL='SELECT * FROM collection WHERE id='.$id;
	$queryset='';
	$queryset=mysql_query($selectSQL,$tes);
	while($row = mysql_fetch_assoc($queryset))
	{
		$name=$row['name'];
        $category=$row['category'];
        $thumb=$row['thumb'];
        $description=$row['description'];
        $sort=$row['sort'];

	}

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Admin | Welcome</title>
    <!--                       CSS                       -->
    <!-- Reset Stylesheet -->
    <link rel="stylesheet" href="resources/css/reset.css" type="text/css" media="screen" />
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="resources/css/style.css" type="text/css" media="screen" />
    <!-- Invalid Stylesheet. This makes stuff look pretty. Remove it if you want the CSS completely valid -->
    <link rel="stylesheet" href="resources/css/invalid.css" type="text/css" media="screen" />
    <!-- Colour Schemes
		Default colour scheme is green. Uncomment prefered stylesheet to use it.
		<link rel="stylesheet" href="resources/css/blue.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="resources/css/red.css" type="text/css" media="screen" />
	 	-->
    <!-- Internet Explorer Fixes Stylesheet -->
    <!--[if lte IE 7]>
			<link rel="stylesheet" href="resources/css/ie.css" type="text/css" media="screen" />
		<![endif]-->
    <!--                       Javascripts                       -->
    <!-- jQuery -->
    <script type="text/javascript" src="resources/scripts/jquery-1.3.2.min.js"></script>
    <!-- jQuery Configuration -->
    <script type="text/javascript" src="resources/scripts/simpla.jquery.configuration.js"></script>
    <!-- Facebox jQuery Plugin -->
    <script type="text/javascript" src="resources/scripts/facebox.js"></script>
    <!-- jQuery WYSIWYG Plugin -->
    <script type="text/javascript" src="resources/scripts/jquery.wysiwyg.js"></script>

    <!-- jQuery Datepicker Plugin -->
    <script type="text/javascript" src="resources/scripts/jquery.datePicker.js"></script>
    <script type="text/javascript" src="resources/scripts/jquery.date.js"></script>
    <script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
    <script src="SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/tiny_mce/tiny_mce.js"></script>
    <script src="SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
    <script type="text/javascript">
	tinyMCE.init({
		// General options
        mode : "textareas",
        theme : "advanced"
	});
    </script>

    <!--[if IE]><script type="text/javascript" src="resources/scripts/jquery.bgiframe.js"></script><![endif]-->

    <!-- Internet Explorer .png-fix -->

    <!--[if IE 6]>
			<script type="text/javascript" src="resources/scripts/DD_belatedPNG_0.0.7a.js"></script>
			<script type="text/javascript">
				DD_belatedPNG.fix('.png_bg, img, li');
			</script>
		<![endif]-->

    <link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
    <link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
    <link href="SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
    </head>

    <body>
<div id="body-wrapper"> <!-- Wrapper for the radial gradient background -->

      <?php include('sidebar.php'); ?>
      <!-- End #sidebar -->

      <div id="main-content"> <!-- Main Content Section with everything -->

    <noscript>
        <!-- Show a notification if the user has disabled javascript -->
        <div class="notification error png_bg">
      <div> Javascript is disabled or is not supported by your browser. Please <a href="../../../browsehappy.com/index.htm" title="Upgrade to a better browser">upgrade</a> your browser or <a href="../../../www.google.com/support/bin/answer_2EEFB1D5.py" title="Enable Javascript in your browser">enable</a> Javascript to navigate the interface properly. </div>
    </div>
        </noscript>

    <!-- Page Head -->
    <h2>Edit Collection</h2>
    <div class="content-box">
          <!-- Start Content Box -->
          <div class="content-box-header">
        <h3>Fill in the form to edit the Collection</h3>
        <div class="clear"></div>
      </div>
          <!-- End .content-box-header -->
          <div class="content-box-content">
        <div class="notification success png_bg" <?php echo($success); ?>> <a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
              <div> Collection Upload Successfully. </div>
            </div>
        <div class="notification error png_bg" <?php echo($failure); ?>> <a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
              <div> Error Occurred while Uploading Collection. </div>
            </div>
        <div class="tab-content default-tab">
              <form action="process_editcollection.php" method="post" enctype="multipart/form-data" name="editproduct" id="editproduct">
            <fieldset>
                  <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->

                  <p>
                <input name="hiddenid" type="hidden" id="hiddenid" value="<?php echo($id); ?>" />
              </p>
                  <p>
                <label> Name <span id="Collection_name_spry">
                      <input name="name" type="text" class="text-input medium-input" id="name" value="<? echo($name); ?>" />
                      <span class="textfieldRequiredMsg">A value is required.</span> </label>
                </span> </p>
               <p>
                  <label>Choose Category   </label>
               <select name="category">
                <option value="Option Value">Select Category</option>
                <option value="spring" <?php if($type == 'spring') { echo 'selected="selected"'; } ?>>Spring</option>
                <option value="summer"<?php if($type == 'summer') { echo 'selected="selected"'; } ?>>Summer</option>
                <option value="fall/winter"<?php if($type == 'fall/winter') { echo 'selected="selected"'; } ?>>Fall/Winter</option>
              </select>
                   </p>
                   <p> <img src="../media/images/collection/thumbs/<? echo ($thumb); ?>" />
                <label>Thumbnail Upload (current image: <? echo($thumb); ?> )</label>
                <input name="thumb" type="file" class="text-input" id="thumb" value="<? echo($thumb); ?>" />
              </p>
                    <p>
                <label>Description<br />
                      
                  <textarea name="description" id="description" cols="45" rows="5" ><? echo($description); ?></textarea>
                  </label>
              </p>
              <label>Sort Order</label>
              <input name="sort" id="sort" type="text" class="number"value="<? echo($sort); ?>" />
              </p>
                  <p>
                <input class="button" type="submit" value="Submit" />
              </p>
                </fieldset>
            <div class="clear"></div>
            <!-- End .clear -->
          </form>
            </div>
        <!-- End #tab2 --> 
      </div>
          <!-- End .content-box-content --> 
        </div>
    </li>
    </ul>
    <!-- End .shortcut-buttons-set -->
    
    <div class="clear"></div>
    <!-- End .clear --><!-- End .content-box --><!-- End .content-box --><!-- End .content-box -->
    <div class="clear"></div>
    
    <!-- Start Notifications --> 
    <!-- End Notifications -->
    
    <div id="footer"> <small>&#169; Copyright 2011 <a href="http://onearbandit.in/privileged-life">P-LIFE</a></small> </div>
    <!-- End #footer --> 
    
  </div>
      <!-- End #main-content --> 
      
    </div>
<script type="text/javascript">
<!--
var sprytextfield6 = new Spry.Widget.ValidationTextField("new_loc_spry");
var sprytextfield7 = new Spry.Widget.ValidationTextField("collection_name_spry");
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5");
//var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2");
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1");
//var sprytextarea2 = new Spry.Widget.ValidationTextarea("sprytextarea2", {isRequired:false});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");
//-->
</script>
</body>
</html>
