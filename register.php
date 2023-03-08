<?php

$con = mysqli_connect("localhost","Yoganath","Admin","FoodApp" );

$UserName = $_POST["username"];
$Contact = $_POST["number"];
$Password = $_POST["password"];

$sql="INSERT INTO register(`Id`,`Username`,`Password`,`Mobilenumber`) VALUES ('0','$UserName','$Password','$Contact')";

$rs = mysqli_query($con, $sql);

if($rs)
{
    echo "Data inserted successfully";
    echo '<h2> <a href="login.html">click here</a> to move to signup page</h2>';
}
else{
    echo "Data insertion failed";
}
