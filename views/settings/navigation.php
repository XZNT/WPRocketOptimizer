<?php
defined( 'ABSPATH' ) || exit;
?>
<?php
if ( rocket_valid_key() ) {
	foreach ( $data as $section ) { // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
		?>
	<a href="#<?php echo esc_attr( $section['id'] ); ?>" id="wpr-nav-<?php echo esc_attr( $section['id'] ); ?>" class="wpr-menuItem <?php echo esc_attr( $section['class'] ); ?>">
		<div class="wpr-menuItem-title"><?php echo esc_html( $section['title'] ); ?></div>
		<div class="wpr-menuItem-description"><?php echo esc_html( $section['menu_description'] ); ?></div>
	</a>
		<?php
	}
}
