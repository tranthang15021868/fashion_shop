<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Shopper</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<!--[if ie]><meta content='IE=8' http-equiv='X-UA-Compatible'/><![endif]-->
		<!-- bootstrap -->
		<link href="{!! url('public/user/bootstrap/css/bootstrap.min.css') !!}" rel="stylesheet">      
		<link href="{!! url('public/user/bootstrap/css/bootstrap-responsive.min.css') !!}" rel="stylesheet">
		
		<link href="{!! url('public/user/themes/css/bootstrappage.css') !!}" rel="stylesheet"/>
		
		<!-- global styles -->
		<link href="{!! url('public/user/themes/css/flexslider.css') !!}" rel="stylesheet"/>
		<link href="{!! url('public/user/themes/css/main.css') !!}" rel="stylesheet"/>
		<link href="{!! url('public/user/themes/css/jquery.fancybox.css') !!}" rel="stylesheet"/>

		<!-- scripts -->
		<script src="{!! url('public/user/themes/js/jquery-1.7.2.min.js') !!}"></script>
		<script src="{!! url('public/user/bootstrap/js/bootstrap.min.js') !!}"></script>				
		<script src="{!! url('public/user/themes/js/superfish.js') !!}"></script>	
		<script src="{!! url('public/user/themes/js/jquery.scrolltotop.js') !!}"></script>
		<script src="{!! url('public/user/themes/js/jquery.fancybox.js') !!}"></script>
		<script src="{!! url('public/user/themes/js/myscript.js') !!}"></script>
		<!--[if lt IE 9]>			
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
			<script src="js/respond.min.js"></script>
		<![endif]-->
	</head>
    <body>		
		@include('user.blocks.header')
		<div id="wrapper" class="container">
			@include('user.blocks.nav')
			@include('user.blocks.slider')
			@yield('content')
			<section id="footer-bar">
				<div class="row">
					<div class="span3">
						<h4>Navigation</h4>
						<ul class="nav">
							<li><a href="{!! url('/') !!}">Homepage</a></li>  
							<li><a href="">About Us</a></li>
							<li><a href="{!! URL::route('getContact') !!}">Contac Us</a></li>
							<li><a href="./cart.html">Your Cart</a></li>
							<li><a href="./register.html">Login</a></li>							
						</ul>					
					</div>
					<div class="span4">
						<h4>My Account</h4>
						<ul class="nav">
							<li><a href="#">My Account</a></li>
							<li><a href="#">Order History</a></li>
							<li><a href="#">Wish List</a></li>
							<li><a href="#">Newsletter</a></li>
						</ul>
					</div>
					<div class="span5">
						<p class="logo"><img src="{!! url('public/user/themes/images/logo.png') !!}" class="site_logo" alt=""></p>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. the  Lorem Ipsum has been the industry's standard dummy text ever since the you.</p>
						<br/>
						<span class="social_icons">
							<a class="facebook" href="#">Facebook</a>
							<a class="twitter" href="#">Twitter</a>
							<a class="skype" href="#">Skype</a>
							<a class="vimeo" href="#">Vimeo</a>
						</span>
					</div>					
				</div>	
			</section>
			<section id="copyright">
				<span class="text-center">Copyright 2013 bootstrappage template  All right reserved.</span>
			</section>
		</div>
		<script src="{!! url('public/user/themes/js/common.js') !!}"></script>
		<script src="{!! url('public/user/themes/js/jquery.flexslider-min.js') !!}"></script>
		<script type="text/javascript">
			$(function() {
				$(document).ready(function() {
					$('.flexslider').flexslider({
						animation: "fade",
						slideshowSpeed: 4000,
						animationSpeed: 600,
						controlNav: false,
						directionNav: true,
						controlsContainer: ".flex-container" // the container that holds the flexslider
					});
				});
			});
		</script>
		<script>
			$(function () {
				$('#myTab a:first').tab('show');
				$('#myTab a').click(function (e) {
					e.preventDefault();
					$(this).tab('show');
				})
			})
			$(document).ready(function() {
				$('.thumbnail').fancybox({
					openEffect  : 'none',
					closeEffect : 'none'
				});
				
				$('#myCarousel-2').carousel({
                    interval: 2500
                });								
			});
		</script>
    </body>
</html>