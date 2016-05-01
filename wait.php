<?php
session_start();
$username = $_POST['username'];
$db = new PDO('mysql:host=localhost;dbname=fruit', "fruit", "123456");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Index</title>
    <link rel="stylesheet" type="text/css" href="css.css">
  </head>
  <body>
    <div class="box">
      <?php
      $stmt = $db->query("SELECT * FROM employee WHERE EmpNo =".$username);
      #$stmt->bindValue(':ID', '2');
      #$result = $stmt->setFetchMode(PDO::FETCH_NUM);
      $stmt->execute();
      #echo $stmt->rowCount()," ",$username;
      if($stmt->rowCount()==0)
      {
      echo "<h3>Wrong user! Try again<p><a href=index.php>back</a></h3>";
      }
      else
      {
      $result = $stmt->fetchAll();
      echo "<h1>Welcome!  ".$result[0]['EmpFirstName']." ".$result[0]['EmpLastName']."</h1>";
      $_SESSION['username'] =  $username;
      echo "<h3>Login successfully<p><a href=menu.php class='foot'>go to menu</a> </h3>";
      }
      ?>
    </div>
  </body>
</html>