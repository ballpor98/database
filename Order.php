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
  <body>
    <div class="box">
    <h1>Place Order</h1>
      <table>
        <tr>
          <td>BillNo</td>
          <td colspan="3"><?php echo $Billno;?></td>
        </tr>
        <tr>
          <td>Select</td>
          <td>
             <form action="orderengine.php" method="post" name="orderform" target="_self" id="orderform">
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
          <td><button type="submit" value="Add" name="add" id="add" >add</button></td>
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
                  <td><?php echo $temp['ProdName'] ;?></td>
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
        <tr>
          <td>Total</td>
          <td><?php echo $total; ?> Bath</td>
          <form action="checkbill.php" method="post" name="orderformout" target="_self" id="orderformout">
          <td><input type="text" maxlength="5" name="member" id="member" placeholder="MemberNO"></td>
          <td><input type="text" maxlength="5" name="promotion" id="promotion" placeholder="promotionNO"></td>
        </tr>
      <tr><td colspan="4" style="background-color:#ffec80;"><button class="bluegreen" type="submit" value="checkbill" name="checkbill" id="checkbill" >Checkbill</button></td></tr>
        </form>
      </table>
    </div>
  </body>
</html>