<?php
$random_number  = rand( 100, 99999 );
$widget_options = get_option( 'klc_widget_options' );

$layout  = isset( $widget_options['layout'] ) ? intval( $widget_options['layout'] ) : 1;
$show_h  = isset( $widget_options['show_h'] ) ? intval( $widget_options['show_h'] ) : 1;
$show_f  = isset( $widget_options['show_f'] ) ? intval( $widget_options['show_f'] ) : 1;
$show_b  = isset( $widget_options['show_b'] ) ? intval( $widget_options['show_b'] ) : 1;
$bgcolor = isset( $widget_options['bgcolor'] ) ? $widget_options['bgcolor'] : '';
$title   = isset( $widget_options['title'] ) ? $widget_options['title'] : 'KG to LBS Converter';

$borders_css    = 2 === $show_b ? "border:none" : '';
$background_css = ! empty( $bgcolor ) ? "background-color:{$bgcolor}" : '';
$widget_css     = sprintf( "style=%s;%s;", $background_css, $borders_css );

$hf_bgcolor = '';
if ( ! empty( $widget_options['hf_bgcolor'] ) ) {
	$hf_bgcolor = sprintf( "style=background-color:%s", $widget_options['hf_bgcolor'] );
}

if ( 1 === $layout ) {
	$layout_class = 'klc_layout_vertical';
	$input_width  = 200;
	$equal_class  = 'klc_equal_vertical';
} else {
	$layout_class =  'klc_layout_horizontal';
	$input_width  = 100;
	$equal_class  = 'klc_equal_horizontal';
}
?>

<p>
	<div id="klc-widget" <?php echo esc_attr( $widget_css )?>>

		<?php
		if ( 1 === $show_h ) {
			printf( '<div class="klc-heading" %s>%s</div>', $hf_bgcolor, $title );
		}
		?>

		<div class="<?php echo esc_attr( $layout_class ); ?>">
			<div class="klc-kg-container">

				<input type="text"
					   id="input1-<?php echo intval( $random_number ); ?>"
					   class="klc-input1" value="1"
					   style="width: <?php echo esc_attr( $input_width ); ?>px">

				<select id="option1-<?php echo intval( $random_number ); ?>" class="klc-option1">
					<option value="0">Tonne</option>
					<option value="1" selected="selected">Kilogram</option>
					<option value="2">Gram</option>
					<option value="3">Milligram</option>
					<option value="4">Microgram</option>
					<option value="5">Imperial ton</option>
					<option value="6">US ton</option>
					<option value="7">Stone</option>
					<option value="8">Pound</option>
					<option value="9">Ounce</option>
				</select>

			</div>

			<div class="<?php echo esc_attr( $equal_class ); ?>">=</div>

			<div class="klc-lbs-container">

				<input type="text"
					   id="input2-<?php echo intval( $random_number ); ?>"
					   class="klc-input2" value="2.20462"
					   style="width: <?php echo esc_attr( $input_width ); ?>px">

				<select id="option2-<?php echo intval( $random_number ); ?>" class="klc-option2">
					<option value="0">Tonne</option>
					<option value="1">Kilogram</option>
					<option value="2">Gram</option>
					<option value="3">Milligram</option>
					<option value="4">Microgram</option>
					<option value="5">Imperial ton</option>
					<option value="6">US ton</option>
					<option value="7">Stone</option>
					<option value="8" selected="selected">Pound</option>
					<option value="9">Ounce</option>
				</select>
			</div>

		</div>

		<div id="klc-message-<?php echo intval( $random_number ); ?>" class="klc-message"></div>

		<?php
		if ( 1 === $show_f ) {
			?>
			<div class="submit-button-container" <?php echo esc_attr( $hf_bgcolor ); ?>>
				<button class="button" onclick="klc_reset( <?php echo intval( $random_number ); ?> )">Reset</button>
			</div>
			<?php
		}
		?>
	</div>
</p>

<script language="JavaScript">

	var random_number = '<?php echo intval( $random_number ); ?>';

	jQuery( document ).ready(function() {
		jQuery( '#input1-' + random_number + ', #input2-' + random_number ).keyup(function() {
			klc_convert( random_number, jQuery(this).attr('class') );
		});

		jQuery( '#option1-' + random_number + ', #option2-' + random_number ).change(function() {
			klc_convert( random_number, jQuery(this).attr('class') );
		});
	});

</script>

<?php
