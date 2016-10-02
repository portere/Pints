<?php

$logo = new CPT(array(
    'post_type_name' => 'logo',
    'singular' => __('Logo', 'bootstrapwp'),
    'plural' => __('Logos', 'bootstrapwp'),
    'slug' => 'logo'
),
	array(
    'supports' => array('title', 'thumbnail'),
    'menu_icon' => 'dashicons-format-image'
));


$testimonial = new CPT(array(
    'post_type_name' => 'testimonial',
    'singular' => __('Testimonial', 'bootstrapwp'),
    'plural' => __('Testimonials', 'bootstrapwp'),
    'slug' => 'testimonial'
),
    array(
    'supports' => array('title', 'editor'),
    'menu_icon' => 'dashicons-groups'
));