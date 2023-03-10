<?php

$con = mysqli_connect("localhost","Yoganath","Admin","FoodApp" );
$cart_database = mysqli_connect("localhost","Yoganath","Admin","User_Cart");
$UserName = $_POST["username"];
$Contact = $_POST["number"];
$Password = $_POST["password"];

$RegisterQ="INSERT INTO register(`Id`,`Username`,`Password`,`Mobilenumber`) VALUES ('0','$UserName','$Password','$Contact')";
$create_sql = "CREATE TABLE $UserName(
    `Id` INT(2) AUTO_INCREMENT PRIMARY KEY, 
    `Item Id` VARCHAR(10),
    `Item` VARCHAR(10),
    `Quantity` INT(4),
    `Cost` INT(5)
    )";
$create_table_query = mysqli_query($cart_database,$create_sql);
$rs = mysqli_query($con, $RegisterQ);

if($rs)
{
    header("Location:login.html");
}
else{
    echo "Data insertion failed";
}
?>
