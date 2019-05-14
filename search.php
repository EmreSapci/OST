<?php
session_start();
 

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    $login = 1;
	$username = $_SESSION["username"];  
} 
else{
	$login = 0;
}

// Include config file
require_once "DB.php";

$searchStr = $_POST['search'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>OTS - Home Page</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Conference project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="styles/events.css">
<link rel="stylesheet" type="text/css" href="styles/events_responsive.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />

	<style>
      #attraction-panel {
        display:none;
      }
    </style>
	
</head>
<body>

<div id="searchStr" style="display: none;"> <?php echo $searchStr; ?> </div>

<div class="super_container">

	<!-- Menu -->

	<div class="menu trans_500">
		<div class="menu_content d-flex flex-column align-items-center justify-content-center text-center">
			<div class="menu_close_container"><div class="menu_close"></div></div>
			<div class="logo menu_logo">
				<a href="#">
					<div class="logo_container d-flex flex-row align-items-start justify-content-start">
						<div class="logo_image"><div><img src="images/logo.png" alt=""></div></div>
						<div class="logo_content">
							<div class="logo_text logo_text_not_ie">Online Ticket Seller</div>
							<div class="logo_sub">Everything About Ticket</div>
						</div>
					</div>
				</a>
			</div>
			<ul>
				<li class="menu_item"><a href="index.php">Home</a></li>
				<!--<li class="menu_item"><a href="#">About us</a></li>
				<li class="menu_item"><a href="#">Speakers</a></li>
				<li class="menu_item"><a href="#">Tickets</a></li>
				<li class="menu_item"><a href="news.html">News</a></li>-->
				<li class="menu_item"><a href="contact.html">Contact</a></li>
			</ul>
		</div>
		<div class="menu_social">
			
			<ul>

				<?php
					if($login == 0 ) { 
						echo '<li><a href="login.php">Login<i class="fa fa-sign-in" aria-hidden="true"></i></a></li>
						  <li><a href="register.php">Register<i class="fa fa-user" aria-hidden="true"></i></a></li>';}
					else{
						echo '<a href="mypage.php">Welcome '.$username.'</a> | <a href="logout.php"> Log out <i class="fa fa-sign-out" aria-hidden="true"></i></a></li>';
						}
			   ?>
			</ul>
		</div>
	</div>
	
	<!-- Home -->

	<div class="home">
		<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="images/events.jpg" data-speed="0.8"></div>

		<!-- Header -->

		<header class="header" id="header">
			<div>
				<div class="header_top">
					<div class="container">
						<div class="row">
							<div class="col">
								<div class="header_top_content d-flex flex-row align-items-center justify-content-start">
									<div>
										<a href="#">
											<div class="logo_container d-flex flex-row align-items-start justify-content-start">
												<div class="logo_image"><div><img src="images/logo.png" alt=""></div></div>
												<div class="logo_content">
													<div id="logo_text" class="logo_text logo_text_not_ie">Online Ticket Seller</div>
													<div class="logo_sub">Everything About Ticket</div>
												</div>
											</div>
										</a>	
									</div>
									<div class="header_social ml-auto">
										<ul>
										    <?php
												if($login == 0 ) { 
													echo '<li><a href="login.php">Login<i class="fa fa-sign-in" aria-hidden="true"></i></a></li>
													      <li><a href="register.php">Register<i class="fa fa-user" aria-hidden="true"></i></a></li>';}
												else{
													echo '<a href="mypage.php">Welcome '.$username.'</a> | <a href="logout.php"> Log out <i class="fa fa-sign-out" aria-hidden="true"></i></a></li>';
												}
											?>
											
										</ul>
									</div>
									<div class="hamburger ml-auto"><i class="fa fa-bars" aria-hidden="true"></i></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="header_nav" id="header_nav_pin">
					<div class="header_nav_inner">
						<div class="header_nav_container">
							<div class="container">
								<div class="row">
									<div class="col">
										<div class="header_nav_content d-flex flex-row align-items-center justify-content-start">
											<nav class="main_nav">
												<ul>
													<li><a href="index.php">Home</a></li>
													<!--<li><a href="#">About Us</a></li>
													<li><a href="speakers.html">Speakers</a></li>
													<li><a href="#">Events</a></li>
													<li><a href="news.html">News</a></li>-->
													<li><a href="contact.html">Contact</a></li>
												</ul>
											</nav>
											<div class="header_extra ml-auto">
												<div class="header_search"><i class="fa fa-search" aria-hidden="true"></i></div>
												<!--<div class="button header_button"><a href="#">Buy Tickets Now!</a></div>-->
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="search_container">
							<div class="container">
								<div class="row">
									<div class="col">
										<div class="search_content d-flex flex-row align-items-center justify-content-end">
											<form action="search.php" id="search_container_form" class="search_container_form" method="post">
												<input type="text" class="search_container_input" placeholder="Search" required="required">
												<button class="search_container_button"><i class="fa fa-search" aria-hidden="true"></i></button>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>	
			</div>
		</header>

		<div class="home_content_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="home_content d-flex flex-row align-items-end justify-content-start">
							<div class="current_page">Search Results</div>
							<div class="breadcrumbs ml-auto">
								<ul>
									<li><a href="index.php">Home</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Events -->

	<div class="events" style="padding-top:30px;">
		<div class="container">
		<div class="row">
        <div class="col-xs-12">
        <div id='events-panel' class="panel panel-primary">
          <div class="panel-heading" style="background-image: linear-gradient(to right, #4867c0, #329fec);">
            <h2>Upcoming Events</h2> <h6>Click the event to see details and buy ticket</h6>
          </div>
		  <div class="loading" align="center" style="margin-top:50px; margin-bottom:50px;">
			 <img src="images/285.gif" />
			 </br><h4>Retrieving Data</h4>
		  </div>
          <div class="panel-body" style="display: none;">
            <div id="events" class="list-group">
              <a href="#" class="list-group-item">
                <h4 class="list-group-item-heading"></h4>
                <p class="list-group-item-text"></p>
                <p class="venue"></p>
              </a>
              <a href="#" class="list-group-item">
                <h4 class="list-group-item-heading"></h4>
                <p class="list-group-item-text"></p>
                <p class="venue"></p>
              </a>
              <a href="#" class="list-group-item">
                <h4 class="list-group-item-heading"></h4>
                <p class="list-group-item-text"></p>
                <p class="venue"></p>
              </a>
              <a href="#" class="list-group-item">
                <h4 class="list-group-item-heading"></h4>
                <p class="list-group-item-text"></p>
                <p class="venue"></p>
              </a>
			  <a href="#" class="list-group-item">
                <h4 class="list-group-item-heading"></h4>
                <p class="list-group-item-text"></p>
                <p class="venue"></p>
              </a>
            </div>
          </div>
          <div class="panel-footer">
            <nav>
              <ul class="pager">
                <li id="prev" class="previous"><a href="#"><span aria-hidden="true">&larr;</span></a></li>
                <li id="next" class="next"><a href="#"><span aria-hidden="true">&rarr;</span></a></li>
              </ul>
            </nav>
          </div>
        </div>
        
        <div id='attraction-panel' class="panel panel-primary">
          <div class="panel-heading" style="background-image: linear-gradient(to right, #4867c0, #329fec);">
            <div class="panel-title"><h3>Attraction Details</h3></div>
          </div>
          <div id="attraction" class="panel-body">
            <h4 class="list-group-item-heading">Attraction title</h4>
            <img class="col-xs-12" src="">
            <p id="classification"></p>
			<?php
			if($login == 0 ) { 
				echo '<p>To purchase ticket get login please.<a href="login.php">Click</a> the here to login, <a href="register.php">click</a> the here to register.</p>';
			}
			else{
				echo '<p> <div class="button" id="buyButton"><a href="#ex1" rel="modal:open"> Buy This Ticket </a></div>  </p>';
			}
			?>
			
			<p> <button id="back-all-list"> &larr; Back To List </button>
          </div>
        </div>
        </div>
      </div>
		
		
		</div>
	</div>
	
	<div id="ex1" class="modal">
	<p><h4> Purchase Completed Successfully, You will redirected main page soon. <h4></p>
	<a href="#" rel="modal:close">Close</a>
	</div>


	<!-- Call to action -->

	

	<!-- Footer -->

	<footer class="footer">
		<div class="footer_content">
			<div class="container">
				<div class="row">
					
					<!-- Footer Column -->
					<div class="col-lg-4 footer_col">
						<div class="footer_about">
							<div>
								<a href="#">
									<div class="logo_container d-flex flex-row align-items-start justify-content-start">
										<div class="logo_image"><div><img src="images/logo.png" alt=""></div></div>
										<div class="logo_content">
											<div id="logo_text" class="logo_text logo_text_not_ie">Online Ticket Seller</div>
											<div class="logo_sub">Everything About Ticket</div>
										</div>
									</div>
								</a>	
							</div>
							<div class="footer_about_text">
								<p>Number one site of world for ticket.</p>
							</div>
						</div>
					</div>

					<!-- Footer Column -->
					<div class="col-lg-3 footer_col">
						<div class="footer_links">
							<ul>
								<li><a href="#">About Us</a></li>
								<li><a href="#">Services</a></li>
								<li><a href="#">Speakers</a></li>
								<li><a href="#">Event Dates</a></li>
								<li><a href="#">Information</a></li>
								<li><a href="#">Calendar</a></li>
							</ul>
						</div>
					</div>

					<!-- Footer Column -->
					<div class="col-lg-3 footer_col">
						<div class="footer_links">
							<ul>
								<li><a href="#">Logistics</a></li>
								<li><a href="#">Our Partners</a></li>
								<li><a href="#">Testimonials</a></li>
								<li><a href="#">Price Plans</a></li>
								<li><a href="#">News</a></li>
								<li><a href="#">Contact</a></li>
							</ul>
						</div>
					</div>

					<!-- Footer Column -->
					<div class="col-lg-2 footer_col">
						<div class="footer_links">
							<ul>
								<li><a href="#">About Us</a></li>
								<li><a href="#">Services</a></li>
								<li><a href="#">Speakers</a></li>
								<li><a href="#">Event Dates</a></li>
								<li><a href="#">Information</a></li>
								<li><a href="#">Calendar</a></li>
							</ul>
						</div>
					</div>

				</div>
			</div>
		</div>
		<div class="footer_extra">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="footer_extra_content d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-start justify-content-center">
							<div class="footer_social">
								<div class="footer_social_title">Follow us on Social Media</div>
								<ul class="footer_social_list">
									<li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
								</ul>
							</div>
							<div class="footer_extra_right ml-lg-auto text-lg-right">
								<div class="footer_extra_links">
									<ul>
										<li><a href="contact.html">Contact us</a></li>
										<li><a href="#">Sitemap</a></li>
										<li><a href="#">Privacy</a></li>
									</ul>
								</div>
								<div class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved.
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
		
</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="js/events.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>



	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script src="js/scriptSearch.js"></script>

	
</body>
</html>