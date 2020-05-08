<?php
    include 'dbh.sakila.php'; //php connection 
    include 'index.php'
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
    Film Category.
    </h2><br>
    <!-- INSERT -->
    
    <div class = "Insert">
        <input type="submit" name="OpenInsert" class="button" value="Insert" onclick="InsertFunc"><br>
    </div>
    
    <form method="post">
        Film ID: <input type="text" name="filmid"/><br><br>
        Category ID: <input type="text" name="categoryid"/><br><br>
        Last Update: <input type="text" name="lastupdate"/><br><br>
        <input type="submit" class="button" name = "submit" value="Submit"><br>
    </form>
    
    <?php
    if(isset($_POST['submit']))
    {
        $filmid = $_POST['filmid'];
        $categoryid = $_POST['categoryid'];
        $lastupdate = $_POST['lastupdate'];
        
        $sql ="INSERT INTO film_category (film_id, category_id, last_update)"
        ."VALUES ('$filmid','$categoryid','$lastupdate')";
        

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
            <th>Film ID</th>
            <th>Category ID</th>
            <th>Last Update</th>
        </t>
    <?php
        $sql = "SELECT * FROM film_category;";
        $result = mysqli_query($conn, $sql);
            
        while($row =mysqli_fetch_assoc($result)){
                echo 
                "<tr><td>".$row['film_id'].
                "</td><td>".$row['category_id'].
                "</td><td>".$row['last_update'].
                "</td></tr>";
        }//end while
            
    ?>
    </table>
    <script>
        function(){
            
        }
    </script>
    
</body>
</html>
