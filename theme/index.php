<?php get_header();	?>


<!... Top Hero Section Starts Here>
<div class="container-fluid hero" >
	<div class="row">
		<h1>Welcome to my cystom wordpress theme</h1>
		<p>A fully responsive, clean, SEO, and user friendly wordpress theme that is good fit for any kind of your business websites. So, What you're waiting for, Lets get started. A fully responsive, clean, SEO, and user friendly wordpress theme that is good fit for any kind of your business websites. So, What you're waiting for, Lets get started.</p>
	</div>
</div>

<!.. About Section Starts Here>
<div class="container">
	<div class="row intro">
		<div class="col-6">
			<h2>Heading 2 Goes Here</h2>
			<p>A fully responsive, clean, SEO, and user friendly wordpress theme that is good fit for any kind of your business websites. So, What you're waiting for, Lets get started. A fully responsive, clean, SEO, and user friendly wordpress theme that is good fit for any kind of your business websites. So, What you're waiting for, Lets get started.</p>
		</div>
		<div class="col-6">
			<img width="100%" src="<?php echo get_template_directory_uri() ?>/assets/images/ar-img.jpg">
	</div>
	</div>
</div>

<!... Features Section Starts Here >
<div class="container-fluid features-section">
	<div class="row features">
		<div class="col-4">
			<i class="fab fa-instagram">	</i>
			<h3>Icon Box Title</h3>
			<p>Icon box description goes here</p>
		</div>
		<div class="col-4">
			<i class="fab fa-instagram">	</i>
			<h3>Icon Box Title</h3>
			<p>Icon box description goes here</p>
		</div>
		<div class="col-4">
			<i class="fab fa-instagram">	</i>
			<h3>Icon Box Title</h3>
			<p>Icon box description goes here</p>
		</div>
	</div>
</div>	

<div class="container blogs-section">
	<div class="row blogs">
		<?php
		 if(have_posts()):	
		 	while (have_posts()):the_post(); 
		 	?>
		<div class="col-3">
			<div class="post-thumbnail">
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail();	?></a>
			</div>
			<div class="post-content">
				<h4><?php the_title(); ?></h4>
				<p><?php the_content(); ?></p>
				<a href="<?php the_permalink(); ?>">Read More</a>
			</div>
		</div>
	<?php endwhile;
		else:
	 ?>
	 <p>No posts found</p>
	<?php endif; ?>

		
	</div>
</div>																			
<?php get_footer()  ?>



