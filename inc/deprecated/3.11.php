<?php

/**
 * Add Yoast SEO sitemap option to WP Rocket default options
 *
 * @since 2.8
 * @since 3.11.1 deprecated
 *
 * @author Remy Perona
 *
 * @param array $options WP Rocket options array.
 * @return array Updated WP Rocket options array
 */
function rocket_add_yoast_seo_sitemap_option( $options ) {
	_deprecated_function( __FUNCTION__ . '()', '3.11.1' );

	$options['yoast_xml_sitemap'] = 0;

	return $options;
}

/**
 * Sanitize Yoast SEO sitemap option value
 *
 * @since 2.8
 * @since 3.11.1 deprecated
 *
 * @author Remy Perona
 *
 * @param array $inputs WP Rocket inputs array.
 * @return array Sanitized WP Rocket inputs array
 */
function rocket_yoast_seo_sitemap_option_sanitize( $inputs ) {
	_deprecated_function( __FUNCTION__ . '()', '3.11.1' );

	$inputs['yoast_xml_sitemap'] = ! empty( $inputs['yoast_xml_sitemap'] ) ? 1 : 0;

	return $inputs;
}

/**
 * Add Yoast SEO sitemap URL to the sitemaps to preload
 *
 * @since 2.8
 * @since 3.11.1 deprecated
 *
 * @author Remy Perona
 *
 * @param array $sitemaps Sitemaps to preload.
 * @return array Updated Sitemaps to preload
 */
function rocket_add_yoast_seo_sitemap( $sitemaps ) {
	_deprecated_function( __FUNCTION__ . '()', '3.11.1' );

	if ( get_rocket_option( 'yoast_xml_sitemap', false ) ) {
		$sitemaps[] = WPSEO_Sitemaps_Router::get_base_url( 'sitemap_index.xml' );
	}

	return $sitemaps;
}

/**
 * Add Yoast SEO option to WP Rocket settings
 *
 * @since 2.8
 * @since 3.11.1 deprecated
 *
 * @author Remy Perona
 *
 * @param array $options WP Rocket settings array.
 * @return array Updated WP Rocket settings array
 */
function rocket_sitemap_preload_yoast_seo_option( $options ) {
	_deprecated_function( __FUNCTION__ . '()', '3.11.1' );

	$options['yoast_xml_sitemap'] = [
		'type'              => 'checkbox',
		'container_class'   => [
			'wpr-field--children',
		],
		'label'             => __( 'Yoast SEO XML sitemap', 'rocket' ),
		// translators: %s = Name of the plugin.
		'description'       => sprintf( __( 'We automatically detected the sitemap generated by the %s plugin. You can check the option to preload it.', 'rocket' ), 'Yoast SEO' ),
		'parent'            => 'sitemap_preload',
		'section'           => 'preload_section',
		'page'              => 'preload',
		'default'           => 0,
		'sanitize_callback' => 'sanitize_checkbox',
	];

	return $options;
}

/**
 * Clear Kinsta cache when clearing WP Rocket cache
 *
 * @since 3.0
 * @author Remy Perona
 *
 * @return void
 */
function rocket_clean_kinsta_cache() {
	global $kinsta_cache;
	_deprecated_function( __FUNCTION__ . '()', '3.11.1' );

	if ( ! empty( $kinsta_cache->kinsta_cache_purge ) ) {
		$kinsta_cache->kinsta_cache_purge->purge_complete_caches();
	}
}

/**
 * Partially clear Kinsta cache when partially clearing WP Rocket cache
 *
 * @since 3.0
 * @author Remy Perona
 *
 * @param object $post Post object.
 * @return void
 */
function rocket_clean_kinsta_post_cache( $post ) {
	_deprecated_function( __FUNCTION__ . '()', '3.11.1' );
	global $kinsta_cache;
	$kinsta_cache->kinsta_cache_purge->initiate_purge( $post->ID, 'post' );
}


/**
 * Clears Kinsta cache for the homepage URL when using "Purge this URL" from the admin bar on the front end
 *
 * @since 3.0.4
 * @author Remy Perona
 *
 * @param string $root WP Rocket root cache path.
 * @param string $lang Current language.
 * @return void
 */
function rocket_clean_kinsta_cache_home( $root = '', $lang = '' ) {
	_deprecated_function( __FUNCTION__ . '()', '3.11.1' );
	$url = get_rocket_i18n_home_url( $lang );
	$url = trailingslashit( $url ) . 'kinsta-clear-cache/';

	wp_remote_get(
		$url,
		[
			'blocking' => false,
			'timeout'  => 0.01,
		]
	);
}

/**
 * Clears Kinsta cache for a specific URL when using "Purge this URL" from the admin bar on the front end
 *
 * @since 3.0.4
 * @author Remy Perona
 *
 * @param string $url URL to purge.
 * @return void
 */
function rocket_clean_kinsta_cache_url( $url ) {
	_deprecated_function( __FUNCTION__ . '()', '3.11.1' );
	$url = trailingslashit( $url ) . 'kinsta-clear-cache/';

	wp_remote_get(
		$url,
		[
			'blocking' => false,
			'timeout'  => 0.01,
		]
	);
}

/**
 * Remove WP Rocket functions on WP core action hooks to prevent triggering a double cache clear.
 *
 * @since 3.0
 * @author Remy Perona
 *
 * @return void
 */
function rocket_remove_partial_purge_hooks() {
	_deprecated_function( __FUNCTION__ . '()', '3.11.1' );
	// WP core action hooks rocket_clean_post() gets hooked into.
	$clean_post_hooks = [
		// Disables the refreshing of partial cache when content is edited.
		'wp_trash_post',
		'delete_post',
		'clean_post_cache',
		'wp_update_comment_count',
	];

	// Remove rocket_clean_post() from core action hooks.
	array_map(
		function( $hook ) {
			remove_action( $hook, 'rocket_clean_post' );
		},
		$clean_post_hooks
	);

	remove_filter( 'rocket_clean_files', 'rocket_clean_files_users' );
}
