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
</head>

<body bgcolor="#FFFF80">

<table width="70%" border="0" align="center" cellpadding="10" cellspacing="0">
  <tr>
    <td align="center" bgcolor="#FF8000"></td>
  </tr>
  <tr>
    <td align="center" valign="middle" bgcolor="#FF8000"><table width="30%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td colspan="2" align="center" bgcolor="#FF8000">
</td>
<table width="300" border="0">
  <tr>
    <th scope="col"></th>
    <th scope="col">Employee login</th>
    <th scope="col">

    </th>
    <th scope="col"></th>
  </tr>

  <tr>
    <th scope="row">EmpNo</th><form action="Wait.php" method="post" name="loginform" target="_self" id="loginform">
    <td><input type="text" maxlength="30" name="username" id="username"></td>
    <td><input type="submit" value="login" name="login" id="login" ></td></form>
    <td></td>
  </tr>

  <tr>
    <th scope="row"></th>
    <td></td>
    <td></td>
    <td></td>
  </tr>
</table>

      </tr>
  </table></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
</table>
</body>
</html>