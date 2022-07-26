<?php
defined( 'ABSPATH' ) || exit;
?>
<div class="wpr-optionHeader">
	<h3 class="wpr-title2"><?php echo esc_html( $data['title'] ); ?></h3>
	<?php if ( ! empty( $data['help'] ) ) : ?>
	<button data-beacon-id="<?php echo esc_attr( $data['help'] ); ?>" class="wpr-infoAction wpr-infoAction--help wpr-icon-help"><?php esc_html_e( 'Need Help?', 'rocket' ); ?></button>
	<?php endif; ?>
</div>

<div class="wpr-fieldsContainer">
	<div class="wpr-fieldsContainer-description">
		<?php echo esc_html( $data['description'] ); ?>
	</div>
	<?php $this->render_settings_fields( $data['page'], $data['id'] ); ?>
</div>
