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
    <h2>
        Film.
    </h2>
    <form method="post">
        Film ID: <input type="text" name="filmid" /><br><br>
        Title: <input type="text" name="title" /><br><br>
        Description: <input type="text" name="description"/><br><br>
        Release Year: <input type="text" name="year" /><br><br>
        Language ID: <input type="text" name="languageid" /><br><br>
        Original Language ID: <input type="text" name="orilanguageid"/><br><br>
        Rental Duration: <input type="text" name="rentdur" /><br><br>
        Rental Rate: <input type="text" name="rentrate" /><br><br>
        Length: <input type="text" name="length"/><br><br>
        Replacement Cost: <input type="text" name="cost" /><br><br>
        Rating: <input type="text" name="rate" /><br><br>
        Special features: <input type="text" name="sfx"/><br><br>
        Last Update: <input type="text" name="lastupdate"/><br><br>
        <input type="submit" name="submit"/>
    </form>
    
    <?php
    if(isset($_POST['submit']))
    {
        $filmid = $_POST['filmid'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $year = $_POST['year'];
        $languageid = $_POST['languageid'];
        $orilanguageid = $_POST['orilanguageid'];
        $rentdur = $_POST['rentdur'];
        $rentrate = $_POST['rentrate'];
        $length = $_POST['length'];
        $cost = $_POST['cost'];
        $rate = $_POST['rate'];
        $sfx = $_POST['sfx'];
        $lastupdate = $_POST['lastupdate'];
        
        $sql ="INSERT INTO film (film_id, title, description, release_year, language_id,original_language_id, rental_duration, rental_rate,length, 
        replacement_cost, rating, special_features, last_update)"
        ."VALUES ('$filmid','$title', '$description', '$year', '$languageid', '$orilanguageid', '$rentdur','$rentrate', '$length', '$cost', '$rate', '$sfx', '$lastupdate' )";
        

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
			<th> Film ID </th>
			<th> Title </th>
			<th> Description </th>
			<th> Release year </th>
			<th> Language ID </th>
			<th> Original language ID </th>
			<th> Rental duration </th>
			<th> Rental rate </th>
			<th> Length </th>
			<th> Replacement cost </th>
			<th> Rating </th>
			<th> Special features </th>
			<th> Last update </th>
		</t>
		</tr>

<?php
            $sql = "SELECT * FROM film;";
            $result = mysqli_query($conn, $sql);
            
            
            
            while($row =mysqli_fetch_assoc($result)){
                    echo "<tr><td>".$row['film_id']."</td><td>".$row['title']."</td><td>".$row['description']."</td><td>".$row['release_year']."</td><td>".$row['language_id']."</td><td>".$row['original_language_id']."</td><td>".$row['rental_duration']."</td><td>".$row['rental_rate']."</td><td>".$row['length']."</td><td>".$row['replacement_cost']."</td><td>".$row['rating']."</td><td>".$row['special_features']."</td><td>".$row['last_update']."</td></tr>";
            }
?>
</table>

</body>
</html>