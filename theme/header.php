<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>My Custom Theme</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">

	<link href="<?php echo get_template_directory_uri() ?>/assets/css/custom-style.css" rel="stylesheet">


</head>
<body>
<div class="container-fluid"  style="background-color: #146893;">
	<header>	
		<nav class="navbar  navbar-expand-lg navbar-dark  scrolling-navbar">
	    <a class="navbar-brand" href="<?php echo home_url();  ?>"><strong>Theme Logo</strong></a>
	    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
	      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	      <span class="navbar-toggler-icon"></span>
	    </button>
	    <div class="collapse navbar-collapse custom-nav" id="navbarSupportedContent">
	      <!---
	      <ul class="navbar-nav mr-auto">
	        <li class="nav-item active">
	          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link" href="#">Features</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link" href="#">Pricing</a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link" href="#">Opinions</a>
	        </li>
	      </ul>
			--->

		
<?php
    wp_nav_menu(
        array(
            'theme_location' => 'primary-menu', // Replace 'primary-menu' with your registered menu location
            'container' => false, // Remove the container div
            'menu_class' => 'navbar-nav mr-auto ',
            'menu_item_class' => 'nav-item',
            'link_class' => 'nav-link',
            'fallback_cb' => false,
           // 'walker' => new Custom_Nav_Walker(), // Add this line with the custom walker class
        )
    );
?>


	      <ul class="navbar-nav nav-flex-icons">
	        <li class="nav-item">
	          <a class="nav-link"><i class="fab fa-facebook-f"></i></a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link"><i class="fab fa-twitter"></i></a>
	        </li>
	        <li class="nav-item">
	          <a class="nav-link"><i class="fab fa-instagram"></i></a>
	        </li>
	      </ul>
	    </div>

</header>
<!--Main Navigation-->
</div>
