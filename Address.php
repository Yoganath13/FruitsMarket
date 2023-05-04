<?php
session_start();
$custoid = $_SESSION['Customerid'];
$ordeid = $_SESSION['Ordid'];
$con  = mysqli_connect("localhost","Yoganath","Admin","foodapp" );
if(isset($_POST['Address_Form']))
{
	$textareaValue = trim($_POST['address']);
	$rs = mysqli_query($con,"UPDATE orderdetails SET Address = '$textareaValue 'WHERE CustId = $custoid AND OrderId = $ordeid");
	$affectedRows = mysqli_affected_rows($con);
	
	if($affectedRows == 1)
	{
		echo '<script>
                alert("Order Placed Succesfully");
                window.location.href="last.html";
                </script>'; 
	}
    else{
        echo '<script>
                alert("error");
                window.location.href="home.php";
                </script>'; 
    }
}
else{
    echo '<script>
            alert("error");
            window.location.href="home.php";
            </script>'; 
}
?>