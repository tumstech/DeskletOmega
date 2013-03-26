<?
	include "auth_functions.php";

include "build.php";

// Check if Facebook login option is enabled
if ($auth_use_facebook == "1") {

// We're using facebook!

	// Maybe we want to initialize facebook now?
	require 'facebook.php';
	
	// Set up facebook app information
	$facebook = new Facebook(array(
  'appId'  => '[AppID here]',
  'secret' => '[App Secret Here]',
));

// Check for positive Facebook login


// Get User ID
$user = $facebook->getUser();

// We may or may not have this data based on whether the user is logged in.
//
// If we have a $user id here, it means we know the user is logged into
// Facebook, but we don't know if the access token is valid. An access
// token is invalid if the user is logged out of Facebook.

if ($user) {
  try {
    // Proceed knowing you have a logged in user who's authenticated.
    $user_profile = $facebook->api('/me');
  } catch (FacebookApiException $e) {
    error_log($e); // Unauthorized
    $user = null;
header( 'Location: index.php' ) ; // Get Out!
  }
}

// Login or logout url will be needed depending on current user state.
if ($user) {
  $FBlogoutUrl = $facebook->getLogoutUrl();
} else {
  $FBloginUrl = $facebook->getLoginUrl();
}

} else {
// Facebook disabled.

chk_login(); // Check regular login

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge, chrome=1" />
<!-- Script loads -->
<script src="js/jquery.js"></script>
<script src="js/jquery.ui.js"></script>
<script src="js/highcharts.js"></script>

<!-- end script loads -->

<title>Desklet:Omega</title>
<link rel="stylesheet" href="css/reset.css" />
<link rel="stylesheet" href="css/desktop.css" />
</head>
<body ontouchmove="PageMove(event);">


<div class="abs" id="wrapper">
  <div class="abs" id="desktop">
    <a class="abs icon" style="left:20px;top:20px;" href="#icon_dock_computer">
      <img src="images/icons/icon_32_computer.png" />
      Computer
    </a>
    <a class="abs icon" style="left:20px;top:100px;" href="#icon_dock_drive">
      <img src="images/icons/icon_32_drive.png" />
      Hard Drive
    </a>
    <a class="abs icon" style="left:20px;top:180px;" href="#icon_dock_disc">
      <img src="images/icons/icon_32_disc.png" />
      Audio CD
    </a>
    <a class="abs icon" style="left:20px;top:260px;" href="#icon_dock_usermgmt">
      <img src="images/icons/icon_32_network.png" />
      User Management
    </a>
    <div id="window_computer" class="abs window">
      <div class="abs window_inner">
        <div class="window_top">
          <span class="float_left">
            <img src="images/icons/icon_16_computer.png" />
            Computer
          </span>
          <span class="float_right">
            <a href="#" class="window_min"></a>
            <a href="#" class="window_resize"></a>
            <a href="#icon_dock_computer" class="window_close"></a>
          </span>
        </div>
        <div class="abs window_content">
          <div class="window_aside">
            Hello. Welcome to the cloud.
          </div>
          <div class="window_main">
            <table class="data">
              <thead>
                <tr>
                  <th class="shrink">&nbsp;
                    
                  </th>
                  <th>
                    Name
                  </th>
                  <th>
                    Date Modified
                  </th>
                  <th>
                    Date Created
                  </th>
                  <th>
                    Size
                  </th>
                  <th>
                    Kind
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <img src="images/icons/icon_16_drive.png" />
                  </td>
                  <td>
                    Hard Drive
                  </td>
                  <td>
                    Today
                  </td>
                  <td>
                    &mdash;
                  </td>
                  <td>
                    200 GB
                  </td>
                  <td>
                    Volume
                  </td>
                </tr>
                <tr>
                  <td>
                    <img src="images/icons/icon_16_disc.png" />
                  </td>
                  <td>
                    Audio CD
                  </td>
                  <td>
                    &mdash;
                  </td>
                  <td>
                    &mdash;
                  </td>
                  <td>
                    2.92 GB
                  </td>
                  <td>
                    Media
                  </td>
                </tr>
                <tr>
                  <td>
                    <img src="images/icons/icon_16_network.png" />
                  </td>
                  <td>
                    Network
                  </td>
                  <td>
                    &mdash;
                  </td>
                  <td>
                    &mdash;
                  </td>
                  <td>
                    &mdash;
                  </td>
                  <td>
                    LAN
                  </td>
                </tr>
                <tr>
                  <td>
                    <img src="images/icons/icon_16_folder_remote.png" />
                  </td>
                  <td>
                    Shared Project Files
                  </td>
                  <td>
                    Yesterday
                  </td>
                  <td>
                    12/29/08
                  </td>
                  <td>
                    524 MB
                  </td>
                  <td>
                    Folder
                  </td>
                </tr>
                <tr>
                  <td>
                    <img src="images/icons/icon_16_documents.png" />
                  </td>
                  <td>
                    Documents
                  </td>
                  <td>
                    Yesterday
                  </td>
                  <td>
                    12/29/08
                  </td>
                  <td>
                    524 MB
                  </td>
                  <td>
                    Folder
                  </td>
                </tr>
                <tr>
                  <td>
                    <img src="images/icons/icon_16_system.png" />
                  </td>
                  <td>
                    Preferences
                  </td>
                  <td>
                    &mdash;
                  </td>
                  <td>
                    &mdash;
                  </td>
                  <td>
                    &mdash;
                  </td>
                  <td>
                    System
                  </td>
                </tr>
                <tr>
                  <td>
                    <img src="images/icons/icon_16_trash.png" />
                  </td>
                  <td>
                    Trash
                  </td>
                  <td>
                    Today
                  </td>
                  <td>
                    &mdash;
                  </td>
                  <td>
                    &mdash;
                  </td>
                  <td>
                    Bin
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="abs window_bottom">
          Build: 127 Alpha 1 (dev0.1.22.127)
        </div>
      </div>
      <span class="abs ui-resizable-handle ui-resizable-se"></span>
    </div>
    <div id="window_drive" class="abs window">
      <div class="abs window_inner">
        <div class="window_top">
          <span class="float_left">
            <img src="images/icons/icon_16_drive.png" />
            Hard Drive
          </span>
          <span class="float_right">
            <a href="#" class="window_min"></a>
            <a href="#" class="window_resize"></a>
            <a href="#icon_dock_drive" class="window_close"></a>
          </span>
        </div>
        <div class="abs window_content">
          <div class="window_aside">
            Storage in use: 119.1 GB
          </div>
          <div class="window_main">
            <table class="data">
              <thead>
                <tr>
                  <th class="shrink">&nbsp;
                    
                  </th>
                  <th>
                    Name
                  </th>
                  <th>
                    Date Modified
                  </th>
                  <th>
                    Date Created
                  </th>
                  <th>
                    Size
                  </th>
                  <th>
                    Kind
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <img src="images/icons/icon_16_page.png" />
                  </td>
                  <td>
                    .DS_Store
                  </td>
                  <td>
                    Yesterday
                  </td>
                  <td>
                    &mdash;
                  </td>
                  <td>
                    6 KB
                  </td>
                  <td>
                    Hidden
                  </td>
                </tr>
                <tr>
                  <td>
                    <img src="images/icons/icon_16_folder_home.png" />
                  </td>
                  <td>
                    Default User
                  </td>
                  <td>
                    Today
                  </td>
                  <td>
                    &mdash;
                  </td>
                  <td>
                    &mdash;
                  </td>
                  <td>
                    Folder
                  </td>
                </tr>
                <tr>
                  <td>
                    <img src="images/icons/icon_16_folder.png" />
                  </td>
                  <td>
                    Applications
                  </td>
                  <td>
                    Yesterday
                  </td>
                  <td>
                    &mdash;
                  </td>
                  <td>
                    &mdash;
                  </td>
                  <td>
                    Folder
                  </td>
                </tr>
                <tr>
                  <td>
                    <img src="images/icons/icon_16_folder.png" />
                  </td>
                  <td>
                    Developer
                  </td>
                  <td>
                    12/29/08
                  </td>
                  <td>
                    &mdash;
                  </td>
                  <td>
                    &mdash;
                  </td>
                  <td>
                    Folder
                  </td>
                </tr>
                <tr>
                  <td>
                    <img src="images/icons/icon_16_folder.png" />
                  </td>
                  <td>
                    Library
                  </td>
                  <td>
                    09/11/09
                  </td>
                  <td>
                    &mdash;
                  </td>
                  <td>
                    &mdash;
                  </td>
                  <td>
                    Folder
                  </td>
                </tr>
                <tr>
                  <td>
                    <img src="images/icons/icon_16_folder.png" />
                  </td>
                  <td>
                    System
                  </td>
                  <td>
                    Yesterday
                  </td>
                  <td>
                    &mdash;
                  </td>
                  <td>
                    &mdash;
                  </td>
                  <td>
                    Folder
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="abs window_bottom">
          Free: 80.9 GB
        </div>
      </div>
      <span class="abs ui-resizable-handle ui-resizable-se"></span>
    </div>
    <div id="window_disc" class="abs window">
      <div class="abs window_inner">
        <div class="window_top">
          <span class="float_left">
            <img src="images/icons/icon_16_disc.png" />
            Audio CD - Title of Album
          </span>
          <span class="float_right">
            <a href="#" class="window_min"></a>
            <a href="#" class="window_resize"></a>
            <a href="#icon_dock_disc" class="window_close"></a>
          </span>
        </div>
        <div class="abs window_content">
          <div class="window_aside align_center">
            <img src="images/misc/album_cover.jpg" />
            <br />
            <em>Title of Album</em>
          </div>
          <div class="window_main">
            <table class="data">
              <thead>
                <tr>
                  <th class="shrink">&nbsp;
                    
                  </th>
                  <th class="shrink">
                    Track
                  </th>
                  <th>
                    Song Name
                  </th>
                  <th class="shrink">
                    Length
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <img src="images/icons/icon_16_music.png" />
                  </td>
                  <td class="align_center">
                    01
                  </td>
                  <td>
                    Track One
                  </td>
                  <td class="align_right">
                    3:50
                  </td>
                </tr>
                <tr>
                  <td>
                    <img src="images/icons/icon_16_music.png" />
                  </td>
                  <td class="align_center">
                    02
                  </td>
                  <td>
                    Track Two
                  </td>
                  <td class="align_right">
                    3:50
                  </td>
                </tr>
                <tr>
                  <td>
                    <img src="images/icons/icon_16_music.png" />
                  </td>
                  <td class="align_center">
                    03
                  </td>
                  <td>
                    Track Three
                  </td>
                  <td class="align_right">
                    4:02
                  </td>
                </tr>
                <tr>
                  <td>
                    <img src="images/icons/icon_16_music.png" />
                  </td>
                  <td class="align_center">
                    04
                  </td>
                  <td>
                    Track Four
                  </td>
                  <td class="align_right">
                    3:47
                  </td>
                </tr>
                <tr>
                  <td>
                    <img src="images/icons/icon_16_music.png" />
                  </td>
                  <td class="align_center">
                    05
                  </td>
                  <td>
                    Track Five
                  </td>
                  <td class="align_right">
                    4:38
                  </td>
                </tr>
                <tr>
                  <td>
                    <img src="images/icons/icon_16_music.png" />
                  </td>
                  <td class="align_center">
                    06
                  </td>
                  <td>
                    Track Six
                  </td>
                  <td class="align_right">
                    3:16
                  </td>
                </tr>
                <tr>
                  <td>
                    <img src="images/icons/icon_16_music.png" />
                  </td>
                  <td class="align_center">
                    07
                  </td>
                  <td>
                    Track Seven
                  </td>
                  <td class="align_right">
                    3:53
                  </td>
                </tr>
                <tr>
                  <td>
                    <img src="images/icons/icon_16_music.png" />
                  </td>
                  <td class="align_center">
                    08
                  </td>
                  <td>
                    Track Eight
                  </td>
                  <td class="align_right">
                    1:41
                  </td>
                </tr>
                <tr>
                  <td>
                    <img src="images/icons/icon_16_music.png" />
                  </td>
                  <td class="align_center">
                    09
                  </td>
                  <td>
                    Track Nine
                  </td>
                  <td class="align_right">
                    3:40
                  </td>
                </tr>
                <tr>
                  <td>
                    <img src="images/icons/icon_16_music.png" />
                  </td>
                  <td class="align_center">
                    10
                  </td>
                  <td>
                    Track Ten
                  </td>
                  <td class="align_right">
                    4:33
                  </td>
                </tr>
                <tr>
                  <td>
                    <img src="images/icons/icon_16_music.png" />
                  </td>
                  <td class="align_center">
                    11
                  </td>
                  <td>
                    Track Eleven
                  </td>
                  <td class="align_right">
                    3:49
                  </td>
                </tr>
                <tr>
                  <td>
                    <img src="images/icons/icon_16_music.png" />
                  </td>
                  <td class="align_center">
                    12
                  </td>
                  <td>
                    Track Twelve
                  </td>
                  <td class="align_right">
                    1:11
                  </td>
                </tr>
                <tr>
                  <td class="shrink">
                    <img src="images/icons/icon_16_music.png" />
                  </td>
                  <td class="align_center">
                    13
                  </td>
                  <td>
                    Track Thirteen
                  </td>
                  <td class="align_right">
                    6:17
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="abs window_bottom">
          Genre: Rock/Rap
        </div>
      </div>
      <span class="abs ui-resizable-handle ui-resizable-se"></span>
    </div>
    <div id="window_usermgmt" class="abs window">
      <div class="abs window_inner">
        <div class="window_top">
          <span class="float_left">
            <img src="images/icons/icon_16_network.png" />
            User Management
          </span>
          <span class="float_right">
            <a href="#" class="window_min"></a>
            <a href="#" class="window_resize"></a>
            <a href="#icon_dock_usermgmt" class="window_close"></a>
          </span>
        </div>
        <div class="abs window_content">
          <div class="window_aside">
            Welcome to the User Management window. <br /><br />
            From here, you can add a new user.<br /><br /><br />
            <script type="text/javascript">
<!--
if (document.getElementById) {
document.write('<button id="reload">Refresh</button>')
document.getElementById('reload').onclick = function () {usermgmtframe.location.reload(1)}
}
// -->
</script>
          </div>
          <div class="window_main">
           <iframe width="100%" height="100%" frameborder="0" name="usermgmtframe" id="usermgmtframe" src="security.user.add.php" scrolling="no"></iframe>
          </div>
        </div>
        <div class="abs window_bottom">
          Current user : <strong><?php
        $current_username=$_SESSION["AuthorizationService_username"];
		echo($current_username);
		?></strong>
        </div>
      </div>
      <span class="abs ui-resizable-handle ui-resizable-se"></span>
    </div>
  </div>
  <div class="abs" id="bar_top">
    <span class="float_right" id="clock"></span>
    <ul>
      <li>
        <a class="menu_trigger" href="#"><?php
        $current_username=$_SESSION["AuthorizationService_username"];
		echo($current_username);
		?></a>
        <ul class="menu">
        <li>
            <a href="#">Account Preferences</a>
          </li>
          <li>
            <a href="AuthorizationService.logout.php" target="_parent">Log Out</a>
          </li>
</ul>
      </li>
</ul>
  </div>
  <div class="abs" id="bar_bottom">
    <a class="float_left" href="#" id="show_desktop" title="Show Desktop">
      <img src="images/icons/icon_22_desktop.png" />
    </a>
    <ul id="dock">
      <li id="icon_dock_computer">
        <a href="#window_computer">
          <img src="images/icons/icon_22_computer.png" />
          Computer
        </a>
      </li>
      <li id="icon_dock_drive">
        <a href="#window_drive">
          <img src="images/icons/icon_22_drive.png" />
          Hard Drive
        </a>
      </li>
      <li id="icon_dock_disc">
        <a href="#window_disc">
          <img src="images/icons/icon_22_disc.png" />
          Audio CD
        </a>
      </li>
      <li id="icon_dock_usermgmt">
        <a href="#window_usermgmt">
          <img src="images/icons/icon_22_network.png" />
          Network
        </a>
      </li>
    </ul>
</div>
</div>

<script src="js/jquery.desktop.js"></script>
</body>
</html>
