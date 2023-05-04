<?php
    $con = mysqli_connect("localhost","Yoganath","Admin","foodapp" );
if(isset($_POST['Del_form']))
{
    $Deleteid = $_GET['delid'];
    $DeleteQ = mysqli_query($con,"DELETE FROM inventory where Id ='$Deleteid' ");
    if($DeleteQ)
    {
        echo '<script>
                alert("Item removed from the cart");
                window.location.href="AdminHome.php";
                </script>'; 
    }
}
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"/>
    <title>Admin Home Page</title>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script>
        $(function(){
            $("#navbar").load("Navbar.html");
        });
    </script>
</head>
<body>
    <div id="navbar"></div>
    <div style="padding-top:10px;">
    <?php
            $isemptysql = mysqli_query($con,"SELECT * FROM inventory");
            $res_rows = mysqli_num_rows($isemptysql);
            if($res_rows == 0)
            {
            ?>
            <div class="Empty">
            <h1>Empty!</h1>
            </div>
            <?php
            }
            else{
            ?>
        <table style="table-layout: fixed;">
            <tr>
                <th>Item Id</th>
                <th>Item</th>
                <th>Quantity</th>
                <th>Cost</th>
                <th>Remove</th>
            </tr>
            <?php
                $sql1 = mysqli_query($con,"SELECT * FROM inventory");
                while($row = mysqli_fetch_array($sql1))
                {
            ?>
            <tr>
            <form action="AdminHome.php?delid=<?=$row['Id']?>" method="post">
            <td><?php echo $row['Id'];?></td>
            <td><?php echo $row['Item'];?></td>
            <td><?php echo $row['stock'];?></td>
            <td><?php echo $row['price'];?></td>
            <td><button type="submit" name="Del_form" class ="Remove_button">Remove</button></td>
            </form>
            </tr>
            <?php 
                }
            }
                ?>
        </table>
    </div>
    <div class="wrapper">
    <div class="container-1 update-bg">
        <form action="update.php" method="post">
            <div class="Formtext">
                Insert
            </div>
            <div class="Formtext Insert">
            <input type="text" name ="Itemid" placeholder="Item Id" required>
            </div>
            <div class="Formtext Insert">
            <input type="text" name ="Itemname" placeholder="Item Name" required>
            </div>
            <div class="Formtext Insert">
            <input type="number" name="price" placeholder="Price" required>
            </div>
            <div class="Formtext Insert">
            <input type="number" name="stock" placeholder="stock" required>
            </div>
            <div class="register-button">
            <input type="submit" name="insert_form" value="Insert">
            </div>
        </form>
    </div>
    <div class="container-2 update-bg">
        <form action="update.php" method="post">
            <div class="Formtext">
                Update
            </div>
            <div class="Formtext Insert">
            <input type="text" name ="Itemid" placeholder="Item Id" required>
            </div>
            <div class="Formtext Insert">
            <input type="number" name="price" placeholder="Price">
            </div>
            <div class="Formtext Insert">
            <input type="number" name="stock" placeholder="stock">
            </div>
            <div class="register-button">
            <input type="submit" name="update_form" value="Update">
            </div>
        </form>
    </div>
    </div>
</body>
</html>