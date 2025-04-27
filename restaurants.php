<!DOCTYPE html>
<html lang="en">
<?php
        include("connection/connect.php");
        error_reporting(0);
        session_start();
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title>Restaurants</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet"> 
    <style>
        .text{
            color:white;
            background: rgb(255, 214, 143); color:white;
        }
        .h { margin: 0px; padding: 50px; box-sizing: border-box; }
         .body1 { display: flex; justify-content: center; align-items: center; height: 50vh; background: rgb(255, 213, 142); }
        .slider-container { position: relative; width: 90%; max-width: 1000px; overflow: visible; border-radius: 10px; box-shadow: 0 4px 10px rgb(0, 0, 0); }
        .slider { display: flex; transition: transform 0.5s ease-in-out; }
        .slide { min-width: 50%; opacity: 0.5; transition: opacity 0.5s ease-in-out, transform 0.5s ease-in-out; position: relative; }
        .slide img { width: 100%; height: 400px; object-fit: cover; border-radius: 20px; }
        .active { opacity: 1; transform: scale(1.1); z-index: 2; }
        .prev, .next {
            position: absolute; top: 50%; transform: translateY(-50%);
            background: rgba(0, 0, 0, 0.5); color: white; border:solid; 
            padding: 10px; cursor: pointer; font-size: 18px;
        }
        .prev { left: 10px; }
        .next { right: 10px; }
        </style>
</head>
<body class="text">
    <header id="header" class="header-scroll top-header headrom">
            <nav class="navbar navbar-dark">
                <div class="container">
                    <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
                    <a class="navbar-brand" href="index.php"> <img class="img-rounded" src="images/head_img.jpg" alt="" height="39" width="200" > </a>
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
        <div class="page-wrapper_1">
            <div class="top-links">
                <div class="container">
                    <ul class="row links">
                       
                        <li class="col-xs-12 col-sm-4 link-item active"><span>1</span><a href="#">Choose Restaurant</a></li>
                        <li class="col-xs-12 col-sm-4 link-item"><span>2</span><a href="#">Pick Your favorite food</a></li>
                        <li class="col-xs-12 col-sm-4 link-item"><span>3</span><a href="#">Order and Pay</a></li>
                    </ul>
                </div>
            </div>
            <div class="h">
            <div class= "body1">
                
            <div class="slider-container">
           
        <div class="slider">
            <div class="slide active"><img src="admin\Res_img\606d782ff3172.jpg" alt="Slide 1"></div>
            <div class="slide"><img src="admin\Res_img\5ad74bfc19f35.jpg" alt="Slide 2"></div>
            <div class="slide "><img src="admin\Res_img\5ad74ce37c383.jpg" alt="Slide 3"></div>
            <div class="slide "><img src="admin\Res_img\5ad74de005016.jpg"" alt="Slide 4"></div>
            <div class="slide"><img src="admin\Res_img\5ad74e5310ae4.jpg" alt="Slide 5"></div>
            <div class="slide "><img src="admin\Res_img\5ad74ebf1d103.jpg" alt="Slide 6"></div>
            <div class="slide"><img src="admin\Res_img\5ad79e7d01c5a.jpg" alt="Slide 7"></div>
            <div class="slide "><img src="admin\Res_img\5ad726e6db7c6.jpg" alt="Slide 8"></div>
            <div class="slide "><img src="admin\Res_img\604e62e190cec.jpg"" alt="Slide 9"></div>
            <div class="slide"><img src="admin\Res_img\604e59365454f.jpg" alt="Slide 10"></div>
        </div>
        <button class="prev" onclick="moveSlide(-1)">&#10094;</button>
        <button class="next" onclick="moveSlide(1)">&#10095;</button>
    </div>
                        </div>
    <script>
        let index = 1;
        function moveSlide(step) {
            const slides = document.querySelectorAll(".slide");
            index = (index + step + slides.length) % slides.length;
            document.querySelector(".slider").style.transform = `translateX(-${index * 33.33}%)`;
            slides.forEach(slide => slide.classList.remove("active"));
            slides[index].classList.add("active");
        }
        setInterval(() => moveSlide(1), 3000);
    </script>
    </div>
            <div class="result-show">
                <div class="container">
                    <div class="row">     
                    </div>
                </div>
            </div>
            <section class="restaurants-page">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-3">
                        </div>
                        <div class="col-xs-12 col-sm-7 col-md-7 col-lg-9">
                            <div class="bg-gray restaurant-entry">
                                <div class="row">
								<?php $ress= mysqli_query($db,"select * from restaurant");
									      while($rows=mysqli_fetch_array($ress))
										  {
													
						
													 echo' <div class="col-sm-12 col-md-12 col-lg-8 text-xs-center text-sm-left">
															<div class="entry-logo">
																<a class="img-fluid" href="dishes.php?res_id='.$rows['rs_id'].'" > <img src="admin/Res_img/'.$rows['image'].'" alt="Food logo"></a>
															</div>
															
															<div class="entry-dscr">
																<h5><a href="dishes.php?res_id='.$rows['rs_id'].'" >'.$rows['title'].'</a></h5> <span>'.$rows['address'].'</span>
																
															</div>
															
														</div>
														
														 <div class="col-sm-12 col-md-12 col-lg-4 text-xs-center">
																<div class="right-content bg-white">
																	<div class="right-review">
																		
																		<a href="dishes.php?res_id='.$rows['rs_id'].'" class="btn theme-btn-dash">View Menu</a> </div>
																</div>
																
															</div>';
										  }
						
						
						?>
                    </div>
                </div>
            </div>
       </div>
    </div>
  </div>
</section>
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


    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/animsition.min.js"></script>
    <script src="js/bootstrap-slider.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/headroom.js"></script>
    <script src="js/foodpicky.min.js"></script>
</body>
</html>