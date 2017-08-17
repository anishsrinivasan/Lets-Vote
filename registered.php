<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "letsvoteadmin", "letsvotepassword","letsvote");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$aadharnumber = mysqli_real_escape_string($link, $_REQUEST['aadharnumber']);
$mobilenumber = mysqli_real_escape_string($link, $_REQUEST['mobilenumber']);
 
// attempt insert query execution
$sql = "INSERT INTO users (aadharnumber,mobilenumber) VALUES ('$aadharnumber', '$mobilenumber')";
if(mysqli_query($link, $sql)){
    echo "The Account has been created Succesfully, You will get redirected to Index Page";
	header('Refresh: 2;url=./login.php'); 
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// close connection
mysqli_close($link);
?>