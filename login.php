<?php
session_start();
$con = mysqli_connect("localhost","Yoganath","Admin","foodapp" );
$uname = $_POST['Lusername'];
$upassword = $_POST['Lpassword'];
$_SESSION['UserName'] = $uname;
$res = mysqli_query($con,"SELECT * FROM register WHERE Username ='$uname' AND Password ='$upassword'");
$count = mysqli_num_rows($res);
if($count == 1){
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


?>