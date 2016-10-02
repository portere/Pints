<?php
/**
 * File used for homepage two column
 *
 * @package WordPress
 */

 $twocol = bswp_option('two_column_page'); 
	$args = array(
		'page_id' => $twocol
	);
?>

<?php if ($twocol != '') { ?>
<div class="container ptb">
	<div class="row">
		<?php
		 // query for the about page
	    $your_query = new WP_Query($args);
	    // "loop" through query (even though it's just one page) 
	    while ( $your_query->have_posts() ) : $your_query->the_post(); ?>

		<div class="col-md-6">
			<?php the_content(); ?>
		</div>
		<div class="col-md-6">
			<?php if ( has_post_thumbnail() ) : ?>
				<?php the_post_thumbnail(); ?>
			<?php endif; ?>
		</div>
		<?php endwhile; // end of the loop. ?>
		<?php wp_reset_postdata(); ?>
	</div><!--/row-->
</div><!--/container-->
<?php } ?>