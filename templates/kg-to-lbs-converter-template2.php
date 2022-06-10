<?php
$random_number = rand( 1, 9999 );
?>
<p>
	<div id="klc-widget">
		<div class="klc-heading">Calculate Your Age To Given Date</div>

		<div class="klc-dob-container">
			<div class="label">Your Birth Date (From Date)</div>

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

			<input id="birth-year-<?php echo intval( $random_number ); ?>" type="text" class="klc-birth-year" placeholder="Enter year" />
		</div>

		<div class="klc-dob-container">
			<div class="label">To Date</div>

			<select id="to-date-<?php echo intval( $random_number ); ?>" class="klc-birth-date">
				<?php for ( $i = 1; $i <= 31; $i++ ) { ?>
					<option value="<?php echo intval( $i ); ?>">
						<?php if ( $i < 10) { echo '0'; } echo esc_html( $i ); ?>
					</option>
				<?php } ?>
			</select>

			<select id="to-month-<?php echo intval( $random_number ); ?>" class="klc-birth-month">
				<?php for ( $i = 1; $i <= 12; $i++ ) { ?>
					<option value="<?php echo intval( $i ); ?>">
						<?php echo gmdate('F', strtotime("2021-$i-01")); ?>
					</option>
				<?php } ?>
			</select>

			<input id="to-year-<?php echo intval( $random_number ); ?>" type="text" class="klc-birth-year" placeholder="Enter year" />
		</div>


		<div id="klc-message-<?php echo intval( $random_number ); ?>" class="klc-message"></div>

		<div class="submit-button-container">
			<button class="button klc-submit-button" onclick="klc_calculate_to_given_date( <?php echo intval( $random_number ); ?> )">Calculate</button>
		</div>


	</div>
</p>




