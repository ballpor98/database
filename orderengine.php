<?php
session_start();
$db = new PDO('mysql:host=localhost;dbname=fruit', "fruit", "123456");
$Billno = $_SESSION['bill'];
$prodno = $_POST['product'];
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
		$stmt = $db->prepare("INSERT INTO billproduct VALUES(?,?,?)");
		$stmt->execute(array($Billno,$prodno,$Quantity));

		$stmt = $db->query("SELECT * FROM bill WHERE billNo =  ".$Billno);
		$stmt->execute();
        $temp = $stmt->fetch();
        $total = $temp['BillTotal'];

		$stmt = $db->query("SELECT * FROM product WHERE ProdNo =  ".$prodno);
        $stmt->execute();
        $temp = $stmt->fetch();
        $total += $temp['ProdPrice'] * $Quantity;

		$stmt = $db->prepare("UPDATE bill SET BillTotal = ? WHERE BillNo = ?");
		$stmt->execute(array($total,$Billno));
		?>
		Success
		<meta http-equiv="refresh" content=1;URL=Order.php />
	</html>