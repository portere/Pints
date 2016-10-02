<?php 
/**
 * File used for homepage one column
 *
 * @package WordPress
 */


$onecol = bswp_option('one_column_page'); 
	$args = array(
		'page_id' => $onecol
	);
?>

<?php if ($onecol != '') { ?>

<div id="sep">
  <div class="container">
    <div class="row centered">
		<?php
		 // query for the about page
	    $your_query = new WP_Query($args);
	    // "loop" through query (even though it's just one page) 
	    while ( $your_query->have_posts() ) : $your_query->the_post(); ?>

		<div class="col-md-8 col-md-offset-2">
			<?php the_content(); ?>
		</div>
		<?php endwhile; // end of the loop. ?>
		<?php wp_reset_postdata(); ?>
	</div>
  </div>
</div><!--/sep-->
<?php } ?>