<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package bootstrapwp
 */
?>

    <div id="f">
      <div class="container">
        <div class="row centered">
          <?php echo bswp_option('footer_html_editor') ?>

          <?php if( bswp_option('footer_social') == '1') { ?>     
            <p class="mt">
                <?php $social_options = bswp_option( 'social_icons' ); ?>
                    <?php foreach ( $social_options as $key => $value ) {
                        if ( $value ) { ?>
                            <a href="<?php echo $value; ?>" title="<?php echo $key; ?>" target="_blank">
                                <i class="ion-social-<?php echo $key; ?>"></i>
                            </a>
                        <?php }
                    } ?>
                </p><!-- social-icons -->
            <?php } ?>

          <?php echo bswp_option('footer_html_editor_bottom') ?>
        </div><!--/row-->
      </div><!--/container-->
    </div><!--/F-->

<?php wp_footer(); ?>

</body>
</html>
