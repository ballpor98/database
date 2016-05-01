<?php
session_start();
$dbh = new PDO('mysql:host=localhost;dbname=fruit', "fruit", "123456");
?>
<?php
if(isset($_SESSION['username'])){?>
<meta http-equiv=\"refresh\" content=\"1;URL=menu.php\" />
<?php } ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Index</title>
    <link rel="stylesheet" type="text/css" href="css.css">
  </head>
  <body>
    <div class="box">
      <h1>Employee Login</h1>
      <form action="Wait.php" method="post" name="loginform" target="_self" id="loginform">
        <input type="text" maxlength="30" name="username" id="username">
        <button type="submit" value="login" name="login" id="login" class="bluegreen">Login</button>
      </form>
    </div>
  </body>
</html>