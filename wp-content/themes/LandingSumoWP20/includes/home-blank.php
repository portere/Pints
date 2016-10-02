<?php 
/**
 * File used for blank homepage 
 *
 * @package WordPress
 */


$blankcol = bswp_option('blank_page'); 
  $args = array(
    'page_id' => $blankcol
  );
?>

<?php if ($blankcol != '') { ?>
 <div class="container ptb">
    <div class="row centered">
    <?php
     // query for the about page
      $your_query = new WP_Query($args);
      // "loop" through query (even though it's just one page) 
      while ( $your_query->have_posts() ) : $your_query->the_post(); ?>
      <?php the_content(); ?>
    <?php endwhile; // end of the loop. ?>
    <?php wp_reset_postdata(); ?>
    </div><!--/row-->
  </div><!--/container-->
<?php } ?>
