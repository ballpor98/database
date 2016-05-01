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
  <body bgcolor="#FFFF80">
    <table width="70%" border="0" align="center" cellpadding="10" cellspacing="0">
      <tr>
        <td align="center" bgcolor="#B1B1EF"></td>
      </tr>
      <tr>
        <td align="center" valign="middle" bgcolor="#B1B1EF"><table width="30%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td colspan="2" align="center" bgcolor="#FF8000">
            </td>
            <table width="300" border="0">
              <tr>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
              </tr>
              <form action="memberengine.php" method="post" name="memberform" target="_self" id="memberform">
                <tr>
                  <th scope="row">MemNo</th>
                  <td><?php
                    $member = rand(10000,99999);
                    echo $member;
                    $_SESSION['member']=$member;
                  ?></td>
                </tr>
                <tr>
                  <th scope="row">Firstname</th>
                  <td><input type="text" maxlength="30" name="firstname" id="firstname"></td>
                </tr>
                <tr>
                  <th scope="row">LastName</th>
                  <td><input type="text" maxlength="30" name="lastname" id="lastname"></td>
                </tr>
                <tr>
                  <th scope="row">date</th>
                  <td><?php echo date("d M y"); ?></td>
                </tr>
                <tr>
                  <th scope="row">branch</th>
                  <td><?php
                    $stmt = $db->query("SELECT * FROM employee WHERE EmpNo =".$_SESSION['username']);
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    echo $result[0]['BranchNo'];
                    ?>
                  </td>
                </tr>
              </table><input type="submit" value="submit" name="submit1" id="submit1" >
            </form>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
      </tr>
    </table>
  </body>
</html>