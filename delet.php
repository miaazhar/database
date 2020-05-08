<?php
include 'dbh.sakila.php';

if(isset($_GET['countryid'])){
	// retrieve id from url
    echo 'ID received, ';
	$countryid = ($_GET['countryid']);

	// sql delete query
	//$query = "DELETE FROM country WHERE country_id =$countryid";
}
else{
	echo 'No id set';
}

$result = mysqli_query($conn, "DELETE FROM country WHERE country_id =$countryid");
if($result){
	header('Location: /sakila_database/country.php');
    echo 'User data deleted successfully';
}else{
	echo 'User data couldn\'t be deleted';
	header('Location: /sakila_database/country.php');
}


?>