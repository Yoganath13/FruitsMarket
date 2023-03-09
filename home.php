
<?php
session_start();
    $con = mysqli_connect("localhost","Yoganath","Admin","FoodApp" );
    $cart_database = mysqli_connect("localhost","Yoganath","Admin","User_Cart");
    $sql = mysqli_query($con,"SELECT * FROM inventory");
    $Username = $_SESSION['UserName'];
    // $data = mysqli_fetch_array($sql);
    ?>

<html>
    <head>
        <title>
            Welcome
        </title>
        <link rel="stylesheet" href="style.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <div>
            <a href="login.html"><button class="logout">Logout</button></a>
        </div>  
        <div class="cart-icon">
            <a href="cart.php" class="cart-icon"><i class="fa fa-shopping-cart"></i></a>
        </div>
        <div class="username">
                <?php echo "Hi! $Username";?>
        </div>  
        <div class="Home">      
          Welcome to our super Market 
        </div>
        <br/>
    <table style="table-layout: fixed;">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Rs/Kg</th>
            <th>In Stock (In Kg)</th>
            <th>Quantity</th>
            <th></th>
        </tr>
        <?php
                while($data = mysqli_fetch_array($sql))
                {
            ?>
        <tr>
            <form name="table" action="addtocart.php?id=<?=$data['Id']?>" method="post">
            <td><?php echo $data['Id'];?></td>
            <td><?php echo $data['Item'];?></td>
            <td><?php echo $data['price'];?></td>
            <td><?php echo $data['stock'];?></td>
            <td><input type="number" name="quantity" id="quantity" required = "required"></td>
            <td><button type="submit" name="cart" class ="Add_to_cart_button">Add to Cart</button></td>
            </form>
        </tr>
        <?php 
                }
        ?>
    </table>
    </body>
</html>



    