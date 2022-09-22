<?php
    include('dbConn.php');
    $output = NULL;
    $fname = $lname = $email = $password = "";
    if(isset($_POST['submit']))
    {
        $fname = $_POST['fname'];
		$lname = $_POST['lname'];
        $email = $_POST['email'];
        $password = $_POST['password']; 
        $pattern = '/^(?=.*[!@#$%^&*-?])(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).{4,20}$/';
        $query = "SELECT * FROM tbl_user WHERE email = '$email'";
        $checkUserExsists = mysqli_query($conn,$query);
        if(empty($fname) || empty($lname) || empty($email) || empty($password))
        {
            $output = "Fields cannot be empty";
        }
        elseif(filter_var($email, FILTER_VALIDATE_EMAIL) != true)
        {
            $output = "Invalid Email address";
        }
        elseif(mysqli_num_rows($checkUserExsists) == 1)
        {
            $output = "User already exsists";
        }
		elseif(!preg_match($pattern, $password))
		{
			$output = "Password is not strong enough";
		}
        else
        {
            $pass = md5($password);
            $query = "INSERT INTO tbl_user (fName,lName,email, password) VALUES ('$fname','$lname','$email','$password')";
            $insertUser = mysqli_query($conn,$query);
            if ($insertUser == true) 
            {
                $output = "You have been Registered";
			}
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
<body>
    <center>
        <br>
        <br>
        <br>
    <form method="post">
        <table>
            <tr>
                <td>Firstname :</td>
                <td> <input type="text" name = "fName" minlength="3" maxlength="20" value = "<?php echo $fname; ?>" ></td>
            </tr>
			<tr>
                <td>Surname :</td>
                <td> <input type="text" name = "lName" minlength="3" maxlength="20" value = "<?php echo $lname; ?>" ></td>
            </tr>
            <tr>
                <td>Email :</td>
                <td> <input type="email" name = "email"  value = "<?php echo $email; ?>" ></td>
            </tr>
            <tr>
                <td>Password :</td>
                <td> <input type="password" name = "password"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="submit" value="Register"></td>
            </tr>
        </table>
    </form>
    <?php
    echo "<br>";
    echo $output;
    ?>
        <p>Click here to return to <a href="login.php">Login</a></p> 
        </center>
</body>
</html>

References: W3schools.com. 2021. PHP Tutorial. [online] Available at: <https://www.w3schools.com/php/default.asp> [Accessed 1 May 2021].
            Gosselin, D., Kokoska, D. and Easterbrooks, R., 2011. PHP programming with MySQL. 2nd ed. Boston: Cengage.
			Sportscene. 2021. [online] Available at: <https://www.sportscene.co.za/plp/latest/just-dropped/clothing/_/N-28t8;jsessionid=vARijFXY2LvfUQshfyCR5FYAp2Ys0-eMjGr6pGt6.tfg-prd-com-150#p=1&e=28t8Z8s3hdu&f=sku.activePrice%257CBTWN+99+2500> [Accessed 1 May 2021].