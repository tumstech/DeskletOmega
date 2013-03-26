<?
ob_start();

/* AuthorizationService is used for reference */

if (isset($_POST["AuthorizationService_Submit"])) {

		include "auth_config.php";
		$filename = $database_name;
		
	if (!file_exists($filename)) {
			
			echo "No database exists. Please check your config file.";
			
	} else {
		
		$handler = fopen($filename,'r');
		$members = file_get_contents($filename);
		// get username and password
		$users_array = explode ("\n",$members);
		
		foreach ($users_array as $users) {
			if ($users != "" || $users != NULL) {
		
				// break username and password string into seperate variables.
				list($username,$password) = explode("\t",$users);
					
				if ($_POST["AuthorizationService_usr"] == trim($username) && md5($_POST["AuthorizationService_pwd"]) == trim($password)) {	

					$logged_in = 1;
					break;
					
				} else {
						
					$logged_in = 0;
						
				}
					
			} else {
			
				break;
			
			}
			
		} // end foreach
		
		if ($logged_in != 1) { // IF USER IS NOT LOGGED IN
			
		// redirect the user back to the login page

header( 'Location: index.php' ) ;
		
		} else { // ELSE LOGGED IN			
					
			session_start();
			$_SESSION["AuthorizationService_username"] = $_POST["AuthorizationService_usr"];
			$_SESSION["AuthorizationService_password"]  = $_POST["AuthorizationService_pwd"];
			
				if ($_POST["AuthorizationService_rm"] == 1) {
					setcookie("AuthorizationService_username",$_POST["AuthorizationService_usr"],time()+3600);
				}
			
			header('Location: '.$login_redirect.'');
		}	
	
	} // END IF FILE EXISTS
	
} else {	
		
		
}

ob_end_flush();

?>
