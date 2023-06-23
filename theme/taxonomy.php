<!---
template name: projects template
	-->

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
$term = get_queried_object(); // Get the current taxonomy term

$args = array(
	'post_type'      => 'project', // Specify the custom post type name
	'posts_per_page' => 5, // Display 5 posts per page
	'paged'          => get_query_var('paged') ? get_query_var('paged') : 1, // Use the current page number
	'tax_query'      => array(
		array(
			'taxonomy' => 'project_type', // Replace 'project_type' with your taxonomy slug
			'field'    => 'slug',
			'terms'    => $term->slug, // Filter by the current taxonomy term
		),
	),
);
$custom_query = new WP_Query($args);

if ($custom_query->have_posts()):
	while ($custom_query->have_posts()): $custom_query->the_post();
	?>
		<div class="col-3">
			<div class="post-thumbnail">
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
			</div>
			<div class="post-content">
				<h4><?php the_title(); ?></h4>
				<p><?php the_content(); ?></p>
				<a href="<?php the_permalink(); ?>">Read More</a>
			</div>
		</div>
	<?php
	endwhile;
	?>


	</div>

<div class="row pagination">
	<!-- Pagination -->
		<?php
		echo paginate_links(array(
			'total' => $custom_query->max_num_pages, // Total number of pages
		));
		?>
	</div>

<?php
else:
?>
	<p>No posts found</p>
<?php
endif;

wp_reset_postdata(); // Restore original post data
?>



</div>																			
<?php get_footer()  ?>



