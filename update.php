<?php
$con = mysqli_connect("localhost","Yoganath","Admin","foodapp" );
if(isset($_POST['insert_form']))
{
    $itemid = $_POST['Itemid'];
    $itemname = $_POST['Itemname'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $insertIQ = mysqli_query($con,"INSERT INTO inventory(`Id`,`Item`,`stock`,`price`) VALUES ('$itemid','$itemname','$stock','$price')");
    if($insertIQ)
    {
        echo '<script>
        alert("Item Added in Inventory Successfully!");
        window.location.href="AdminHome.php";
        </script>';
    }
    else{
        echo '<script>
        alert("Item Insertion Failed!");
        window.location.href="AdminHome.php";
        </script>';
    }
}

if(isset($_POST['update_form']))
{
    $itemid = $_POST['Itemid'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    if(empty($price))
    {
    $updateIQ = mysqli_query($con,"UPDATE inventory SET stock='$stock' WHERE Id='$itemid' ");
    }
    else{
        $updateIQ = mysqli_query($con,"UPDATE inventory SET price='$price' WHERE Id='$itemid' ");
    }
    if($updateIQ)
    {
        echo '<script>
        alert("Item Updated in Inventory Successfully!");
        window.location.href="AdminHome.php";
        </script>';
    }
    else{
        echo '<script>
        alert("Item Updation Failed!");
        window.location.href="AdminHome.php";
        </script>';
    }
}
?>