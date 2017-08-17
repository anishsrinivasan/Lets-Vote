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
    <!-- Canvas -->
    <div id="canvas">
        <div class="canvas-window">
            <div class="text-center">
                <h1 class="canvas-heading">Vote for a better cause.</h1>
                <br>
                <a routerLink="/login">
				<?php
				if (isset($_SESSION['aadharnumber'])){echo "<a href='vote.php'>";}
				else{
				echo "<a href='register.php'>";}?>
                    <button type="button " class="btn btn-secondary btn-lg canvas-button">Vote Now</button></a>
                </a>
            </div>
        </div>
    </div>

    <!-- Canvas -->

    <div class="container-fluid section main">
        <div class="row">
            <div class="col-md-12  section-block rev-1">
                <h1 class="text-center">Offsite Voting using Blockchain Network and Bio-metrics</h1>
                <p>Voting is one of the main reasons for a country's development. There are many loopholes which people use to cast fake votes and hack the voting system. A combination of blockchain and advances bio-metrics can be used to make the voting system more secure ,reliable such that people can easily cast their votes offsite as well as onsite.</p>
            </div>
        </div>
        <div class="row section-block 2 rev-2">
            <div class="col-md-6 text-center ">
                <img src="assets/images/block.png" style="width:200px; padding-bottom:5%">
            </div>
            <div class="col-md-6">
                <h3>BlockChain</h3>
                <p><strong>BlockChain</strong> is a distributed secure and private ledger of blocks, provides a potential solution to address electoral security to the voting machine ,as well as the voters information. Bio-metrics is one of the most secure ways of authenticating a person.</p>
            </div>
        </div>
        <div class="row section-block rev-3">
            <div class="col-md-6 text-center mobile-hide">
                <img src="assets/images/laptop_fingerprint.png" style="width:200px; padding-bottom:5%;">
                <br>
            </div>

            <div class="col-md-6">
                <h3>Aadhar Card & Bio-Metrics</h3>
                <p>Linking the <strong>Aadhar card</strong> to the voters ID would remove the names of the expired citizens from the voters list. Each Aadhar card has a person's bio-metrics linked to it. Using the bio-metrics to validate a person would make it easier for the citizens to cast their votes offsite as well as onsite. The vote percentage of elections keeps on reducing consistently because of the difficulty in accessing the voting booths and long queues.</p>
            </div>

            <div class="col-md-6 text-center desktop-hide">
                <img src="assets/images/laptop_fingerprint.png" style="width:200px; padding-bottom:5%;">
                <br>
            </div>
        </div>
    </div>

    <div class="container-fluid section " style="background-color:#2c3e50;">
        <div class="row">
            <div class="col-md-12 section-block rev-4">
                <h3 style="color:white;">By Combining the secure blockchain network and the real-time bio-metrics it will be easier to authenticate a person and make voting accessible to each and every citizen of the nation.</h3></div>
        </div>
    </div>

    <div class="container-fluid section team rev-5" style="background-color:#ecf0f1;">
        <div class="row">
            <div class="col-md-12 section-block">
                <h2 class="text-center">Team</h2>
                <hr>
                <h2 class="text-center" style="font-weight:bold;">< CodeSlashes /></h2>
                <br>
            </div>
        </div>
        <div class="row text-center rev-6">
            <div class="col-md-3">
                <div class="text-center"><img src="assets/images/amresh.png" style="width:200px">
                </div>
                <br>
                <h5>Amresh Balaji.R</h5>
                <p>CSE - III Year
                    <br> Rajalakshmi Engineering College
                    <br> Chennai, India</p>

                <div class="social-box">
                    <a href="https://www.facebook.com/itsanishsrinivasan" class="social-icons" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    <a href="#" class="social-icons" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                    <a href="https://github.com/anishsrinivasan" class="social-icons" target="_blank"><i class="fa fa-github" aria-hidden="true"></i></a>
                    <a href="mailto:itsanishsrinivasan@gmail.com" class="social-icons"><i class="fa fa-envelope" aria-hidden="true"></i></a>
                </div>
                <br>
            </div>
            <div class="col-md-3">
                <div class="text-center"><img src="assets/images/anishsrinivasan.png" style="width:200px;">
                </div>
                <br>
                <h5>Anish K. Srinivasan</h5>
                <p>CSE - III Year
                    <br> Rajalakshmi Engineering College
                    <br> Chennai, India</p>

                <div class="social-box">
                    <a href="https://www.facebook.com/itsanishsrinivasan" class="social-icons" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    <a href="#" class="social-icons" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                    <a href="https://github.com/anishsrinivasan" class="social-icons" target="_blank"><i class="fa fa-github" aria-hidden="true"></i></a>
                    <a href="mailto:itsanishsrinivasan@gmail.com" class="social-icons"><i class="fa fa-envelope" aria-hidden="true"></i></a>
                </div>
                <br>
            </div>
            <div class="col-md-3">
                <div class="text-center"><img src="assets/images/akshay.png" style="width:200px">
                </div>
                <br>
                <h5>Akshay Viswanathan</h5>
                <p>CSE - III Year
                    <br> Rajalakshmi Engineering College
                    <br> Chennai, India</p>

                <div class="social-box">
                    <a href="https://www.facebook.com/itsanishsrinivasan" class="social-icons" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    <a href="#" class="social-icons" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                    <a href="https://github.com/anishsrinivasan" class="social-icons" target="_blank"><i class="fa fa-github" aria-hidden="true"></i></a>
                    <a href="mailto:itsanishsrinivasan@gmail.com" class="social-icons"><i class="fa fa-envelope" aria-hidden="true"></i></a>
                </div>
                <br>
            </div>
            <div class="col-md-3">
                <div class="text-center"><img src="assets/images/daya.png" style="width:200px;">
                </div>
                <br>
                <h5>Daya Shankar K</h5>
                <p>CSE - III Year
                    <br> Rajalakshmi Engineering College
                    <br> Chennai, India</p>

                <div class="social-box">
                    <a href="https://www.facebook.com/itsanishsrinivasan" class="social-icons" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    <a href="#" class="social-icons" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                    <a href="https://github.com/anishsrinivasan" class="social-icons" target="_blank"><i class="fa fa-github" aria-hidden="true"></i></a>
                    <a href="mailto:itsanishsrinivasan@gmail.com" class="social-icons"><i class="fa fa-envelope" aria-hidden="true"></i></a>
                </div>
                <br>
            </div>

        </div>

    </div>

    <div class="container-fluid section rev-7">
        <div class="row">
            <div class="col-md-12 ">
                <h2 class="text-center">Awards and Nominations</h2>
                <br>
            </div>
            <div class="col-md-6">
                <div class="text-center"><img src="assets/images/hackathon-logo.png" style="width:200px">
                </div>
            </div>
            <div class="col-md-6 section-block">
                <h4>Rajasthan Hackathon 2.0 - Kota</h4>
                <p>Our Idea has been shortlisted in top 280 teams out of 5000+ teams in a Hackathon event to be conducted by Rajasthan Government.</p>
                <p>Event starts on 17th August 2017</p>
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