<?php
session_start();
$db = new PDO('mysql:host=localhost;dbname=fruit', "fruit", "123456");
if(isset($_POST['member'])){
	$stmt = $db->prepare("UPDATE bill SET MemNo = ? WHERE BillNo = ?");
	$stmt->execute(array($_POST['member'],$_SESSION['bill']));
}
if(isset($_POST['promotion'])){
	$stmt = $db->query("SELECT * FROM promotion WHERE ProNo =  ".$_POST['promotion']);
    $stmt->execute();
    $temp = $stmt->fetch();
    $factor = $temp['ProFactor'];
}
else 
	$factor = 1;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XH TML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="css.css">
	</head>
	<body bgcolor="#FFFF80">
		<h1>Total</h1>
		<?php
		$stmt = $db->query("SELECT * FROM bill WHERE billNo =  ".$_SESSION['bill']);
		$stmt->execute();
        $temp = $stmt->fetch();
        $total = $temp['BillTotal']*$factor;
        echo $total." Bath";
        unset($_SESSION['bill']);
		?>
		<a href="menu.php" class="foot">back to menu</a>
		<div class="box">
      

    </div>
	</html>