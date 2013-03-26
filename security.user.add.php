<?
	include "auth_functions.php";
	chk_login();
?>
<html>
<head>
<title>Add a User</title>
<meta http-equiv="Content-Type" content="text/html; charset=tis-620">
</head>

<body bgcolor="#FFFFFF">
<?
	if (isset($_POST["AuthorizationService_Add"])) {
	
	include "auth_config.php";
	
	$filename = $database_name;
	$handler = fopen($filename,'a+');
	
	// strip any html, php or javascript
	$_POST["AuthorizationService_usr"] = strip_tags($_POST["AuthorizationService_usr"]);
	$_POST["AuthorizationService_pwd"] = strip_tags($_POST["AuthorizationService_pwd"]);
	
	// CHECK IF USERNAME EXISTS!
	$read = file_get_contents($filename);
	$usr_pwd = explode("\n",$read);
	
	$register_user = "1"; // Default!
	
		foreach ($usr_pwd as $usr_pwd_array) {
			if ($usr_pwd_array != "" || $usr_pwd_array != NULL) {
				list($db_username, $db_password) = explode("\t",$usr_pwd_array);
				
				if (trim($db_username) == trim($_POST["AuthorizationService_usr"])) {
					
					$register_user = "0";
					break;
					
				} else {
				
					$register_user = "1";
					
				}
			}
		}
	
	// END CHECK IF USER EXISTS
		if (trim($_POST["AuthorizationService_usr"]) == "" || (trim($_POST["AuthorizationService_pwd"])) == "") {
			
			echo "<center><b><font face=\"MS Sans Serif\" color=\"#008000\">Please enter username and password</font></b><br><br><font face=\"MS Sans Serif\"><a href=".$_SERVER['HTTP_REFERER'].">Back</a></font></center>";
			
		} else if ($register_user == "0") {
		
			echo "<center><b><font face=\"MS Sans Serif\" color=\"#008000\">Username Exists already.</font></b><br><br><font face=\"MS Sans Serif\"><a href=".$_SERVER['HTTP_REFERER'].">Change</a></font></center>";
			
		} else if (file_exists($filename) && $register_user == "1") {
			
			fwrite($handler,$_POST["AuthorizationService_usr"]."\t".md5($_POST["AuthorizationService_pwd"])."\r\n");
			echo "<center><b><font face=\"MS Sans Serif\" color=\"#008000\">User addded successfully</font></b><br><br><font face=\"MS Sans Serif\"></font></center>";
			
		} else {
		
			echo "file doesn't exist";
		
		}
	
	} else {	
	
?>
<p align="center"><center><b><h1>Add a User</h1></b></center></p>
<p align="center"><font face="MS Sans Serif" size="2" color="#800000">Please fill up the form below</font></p>
<center>
<form name="form1" method="post" action="">
  <table width="239"  border="0">
    <tr>
      <td width="98"><b><font face="MS Sans Serif" color="#000080">Username :
      </font></b> </td>
      <td width="131">
      <font face="MS Sans Serif" color="#000080"><b>
      <input name="AuthorizationService_usr" type="text" id="AuthorizationService_usr" size="20"></b></font></td>
    </tr>
    <tr>
      <td width="98"><b><font face="MS Sans Serif" color="#000080">Password :
      </font></b> </td>
      <td width="131">
      <font face="MS Sans Serif" color="#000080"><b>
      <input name="AuthorizationService_pwd" type="password" id="AuthorizationService_pwd" size="20"></b></font></td>
    </tr>
    <tr>
      <td height="26" width="229" colspan="2">
      <p align="center"><font face="MS Sans Serif" color="#000080"><b>
      <input name="AuthorizationService_Add" type="submit" id="AuthorizationService_Add" value="Add User"></b></font></td>
    </tr>
  </table>
</form>
</center>
<?
}
?>
</body>
</html>