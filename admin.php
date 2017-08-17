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


$con = mysqli_connect('localhost', 'letsvoteadmin', 'letsvotepassword');
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
 
mysqli_select_db($con , "letsvote");
 
$vtotal = mysqli_query($con,"SELECT COUNT(voteresult) AS voteresulttotal FROM voterecords");
$v1 = mysqli_query($con,"SELECT COUNT(voteresult) AS voteresult1 FROM voterecords WHERE voteresult = 'House Lannister'");
$v2 = mysqli_query($con,"SELECT COUNT(voteresult) AS voteresult2 FROM voterecords WHERE voteresult = 'House Targaryen'");
$v3 = mysqli_query($con,"SELECT COUNT(voteresult) AS voteresult3 FROM voterecords WHERE voteresult = 'House Stark'");


while($row = mysqli_fetch_array($vtotal))
  { $votertotal =$row['voteresulttotal'];}
   while($row = mysqli_fetch_array($v1))
  { $voter1 =($row['voteresult1']/$votertotal)*100; }
while($row = mysqli_fetch_array($v2))
  { $voter2 =($row['voteresult2']/$votertotal)*100; }
while($row = mysqli_fetch_array($v3))
  { $voter3 =($row['voteresult3']/$votertotal)*100; }


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
	<h1 class="">Live Vote Status</h1>
	<br>
	
	<canvas id="bloodChart" class="chart" height="80"></canvas>

	</div>
	<br>
	<div class="col-md-4 text-center">
	<img src="assets/images/lannister.png" width="200px" class="img-responsive img-radio">
	<h3>House Lannister - <?php echo round($voter1)?>%</h3>
	</div>
	<div class="col-md-4 text-center">
	<img src="assets/images/tar.png" width="200px" class="img-responsive ">
	<h3>House Targaryen - <?php echo round($voter2)?>%</h3>
	</div>
	<div class="col-md-4 text-center">
	<img src="assets/images/stark.png" width="200px" class="img-responsive ">
	<h3>House Stark - <?php echo round($voter3)?>%</h3>
	</div>
	
	
	<br>
	<div class="col-md-12 text-center section-block">
	<h5>Team CodeSlashes</h5>
	</div>
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

    <script src="assets/js/app.js"></script>
	 <script src="assets/js/jquery.min.js"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.min.js"></script>
 <script>
        $(document).ready(function(){
	$.ajax({
		url: "http://localhost/letsvote/charts/resultchart.php",
		method: "GET",
		success: function(data) {
			console.log(data);
			var player = [];
			var score = [];

			for(var i in data) {
				player.push("Player " + data[i].voteresult);
				score.push(data[i].voteresultbg);
			}

			var chartdata = {
				labels: player,
				datasets : [
					{
						
						label: 'Player Score',
						
						borderColor: 'rgba(200, 200, 200, 0.75)',
						data: score,
						backgroundColor: [
                'rgba(211, 84, 0,1.0)',
                'rgba(192, 57, 43,1.0)',
				'rgba(127, 140, 141,1.0)',
            ]
					
					
					}
				]
			};

			var ctx = $("#bloodChart");

			var barGraph = new Chart(ctx, {
				type: 'doughnut',
				data: chartdata
			});
		},
		error: function(data) {
			console.log(data);
		}
		});});
    </script>

</body>

</html>