<?php
	$sqlu = "CREATE TABLE `tbl_user` (
	    `id` int(10) NOT NULL AUTO_INCREMENT,
		`fname` varchar(50) NOT NULL,
		`lname` varchar(50) NOT NULL,
		`email` varchar(50) NOT NULL,
	    `password` varchar(200) NOT NULL,
		PRIMARY KEY (`id`)
	) ENGINE=InnoDB DEFAULT CHARSET=latin1";

	$sqli = "CREATE TABLE `tbl_item` (
		`itemID` int(11) NOT NULL AUTO_INCREMENT,
	    `itemName` varchar(50) NOT NULL,
	    `sellPrice` int(10) NOT NULL,
		`quantity` int(11) NOT NULL,
		`image` varchar(50) NOT NULL,
		PRIMARY KEY (`itemID`)
	) ENGINE=InnoDB DEFAULT CHARSET=latin1";	
	
	$sqlo = "CREATE TABLE `tbl_orders` (
		  `oid` int(10) NOT NULL AUTO_INCREMENT,
		  `id` int(10) NOT NULL,
		  `qnty` int(10) NOT NULL,
		  PRIMARY KEY (`oid`),
		  KEY `cid` (`cid`),
		  CONSTRAINT `tbl_orders_idfk_1` FOREIGN KEY (`id`) REFERENCES `tbl_user`` (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=latin1";
		
		$CreateTableA = mysqli_query($conn, $sqlu);
		$CreateTableB = mysqli_query($conn, $sqli);
		$CreateTableC = mysqli_query($conn, $sqlo);
		if ($CreateTableA && $CreateTableB && $CreateTableC == TRUE) 
		{
				//echo "<br>Tables created<br>";
		} else
			{
			//echo "<br>Tables exsist";
		}
		$query = "SELECT * FROM tbl_user`";
		$result = mysqli_query($conn,$query);
		if (mysqli_num_rows($result) == 0) 
		{
			loadUser();
			loadItems();
		}
		function loadItems()
		{
		global $conn;
		$open = fopen('item.txt','r');
		while (!feof($open)) 
			{
				$getTextLine = fgets($open);
				$explodeLine = explode(",",$getTextLine);
				list($pname,$price,$quantity,$image) = $explodeLine;
				$qry = "insert into tbl_item`				
				(itemName, sellPrice, quantity, image) values('".$pname."','".$price."','".$quantity."','".$image."')";
				mysqli_query($conn,$quantity);
			}
		fclose($open);  
		}
		function loadUser()
		{
		global $conn;
		$open = fopen('userData.txt','r');
		while (!feof($open)) 
			{
				$getTextLine = fgets($open);
				$explodeLine = explode(",",$getTextLine);
				list($fname,$lname,$email,$pass) = $explodeLine;
				$qry = "insert into tbl_user`
				(fName, lName, email, password) values('$fname','$lname','$email','$pass')";
				mysqli_query($conn,$qry);
			}
		fclose($open);
		}

?>

References: W3schools.com. 2021. PHP Tutorial. [online] Available at: <https://www.w3schools.com/php/default.asp> [Accessed 1 May 2021].
            Gosselin, D., Kokoska, D. and Easterbrooks, R., 2011. PHP programming with MySQL. 2nd ed. Boston: Cengage.
			Sportscene. 2021. [online] Available at: <https://www.sportscene.co.za/plp/latest/just-dropped/clothing/_/N-28t8;jsessionid=vARijFXY2LvfUQshfyCR5FYAp2Ys0-eMjGr6pGt6.tfg-prd-com-150#p=1&e=28t8Z8s3hdu&f=sku.activePrice%257CBTWN+99+2500> [Accessed 1 May 2021].



