<?php
$random_number = rand( 1, 9999 );
?>

<p>
	<div id="klc-widget">
		<div class="klc-heading">KG to LBS Converter</div>

		<div class="klc-kg-container">

			<input type="text" id="klc-kg-input-<?php echo intval( $random_number ); ?>">

			<select id="klc-kg-menu-<?php echo intval( $random_number ); ?>" class="klc-kg-menu">
				<option value="Tonne">Tonne</option>
				<option value="Kilogram">Kilogram</option>
				<option value="Gram">Gram</option>
				<option value="Milligram">Milligram</option>
				<option value="Microgram">Microgram</option>
				<option value="Imperial ton">Imperial ton</option>
				<option value="US ton">US ton</option>
				<option value="Stone">Stone</option>
				<option value="Pound">Pound</option>
				<option value="Ounce">Ounce</option>
			</select>

		</div>

		<div class="klc-kg-equal">=</div>

		<div class="klc-lbs-container">

			<input type="text" id="klc-lbs-input-<?php echo intval( $random_number ); ?>">

			<select id="klc-lbs-menu-<?php echo intval( $random_number ); ?>" class="klc-kg-menu">
				<option>tonne</option>
				<option>Kilogram</option>
				<option>Gram</option>
				<option>Milligram</option>
				<option>Microgram</option>
				<option>Imperial ton</option>
				<option>US ton</option>
				<option>Stone</option>
				<option>Pound</option>
				<option>Ounce</option>
			</select>
		</div>

		<div id="klc-message-<?php echo intval( $random_number ); ?>" class="klc-message"></div>

		<div class="submit-button-container">
			<button class="button klc-submit-button" onclick="klc_calculate_to_current_date( <?php echo intval( $random_number ); ?> )">Calculate</button>
		</div>


	</div>
</p>



<?php
/*

<p>
	<div id="klc-widget">
		<div class="klc-heading">KG to LBS Converter</div>

		<div class="klc-dob-container">
			<div class="label">Your Birth Date</div>

			<select id="birth-date-<?php echo intval( $random_number ); ?>" class="klc-birth-date">
				<?php for ( $i = 1; $i <= 31; $i++ ) { ?>
					<option value="<?php echo intval( $i ); ?>">
						<?php if ( $i < 10) { echo '0'; } echo esc_html( $i ); ?>
					</option>
				<?php } ?>
			</select>

			<select id="birth-month-<?php echo intval( $random_number ); ?>" class="klc-birth-month">
				<?php for ( $i = 1; $i <= 12; $i++ ) { ?>
					<option value="<?php echo intval( $i ); ?>">
						<?php echo gmdate('F', strtotime("2021-$i-01")); ?>
					</option>
				<?php } ?>
			</select>


		</div>

		<div id="klc-message-<?php echo intval( $random_number ); ?>" class="klc-message"></div>

		<div class="submit-button-container">
			<button class="button klc-submit-button" onclick="klc_calculate_to_current_date( <?php echo intval( $random_number ); ?> )">Calculate</button>
		</div>


	</div>
</p>


*/


