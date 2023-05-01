<?php

function stekjesruil_post_types() {
	register_post_type('event', array(
		'rewrite' => array(
			'slug' => 'evenementen'
		),
		'has_archive' => true,
		'public' => true,
		'show_in_rest' => true,
		'publicly_queryable' => true,
    'hierarchical' => true,
		'labels' => array(
			'name' => 'Evenementen',
			'add_new_item' => 'Add New Event',
			'edit_item' => 'Edit Event',
			'all_items' => 'All Events',
			'singular_name' => 'Event'
		),
		'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
		'menu_icon' => 'dashicons-calendar'
	));
}

add_action('init', 'stekjesruil_post_types');
