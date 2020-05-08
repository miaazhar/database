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
    Language.
    </h2><br>
    <form method="post">
        Language ID: <input type="text" name="langid"/><br><br>
        Name: <input type="text" name="name" /><br><br>
        Last Update: <input type="text" name="lastupdate"/><br><br>
        <input type="submit" name="submit" class="button"/>
    </form>
    
    <?php
    if(isset($_POST['submit']))
    {
        $langid = $_POST['langid'];
        $name = $_POST['name'];
        $lastupdate = $_POST['lastupdate'];
        
        //change INTO ____ to table of choice
        $sql ="INSERT INTO language (language_id, name, last_update)"
        ."VALUES ('$langid','$name', '$lastupdate' )";
        

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
            <th>LanguangeID</th>
            <th>Name</th>
            <th>Last Update</th>
        </t>
    <?php
        $sql = "SELECT * FROM language;";
        $result = mysqli_query($conn, $sql);
            
        while($row =mysqli_fetch_assoc($result)){
                echo 
                "<tr><td>".$row['language_id'].
                "</td><td>".$row['name'].
                
                "</td><td>".$row['last_update'].
                "</td></tr>";
        }
           $sql = "INSERT INTO actor (actor_id, first_name, last_name, last_update)
            VALUES ('John', 'Doe', 'john@example.com','0')";
    ?>
    </table>
</body>
</html>
