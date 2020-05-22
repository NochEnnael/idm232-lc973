  
<?php
//local
// Create database connection
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "root";
$dbname = "cookbook"; // PUT THE DATABASE NAME WITH THE TABLE IN HERE. JSUT NOT THE TABLE NAME


//online 
/* $dbhost = "localhost";
$dbuser = "leannekc_cooker";
$dbpass = "rep123!rep";
$dbname = "leannekc_cookbook"; */

$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Check the connection is good with no errors
if (mysqli_connect_errno()) {
		die ("Database connection failed: " .
				mysqli_connect_error() .
				" (" . mysqli_connect_errno() . ")"
		);
}
?>