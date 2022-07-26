<?php
defined( 'ABSPATH' ) || exit;
?>
<div class="wpr-optionHeader <?php echo esc_attr( $data['class'] ); ?>">
	<h3 class="wpr-title2"><?php echo esc_html( $data['title'] ); ?></h3>
	<?php if ( ! empty( $data['help'] ) ) : ?>
	<a href="<?php echo esc_url( $data['help']['url'] ); ?>" data-beacon-id="<?php echo esc_attr( $data['help']['id'] ); ?>" class="wpr-infoAction wpr-infoAction--help wpr-icon-help" target="_blank"><?php esc_html_e( 'Need Help?', 'rocket' ); ?></a>
	<?php endif; ?>
</div>

<div class="wpr-fieldsContainer <?php echo esc_attr( $data['class'] ); ?>">
	<div class="wpr-fieldsContainer-description">
		<?php echo $data['description']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Dynamic content is properly escaped in the view. ?>
	</div>

	<fieldset class="wpr-fieldsContainer-fieldset">
		<?php $this->render_settings_fields( $data['page'], $data['id'] ); ?>
	</fieldset>

	<?php if ( ! empty( $data['helper'] ) ) : ?>
		<div class="wpr-fieldsContainer-helper wpr-icon-important">
			<?php echo $data['helper']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Dynamic content is properly escaped in the view. ?>
		</div>
	<?php endif; ?>
</div>
