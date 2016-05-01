<?php
session_start();
date_default_timezone_set('UTC');
$db = new PDO('mysql:host=localhost;dbname=fruit', "fruit", "123456");
#unset($_SESSION['bill']);
#if(!isset($_SESSION['member']))
$_SESSION['member']=0;
if(!isset($_SESSION['bill'])){
  $Billno = rand(10000,99999);
  $_SESSION['bill']=$Billno;
  $stmt = $db->query("SELECT * FROM employee WHERE EmpNo =".$_SESSION['username']);
  $stmt->execute();
  $result = $stmt->fetchAll();
  $branch =  $result[0]['BranchNo'];
  $stmt = $db->prepare("INSERT INTO bill VALUES(?,?,?,?,?,?,?)");
  $stmt->execute(array($Billno,date("Y-m-d"),$_SESSION['member'],$_SESSION['username'],$branch,0,0));
}
$Billno=$_SESSION['bill'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Order</title>
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
                <th scope="col">BillNo</th>
                <th scope="col"><?php echo $Billno;?></th>
                <th scope="col"></th>
                <th scope="col"></th>
              </tr>
              <form action="orderengine.php" method="post" name="orderform" target="_self" id="orderform">
                <tr>
                  <th scope="row">
                    select juice
                </th>
                  <td>
                    <?php 
                      $stmt = $db->query("SELECT * FROM product");
                      $stmt->execute();
                      $result = $stmt->fetchAll();
                      #print_r($result);
                      //foreach($result as $product){
                        //echo $product['ProdName'];
                        #echo "<option value=\"1\">".$product['ProdName']."</option>";
                      //}
                      ?>
                      <select name="product">
                      <?php
                      foreach($result as $product){
                        //echo $product['ProdName'];
                        echo "<option value=\"".$product['ProdNo']."\">".$product['ProdName']."</option>";
                      }
                      ?>
                      </select>
                  </td>
                  <td><input type="text" maxlength="2" name="num" id="num"></td>
                  <td><input type="submit" value="Add" name="add" id="add" ></td>
                  </form>
                </tr>
                <?php
                    $stmt = $db->query("SELECT * FROM billproduct WHERE BillNo =  ".$Billno);
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    foreach($result as $runno){
                      $stmt = $db->query("SELECT * FROM product WHERE ProdNo =  ".$runno['ProdNo']);
                      $stmt->execute();
                      $temp = $stmt->fetch();
                      $total = $temp['ProdPrice'] * $runno['Quantity'] ;
                ?>
                <tr>
                  <th scope="row"><?php echo $temp['ProdName'] ;?></th>
                  <td><?php echo $temp['ProdPrice'] ;?></td>
                  <td><?php echo $runno['Quantity'] ;?></td>
                  <td><?php echo $total;?></td>
                </tr>
                <?php } ?>
                <?php
                  $stmt = $db->query("SELECT * FROM bill WHERE billNo =  ".$Billno);
                  $stmt->execute();
                  $temp = $stmt->fetch();
                  $total = $temp['BillTotal'];
                ?>
                <tr><form action="checkbill" method="post" name="orderformout" target="_self" id="orderformout">
                  <th scope="row">Total</th>
                  <td><?php echo $total; ?></td>
                  <td><input type="text" maxlength="5" name="member" id="member"></td>
                  <td><input type="text" maxlength="5" name="promotion" id="promotion"></td>
                  <td><input type="submit" value="checkbill" name="checkbill" id="checkbill" ></td>
                  </form>
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