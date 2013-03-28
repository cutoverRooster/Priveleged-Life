<?php

function checkUser(){
        $currentpage=$_SERVER["REQUEST_URI"];
        $setcurrent="current";
        $pos=strpos($currentpage,'adduser.php');
        $pos1=strpos($currentpage,'manageuser.php');
        if (($pos == true)  || ($pos1 == true)){
          return $setcurrent;
        }
}
function checkHome() {
		$currentpage=$_SERVER["REQUEST_URI"];
		$setcurrent="current";
		$pos = strpos($currentpage, 'managebanner.php');
		$pos1 = strpos($currentpage, 'managenewcollection.php');
		if (($pos == true) || ($pos1 == true)){
			return $setcurrent;
		}
}
function checkContent() {
		$currentpage=$_SERVER["REQUEST_URI"];
		$setcurrent="current";
		$pos = strpos($currentpage, 'manageaboutus.php');
        $pos1 = strpos($currentpage, 'managefaq.php');
        $pos2 = strpos($currentpage, 'managedocument.php');
		if (($pos == true) || ($pos1 == true) || ($pos2 == true) ){
			return $setcurrent;
		}
}
function checkCollection() {
		$currentpage=$_SERVER["REQUEST_URI"];
		$setcurrent="current";
		$pos = strpos($currentpage, 'manageseasons.php');
		$pos1 = strpos($currentpage, 'manageproducts.php');
        $pos2 = strpos($currentpage, 'managegallery.php');
		if (($pos == true) || ($pos1 == true) || ($pos2 == true)) {
			return $setcurrent;
		}
}
function checkPress() {
		$currentpage=$_SERVER["REQUEST_URI"];
		$setcurrent="current";
        $pos = strpos($currentpage, 'addpressbanner.php');
		$pos1 = strpos($currentpage, 'addpress.php');
		$pos2 = strpos($currentpage, 'managepress.php');
		if (($pos == true) || ($pos1 == true) || ($pos2 == true)) {
			return $setcurrent;
		}
}
function checkDealer() {
		$currentpage=$_SERVER["REQUEST_URI"];
		$setcurrent="current";
         $pos = strpos($currentpage, 'managedealerbanner.php');
		$pos1 = strpos($currentpage, 'adddealer.php');
		$pos2 = strpos($currentpage, 'managedealer.php');
		if (($pos == true) || ($pos1 == true) || ($pos2 == true)) {
			return $setcurrent;
		}
}
function addUser() {
		$currentpage=$_SERVER["REQUEST_URI"];
		$setcurrent="current";
		$pos = strpos($currentpage, 'adduser.php');
		if ($pos == true) {
			return $setcurrent;
		}
}
function manageUser() {
		$currentpage=$_SERVER["REQUEST_URI"];
		$setcurrent="current";
		$pos = strpos($currentpage, 'manageuser.php');
		if ($pos == true) {
			return $setcurrent;
		}
}
function manageBanner() {
		$currentpage=$_SERVER["REQUEST_URI"];
		$setcurrent="current";
		$pos = strpos($currentpage, 'managebanner.php');
		if ($pos == true) {
			return $setcurrent;
		}
}
function manageAboutUs() {
		$currentpage=$_SERVER["REQUEST_URI"];
		$setcurrent="current";
		$pos = strpos($currentpage, 'manageaboutus.php');
		if ($pos == true) {
			return $setcurrent;
		}
}
function manageFaq() {
		$currentpage=$_SERVER["REQUEST_URI"];
		$setcurrent="current";
		$pos = strpos($currentpage, 'managefaq.php');
		if ($pos == true) {
			return $setcurrent;
		}
}
function manageDocument() {
		$currentpage=$_SERVER["REQUEST_URI"];
		$setcurrent="current";
		$pos = strpos($currentpage, 'managedocument.php');
		if ($pos == true) {
			return $setcurrent;
		}
}

function manageNewCollection() {
		$currentpage=$_SERVER["REQUEST_URI"];
		$setcurrent="current";
		$pos = strpos($currentpage, 'managenewcollection.php');
		if ($pos == true) {
			return $setcurrent;
		}
}
function manageSeasons() {
		$currentpage=$_SERVER["REQUEST_URI"];
		$setcurrent="current";
		$pos = strpos($currentpage, 'manageseasons.php');
		if ($pos == true) {
			return $setcurrent;
		}
}
function manageProducts() {
		$currentpage=$_SERVER["REQUEST_URI"];
		$setcurrent="current";
		$pos = strpos($currentpage, 'manageproducts.php');
		if ($pos == true) {
			return $setcurrent;
		}
}
function manageGallery() {
		$currentpage=$_SERVER["REQUEST_URI"];
		$setcurrent="current";
		$pos = strpos($currentpage, 'managegallery.php');
		if ($pos == true) {
			return $setcurrent;
		}
}
function addPressBanner() {
		$currentpage=$_SERVER["REQUEST_URI"];
		$setcurrent="current";
		$pos = strpos($currentpage, 'addpressbanner.php');
		if ($pos == true) {
			return $setcurrent;
		}
}
function addPress() {
		$currentpage=$_SERVER["REQUEST_URI"];
		$setcurrent="current";
		$pos = strpos($currentpage, 'addpress.php');
		if ($pos == true) {
			return $setcurrent;
		}
}
function managePress() {
		$currentpage=$_SERVER["REQUEST_URI"];
		$setcurrent="current";
		$pos = strpos($currentpage, 'managepress.php');
		if ($pos == true) {
			return $setcurrent;
		}
}
function addDealerBanner() {
		$currentpage=$_SERVER["REQUEST_URI"];
		$setcurrent="current";
		$pos = strpos($currentpage, 'adddealerbanner.php');
		if ($pos == true) {
			return $setcurrent;
		}
}
function addDealer() {
		$currentpage=$_SERVER["REQUEST_URI"];
		$setcurrent="current";
		$pos = strpos($currentpage, 'adddealer.php');
		if ($pos == true) {
			return $setcurrent;
		}
}
function manageDealer() {
		$currentpage=$_SERVER["REQUEST_URI"];
		$setcurrent="current";
		$pos = strpos($currentpage, 'managedealer.php');
		if ($pos == true) {
			return $setcurrent;
		}
}

?>

<div id="sidebar">
  <div id="sidebar-wrapper"> <!-- Sidebar with logo and menu -->
    <!-- Logo (221px wide) -->
    <div align="center"> <a href="#"><img src="resources/images/logo.png" alt="Simpla Admin logo" name="logo" border="0" id="logo" /></a> </div>

    <!-- Sidebar Profile links -->
    <div id="profile-links"> Hello,<?php echo($uname); ?><br />
      <br />
      <a href="http://onearmbandit.in/privileged-life/" title="View the Site">View the Site</a> | <a href="process_logout.php" title="Sign Out">Sign Out</a> </div>
    <ul id="main-nav">
      <!-- Accordion Menu -->
      <?php
      if($_SESSION['admin']=="admin"){
      ?>
      <li> <a href="#" class="nav-top-item <?php echo checkUser(); ?>">
        <!-- Add the class "current" to current menu item -->User</a>
        <ul>
          <li><a href="adduser.php" class="<?php echo addUser(); ?>">Add User</a></li>
          <li><a href="manageuser.php" class="<?php echo manageUser(); ?>">Manage User</a></li>
        </ul>
      </li>
      <?php
      }
      ?>
       <li> <a href="#" class="nav-top-item <?php echo checkContent(); ?>">
        <!-- Add the class "current" to current menu item -->Content</a>
        <ul>
          <li><a href="manageaboutus.php" class="<?php echo manageAboutUs(); ?>">Manage About Us</a></li>
          <li><a href="managefaq.php" class="<?php echo manageFaq(); ?>">Manage Faq</a></li>
          <li><a href="managedocument.php" class="<?php echo manageDocument(); ?>">Manage Policy</a></li>

        </ul>
      </li>
      <li> <a href="#" class="nav-top-item <?php echo checkHome(); ?>">
        <!-- Add the class "current" to current menu item -->Home</a>
        <ul>
          <li><a href="managebanner.php" class="<?php echo manageBanner(); ?>">Manage Banner</a></li>
          <li><a href="managenewcollection.php" class="<?php echo manageNewCollection(); ?>">Manage New Collections</a></li>
        </ul>
      </li>
      <li> <a href="#" class="nav-top-item <?php echo checkCollection(); ?>">
        <!-- Add the class "current" to current menu item -->Collection</a>
        <ul>
          <li><a href="manageseasons.php" class="<?php echo manageSeasons(); ?>">Manage Seasons</a></li>
          <li><a href="manageproducts.php" class="<?php echo manageProducts(); ?>">Manage Products</a></li>
          <li><a href="managegallery.php" class="<?php echo manageGallery(); ?>">Manage Gallery</a></li>
        </ul>
      </li>
      <li> <a href="#" class="nav-top-item <?php echo checkPress(); ?>">
        <!-- Add the class "current" to current menu item -->Press</a>
        <ul>

        <li><a href="managepressbanner.php" class="<?php echo addPressBanner(); ?>">Add a Press Banner</a></li>
          <li><a href="addpress.php" class="<?php echo addPress(); ?>">Add a Press</a></li>
          <li><a href="managepress.php" class="<?php echo managePress(); ?>">Manage Press</a></li>
        </ul>
      </li>
       <li> <a href="#" class="nav-top-item <?php echo checkDealer(); ?>">
        <!-- Add the class "current" to current menu item -->Dealer</a>
        <ul>
        <li><a href="managedealerbanner.php" class="<?php echo addDealerBanner(); ?>">Add Dealer Banner</a></li>
          <li><a href="adddealer.php" class="<?php echo addDealer(); ?>">Add Dealer</a></li>
          <li><a href="managedealer.php" class="<?php echo manageDealer(); ?>">Manage Dealer</a></li>
        </ul>
      </li>
    </ul>
    <!-- End #main-nav -->
  </div>
</div>
