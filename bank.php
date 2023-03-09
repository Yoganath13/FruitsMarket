<?php
session_start();
$con = mysqli_connect("localhost","Yoganath","Admin","FoodApp" );
$cart_database = mysqli_connect("localhost","Yoganath","Admin","User_Cart");
$Username1 = $_SESSION['UserName'];
if(isset($_POST['bank']))
{
$Cardno = $_POST['cardno'];
$CCV = $_POST['ccv'];
$EXPM = $_POST['expM'];
$EXPY = $_POST['expY'];

$res = mysqli_query($con,"SELECT * FROM cusbank WHERE Cardno='$Cardno' AND CCV='$CCV' AND ExpiryM='$EXPM' AND ExpiryY='$EXPY'");
$numRows = mysqli_num_rows($res);
if($numRows == 1)
{
        $sql1 = mysqli_query($cart_database,"SELECT SUM(Cost) as total FROM $Username1");
        $row = mysqli_fetch_assoc($sql1);
        $total = $row['total'];
        $row1 = mysqli_fetch_array($res);

        if( $row1['BB'] >= $total)
        {
                $bb = $row1['BB'] - $total;
                $sql2 = mysqli_query($con,"UPDATE cusbank SET BB='$bb'");
                if($sql2)
                {
                        
                        $cart_table = mysqli_query($cart_database,"SELECT * FROM $Username1");
                
                        while($cart_Loop_data = mysqli_fetch_array($cart_table))
                        {
                        $tempid = $cart_Loop_data['Item Id'];
                        $stock_data = mysqli_query($con,"SELECT * FROM inventory WHERE Id='$tempid' ");
                        $row2 = mysqli_fetch_array($stock_data);
                        $cart_quantity = mysqli_query($cart_database,"SELECT * FROM $Username1 WHERE `Item Id`='$tempid'");
                        $row3 = mysqli_fetch_array($cart_quantity);
                        $quans = $row2['stock'] - $row3['Quantity'];
                        $sql5 = mysqli_query($con,"UPDATE inventory SET stock='$quans' WHERE Id='$tempid' ");
                        }

                        $checkQ = mysqli_affected_rows($con);
                        if($checkQ > 0)
                        {
                                $sql7 = mysqli_query($con,"INSERT INTO ownbank (`UserName`,`BB`) VALUES ('$Username1','$total')");
                                header("Location:last.html");
                                $sql6 = mysqli_query($cart_database,"TRUNCATE TABLE $Username1");
                                exit();
                        }
                }
                else
                {
                        echo '<script>
                        alert("Error in executing query : sql2");
                        window.location.href="bank.html";
                        </script>';
                }   
        }
        else
        {
                echo '<script>
                alert("Insufficient Bank Balance");
                window.location.href="bank.html";
                </script>';
        }       
        // $sql = mysqli_query($con,"SELECT * FROM stock");
        // $data = mysqli_fetch_array($sql);
        // $userQuan = $_SESSION['quans'];
        // $Updstock =  $data['stock'] - $userQuan;
        // $res1 = mysqli_query($con,"UPDATE stock SET stock='$Updstock' WHERE Id=1");
        // if($res1)
        // {
        // header("Location:last.html");
        // exit();
        // }
        // else{
        //         echo '<script>
        //         alert("Stock not updated");
        //         window.location.href="home.php";
        //         </script>';  
        // }
}
else
{
	echo '<script>
        alert("Invalid Bank Details");
        window.location.href="bank.html";
        </script>';
}
}
?>