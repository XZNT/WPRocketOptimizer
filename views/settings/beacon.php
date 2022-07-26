<?php
defined( 'ABSPATH' ) || exit;
?>
<script>!function(e,t,n){function a(){var e=t.getElementsByTagName("script")[0],n=t.createElement("script");n.type="text/javascript",n.async=!0,n.src="https://beacon-v2.helpscout.net",e.parentNode.insertBefore(n,e)}if(e.Beacon=n=function(t,n,a){e.Beacon.readyQueue.push({method:t,options:n,data:a})},n.readyQueue=[],"complete"===t.readyState)return a();e.attachEvent?e.attachEvent("onload",a):e.addEventListener("load",a,!1)}(window,document,window.Beacon||function(){});
window.Beacon('init', '<?php echo esc_js( $data['form_id'] ); ?>')
window.Beacon("identify", <?php echo $data['identify']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>);
window.Beacon("session-data", <?php echo $data['session']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>);
window.Beacon("prefill", <?php echo $data['prefill']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>);
window.Beacon("config", <?php echo $data['config']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>);
window.addEventListener("hashchange", function () {
	window.Beacon("suggest");
}, false);</script>
