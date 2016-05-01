<?php
session_start();
if(isset($_SESSION['username'])) {
unset($_SESSION['username']);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>logout</title>
    <link rel="stylesheet" type="text/css" href="css.css">
  </head>
  <body>
    <meta http-equiv="refresh" content="1;URL=index.php" />
  </body>
</html>