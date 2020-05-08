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
    Film Actor.
    </h2><br>
    <form method="post">
        Actor ID: <input type="text" name="actorid" /><br><br>
        Film ID: <input type="text" name="filmid"/><br><br>
        Last Update: <input type="text" name="lastupdate"/><br><br>
        <input type="submit" name="submit" class="button"/>
    </form>
    
    <?php
    if(isset($_POST['submit']))
    {
        $actorid = $_POST['actorid'];
        $filmid = $_POST['filmid'];
        $lastupdate = $_POST['lastupdate'];
        
        $sql ="INSERT INTO film_actor (actor_id, film_id, last_update)"
        ."VALUES ('$actorid','$filmid', '$lastupdate' )";
        

       if (mysqli_query($conn, $sql)) {
        echo "New record has been added successfully !";
        } 
        else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
        }
    }
    ?>
    
    
    <table>
		<tr>
		<t>
			<th> Actor ID </th>
			<th> Film ID </th>
			<th> Last Update </th>
		</t>
		</tr>

<?php
            $sql = "SELECT * FROM film_actor;";
            $result = mysqli_query($conn, $sql);
            
            while($row =mysqli_fetch_assoc($result)){
                    echo "<tr><td>".$row['actor_id']."</td><td>".$row['film_id']."</td><td>".$row['last_update']."</td></tr>";
            }
            
            
?>
</table>

</body>
</html>