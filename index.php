<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Desklet:Omega|Login</title>
<link rel="stylesheet" type="text/css" href="css/login.css">

</head>

<body>
 <div class="container">
    <div class="login">
      <h1>Login</h1>
      <form name="form1" method="post" action="auth_inc.php">
        <p><input name="AuthorizationService_usr" type="text" id="AuthorizationService_usr" value="" x-webkit-speech size="20" placeholder="Username"></p>
        <p><input name="AuthorizationService_pwd" type="password" id="AuthorizationService_pwd" size="20" placeholder="Password"></p>
        <p class="remember_me">
          <label>
            <input name="AuthorizationService_rm" type="checkbox" id="AuthorizationService_rm" value="1">
          Remember me</label>
        </p>
        <p class="submit"><input name="AuthorizationService_Submit" type="submit" id="AuthorizationService_Submit" value="Login"></p>
      </form>
    </div>
  </div>



</body>
</html>
