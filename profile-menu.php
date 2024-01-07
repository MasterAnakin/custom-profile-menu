<?php

function toolbar_link_to_mypage( $wp_admin_bar ) {
	$client_user_id = get_current_user_id();
	$acf_user_id    = 'user_' . $client_user_id;

	$variable = get_field( 'valet_client', $acf_user_id );

	$page    = get_page_by_title( $variable, $output = OBJECT, $post_type = 'valet-client' );
	$page_id = $page->ID;
	$link    = get_permalink( $page->ID );

	$args = array(
		'parent' => 'user-actions',
		'id'     => 'my_page',
		'title'  => $variable,
		'href'   => $link,
		'meta'   => array(
			false,
		),
	);
	$wp_admin_bar->add_node( $args );
}
add_action( 'admin_bar_menu', 'toolbar_link_to_mypage', 999 );
