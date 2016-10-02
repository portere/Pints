<?php
/**
 * File used for homepage logos
 *
 * @package WordPress
 */

$home_logo_query = new WP_Query(
  array(
    'post_type' => 'logo',
    'showposts' =>'-1',
    'no_found_rows' => true
       )
    );

if( $home_logo_query->posts ) : ?>
    <div id="g">
      <div class="container">
        <div class="row sponsor centered">
            <?php 
            $count=0;
            while ( $home_logo_query->have_posts() ) : $home_logo_query->the_post(); 
            $count++;
            ?>
            <div class="col-sm-2 <?php if( $count == '1' ) { echo 'col-sm-offset-1';} ?>">
                <?php 
                  $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '' ); 
                  $img_id = get_post_thumbnail_id(get_the_ID());
                  $alt = get_post_meta($img_id, '_wp_attachment_image_alt', true) ;
                  if ($image) : ?>
                      <img src="<?php echo $image[0]; ?>" alt="<?php echo $alt; ?>" />
                  <?php endif; ?>
            </div>
            <?php if( $count == '5' ) { $count=0; } ?>
            <?php endwhile; ?>
        </div><!--/row-->
      </div>
    </div><!--/g-->
<?php endif; wp_reset_postdata(); ?>