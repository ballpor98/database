<?php
session_start();
date_default_timezone_set('UTC');
$db = new PDO('mysql:host=localhost;dbname=fruit', "fruit", "123456");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Member</title>
    <link rel="stylesheet" type="text/css" href="css.css">
  </head>
  <body>
    <form action="memberengine.php" method="post" name="memberform" target="_self" id="memberform" class="box">
      <h1>Register</h1>
      <table>
        <tr>
          <td>MemNo</td>
          <td><?php
            $member = rand(10000,99999);
            echo $member;
            $_SESSION['member']=$member;
          ?></td>
        </tr>
        <tr>
          <td>Firstname</td>
          <td>
            <input type="text" maxlength="30" name="firstname" id="firstname">
          </td>
        </tr>
        <tr>
          <td>Lastname</td>
          <td>
            <input type="text" maxlength="30" name="lastname" id="lastname">
          </td>
        </tr>
        <tr>
          <td>Date</td>
          <td><?php echo date("d M y"); ?></td>
        </tr>
        <tr>
          <td>Branch</td>
          <td>
            <?php
            $stmt = $db->query("SELECT * FROM employee WHERE EmpNo =".$_SESSION['username']);
            $stmt->execute();
            $result = $stmt->fetchAll();
            echo $result[0]['BranchNo'];
            ?>
          </td>
        </tr>
      </table>
      <button type="submit" value="submit" name="submit1" id="submit1" class="bluegreen">Submit</button>
    </form>
  </body>
</html>