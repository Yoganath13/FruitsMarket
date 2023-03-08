<?php
$con = $con = mysqli_connect("localhost","Yoganath","Admin","FoodApp" );
if(isset($_POST['cart']))
{
$quantity = $_POST['quantity'];
$id = $_GET['id'];
$sql2 = mysqli_query($con,"SELECT * from stock where Id ='$id' ");
$data = mysqli_fetch_array($sql2);
$item = $data['Item'];
$cost = $quantity * $data['price'];
// $check = mysqli_query($con,"SELECT * FROM cart where Id ='$id' ");
// $count = mysqli_num_rows($check);
// if($count == 0)
// {
    $sql2 = mysqli_query($con,"INSERT INTO cart (`Item Id`,`Item`,`Quantity`,`Cost`)VALUES ('$id','$item','$quantity','$cost')");
//}
// else{

//     echo '<script>
//             window.location.href="home.php";
//             </script>';
// }
}
if(isset($_POST['del']))
{
    $Did = $_GET['delid'];
    $Dsql = mysqli_query($con,"DELETE FROM cart where Id ='$Did' ");
    if($Dsql)
    {
        echo '<script>
                alert("Item removed from the cart");
                window.location.href="cart.php";
                </script>'; 
    }
    $isemptysql = mysqli_query($con,"SELECT * FROM cart");
    $res_rows = mysqli_num_rows($isemptysql);
    if($res_rows == 0 )
    {
        mysqli_query($con,"TRUNCATE TABLE cart");
    }
}
?>
<html>
    <head>
        <title>
            Cart
        </title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="last">
        <table style="table-layout: fixed;">
            <tr>
                <th>Id</th>
                <th>Item Id</th>
                <th>Item</th>
                <th>Quantity</th>
                <th>Cost</th>
                <th>Remove</th>
            </tr>
            <?php
                $sql1 = mysqli_query($con,"SELECT * FROM cart");
                while($row = mysqli_fetch_array($sql1))
                {
            ?>
            <tr>
            <form action="cart.php?delid=<?=$row['Id']?>" method="post">
            <td><?php echo $row['Id'];?></td>
            <td><?php echo $row['Item Id'];?></td>
            <td><?php echo $row['Item'];?></td>
            <td><?php echo $row['Quantity'];?></td>
            <td><?php echo $row['Cost'];?></td>
            <td><button type="submit" name="del" class ="Remove_button">Remove</button></td>
            </form>
            </tr>
            <?php 
                }
                ?>
        </table>
    </div>
    <br>
    <div>
        <button class="Place_Order_Button" onclick="document.location.href='bank.html'">Place Order</button>
    </div>
    <br>
    <div>
        <button class="Place_Order_Button" onclick="document.location.href='home.php'">Go to Home</button>
    </div>
    </body>
</html>