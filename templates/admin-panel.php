<?php
$widget_options = get_option( 'klc_widget_options' );

$layout     = isset( $widget_options['layout'] ) ? intval( $widget_options['layout'] ) : 1;
$show_h     = isset( $widget_options['show_h'] ) ? intval( $widget_options['show_h'] ) : 1;
$show_f     = isset( $widget_options['show_f'] ) ? intval( $widget_options['show_f'] ) : 1;
$show_b     = isset( $widget_options['show_b'] ) ? intval( $widget_options['show_b'] ) : 1;
$title      = isset( $widget_options['title'] ) ? $widget_options['title'] : 'KG to LBS Converter';
$bgcolor    = isset( $widget_options['bgcolor'] ) ? $widget_options['bgcolor'] : '#ffffff';
$hf_bgcolor = isset( $widget_options['hf_bgcolor'] ) ? $widget_options['hf_bgcolor'] : '#f0f0f0';
?>

<div class="wrap klc-wrap">
	<h2><?php echo __( self::$plugin_name, 'kg-to-lbs-converter' ); ?></h2>

	<div id="klc-message"></div>

	<h2 class="nav-tab-wrapper klc-tabs">
		<a class="nav-tab <?php echo ( 1 === $active_tab ) ? 'nav-tab-active' : ''; ?>" href="<?php echo admin_url( 'options-general.php?page=' . self::$plugin_slug ); ?>"><?php echo __( 'Settings', 'kg-to-lbs-converter' ); ?></a>
		<a class="nav-tab <?php echo ( 2 === $active_tab ) ? 'nav-tab-active' : ''; ?>" href="<?php echo admin_url( 'options-general.php?page=' . self::$plugin_slug ); ?>"><?php echo __( 'About', 'kg-to-lbs-converter' ); ?></a>
	</h2>

	<input type="hidden" name="klc_current_tab" id="klc_current_tab" value="1">

	<section class="klc-section">
		<div class="klc-settings">

			<form action="<?php echo esc_url( admin_url( '/options-general.php?page=kg-to-lbs-converter' ) ) ?>" method="post">

				<input type="hidden" name="<?php echo esc_attr( self::$plugin_slug . '-nonce' ); ?>" value="<?php echo esc_attr( wp_create_nonce( self::$plugin_slug ) ); ?>" />

				<p>
					<b>Use the following shortcode</b>
				</p>

				<input type="text" class="klc-shortcode-input" value="[kg-to-lbs-converter]" id="klc-shortcode1">
				<button class="button" onclick="klc_copy_shortcode( 'klc-shortcode1' )">Copy Shortcode</button>

				<div class="klc-spacer-10"></div>

				<div class="klc-settings-section">
					<div class="klc-settings-left"><b>Layout</b></div>

					<div class="klc-settings-right">
						<input type="radio" name="klc_layout" value="1" id="klc_layout1" <?php echo checked( $layout, 1 ); ?>>
						<label for="klc_layout1">Vertical</label>

						<input type="radio" name="klc_layout" value="2" id="klc_layout2" <?php echo checked( $layout, 2 ); ?>>
						<label for="klc_layout2">Horizontal</label>

					</div>
				</div>

				<div class="klc-settings-section">
					<div class="klc-settings-left"><b>Show Header</b></div>

					<div class="klc-settings-right">
						<input type="radio" name="klc_show_h" value="1" id="klc_show_h1" <?php echo checked( $show_h, 1 ); ?>>
						<label for="klc_show_h1">Show</label>

						<input type="radio" name="klc_show_h" value="2" id="klc_show_h2" <?php echo checked( $show_h, 2 ); ?>>
						<label for="klc_show_h2">Hide</label>
					</div>

				</div>

				<div class="klc-settings-section">
					<div class="klc-settings-left"><b>Show Footer</b></div>

					<div class="klc-settings-right">
						<input type="radio" name="klc_show_f" value="1" id="klc_show_f1" <?php echo checked( $show_f, 1 ); ?>>
						<label for="klc_show_f1">Show</label>

						<input type="radio" name="klc_show_f" value="2" id="klc_show_f2" <?php echo checked( $show_f, 2 ); ?>>
						<label for="klc_show_f2">Hide</label>
					</div>

				</div>

				<div class="klc-settings-section">
					<div class="klc-settings-left"><b>Show Borders</b></div>

					<div class="klc-settings-right">
						<input type="radio" name="klc_show_b" value="1" id="klc_show_b1" <?php echo checked( $show_b, 1 ); ?>>
						<label for="klc_show_b1">Show</label>

						<input type="radio" name="klc_show_b" value="2" id="klc_show_b2" <?php echo checked( $show_b, 2 ); ?>>
						<label for="klc_show_b2">Hide</label>
					</div>

				</div>


				<div class="klc-settings-section">
					<div class="klc-settings-left"><b>Title</b></div>

					<div class="klc-settings-right">
						<input type="text" name="klc_title" id="klc_title" value="<?php echo esc_attr( $title ); ?>">
					</div>
				</div>

				<div class="klc-settings-section">
					<div class="klc-settings-left"><b>Background Color</b></div>

					<div class="klc-settings-right">
						<input class="widefat" type="text" name="klc_bgcolor" id="klc_bgcolor" value="<?php echo esc_attr( $bgcolor ); ?>" data-default-color="#ffffff" />
					</div>
				</div>

				<div class="klc-settings-section">
					<div class="klc-settings-left"><b>Header/Footer<br/> Background Color</b></div>

					<div class="klc-settings-right">
						<input class="widefat" type="text" name="klc_hf_bgcolor" id="klc_hf_bgcolor" value="<?php echo esc_attr( $hf_bgcolor ); ?>" data-default-color="#f0f0f0" />
					</div>
				</div>

				<div class="klc-spacer-10"></div>

				<input type="submit" value="Reset to Default" class="button" id="klc-reset-button" name="klc-reset-button">
				<input type="submit" value="Save Settings" class="button">
			</form>
		</div>
	</section>

	<section class="klc-section">
		<div class="klc-about">

			<p><b><?php echo __( 'KG to LBS Converter', 'kg-to-lbs-converter' ); ?></b></p>

			<p><?php echo __( 'Version: 1.0.1', 'kg-to-lbs-converter' ); ?></p>

			<p><a href="https://websolutionideas.com/" target="_blank"><?php echo __( 'Author\'s Website', 'kg-to-lbs-converter' ); ?></a></p>

			<p><?php echo __( 'If you have any feedback please tell us. We love to improve our service.', 'kg-to-lbs-converter' ); ?></p>

			<p><a href="http://websolutionideas.com/provide-feedback/" target="_blank"><?php echo __( 'Provide Feedback', 'kg-to-lbs-converter' ); ?></a></p>
		</div>

	</section>

	<div id="klc-preview">
		<h4 class="heading">Preview</h4>

		<?php
		require __DIR__ . '/kg-to-lbs-converter-template.php';
		?>
	</div>

	<div id="klc-instructions">
		<h4 class="heading">Instructions</h4>
		<ul>
			<li>In the navigation menu, click "Posts" or "Pages".</li>
			<li>Edit the Post or Page where you want to add the converter.</li>
			<li>Paste the shortcode at your preferred location inside the text editor.</li>
			<li>Click "Update" to save your changes.</li>
		</ul>
	</div>
</div>



