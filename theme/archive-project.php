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


<div class="container">
	<div class="row taxonomies">
		
			<h1>Project Type</h1>
		
		
		<?php
$taxonomy = 'project_type';
$terms = get_terms($taxonomy);

if ($terms && !is_wp_error($terms)) {
    foreach ($terms as $term) {
        echo '<a href="' . get_term_link($term) . '">' . $term->name . '</a><br>';
    }
}
?>


	</div>
</div>


<div class="container blogs-section">
	<div class="row blogs">
		<?php
$args = array(
	'post_type' => 'project', // Specify the custom post type name
	'posts_per_page' => 5, // Display 3 posts per page
	'paged' => get_query_var('paged') ? get_query_var('paged') : 1, // Use the current page number
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

<!-- Coffee Function -->

<?php
//Coffee Api Integration//

function hs_give_me_coffee() {
    // Make a request to the Random Coffee API
    $response = wp_remote_get('https://coffee.alexflipnote.dev/random');

    // Check if the request was successful
    if (is_wp_error($response)) {
        return 'Oops! Unable to fetch coffee. Please try again later.';
    }

    // Retrieve the response body
    $body = wp_remote_retrieve_body($response);

    // Decode the JSON response
    $data = json_decode($body);

    // Extract the direct link to the coffee
    $coffeeLink = isset($data->coffee_link) ? $data->coffee_link : '';
}


$coffeeLink = hs_give_me_coffee();
echo '<a href="' . esc_url($coffeeLink) . '"><img src="https://coffee.alexflipnote.dev/random" alt="Coffee"></a>';



?>


</div>																			
<?php get_footer()  ?>



