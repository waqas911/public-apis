<?php get_header();	?>


<!... Top Hero Section Starts Here>
<div class="container-fluid single-hero" >
	<div class="row">
		<h1><?php  echo get_the_archive_title(); ?></h1>

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



