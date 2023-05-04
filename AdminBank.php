<?php
    $con = mysqli_connect("localhost","Yoganath","Admin","foodapp" );
    $ABankQ = mysqli_query($con,"SELECT * FROM ownbank");
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
            <th>Id</th>
            <th>Customer Id</th>
            <th>Username</th>
            <th>Order Id</th>
            <th>Amount</th>
            <th>Date Of Purchase</th>
        </tr>
        <?php
                while($data = mysqli_fetch_array($ABankQ))
                {
            ?>
        <tr>
            <td><?php echo $data['Id'];?></td>
            <td><?php echo $data['CustId'];?></td>
            <td><?php echo $data['UserName'];?></td>
            <td><?php echo $data['OrderId'];?></td>
            <td><?php echo $data['BB'];?></td>
            <td><?php echo $data['DoP'];?></td>
        </tr>
        <?php 
                }
        ?>
    </table>
</body>
</html>