<?php
use WP_Rocket\Logger\Logger;
defined( 'ABSPATH' ) || exit;
$rocket_log_description = '';
if ( rocket_direct_filesystem()->exists( Logger::get_log_file_path() ) ) {
	$rocket_stats = Logger::get_log_file_stats();
	if ( ! is_wp_error( $rocket_stats ) ) {
		$rocket_log_description .= sprintf( esc_html__( 'Files size: %1$s. Number of entries: %2$s.', 'rocket' ), '<strong>' . esc_html( $rocket_stats['bytes'] ) . '</strong>', '<strong>' . esc_html( $rocket_stats['entries'] ) . '</strong>' );
		$rocket_log_description .= '<br/>' . sprintf( esc_html__( '%1$sDownload the file%2$s.', 'rocket' ), '<a href="' . esc_url( wp_nonce_url( admin_url( 'admin-post.php?action=rocket_download_debug_file' ), 'download_debug_file' ) ) . '">', '</a>' );
		$rocket_log_description .= ' - ' . sprintf( esc_html__( '%1$sDelete the file%2$s.', 'rocket' ), '<a href="' . esc_url( wp_nonce_url( admin_url( 'admin-post.php?action=rocket_delete_debug_file' ), 'delete_debug_file' ) ) . '">', '</a>' );
	}
}
?>

<div id="tools" class="wpr-Page">
	<div class="wpr-sectionHeader">
		<h2 class="wpr-title1 wpr-icon-tools"><?php esc_html_e( 'Tools', 'rocket' ); ?></h2>
	</div>
	<div class="wpr-tools">
		<div class="wpr-tools-col">
			<div class="wpr-title3 wpr-tools-label wpr-icon-export"><?php esc_html_e( 'Export settings', 'rocket' ); ?></div>
			<div class="wpr-field-description"><?php esc_html_e( 'Download a backup file of your settings', 'rocket' ); ?></div>
		</div>
		<div class="wpr-tools-col">
			<?php
			$this->render_action_button(
				'link',
				'rocket_export',
				[
					'label'      => __( 'Download settings', 'rocket' ),
					'attributes' => [
						'class' => 'wpr-button wpr-button--icon wpr-button--small wpr-button--purple wpr-icon-chevron-down',
					],
				]
			);
			?>
		</div>
	</div>

	<?php $this->render_import_form(); ?>

	<div class="wpr-tools">
		<div class="wpr-tools-col">
			<div class="wpr-title3 wpr-tools-label wpr-icon-rollback"><?php esc_html_e( 'Rollback', 'rocket' ); ?></div>
			<div class="wpr-field-description">
				<?php
				// translators: %s = WP Rocket version number.
				printf( esc_html__( 'Has version %s caused an issue on your website?', 'rocket' ), esc_html( WP_ROCKET_VERSION ) );
				?>
				<br><br>
				<?php
				// translators: %s = <br>.
				printf( esc_html__( 'You can rollback to the previous major version here.%sThen send us a support request.', 'rocket' ), '<br/>' );
				?>
			</div>
		</div>
		<div class="wpr-tools-col">
			<?php
			$this->render_action_button(
				'link',
				'rocket_rollback',
				[
					// translators: %s = WP Rocket previous version.
					'label'      => sprintf( __( 'Reinstall version %s', 'rocket' ), WP_ROCKET_LASTVERSION ),
					'attributes' => [
						'class' => 'wpr-button wpr-button--icon wpr-button--small wpr-button--red wpr-icon-refresh',
					],
				]
			);
			?>
		</div>
	</div>

	<?php
	do_action( 'rocket_settings_tools_content' );
	?>
</div>
