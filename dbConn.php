<?php
$con = mysqli_connect('localhost','root','');
$dbname="18001882_poe";
	if (!$con) 
	    {
			die("Connection failed: " . mysqli_connect_error());
		}
		//echo "<br>Connected successfully<br>";
	$selectDB = mysqli_select_db($con,$dbname);
		if (!$selectDB) {
		$sql = "CREATE DATABASE ".$dbname."";
		mysqli_query($con, $sql); 
		//echo "<br>Database ".$dbname." succesfully created<br>";
		} else 
		{	
		   //echo "<br>Database ".$dbname." already exsist<br>";
		}
    $conn = mysqli_connect('localhost','root','',$dbname);
?>

References: W3schools.com. 2021. PHP Tutorial. [online] Available at: <https://www.w3schools.com/php/default.asp> [Accessed 1 May 2021].
            Gosselin, D., Kokoska, D. and Easterbrooks, R., 2011. PHP programming with MySQL. 2nd ed. Boston: Cengage.
			Sportscene. 2021. [online] Available at: <https://www.sportscene.co.za/plp/latest/just-dropped/clothing/_/N-28t8;jsessionid=vARijFXY2LvfUQshfyCR5FYAp2Ys0-eMjGr6pGt6.tfg-prd-com-150#p=1&e=28t8Z8s3hdu&f=sku.activePrice%257CBTWN+99+2500> [Accessed 1 May 2021].


