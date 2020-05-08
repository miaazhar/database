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
    Film Text.
    </h2><br>
    <form method="post">
        Film ID: <input type="text" name="filmid"/><br><br>
        Title: <input type="text" name="title" /><br><br>
        Description: <input type="text" name="desc"/><br><br>
        <input type="submit" name="submit" class="button"/>
    </form>
    
    <?php
    if(isset($_POST['submit']))
    {
        $filmid = $_POST['filmid'];
        $title = $_POST['title'];
        $desc = $_POST['desc'];
        
        //change INTO ____ to table of choice
        $sql ="INSERT INTO film_text (film_id, title, description)"
        ."VALUES ('$filmid','$title', '$desc' )";
        

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
            <th>Film ID</th>
            <th>Title</th>
            <th>Description</th>
        </t>
    <?php
        $sql = "SELECT * FROM film_text;";
        $result = mysqli_query($conn, $sql);
            
        //echo "<table>";
            
        while($row =mysqli_fetch_assoc($result)){
                echo 
                "<tr><td>".$row['film_id'].
                "</td><td>".$row['title'].
                "</td><td>".$row['description'].
                "</td></tr>";
        }
    ?>
    </table>
</body>
</html>
