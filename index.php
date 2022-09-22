<?php
session_start();
include('DBConn.php');
include('createTable.php');
if(!isset($_SESSION['email'])){
    header("location:index.php");
}
if(isset($_POST['submit']))
{
    header("location:login.php");
    
    unset($_SESSION['email']);  
    session_destroy(); 
}
if(isset($_POST['store']))
{
    header("location:myShop.php");
}
?>


<!DOCTYPE html>
<html>

<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />   
</head>
<body>
<center>
<br>
<br>
<br>
<p>Welcome to Special T's</p>
<br>
<p>We are a online store where you can buy premium brands online making it more convinient for you to shop!</p>
<br><p>Please select one of the options below!</p>
        <form method="post">
            <input type="submit" name="store" value="Shop" />
            <input type="submit" name="submit" value="Admin" />
        </form>
</center>
</body>
</html>

References: W3schools.com. 2021. PHP Tutorial. [online] Available at: <https://www.w3schools.com/php/default.asp> [Accessed 1 May 2021].
            Gosselin, D., Kokoska, D. and Easterbrooks, R., 2011. PHP programming with MySQL. 2nd ed. Boston: Cengage.
			Sportscene. 2021. [online] Available at: <https://www.sportscene.co.za/plp/latest/just-dropped/clothing/_/N-28t8;jsessionid=vARijFXY2LvfUQshfyCR5FYAp2Ys0-eMjGr6pGt6.tfg-prd-com-150#p=1&e=28t8Z8s3hdu&f=sku.activePrice%257CBTWN+99+2500> [Accessed 1 May 2021].