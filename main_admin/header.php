<?php
function checkprofile() {
		$currentpage=$_SERVER["REQUEST_URI"];
		$setcurrent=' class="active"';
		$pos = strpos($currentpage, 'neumec/profile.php');
		if ($pos == true) {
			return $setcurrent;
		}
}
function checkredevelopment() {
		$currentpage=$_SERVER["REQUEST_URI"];
		$setcurrent=' class="active"';
		$pos = strpos($currentpage, 'neumec/redevelopment.php');
		if ($pos == true) {
			return $setcurrent;
		}
}
function checkrelocation() {
		$currentpage=$_SERVER["REQUEST_URI"];
		$setcurrent=' class="active"';
		$pos = strpos($currentpage, 'neumec/location.php');
		if ($pos == true) {
			return $setcurrent;
		}
}
?>
<div class="header_wrapper">
    <div class="header">
        <div class="logo"><a href="index.php"><img src="Images/logo.png" width="237" height="49" border="0" alt="logo" /></a></div>
            <div class="menu">
              <ul>
                <li><a href="profile.php"<?php echo checkprofile(); ?>><span>Profile</span></a></li>
                <li><a href="#"><span>Projects</span></a></li>
                <li><a href="location.php"<?php echo checklocation(); ?>><span>Location</span></a></li>
                <li><a href="redevelopment.php"<?php echo checkredevelopment(); ?>><span>Redevelopment</span></a></li>
                <li><a href="#"><span>Associates</span></a></li>
                <li style="border-right:1px solid #666;"><a href="#"><span>Contact</span></a></li>      
              </ul>
            </div>
            <div class="clr"></div>
	</div>
</div>