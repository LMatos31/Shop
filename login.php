    <?php
    //this will select the email and password enetered by the user and login to the system
    session_start();
    unset($_SESSION['email']);	
    include_once('dbConn.php');
    include_once('createTable.php');		
    $output = NULL;
    $email = $pass = "";
    if(isset($_POST['submit']))
    {    
        $_SESSION['email'] = $_POST['email'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $hpass = md5($password);
		//this will select the email and password from tbl_user in the database
        $query = "SELECT email, password FROM tbl_user WHERE email = '$email' AND password = '$hpass'";      
        $result = mysqli_query($conn,$query);
        $row = mysqli_fetch_array($result);
        $x = $row['email'];
        $y = $row['password'];
        if(empty($email))
        {
            $output = "Please enter email";
        }
        else 
        { 
             if($x == $email && $y == $hpass) 
             {
                 header("location:adminShop.php");
             }
            else 
            {
                $output = "Username\Password entered is incorrect!";
            }
        } 
		/*
        
        if(empty($email))
        {
            $output = "Please enter email";
        }
        elseif (mysqli_num_rows($result) != 1)
        {
            $output = "Incorrect Username / Password";
        }
        else 
        {
        header("location:adminShop.php");
        }
       */
    }
    ?>
	
	<!DOCTYPE html>
	<html>
		<head>
			<title>Login Page</title>
		</head>
		
	<body>
		<center>
			<br>
			<br>
			<br>
		<p>Welcome to the Login Page!</p>
		<br>
	    <p>Please enter your login details below</p>
		<form method="post">
			<table>
				<tr>
					<td>Email :</td>
					<td> <input type="email" name = "email" value = "<?php echo $email; ?>" ></td>
				</tr>
				<tr>
					<td>Password :</td>
					<td> <input type="password" name = "pass"></td>
				</tr>
				<tr>
					<td><input type="submit" name="submit" value="Login"></td>
				</tr>
			</table>
		</form>
		<?php
		echo "<br>";
		echo $output;
		?>
		<p>Click here to  <a href="register.php">Register</a></p> 
		</center>
	</body>
    </html>
	
	References: W3schools.com. 2021. PHP Tutorial. [online] Available at: <https://www.w3schools.com/php/default.asp> [Accessed 1 May 2021].
            Gosselin, D., Kokoska, D. and Easterbrooks, R., 2011. PHP programming with MySQL. 2nd ed. Boston: Cengage.
			Sportscene. 2021. [online] Available at: <https://www.sportscene.co.za/plp/latest/just-dropped/clothing/_/N-28t8;jsessionid=vARijFXY2LvfUQshfyCR5FYAp2Ys0-eMjGr6pGt6.tfg-prd-com-150#p=1&e=28t8Z8s3hdu&f=sku.activePrice%257CBTWN+99+2500> [Accessed 1 May 2021].