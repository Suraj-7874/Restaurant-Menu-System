<!DOCTYPE html>
<html lang="en">
<?php
	include("connection/connect.php");
	error_reporting(0);
	session_start();

	if(empty($_SESSION['user_id']))  
	{
		header('location:login2.php');
	}
	else
	{
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title>Your Orders</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
<style type="text/css" rel="stylesheet">
.indent-small {
  margin-left: 5px;
}
.form-group.internal {
  margin-bottom: 0;
}
.dialog-panel {
  margin: 10px;
}
.datepicker-dropdown {
  z-index: 200 !important;
}
.panel-body {
  background: #e5e5e5;
  
  background: -moz-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
  
  background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%, #e5e5e5), color-stop(100%, #ffffff));
  
  background: -webkit-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
  
  background: -o-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
 
  background: -ms-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
  
  background: radial-gradient(ellipse at center, #e5e5e5 0%, #ffffff 100%);
  
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#e5e5e5', endColorstr='#ffffff', GradientType=1);
  font: 600 15px "Open Sans", Arial, sans-serif;
}
label.control-label {
  font-weight: 600;
  color: #777;
}
table { 
	width: 750px; 
	border-collapse: collapse; 
	margin: auto;
	
	}
tr:nth-of-type(odd) { 
	background: #eee; 
	}

th { 
	background: #ff3300; 
	color: white; 
	font-weight: bold; 
	
	}

td, th { 
	padding: 10px; 
	border: 1px solid #ccc; 
	text-align: left; 
	font-size: 14px;
	
	}
@media 
only screen and (max-width: 760px),
(min-device-width: 768px) and (max-device-width: 1024px)  {

	table { 
	  	width: 100%; 
	}

	
	table, thead, tbody, th, td, tr { 
		display: block; 
	}
	
	
	thead tr { 
		position: absolute;
		top: -9999px;
		left: -9999px;
	}
	
	tr { border: 1px solid #ccc; }
	
	td { 
		
		border: none;
		border-bottom: 1px solid #eee; 
		position: relative;
		padding-left: 50%; 
	}

	td:before { 
		
		position: absolute;
	
		top: 6px;
		left: 6px;
		width: 45%; 
		padding-right: 10px; 
		white-space: nowrap;
		
		content: attr(data-column);

		color: #000;
		font-weight: bold;
	}

}
</style>
</head>
<body>
    <header id="header" class="header-scroll top-header headrom">
  		<nav class="navbar navbar-dark">
                <div class="container">
                    <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
                    <a class="navbar-brand" href="index.php"><img class="img-rounded" src="images/head_img.jpg" alt="" height="39" width="200" > </a>
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
       
           
    
            <div class="inner-page-hero bg-image" data-image-src="images/img/res.jpeg" >
                <div class="container"> </div>
        
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
                        <div class="col-xs-12 col-sm-7 col-md-7 ">
                            <div class="bg-gray restaurant-entry">
                                <div class="row">
								
							<table >
						  <thead>
							<tr>
							
							  <th>Item</th>
							  <th>Quantity</th>
							  <th>Price</th>
							   <th>Status</th>
							     <th>Date</th>
								   <th>Action</th>
							  
							</tr>
						  </thead>
						  <tbody>
						  
						  
							<?php 
				
						$query_res= mysqli_query($db,"select * from users_orders where u_id='".$_SESSION['user_id']."'");
												if(!mysqli_num_rows($query_res) > 0 )
														{
															echo '<td colspan="6"><center>You have No orders Placed yet. </center></td>';
														}
													else
														{			      
										  
										  while($row=mysqli_fetch_array($query_res))
										  {
						
							?>
												<tr>	
														 <td data-column="Item"> <?php echo $row['title']; ?></td>
														  <td data-column="Quantity"> <?php echo $row['quantity']; ?></td>
														  <td data-column="price">₹<?php echo $row['price']; ?></td>
														   <td data-column="status"> 
														   <?php 
																			$status=$row['status'];
																			if($status=="" or $status=="NULL")
																			{
																			?>
																			<button type="button" class="btn btn-info" style="font-weight:bold;"><span class="fa fa-bars"  aria-hidden="true" > Dispatch</button>
																		   <?php 
																			  }
																			   if($status=="in process")
																			 { ?>
																				<button type="button" class="btn btn-warning"><span class="fa fa-cog fa-spin"  aria-hidden="true" ></span> On The Way!</button>
																			<?php
																				}
																			if($status=="closed")
																				{
																			?>
																			 <button type="button" class="btn btn-success" ><span  class="fa fa-check-circle" aria-hidden="true"> Delivered</button> 
																			<?php 
																			} 
																			?>
																			<?php
																			if($status=="rejected")
																				{
																			?>
																			 <button type="button" class="btn btn-danger"> <i class="fa fa-close"></i> Cancelled</button>
																			<?php 
																			} 
																			?>
														</td>
														  <td data-column="Date"> <?php echo $row['date']; ?></td>
														   <td data-column="Action"> <a href="delete_orders.php?order_del=<?php echo $row['o_id'];?>" onclick="return confirm('Are you sure you want to cancel your order?');" class="btn btn-danger btn-flat btn-addon btn-xs m-b-10"><i class="fa fa-trash-o" style="font-size:16px"></i></a> 
															</td>
														</tr>
												<?php }} ?>					
							</tbody>
					</table>
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