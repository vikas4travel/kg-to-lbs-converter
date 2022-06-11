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
			<p>
				<b><?php echo __( 'Use the following shortcode', 'kg-to-lbs-converter' ); ?></b>
			</p>

			<input type="text" class="klc-shortcode-input" value="[kg-to-lbs-converter template=1]" id="klc-shortcode1">
			<button class="button" onclick="klc_copy_shortcode( 'klc-shortcode1' )">Copy Shortcode</button>
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
			<li>Edit the Post or Page where you want to add the age calculator widget.</li>
			<li>Paste the shortcode at your preferred location inside the text editor.</li>
			<li>Click "Update" to save your changes.</li>
		</ul>
	</div>
</div>



