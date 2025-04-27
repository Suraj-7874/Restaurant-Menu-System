<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
include_once 'product-action.php';
error_reporting(0);
session_start();


function function_alert() { 
      

    echo "<script>alert('Thankyou! Your Order Placed successfully!');</script>"; 
    echo "<script>window.location.replace('your_orders.php');</script>"; 
} 

if(empty($_SESSION["user_id"]))
{
	header('location:login2.php');
}
else{

										  
												foreach ($_SESSION["cart_item"] as $item)
												{
											
												$item_total += ($item["price"]*$item["quantity"]);
												
													if($_POST['submit'])
													{
						
													$SQL="insert into users_orders(u_id,title,quantity,price) values('".$_SESSION["user_id"]."','".$item["title"]."','".$item["quantity"]."','".$item["price"]."')";
						
														mysqli_query($db,$SQL);
														
                                                        
                                                        unset($_SESSION["cart_item"]);
                                                        unset($item["title"]);
                                                        unset($item["quantity"]);
                                                        unset($item["price"]);
														$success = "Thankyou! Your Order Placed successfully!";

                                                        function_alert();

														
														
													}
												}
?>


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title>Checkout</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet"> </head>
<body>
    
    <div class="site-wrapper">
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
        <div class="page-wrapper1">
            <div class="top-links">
                <div class="container">
                    <ul class="row links">
                      
                        <li class="col-xs-12 col-sm-4 link-item"><span>1</span><a href="restaurants.php">Choose Restaurant</a></li>
                        <li class="col-xs-12 col-sm-4 link-item "><span>2</span><a href="#">Pick Your favorite food</a></li>
                        <li class="col-xs-12 col-sm-4 link-item active" ><span>3</span><a href="checkout.php">Order and Pay</a></li>
                    </ul>
                </div>
            </div>
			
                <div class="container">
                 
					   <span style="color:green;">
								<?php echo $success; ?>
										</span>
					
                </div>
            
			
			
				  
            <div class="container m-t-30">
			<form action="" method="post">
                <div class="widget clearfix">
                    
                    <div class="widget-body">
                        <form method="post" action="#">
                            <div class="row">
                                
                                <div class="col-sm-12">
                                    <div class="cart-totals margin-b-20">
                                        <div class="cart-totals-title">
                                            <h4>Cart Summary</h4> </div>
                                        <div class="cart-totals-fields">
										
                                            <table class="table">
											<tbody>
                                          
												 
											   
                                                    <tr>
                                                        <td>Cart Subtotal</td>
                                                        <td> <?php echo "₹".$item_total; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Delivery Charges</td>
                                                        <td>Free</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-color"><strong>Total</strong></td>
                                                        <td class="text-color"><strong> <?php echo "₹".$item_total; ?></strong></td>
                                                    </tr>
                                                </tbody>
												
												
												
												
                                            </table>
                                        </div>
                                    </div>
                                    <div class="payment-option">
                                        <ul class=" list-unstyled">
                                            <li>
                                                <label class="custom-control custom-radio  m-b-20">
                                                    <input name="mod" id="radioStacked1" checked value="COD" type="radio" class="custom-control-input"> <span class="custom-control-indicator"></span> <span class="custom-control-description">Cash on Delivery</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="custom-control custom-radio  m-b-10">
                                                    <input name="mod"  type="radio" value="paypal" disabled class="custom-control-input"> <span class="custom-control-indicator"></span> <span class="custom-control-description">Paypal <img src="images/paypal.jpg" alt="" width="90"></span> </label>
                                            </li>
                                        </ul>
                                        <p class="text-xs-center"> <input type="submit" onclick="return confirm('Do you want to confirm the order?');" name="submit"  class="btn btn-outline-success btn-block" value="Order now"> </p>
                                    </div>
									</form>
                                </div>
                            </div>
                       
                    </div>
                </div>
				 </form>
            </div>
            
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


        </div>
         </div>

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

<?php
}
?>
