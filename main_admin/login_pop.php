<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title></title>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />

<script type="text/javascript">
function formsubmit()
{
	document.getElementById(form1).submit();	
}
</script>
</head>

<body>
<table width="480" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="480" height="106" valign="top" style="padding-left:25px; padding-right:25px;">
    <br />
    <form id="form1" name="form1" method="post" action="process_signin.php" target="mainwindow">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="23%" class="producttitle_pink">E-mail:</td>
          <td width="77%">
          <span id="sprytextfield1">
            <input type="text" name="email" id="email" class="signup_input" width="320px"/>
          </span></td>
</tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td class="producttitle_pink">Password:</td>
          <td><span id="sprytextfield2">
            <input type="password" name="password" id="password" class="signup_input" width="320px" />
          </span></td>
</tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
    </form>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>      </tr>
    <tr>      </tr>
    </table></td>
  </tr>
</table>
<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "email", {validateOn:["blur", "change"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {validateOn:["blur", "change"]});
//-->
</script>
</body>
</html>
