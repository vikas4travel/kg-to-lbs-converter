<?php
$random_number = rand( 100, 99999 );
?>

<p>
	<div id="klc-widget">
		<div class="klc-heading">KG to LBS Converter</div>

		<div class="klc-kg-container">

			<input type="text" id="input1-<?php echo intval( $random_number ); ?>" class="klc-input1" value="1">

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

		<div class="klc-equal">=</div>

		<div class="klc-lbs-container">

			<input type="text" id="input2-<?php echo intval( $random_number ); ?>" class="klc-input2" value="2.20462">

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

		<div id="klc-message-<?php echo intval( $random_number ); ?>" class="klc-message"></div>

		<div class="submit-button-container">
			<button class="button" onclick="klc_reset( <?php echo intval( $random_number ); ?> )">Reset</button>
		</div>


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
