
<?php
/*
Creates the $variabls for the connection to the database (name_db,user_db,pass_db,db_host).
Then via mysqli_connect() we pass the variables, and assign the mysqli object to $conn variable
*/
function getDB()
{
$db_host = "localhost";
$db_name = "cms";
$db_user = "cms_www";
$db_pass = "64w6H2rOJ1zwLRyk";

$conn = mysqli_connect($db_host,$db_user,$db_pass,$db_name);

/*
After esablishing connection we are checking for errors via
mysqli_connect_error() function and if the statement returns true 
we echo out the error, and exit the program.
else we print to the client "Connected succesfully"
 */
if (mysqli_connect_error()){
    echo mysqli_connect_error();
    
    exit;
}
 return $conn;
}