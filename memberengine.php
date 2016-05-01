<?php
session_start();
$db = new PDO('mysql:host=localhost;dbname=fruit', "fruit", "123456");
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$member = $_SESSION['member'];
$stmt = $db->query("SELECT * FROM employee WHERE EmpNo =".$_SESSION['username']);
$stmt->execute();
$result = $stmt->fetchAll();
$branch =  $result[0]['BranchNo'];
$date = date("Y-m-d");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XH TML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="css.css">
	</head>
	<body bgcolor="#FFFF80">
		<?php
		$stmt = $db->prepare("INSERT INTO member VALUES(?,?,?,?,?)");
		$stmt->execute(array($member,$firstname,$lastname,$date,$branch));
		?>
		Success
		<meta http-equiv="refresh" content="3;URL=menu.php" />
	</html>