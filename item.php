<?php
session_start();
date_default_timezone_set('UTC');
$db = new PDO('mysql:host=localhost;dbname=fruit', "fruit", "123456");
#unset($_SESSION['bill']);
#if(!isset($_SESSION['member']))
if(!isset($_SESSION['stock'])){
  $stockno = rand(10000,99999);
  $_SESSION['stock']=$stockno;
  $stmt = $db->query("SELECT * FROM employee WHERE EmpNo =".$_SESSION['username']);
  $stmt->execute();
  $result = $stmt->fetchAll();
  $branch =  $result[0]['BranchNo'];
  $stmt = $db->prepare("INSERT INTO stock VALUES(?,?,?,?)");
  $stmt->execute(array($stockno,date("Y-m-d"),$branch,$_SESSION['username']));
}
$stockno=$_SESSION['stock'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Item</title>
    <link rel="stylesheet" type="text/css" href="css.css">
  </head>

  <body>
    <div class="box">
    <h1>Order Goods</h1>
      <table>
        <tr>
          <td>
            StockNo
          </td>
          <td colspan="3"><?php echo $stockno;?></td>
        </tr>
        <tr>
           <td>
            Select
          </td>
                        <form action="itemengine.php" method="post" name="itemform" target="_self" id="itemform">

           <td>
            <?php 
                      $stmt = $db->query("SELECT * FROM refitem");
                      $stmt->execute();
                      $result = $stmt->fetchAll();
                      #print_r($result);
                      //foreach($result as $product){
                        //echo $product['ProdName'];
                        #echo "<option value=\"1\">".$product['ProdName']."</option>";
                      //}
                      ?>
                      <select name="item">
                      <?php
                      foreach($result as $product){
                        //echo $product['ProdName'];
                        echo "<option value=\"".$product['RefNo']."\">".$product['ReftName']."</option>";
                      }
                      ?>
                      </select>
          </td>
           <td>
            <input type="text" maxlength="2" name="num" id="num">
          </td>
           <td>
            <button type="submit" value="Add" name="add" id="add" >add</button>
          </td>
        </form>
        </tr>
        <?php
                    $stmt = $db->query("SELECT * FROM stockrefitem WHERE StockNo =  ".$stockno);
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    foreach($result as $runno){
                      $stmt = $db->query("SELECT * FROM refitem WHERE RefNo =  ".$runno['RefNo']);
                      $stmt->execute();
                      $temp = $stmt->fetch();
                      $total = $temp['RefPrice'] * $runno['Quantity'] ;
                ?>
                <tr>
                  <td><?php echo $temp['ReftName'] ;?></td>
                  <td><?php echo $temp['RefPrice'] ;?></td>
                  <td><?php echo $runno['Quantity'] ;?></td>
                  <td><?php echo $total;?></td>
                </tr>
                <?php } ?>
        <tr>
          <form action="menu.php" method="post" name="itemformout" target="_self" id="itemformout">
           <td colspan="4">
            <button class="bluegreen" type="submit" value="Request" name="gg" id="gg" >Request</button>
          </td>
        </form>
        </tr>
      </table>
    </div>
  </body>
</html>