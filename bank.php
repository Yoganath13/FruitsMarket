<?php
session_start();
$con = mysqli_connect("localhost","Yoganath","Admin","FoodApp" );
$Username1 = $_SESSION['UserName'];
if(isset($_POST['bank']))
{
$Cardno = $_POST['cardno'];
$CCV = $_POST['ccv'];
$EXPM = $_POST['expM'];
$EXPY = $_POST['expY'];

$res = mysqli_query($con,"select* from cusbank where Cardno='$Cardno'and CCV='$CCV' and ExpiryM='$EXPM' and ExpiryY='$EXPY'");
$numRows = mysqli_num_rows($res);
if($numRows  == 1)
{
        $sql1 = mysqli_query($con,"SELECT SUM(Cost) as total FROM cart");
        $row = mysqli_fetch_assoc($sql1);
        $total = $row['total'];
        $row1 = mysqli_fetch_array($res);

        if( $row1['BB'] >= $total)
        {
                $bb = $row1['BB'] - $total;
                $sql2 = mysqli_query($con,"UPDATE cusbank SET BB='$bb'");
                if($sql2)
                {
                        $sql3 = mysqli_query($con,"SELECT * FROM stock");
                        $row2 = mysqli_fetch_array($sql3);
                        $sql4 = mysqli_query($con,"SELECT * FROM cart");
                        $row3 = mysqli_fetch_array($sql4);
                        $quans = $row2['stock'] - $row3['Quantity'];
                        $tempid = $row3['Item Id'];
                        $sql5 = mysqli_query($con,"UPDATE stock SET stock='$quans' WHERE Id='$tempid' ");
                        if($sql5)
                        {
                                $sql7 = mysqli_query($con,"INSERT INTO ownbank (`UserName`,`BB`) VALUES ('$Username1','$total')");
                                header("Location:last.html");
                                $sql6 = mysqli_query($con,"TRUNCATE TABLE cart");
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