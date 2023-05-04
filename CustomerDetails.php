<?php
    $con = mysqli_connect("localhost","Yoganath","Admin","foodapp" );
    $CustQ = mysqli_query($con,"SELECT * FROM register");
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"/>
    <title>Customer Details</title>
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
            <th>Name</th>
            <th>Mobile</th>
        </tr>
        <?php
                while($data = mysqli_fetch_array($CustQ))
                {
            ?>
        <tr>
            <td><?php echo $data['CustId'];?></td>
            <td><?php echo $data['Username'];?></td>
            <td><?php echo $data['Mobilenumber'];?></td>
        </tr>
        <?php 
                }
        ?>
    </table>
</body>
</html>