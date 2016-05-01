<?php
session_start();
if(!isset($_SESSION['username'])){?>
<meta http-equiv="refresh" content="1;URL=index.php" />
<?php
die();}
$db = new PDO('mysql:host=localhost;dbname=fruit', "fruit", "123456");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XH TML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Menu</title>
    <link rel="stylesheet" type="text/css" href="css.css">
  </head>
  <body>
  <div class="box menu">
    <h1>Menu</h1>
    <a href="order.php"><button class="orange">place order</button></a>
    <a href="member.php"><button class="white">register</button></a>
    <a href="item.php"><button class="green">order goods</button></a>
    <br><a href="logout.php" class="foot">Logout</a>
  </div>
  </body>
</html>