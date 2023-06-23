<?php get_header();	?>


<!... Top Hero Section Starts Here>
<div class="container-fluid single-hero" >
	<div class="row">
		<h1><?php echo the_title(); ?></h1>
		<p><?php the_date();?></p>
	</div>
</div>

<!.. About Section Starts Here>
<div class="container">
	<div class="row intro">
		<div class="col-9">
			<?php the_content(); ?>

			
		</div>
		<div class="col-3">
			<?php get_sidebar(); ?>
	</div>
	</div>
</div>
		




<?php get_footer()  ?>



