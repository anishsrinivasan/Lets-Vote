<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "letsvoteadmin", "letsvotepassword","letsvote");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$voteresult = mysqli_real_escape_string($link, $_REQUEST['voteresult']);
$aadharnumber = mysqli_real_escape_string($link, $_REQUEST['aadharnumber']);
 
// attempt insert query execution
$sql = "INSERT INTO voterecords (aadharnumber,voteresult) VALUES ('$aadharnumber','$voteresult')";
if(mysqli_query($link, $sql)){
	header('Refresh: 0;url=./result.php'); 
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// close connection
mysqli_close($link);
?>