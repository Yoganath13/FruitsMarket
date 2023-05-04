<?php
    $con = mysqli_connect("localhost","Yoganath","Admin","foodapp" );
    $OrderDetailsQ = mysqli_query($con,"SELECT * FROM orders");
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"/>
    <title>Order Details</title>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script>
        $(function(){
            $("#navbar").load("Navbar.html");
        });
    </script>
</head>
<body>
    <div id="navbar"></div>
    <table style="table-layout: fixed;">
        <tr>
            <th>Order Id</th>
            <th>Item number</th>
            <th>Item Id</th>
            <th>Quantity</th>
            <th>Price</th>
            
        </tr>
        <?php
                while($data = mysqli_fetch_array($OrderDetailsQ))
                {
            ?>
        <tr>
            <td><?php echo $data['OrderId'];?></td>
            <td><?php echo $data['Itemnum'];?></td>
            <td><?php echo $data['ItemId'];?></td>
            <td><?php echo $data['Quantity'];?></td>
            <td><?php echo $data['Price'];?></td>
        </tr>
        <?php 
                }
        ?>
    </table>
</body>
</html>