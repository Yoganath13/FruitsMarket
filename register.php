<?php

$con = mysqli_connect("localhost","Yoganath","Admin","foodapp" );
$cart_database = mysqli_connect("localhost","Yoganath","Admin","User_Cart");
$UserName = $_POST["Rusername"];
$Contact = $_POST["Rnumber"];
$Password = $_POST["Rpassword"];

$RegisterQ="INSERT INTO register(`CustId`,`Username`,`Password`,`Mobilenumber`) VALUES ('0','$UserName','$Password','$Contact')";
$create_sql = "CREATE TABLE $UserName(
    `Id` INT(2) AUTO_INCREMENT PRIMARY KEY, 
    `Item Id` VARCHAR(10),
    `Item` VARCHAR(10),
    `Quantity` INT(4),
    `Cost` INT(5)
    )";

    try{
        $create_table_query = mysqli_query($cart_database,$create_sql);
        if($create_table_query)
        {
            $rs = mysqli_query($con, $RegisterQ);

            if($rs)
            {
                echo '<script>
                alert("Registration Successful! Use Your Username and Password to Login");
                window.location.href="login.html";
                </script>';
            }
            else{
                echo "Data insertion failed";
            }
        }
    }
    catch(Exception $e)
    {
        echo '<script>
        alert("UserName Already Exist! Try Different Name");
        window.location.href="login.html";
        </script>';
    }
?>
