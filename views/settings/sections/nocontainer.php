<?php
defined( 'ABSPATH' ) || exit;
?>
<?php echo esc_html( $data['title'] ); ?>
<?php
$this->render_settings_fields( $data['page'], $data['id'] );
