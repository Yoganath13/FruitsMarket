<?php
session_start();
$table_name = $_SESSION['UserName'];
$con  = mysqli_connect("localhost","Yoganath","Admin","FoodApp" );
$cart_database = mysqli_connect("localhost","Yoganath","Admin","User_Cart");
if(isset($_POST['del']))
{
    $Did = $_GET['delid'];
    $Dsql = mysqli_query($cart_database,"DELETE FROM $table_name where Id ='$Did' ");
    if($Dsql)
    {
        echo '<script>
                alert("Item removed from the cart");
                window.location.href="cart.php";
                </script>'; 
    }
    $isemptysql = mysqli_query($cart_database,"SELECT * FROM $table_name");
    $res_rows = mysqli_num_rows($isemptysql);
    if($res_rows == 0 )
    {
        mysqli_query($cart_database,"TRUNCATE TABLE $table_name");
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
            <?php
            $table_name = $_SESSION['UserName'];
            $isemptysql = mysqli_query($cart_database,"SELECT * FROM $table_name");
            $res_rows = mysqli_num_rows($isemptysql);
            if($res_rows == 0)
            {
            ?>
            <div style="text-align:center;">
            <h1>Cart Is Empty!</h1>
            </div>
            <?php
            }
            else{
            ?>
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
                $sql1 = mysqli_query($cart_database,"SELECT * FROM $table_name");
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