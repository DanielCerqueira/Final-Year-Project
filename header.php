<!doctype html>
<?php session_start(); 
$id_session = session_id();
?>
<html class="no-js" lang="en">

    <head>
        <!-- meta data -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <!--font-family-->
		<link href="https://fonts.googleapis.com/css?family=Manrope:200,300,700,800" rel="stylesheet">
        
        <!-- title of site -->
        <title>LiveWell</title>
	
        <!--bootstrap.min.css-->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        
        <!--style.css-->
        <link rel="stylesheet" href="css/style.css">
        
        <!--responsive.css-->
        <link rel="stylesheet" href="css/responsive.css">
        
		<?php include "admin/conection.php"; ?>

    </head>
	
	<body>
		
	
		
		<header id="home" class="welcome-hero margin-top-header">
				
			<!-- top-area Start -->
			<div class="top-area">
				<div class="header-area">
					
				    <nav class="navbar navbar-default bootsnav "  data-minus-value-desktop="70" data-minus-value-mobile="55" data-speed="1000">

				      

				        <div class="container">            
				           

				            <!-- Start Header Navigation -->
				            <div class="navbar-header col-md-4">
				                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
				                    <i class="fa fa-bars"></i>
				                </button>
				                <a class="navbar-brand" href="home">Live<span>Well</span>.</a>

				            </div>
				            <!-- End Header Navigation -->

				         	<!-- Menu starts -->
				            <div class="col-md-7">
				                <ul class="nav navbar-nav " >
				                    <li ><a href="home">Home</a></li>
				                    <li><a href="products">Products</a></li>
									<li><a href="diet">My Diet</a></li>
									<li class="scroll"><a href="joinus">Join Us</a></li>
				                    <li class="scroll"><a href="aboutus">About Us</a></li>
								
				                </ul><!--/.nav -->
				            </div><!-- Menu end -->
				        </div><!--/.container-->
				    </nav><!--/nav-->
				    <!-- End Navigation -->
				</div><!--/.header-area-->
			  

			</div><!-- /.top-area-->
			<!-- top-area End -->

		</header>
	