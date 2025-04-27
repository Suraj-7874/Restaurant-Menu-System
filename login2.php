<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Login</title>
  
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
  
      <link rel="stylesheet" href="css/login_style.css">


 
 


</head>
<body class="background-line">
<header id="header" class="header-scroll top-header headrom">
            <nav class="navbar navbar-dark">
                <div class="container">
                    <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
                    <a class="navbar-brand" href="index.php">  <img class="img-rounded" src="images/head_img.jpg" alt="" height="39" width="200" > </a>
                    <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
                       <ul class="nav navbar-nav">
                            <li class="nav-item"> <a class="nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a> </li>
                            <li class="nav-item"> <a class="nav-link active" href="restaurants.php">Restaurants <span class="sr-only"></span></a> </li>
                            
							<?php
						if(empty($_SESSION["user_id"]))
							{
								echo '<li class="nav-item"><a href="login2.php" class="nav-link active">Login</a> </li>
							  <li class="nav-item"><a href="registration.php" class="nav-link active">Signup</a> </li>';
							}
						else
							{
									
									
										echo  '<li class="nav-item"><a href="your_orders.php" class="nav-link active">Your Orders</a> </li>';
									echo  '<li class="nav-item"><a href="logout.php" class="nav-link active">Logout</a> </li>';
							}

						?>
							 
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
<div>

<?php
include("connection/connect.php"); 
error_reporting(0); 
session_start(); 
if(isset($_POST['submit']))  
{
	$username = $_POST['username'];  
	$password = $_POST['password'];
	
	if(!empty($_POST["submit"]))   
     {
	$loginquery ="SELECT * FROM users WHERE username='$username' && password='".md5($password)."'"; 
	$result=mysqli_query($db, $loginquery); //executing
	$row=mysqli_fetch_array($result);
	
	                        if(is_array($row)) 
								{
                                    	$_SESSION["user_id"] = $row['u_id']; 
										 header("refresh:1;url=index.php"); 
	                            } 
							else
							    {
                                      	$message = "Invalid Username or Password!"; 
                                }
	 }
	
	
}
?>
  

<div class="pen-title">
  
</div>

<div class="module form-module">
  <div class="toggle">
   
</div>

 

	<section>
		<div class="leaves">
			<div class="set">
				<div><img src="images/leaf_01.png"></div>
				<div><img src="images/leaf_02.png"></div>
				<div><img src="images/leaf_03.png"></div>
				<div><img src="images/leaf_04.png"></div>
				<div><img src="images/leaf_01.png"></div>
				<div><img src="images/leaf_02.png"></div>
				<div><img src="images/leaf_03.png"></div>
				<div><img src="images/leaf_04.png"></div>
			</div>
		</div>
		<img src="images/bg.jpg" class="bg">
		<img src="images/girl.png" class="girl">
		<img src="images/trees.png" class="trees">
	 <div class="form">
		<div class="login">
			 <h2>Login to your account</h2>  
			
 			  <span style="color:red;"><?php echo $message; ?></span> 
   			<span style="color:green;"><?php echo $success; ?></span>
  			<form action="" method="post">
			<div class="inputBox">
				<input type="text" placeholder="Username" name="username">
			</div>
			<div class="inputBox">
				<input type="password" placeholder="Password" name="password">
			</div>
			<div class="inputBox">
				  <input type="submit" id="buttn" name="submit" value="Login" />
			</div>
			<div class="group">
				<a href="#">Not registered?</a>
				<a href="registration.php">Signup</a>
			</div>
		</div>
	</form>
		
	</section>
	<div  class="back">
	 <div class="marquee-container">
      <div class="marquee">
       Order fast, login faster ! Don't miss out on your favorite dishes .
      </div>
    </div>
</div>


  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	
<footer class="footer" style="background-color: #222; color: white; padding: 40px 0;">
    <div class="container">
        <div class="bottom-footer">
            <div class="row">
                <div class="col-xs-12 col-sm-3 payment-options">
                    <h5>Payment Options</h5>
                    <ul style="list-style: none; padding: 0; display: flex; gap: 10px;">
                        <li><a href="#"><img src="images/paypal.png" alt="Paypal" width="40"></a></li>
                        <li><a href="#"><img src="images/mastercard.png" alt="Mastercard" width="40"></a></li>
                        <li><a href="#"><img src="images/maestro.png" alt="Maestro" width="40"></a></li>
                        <li><a href="#"><img src="images/stripe.png" alt="Stripe" width="40"></a></li>
                        <li><a href="#"><img src="images/bitcoin.png" alt="Bitcoin" width="40"></a></li>
                    </ul>
	
                </div>

                <div class="col-xs-12 col-sm-3">
                    <h5>Contact Us</h5>
                    <p>Email: <br>
                        <a href="mailto:Survesuraj38@gmail.com" style="color: #00aced;">Survesuraj38@gmail.com</a> <br>
                        <a href="mailto:Pravinsukale90@gmail.com" style="color: #00aced;">Pravinsukale90@gmail.com</a>
                    </p>
                    <p>Phone: <br>
                        <a href="tel:+919011452576" style="color: #00aced;">+91 9011452576</a> <br>
                        <a href="tel:+919850220017" style="color: #00aced;">+91 9850220017</a>
                    </p>
                    <p>Address: Pune</p>
                </div>

                <div class="col-xs-12 col-sm-3">
                    <h5>Website Rating</h5>
                    <p>Rate our website:</p>
                    <div class="rating">
                        <span class="star" onclick="rate(1)">&#9733;</span>
                        <span class="star" onclick="rate(2)">&#9733;</span>
                        <span class="star" onclick="rate(3)">&#9733;</span>
                        <span class="star" onclick="rate(4)">&#9733;</span>
                        <span class="star" onclick="rate(5)">&#9734;</span>
                    </div>
                    <p id="rating-text">4.0/5 based on 500+ reviews</p>
                </div>
<br>	
	<h5>Follow Our Journey</h5>
                    <div class="social-icons" style="display: flex; gap: 10px; margin-top: 15px;">
                        <a href="#"><img src="images/facebook.jpg" alt="Facebook" width="55"></a>
                        <a href="#"><img src="images/twitter.jpg" alt="Twitter" width="50"></a>
                        <a href="#"><img src="images/instagram.jpg" alt="Instagram" width="50"></a>
                        <a href="#"><img src="images/linkdin.jpg" alt="LinkedIn" width="50"></a>
                    </div>
	
            </div>
<div class="row">
    <div class="col-12 text-right">
        <p style="color: #ccc; font-size: 14px; text-align: right;">
            © 2025 YourHotelPicker.com. All rights reserved. 
            <a href="#" style="color: #00aced; text-decoration: none; margin-left: 10px;">Privacy Policy</a> |
            <a href="#" style="color: #00aced; text-decoration: none; margin-left: 10px;">Terms of Service</a> |
            <a href="#" style="color: #00aced; text-decoration: none; margin-left: 10px;">Contact Us</a>
        </p>
    </div>
</div>
        </div>
    </div>

    <style>
        .rating .star {
            font-size: 24px;
            cursor: pointer;
            color: gold;
            transition: color 0.3s;
        }
        .rating .star:hover,
        .rating .star.active {
            color: orange;
        }
        a {
            text-decoration: none;
        }
    </style>

    <script>
        function rate(stars) {
            let ratingText = document.getElementById("rating-text");
            let starElements = document.querySelectorAll(".rating .star");

            starElements.forEach((star, index) => {
                if (index < stars) {
                    star.classList.add("active");
                } else {
                    star.classList.remove("active");
                }
            });

            ratingText.innerHTML = `${stars}.0/5 based on 500+ reviews`;
        }
    </script>
</footer>



</body>

</html>
