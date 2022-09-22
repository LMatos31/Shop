<?php

    session_start();
    unset($_SESSION['email']);  
    include_once('dbConn.php');
    $output = NULL;
$query = mysql_query("SELECT * FROM tbl_item");
    while($row = mysql_fetch_assoc($query))
    {
        $imageURL = $row["image"];
        $imageDesc = $row["itemName"];
        $sellprice = $row["sellPrice"];
    }
if (isset($_POST['empty']))
 {
      foreach ($_POST['itemName'] as $imageDesc)
      {
           if (!mysql_query("DELETE FROM tbl_item WHERE itemName = '$imageDesc'"))
           {
                echo mysql_error();
           }else {
               echo 'successfully deleted';
           }
      }
 }
 if(isset($_POST['check']))
{
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cart</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />   
</head>
<body>
<center>
    <br>
    <hr>
    <br>
<table border="1" cellspacing="1" cellpadding="5">
            <tr>
            <td><b>Item Name:</b></td>
            <td><b>Item Price:</b></td>
            <td><b>Item Image:</b></td>
			<td><b>Shop Item :</b></td>
        </tr>
<?php
include('dbConn.php');
$sql = "SELECT * FROM tbl_item";
$query = mysqli_query($conn,$sql);
if(mysqli_num_rows($query) > 0){
    while($row = mysqli_fetch_assoc($query)){
        $imageURL = $row["image"];
        $imageDesc = $row["itemName"];
        $sellprice = $row["sellPrice"];
?>
  <tr>
    <td>
    <p><?php echo $imageDesc; ?></p>
    </td>
    <td>
    <img src="<?php echo $imageURL; ?>" alt="" />
    </td> 
    <td>
    <p><?php echo "<b>R: </b>".$sellPrice; ?></p>
    </td>
    </tr>
</table>
</center>
<input type="submit" name="empty" value="Empty Cart" />
<input type="submit" name="check" value="CheckOut" />
</body>
</html>

References: W3schools.com. 2021. PHP Tutorial. [online] Available at: <https://www.w3schools.com/php/default.asp> [Accessed 1 May 2021].
            Gosselin, D., Kokoska, D. and Easterbrooks, R., 2011. PHP programming with MySQL. 2nd ed. Boston: Cengage.
			Sportscene. 2021. [online] Available at: <https://www.sportscene.co.za/plp/latest/just-dropped/clothing/_/N-28t8;jsessionid=vARijFXY2LvfUQshfyCR5FYAp2Ys0-eMjGr6pGt6.tfg-prd-com-150#p=1&e=28t8Z8s3hdu&f=sku.activePrice%257CBTWN+99+2500> [Accessed 1 May 2021].
