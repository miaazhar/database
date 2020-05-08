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
        Payment ID: <input type="text" name="payid"/><br><br>
        Customer ID: <input type="text" name="custid" /><br><br>
        Staff ID: <input type="text" name="staffid"/><br><br>
        Rental ID: <input type="text" name="rentid"/><br><br>
        Amount: <input type="text" name="amount" /><br><br>
        Payment Date: <input type="text" name="paydate" /><br><br>
        Last Update: <input type="text" name="lastupdate"/><br><br>
        <input type="submit" name="submit" class="button"/>
    </form>
    
    <?php
    if(isset($_POST['submit']))
    {
        $payid = $_POST['payid'];
        $custid = $_POST['custid'];
        $staffid = $_POST['staffid'];
        $rentid = $_POST['rentid'];
        $amount = $_POST['amount'];
        $paydate = $_POST['paydate'];
        $lastupdate = $_POST['lastupdate'];
        
        //change INTO ____ to table of choice
        $sql ="INSERT INTO payment (payment_id, customer_id, staff_id, rental_id, amount, payment_date, last_update)"
        ."VALUES ('$payid','$custid', '$staffid', '$rentid','$amount', '$paydate', '$lastupdate' )";
        

       if (mysqli_query($conn, $sql)) {
        echo "New record has been added successfully !";
        } 
        else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
        }
 
     //mysqli_close($conn);
    }
    ?>
    <table>
        <t>
            <th>Payment ID</th>
            <th>Customer ID</th>
            <th>Staff ID</th>
            <th>Rental ID</th>
            <th>Amount</th>
            <th>Payment Date</th>
            <th>Last Update</th>
        </t>
    <?php
        $sql = "SELECT * FROM payment;";
        $result = mysqli_query($conn, $sql);
            
        //echo "<table>";
            
        while($row =mysqli_fetch_assoc($result)){
                echo 
                "<tr><td>".$row['payment_id'].
                "</td><td>".$row['customer_id'].
                "</td><td>".$row['staff_id'].
                "</td><td>".$row['rental_id'].
                "</td><td>".$row['amount'].
                "</td><td>".$row['payment_date'].
                "</td><td>".$row['last_update'].
                "</td></tr>";
        }//end while
            
        //echo "</table>";
    ?>
    </table>
</body>
</html>
