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
    Store.
    </h2><br>
    <form method="post">
        Rental ID: <input type="text" name="rentid"/><br><br>
        Rental Date: <input type="text" name="rentdate" /><br><br>
        Inventory ID: <input type="text" name="invid"/><br><br>        
        Customer ID: <input type="text" name="custid" /><br><br>
        Return Date: <input type="text" name="return" /><br><br>
        Staff ID: <input type="text" name="staffid"/><br><br>        
        Last Update: <input type="text" name="lastupdate"/><br><br>
        <input type="submit" name="submit" class="button"/>
    </form>
    
    <?php
    if(isset($_POST['submit']))
    {
        $rentid = $_POST['rentid'];
        $rentdate = $_POST['rentdate'];
        $invid = $_POST['invid'];
        $custid = $_POST['custid'];
        $return = $_POST['return'];
        $staffid = $_POST['staffid'];
        $lastupdate = $_POST['lastupdate'];
        
        //change INTO ____ to table of choice
        $sql ="INSERT INTO rental (rental_id, rental_date, inventory_id, customer_id, return_date, staff_id, last_update)"
        ."VALUES ('$rentid','$rentdate', '$invid', '$custid','$return', '$staffid', '$lastupdate' )";
        

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
            <th>Rental ID</th>
            <th>Rental Date</th>
            <th>Inventory ID</th>
            <th>Customer ID</th>
            <th>Return Date</th>
            <th>Staff ID</th>
            <th>Last Update</th>
        </t>
    <?php
        $sql = "SELECT * FROM rental;";
        $result = mysqli_query($conn, $sql);
            
        while($row =mysqli_fetch_assoc($result)){
                echo 
                "<tr><td>".$row['rental_id'].
                "</td><td>".$row['rental_date'].
                "</td><td>".$row['inventory_id'].
                "</td><td>".$row['customer_id'].
                "</td><td>".$row['return_date'].
                "</td><td>".$row['staff_id'].
                "</td><td>".$row['last_update'].
                "</td></tr>";
        }
    ?>
    </table>
</body>
</html>
