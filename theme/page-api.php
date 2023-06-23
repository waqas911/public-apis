

<?php get_header();	
// template name: api Projects template
?>


<!... Top Hero Section Starts Here>
<div class="container-fluid single-hero" >
	<div class="row">
		<h1><?php echo the_title(); ?></h1>
	</div>
</div>





<div class="container">
	<div class="row intro">
		
			<?php
$project_count = is_user_logged_in() ? 6 : 3; // Set the project count based on user login status

$args = array(
    'project_type' => 'architecture',
    '_fields' => 'id,title,link',
    'per_page' => $project_count,
    'order' => 'desc'
);

// Make a request to the API
$response = wp_remote_get('http://localhost/theme/wp-json/wp/v2/project?' . http_build_query($args));

// Check if the request was successful
if (!is_wp_error($response)) {
    $body = wp_remote_retrieve_body($response);
    $data = json_decode($body);

    // Display the projects
    if ($data && is_array($data)) {


        foreach ($data as $project) {
            $project_title = isset($project->title) ? $project->title->rendered : '';
            $project_link = isset($project->link) ? $project->link : '';
            $project_id = isset($project->id) ? $project->id : '';
            ?>
            <div class="col-3">
            <div>
                <h3>Project Title: <?php echo esc_html($project_title); ?></h3>
                <p>Project Link: <a href="<?php echo esc_url($project_link); ?>"><?php echo esc_html($project_link); ?></a></p>
                <p>Project ID: <?php echo esc_html($project_id); ?></p>
            </div>
        </div>
            <?php
        }
    } else {
        echo 'No projects found.';
    }
} else {
    echo 'Oops! Unable to fetch projects. Please try again later.';
}
?>


	</div>
</div>






<?php get_footer()  ?>



