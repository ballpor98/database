<?php
session_start();
$username = $_POST['username'];
$db = new PDO('mysql:host=localhost;dbname=fruit', "fruit", "123456");

?>
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
    <th scope="col">
<?php
$stmt = $db->query("SELECT * FROM employee WHERE EmpNo =".$username);
#$stmt->bindValue(':ID', '2');
#$result = $stmt->setFetchMode(PDO::FETCH_NUM);
$stmt->execute();
#echo $stmt->rowCount()," ",$username;
if($stmt->rowCount()==0)
{
  echo "<h3>รหัสผู้ใช้ไม่ถูกต้อง<p><a href=index.php>กลับหน้าlogin</a></h3>";
}
else
{
  $result = $stmt->fetchAll();
  echo "สวัสดีคุณ ".$result[0]['EmpFirstName']." ".$result[0]['EmpLastName'];
  $_SESSION['username'] =  $username;
  echo "<h3>ท่านเข้าสู่ระบบแล้ว<p><a href=menu.php>ไปหน้าmenu</a> </h3>";
}
?>
    </th>
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