<?php
session_start();
$db = new PDO('mysql:host=localhost;dbname=fruit', "fruit", "123456");
$stockno=$_SESSION['stock'];
$refno = $_POST['item'];
$Quantity = $_POST['num'];
//$stmt = $db->query("SELECT * FROM employee WHERE EmpNo =".$_SESSION['username']);
//$stmt->execute();
//$result = $stmt->fetchAll();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XH TML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="css.css">
	</head>
	<body bgcolor="#FFFF80">
		<?php
		$stmt = $db->prepare("INSERT INTO stockrefitem VALUES(?,?,?)");
		$stmt->execute(array($stockno,$refno,$Quantity));
		?>
		Success
		<meta http-equiv="refresh" content=1;URL=item.php />
	</html>