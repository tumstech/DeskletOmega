<?php

include "auth_config.php";


function chk_login()
{
	session_start();
	if (!isset($_SESSION["AuthorizationService_username"])) {
		header('Location: '.$logout_redirect.'');
		exit;
	}
}

?>