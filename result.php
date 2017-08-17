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
header('Location: vote.php');   
}else{
//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
echo "Invalid Login Credentials.";
}
}
//3.1.4 if the user is logged in Greets the user with message

//3.2 When the user visits the page first time, simple login form will be displayed.
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Codeslashes</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/loading.css">
    <link rel="stylesheet" href="assets/css/loading-btn.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <script src="https://www.gstatic.com/firebasejs/4.2.0/firebase.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
</head>

<body>
    <!-- Navigation -->
    <div class="container">
        <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#">Let's Vote</a>
            <div id="navbarNavDropdown" class="navbar-collapse collapse">
                <ul class="navbar-nav mr-auto">

                </ul>
                <ul class="navbar-nav nav">
                    <li class="nav-item ">
                        <a class="nav-link" href="index.php" routerLinkActive="active">Home <span class="sr-only">(current)</span></a>
                    </li>
                    
					<?php
					if (isset($_SESSION['aadharnumber'])){
$aadharnumber = $_SESSION['aadharnumber'];
echo "<li class='nav-item'>
                        <a class='nav-link' href='vote.php'>Vote</a>
<li class='nav-item'><a class='nav-link' href=''>Hi, $aadharnumber</a></li>
<li class='nav-item'><a class='nav-link' href='logout.php'>Logout</a></p></li>";
 }
 else{
                    echo"
					<li class='nav-item'>
                        <a class='nav-link' href='index.php'>Features</a>
                    </li><li class='nav-item'>
                        <a class='nav-link' href='login.php'>Login</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' href='register.php' >Register</a>
 </li>";
 }
					?>
                </ul>
            </div>
        </nav>
    </div>
	
	<!-- Result Page -->
	
	<div class="container-fluid section">
	<div class="row">
	<div class="col-md-12 text-center section-block">
	<h1 class="">Vote Status</h1>
	<br>
	<div class="">
	<img src="assets/images/hackathon-logo.png" width="200px" >
	</div>
	<br>
	<h3>Your Vote has been casted Succesfully</h3>
	<br>
	<h4>Thanks for using Let's Vote!</h4>
	<br>
	<h5>Team CodeSlashes</h5>
	</div>
	</div>
	</div>
	
	
	
	
	
	
	 <!-- Footer -->

    <div class="container-fluid  footer">
        <div class="social-box float-left">
            <a href="https://www.facebook.com/itsanishsrinivasan" class="social-icons" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            <a href="#" class="social-icons" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            <a href="https://github.com/anishsrinivasan" class="social-icons" target="_blank"><i class="fa fa-github" aria-hidden="true"></i></a>
            <a href="mailto:itsanishsrinivasan@gmail.com" class="social-icons"><i class="fa fa-envelope" aria-hidden="true"></i></a>
        </div>
        <h4 class="text-center"> < CodeSlashes /> </h4><span class="float-right">Copyrights and Reserved 2017</span>

    </div>

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/scrollreveal/dist/scrollreveal.min.js"></script>
    <script>
        $(document).ready(function() {
            var revtime = 1000;
            window.sr = ScrollReveal();
            sr.reveal('.canvas-window', {
                duration: revtime
            });
            sr.reveal('.rev-1', {
                duration: revtime
            });
            sr.reveal('.rev-2', {
                duration: revtime
            });
            sr.reveal('.rev-3', {
                duration: revtime
            });
            sr.reveal('.rev-4', {
                duration: revtime
            });
            sr.reveal('.rev-5', {
                duration: revtime
            });
            sr.reveal('.rev-6', {
                duration: revtime
            });
            sr.reveal('.rev-7', {
                duration: revtime
            });
        });
    </script>

    <script src="assets/js/three.js"></script>

    <script src="assets/js/Projector.js"></script>
    <script src="assets/js/CanvasRenderer.js"></script>
    <!-- Visualitzation adjustments -->
    <script src="assets/js/3d-lines-animation.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="assets/js/kairos.js"></script>
    <script src="assets/js/methods_test.js"></script>

</body>

</html>