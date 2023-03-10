<?php
session_start();
$username = $_SESSION['UserName'];
$con  = mysqli_connect("localhost","Yoganath","Admin","FoodApp" );
$cart_database = mysqli_connect("localhost","Yoganath","Admin","User_Cart");
if(isset($_POST['Items']))
{
$quantity = $_POST['quantity'];
$id = $_GET['id'];
$SelectQ = mysqli_query($con,"SELECT * from inventory where Id ='$id' ");
$data = mysqli_fetch_array($SelectQ);
$item = $data['Item'];
$cost = $quantity * $data['price'];

$Insert_to_DBQ = mysqli_query($cart_database,"INSERT INTO $username (`Item Id`,`Item`,`Quantity`,`Cost`)VALUES ('$id','$item','$quantity','$cost')");

$check = mysqli_affected_rows($con);
if($check > 0)
{
    echo '<script>
    window.location.href="home.php";
    </script>';
}
else{
    echo '<script>
    alert("Something wrong! Item Not added to cart.");
    window.location.href="home.php";
    </script>';
}
}
?>