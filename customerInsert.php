<?php
    include 'dbh.sakila.php'; //php connection
    include 'index.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="style1.css">
</head>

<body>
    <br><h1>
        Sakila Database.
    </h1><br>
    <br><h2>
    Customer.
    </h2><br>
    <form method="post">
        Customer ID: <input type="text" name="customerid" /><br><br>
        Store ID: <input type="text" name="storeid" /><br><br>
        First Name: <input type="text" name="firstname" /><br><br>
        Last Name: <input type="text" name="lastname" /><br><br>
        Email: <input type="text" name="email" /><br><br>
        Address ID: <input type="text" name="addressid" /><br><br>
        Active: <input type="text" name="active" /><br><br>
        Create Date: <input type="text" name="date" /><br><br>
        Last Update: <input type="text" name="lastupdate"/><br><br>
        <input type="submit" name="submit" class="button"/>
    </form>
    
    <?php
    if(isset($_POST['submit']))
    {
        $customerid = $_POST['customerid'];
        $storeid = $_POST['storeid'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $addressid = $_POST['addressid'];
        $active = $_POST['active'];
        $date = $_POST['date'];
        $lastupdate = $_POST['lastupdate'];
        
        $sql ="INSERT INTO customer (customer_id, store_id, first_name, last_name, email, address_id, active, create_date, last_update )"
        ."VALUES ('$customerid','$storeid', '$firstname', '$lastname', '$email', '$addressid', '$active', '$date', '$lastupdate')";
        

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
			<th> Customer ID </th>
			<th> Store ID</th>
			<th> First Name </th>
			<th> Last Name </th>
			<th> Email </th>
			<th> Address ID </th>
			<th> Active </th>
			<th> Create date </th>
			<th> Last update </th>
		</t>
		</tr>

<?php
            $sql = "SELECT * FROM customer;";
            $result = mysqli_query($conn, $sql);
            
            
            
            while($row =mysqli_fetch_assoc($result)){
                    echo "<tr><td>".$row['customer_id']."</td><td>".$row['store_id']."</td><td>".$row['first_name']."</td><td>".$row['last_name']."</td><td>".$row['email']."</td><td>".$row['address_id']."</td><td>".$row['active']."</td><td>".$row['create_date']."</td><td>".$row['last_update']."</td></tr>";
            }
?>
</table>

</body>
</html>