<?php
session_start();
$con = mysqli_connect("localhost","Yoganath","Admin","FoodApp" );

if(isset($_POST['sub']))
{
$uname = $_POST['username'];
$upassword = $_POST['password'];
$_SESSION['UserName'] = $uname;
$res = mysqli_query($con,"select* from register where Username='$uname'and Password='$upassword'");
// $numRows = mysqli_num_rows($res);
if($res){
        header("Location:home.php");
        exit();
}
else
{
	echo '<script>
        alert("Invalid Username/Password");
        window.location.href="login.html";
        </script>';
}
}
?>