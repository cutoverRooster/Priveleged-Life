<?php
 require('includes/connectDB.php'); 
 $name=$_POST['name'];
$email=$_POST['email'];
$telephone=$_POST['telephone'];
$purpose=$_POST['purpose'];
$message=$_POST['message'];
mysql_select_db($database_tes, $tes);
$insertSQL='';
$insertSQL ='INSERT INTO `user_info` VALUES (NULL,"'.$name.'","'.$email.'","'.$telephone.'","'.$purpose.'","'.$message.'")';
mysql_query($insertSQL,$tes) or die(mysql_error());



        $to = 'mailinglist@privilegedlife.com';
        $subject="Contact Information from P-Life";
    	$headers  = "MIME-Version: 1.0\r\n";
		$headers= "From: ".$_REQUEST['email']."\n";
		$headers= $headers."Content-Type: text/html; charset=iso-8859-1\n";
		$mailbody="<table cellpadding='4' cellspacing='0'>";
		$mailbody=$mailbody."<tr><td valign='top'><strong>Name</strong></td><td><strong> : </strong></td><td>".$_REQUEST['name']."</td></tr>";
		$mailbody=$mailbody."<tr><td valign='top'><strong>Email</strong></td><td><strong> : </strong></td><td>".$_REQUEST['email']."</td></tr>";
		$mailbody=$mailbody."<tr><td valign='top'><strong>Telephone</strong></td><td><strong> : </strong></td><td>".$_REQUEST['telephone']."</td></tr>";
		$mailbody=$mailbody."<tr><td valign='top'><strong>Purpose</strong></td><td><strong> : </strong></td><td>".$_REQUEST['purpose']."</td></tr>";
		$mailbody=$mailbody."<tr><td valign='top'><strong>Message</strong></td><td><strong> : </strong></td><td>".$_REQUEST['message']."</td></tr>";
		$mailbody=$mailbody."</table>";
		@mail($to,$subject,$mailbody,$headers);
     
		?>
		
		<script type="text/javascript">alert('Thank you for your question or comment.  If you require a response, one of our associates will contact you shortly.');</script>
		
		<?php
      echo "<meta http-equiv='refresh' content='0;url=contact.php'>";
?>

