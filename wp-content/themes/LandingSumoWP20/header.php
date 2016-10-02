<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package bootstrapwp
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="header">

	<?php if( bswp_option('custom_logo', false, 'url') !== '' ) { ?>
	    <div class="logo">
	        <img src="<?php echo bswp_option('custom_logo', false, 'url' ); ?>" alt="<?php bloginfo( 'name' ) ?>" />
	    </div>
	    <?php } else { ?>
	    <div class="logo"><?php bloginfo( 'name' ) ?></div>
	<?php }  ?>
  	<?php if( bswp_option('top_social') == '1') { ?>     
        <div class="social hidden-xs">
        <?php $social_options = bswp_option( 'social_icons' ); ?>
            <?php foreach ( $social_options as $key => $value ) {
                if ( $value ) { ?>
                    <a href="<?php echo $value; ?>" title="<?php echo $key; ?>" target="_blank">
                        <i class="ion-social-<?php echo $key; ?>"></i>
                    </a>
                <?php }
            } ?>
        </div><!-- social-icons -->
    <?php } ?>
  </div>