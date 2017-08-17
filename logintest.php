<?php  //Start the Session
session_start();
 require('config.php');
//3. If the form is submitted or not.
//3.1 If the form is submitted
if (isset($_POST['aadharnumber']) and isset($_POST['mobilenumber'])){
//3.1.1 Assigning posted values to variables.
$aadharnumber = $_POST['aadharnumber'];
$mobilenumber = $_POST['mobilenumber'];
//3.1.2 Checking the values are existing in the database or not
$query = "SELECT * FROM `users` WHERE aadharnumber='$aadharnumber' and mobilenumber='$mobilenumber'";
 
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$count = mysqli_num_rows($result);
//3.1.2 If the posted values are equal to the database values, then session will be created for the user.
if ($count == 1){
	session_start();
$_SESSION['aadharnumber'] = $aadharnumber;
header('Location: ../vote.html');   
}else{
//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
echo "Invalid Login Credentials.";
}
}
//3.1.4 if the user is logged in Greets the user with message

//3.2 When the user visits the page first time, simple login form will be displayed.
?>
<?php
if (isset($_SESSION['aadharnumber'])){
$aadharnumber = $_SESSION['aadharnumber'];
echo "<p class='session-header'>Hi, $aadharnumber <a class='logout' href='logout.php'>Logout</a></p>";
 }
 else
	 echo "Nothing";;
?>