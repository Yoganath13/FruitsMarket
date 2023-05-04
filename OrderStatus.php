<?php
    $con = mysqli_connect("localhost","Yoganath","Admin","foodapp" );
    $OrderQ = mysqli_query($con,"SELECT * FROM orderdetails");
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"/>
    <title>Order Status</title>
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
            <th>Customer Id</th>
            <th>Order Id</th>
            <th>Amount</th>
            <th>Address</th>
            <th>Date of Order</th>
            <th>Status</th>
            <th></th>
        </tr>
        <?php
                while($data = mysqli_fetch_array($OrderQ))
                {
            ?>
        <tr>
            <td><?php echo $data['CustId'];?></td>
            <td><?php echo $data['OrderId'];?></td>
            <td><?php echo $data['Amount'];?></td>
            <td><?php echo $data['Address'];?></td>
            <td><?php echo $data['Date'];?></td>
            <td><?php echo $data['Status'];?></td>
            <td><button class="Add_to_cart_button" type="submit" name="delivery">Delivered</button></td>
        </tr>
        <?php 
                }
        ?>
    </table>
</body>
</html>