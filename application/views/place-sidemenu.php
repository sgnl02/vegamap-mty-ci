<?php
/*
 * @file place-sidemenu.php
 * @author Stefan Jonker (programmer at stefanjonker dot nl)
 * @date 09-08-2015
 *
 * Created: Sun 09-08-2015, 11:22:12 (:-0500)
 * Last modified: Sun 16-08-2015, 17:41:25 (-0500)
 */
?>
<div class="information-wrap">
<div class="information">
	<p><strong>1 <?php echo html_escape($arrayResult[0]['name']); ?>
	</strong></p>

	<?php if($this->session->flashdata('message')) { ?>
		<div class="alert-box success">
		<?php echo html_escape($this->session->flashdata('message')); ?>
		</div>
	<?php } ?>

	<?php 
		if($arrayResult[0]['category']) {
			echo '<p>'
			. '<strong>Food:</strong><br/> '
			. '<a class="indent" href="' 
				. html_escape(base_url('view/type/' 
				. strtolower(
					html_escape($arrayResult[0]['category'])
				))) . '">'
			. html_escape($arrayResult[0]['category'])
			. '</a></p>';
		}

		if($arrayResult[0]['option']) {
			echo '<p>'
			. '<strong>Option:</strong><br/> '
			. '<a class="indent" href="' 
				. html_escape(base_url('view/option/' 
				. strtolower(
					html_escape($arrayResult[0]['option'])
				))) . '">'
			. html_escape($arrayResult[0]['option'])
			. '</a></p>';
		}

		if($arrayResult[0]['address']) {
			echo '<p><strong>Address:</strong><br/> '
			. '<span class="indent">' . html_escape($arrayResult[0]['address']) . '</span>'
			. '</p>';
		}

		if($arrayResult[0]['primary_open_days_from'] 
		&& $arrayResult[0]['primary_open_days_until']
		&& $arrayResult[0]['primary_open_hours_from']
		&& $arrayResult[0]['primary_open_hours_until']) {
			echo '<p><strong>Open from:</strong><br/> '
			. '<span class="indent">'
			. html_escape($arrayResult[0]['primary_open_days_from'])
			. ' - '
			. html_escape($arrayResult[0]['primary_open_days_until'])
			. '<br/>'
			. html_escape($arrayResult[0]['primary_open_hours_from'])
			. ' - '
			. html_escape($arrayResult[0]['primary_open_hours_until'])
			. '</span></p>';
		}

		if($arrayResult[0]['secondary_open_days_from'] 
		&& $arrayResult[0]['secondary_open_days_until']
		&& $arrayResult[0]['secondary_open_hours_from']
		&& $arrayResult[0]['secondary_open_hours_until']) {
			echo '<br/><p>'
			. '<span class="indent">'
			. html_escape($arrayResult[0]['secondary_open_days_from'])
			. ' - '
			. html_escape($arrayResult[0]['secondary_open_days_until'])
			. '<br/>'
			. html_escape($arrayResult[0]['secondary_open_hours_from'])
			. ' - '
			. html_escape($arrayResult[0]['secondary_open_hours_until'])
			. '</span></p>';
		}

		if($arrayResult[0]['primary_phone']) {
			echo '<p><strong>Phone:</strong> '
			. '<span class="indent">'
			. html_escape($arrayResult[0]['primary_phone'])
			. '</span></p>';
		}

		if($arrayResult[0]['secondary_phone']) {
			echo '<p>'
			. '<span class="indent">'
			. html_escape($arrayResult[0]['secondary_phone'])
			. '</span></p>';
		}

		echo '<ul class="button-group even-2 round">';
			if($arrayResult[0]['facebook']) {
				echo '<li><a class="small button" href="' . html_escape($arrayResult[0]['facebook']) . '"><i class="fa fa-facebook-square"></i> Facebook</a></li>';
			} 
			if($arrayResult[0]['website']) {
				echo '<li><a class="small button" href="' . html_escape($arrayResult[0]['website']) . '"><i class="fa fa-external-link-square"></i> Website</a></li>';
			}
		echo '</ul>';

		if($arrayResult[0]['email']) {
				echo '<a class="small button round expand" href="mailto:' . html_escape($arrayResult[0]['email']) . '"><i class="fa fa-envelope-o"></i> Email</a>';
		}

	?>
</div>
</div>
