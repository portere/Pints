<?php
/**
 * File used for homepage testimonials
 *
 * @package WordPress
 */


$home_testimonials_query = new WP_Query(
  array(
    'post_type' => 'testimonial',
    'showposts' =>'-1',
    'no_found_rows' => true
       )
    );

if( $home_testimonials_query->posts ) : ?>
    <div id="green">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-md-offset-3 centered">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
              <!-- Wrapper for slides -->
              <div class="carousel-inner">
                <?php while ( $home_testimonials_query->have_posts() ) : $home_testimonials_query->the_post(); ?>
                <div class="item">
                  <?php the_content(); ?>
                  <h5><tgr><?php the_title(); ?></tgr></h5>
                </div>
                <?php endwhile; ?>
              </div>
            </div><!--/Carousel-->

          </div>
        </div><!--/row-->
      </div><!--/container-->
    </div><!--/green-->
<?php endif; wp_reset_postdata(); ?>
