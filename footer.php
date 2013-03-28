<!--<footer>
  <div id="foot-area" class="grid">
    <ul id="foot-nav">
      <li>info
        <ul>
          <li><a href="#">sitemaps</a></li>
          <li><a href="#">f.a.qs</a></li>
          <li><a href="policy.php">Privacy Policy</a></li>
          <li><a href="dealers.php">Dealer List</a></li>
          <li><a href="contact.php">Contact Us</a></li>
        </ul>
      </li>
      <li>Collections
        <ul>
          <li><a href="collection.php">Spring 2011</a></li>
          <li><a href="collection.php">Summer 2011</a></li>
          <li><a href="collection.php">Fall/Winter 2011</a></li>
          <li><a href="collection.php">Spring 2012</a></li>
          <li><a href="collection.php">Summer 2012</a></li>
        </ul>
      </li>
      <li>social
        <ul class="socialIcon">
          <li><a href=" http://www.facebook.com/PrivilegedLife"><img src="media/images/icons/960_home_FBbig.png" /></a> </li>
          <li><a href="https://twitter.com/Privileged_Life"><img src="media/images/icons/960_home_TwitterBig.png" /> </a></li>
          <li><a href=" https://vimeo.com/privilegedlife"><img src="media/images/icons/960_home_VimeoBig.png" /></a></li>
          <li><a href=" http://instagram.com/privileged_life/"><img src="media/images/icons/960_home_InstagramBig.png" /></a> </li>
        </ul>
      </li>
      </li>
    </ul>
    <div class="clr"></div>
  </div>
</footer>-->


<footer>
  <div id="foot-area" class="grid">
    <div id="foot-nav" class="col_12">
      <div class="col_4 footerRightBorder">
      	<div class="col_10 footerLinkTitles">info</div>
          <ul class="col_12">  
          <!---<li><a href="#">sitemaps</a></li>
          <li><a href="#">f.a.qs</a></li>--->
          <li><a href="policy.php">Privacy Policy</a></li>
          <li><a href="dealers.php">Dealer List</a></li>
          <li><a href="contact.php">Contact Us</a></li>
        </ul>
      </div>
      <div class="col_4 footerRightBorder noBorder">
      <div class="col_10 footerLinkTitles">Collections</div>
	   <?php
                require('includes/connectDB.php');
mysql_select_db($database_tes, $tes);
$selectSQL='SELECT * FROM seasons';
$queryset='';
$queryset=mysql_query($selectSQL,$tes);
while($row = mysql_fetch_assoc($queryset)) {
?>
          <ul class="col_12">  
          <li><a href="collection.php"><?php echo($row['title']); ?></a></li>
        </ul>
		<?php }?>
      </div>
      <div class="col_4 mR0">
      <div class="col_10 footerLinkTitles">social</div>
          <ul class="socialIcon"> 
          <li><a href=" http://www.facebook.com/PrivilegedLife"><img src="media/images/icons/960_home_FBbig.png" /></a> </li>
          <li><a href="https://twitter.com/Privileged_Life"><img src="media/images/icons/960_home_TwitterBig.png" /> </a></li>
          <li><a href=" https://vimeo.com/privilegedlife"><img src="media/images/icons/960_home_VimeoBig.png" /></a></li>
          <li><a href=" http://instagram.com/privileged_life/"><img src="media/images/icons/960_home_InstagramBig.png" /></a> </li>
        </ul>
      </div>
    </div>
    
    <div class="copyright col_12">
    	 Copyright © 2013 Privileged Life Inc.
    </div>
    
    <div class="clr"></div>
  </div>
</footer>