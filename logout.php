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
</head>

<body bgcolor="#FFFF80">
<meta http-equiv="refresh" content="1;URL=index.php" />
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
    <th scope="col"></th>
    <th scope="col"></th>
    <th scope="col"></th>
  </tr>

  <tr>
    <th scope="row"></th>
    <td></td>
    <td></td>
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