<?php
session_start();
$con = mysqli_connect("localhost","Yoganath","Admin","FoodApp" );

if(isset($_POST['Login_Form']))
{
$uname = $_POST['username'];
$upassword = $_POST['password'];
$_SESSION['UserName'] = $uname;
$res = mysqli_query($con,"SELECT * FROM register WHERE Username='$uname' AND Password='$upassword'");
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