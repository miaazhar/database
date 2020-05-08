<?php
    include 'dbh.sakila.php'; //php connection
    include 'index.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>
    </title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <br><h1>
        Sakila Database.
    </h1><br>
    <br><h2>
    Inventory.
    </h2><br>
    <form method="post">
        Inventory ID: <input type="text" name="invid"/><br><br>
        Film ID: <input type="text" name="filmid" /><br><br>
        Store ID: <input type="text" name="storeid"/><br><br>
        Last Update: <input type="text" name="lastupdate"/><br><br>
        <input type="submit" name="submit" class="button"/>
    </form>
    
    <?php
    if(isset($_POST['submit']))
    {
        $invid = $_POST['invid'];
        $filmid = $_POST['filmid'];
        $storeid = $_POST['storeid'];
        $lastupdate = $_POST['lastupdate'];
        
        //change INTO ____ to table of choice
        $sql ="INSERT INTO inventory (inventory_id, film_id, store_id, last_update)"
        ."VALUES ('$invid','$filmid', '$storeid', '$lastupdate' )";
        

       if (mysqli_query($conn, $sql)) {
        echo "New record has been added successfully !";
        } 
        else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
        }
    }
    ?>
    <table>
        <t>
            <th>Inventory ID</th>
            <th>Film ID</th>
            <th>Store ID</th>
            <th>Last Update</th>
        </t>
    <?php
    
        $sql = "SELECT * FROM inventory;";
        $result = mysqli_query($conn, $sql);
            
        while($row =mysqli_fetch_assoc($result)){
                echo 
                "<tr><td>".$row['inventory_id'].
                "</td><td>".$row['film_id'].
                "</td><td>".$row['store_id'].
                "</td><td>".$row['last_update'].
                "</td></tr>";
        }
    ?>
    </table>
</body>
</html>
