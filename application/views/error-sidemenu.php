<?php
/*
 * @file error-sidemenu.php
 * @author Stefan Jonker (programmer at stefanjonker dot nl)
 * @date 09-08-2015
 *
 * Created: Sun 09-08-2015, 11:22:12 (:-0500)
 * Last modified: Sun 16-08-2015, 17:30:39 (-0500)
 */
?>

<div class="information-wrap">
<div class="information">
	<p><strong>Error</strong></p>

	<?php if($this->session->flashdata('message')) { ?>
		<div class="alert-box alert">
		<?php echo html_escape($this->session->flashdata('message')); ?>
		</div>
	<?php } else { ?>
		<a href="<?php echo base_url('/'); ?>">Return to the map.</a>

		<?php 
			$page = base_url('/');

			redirect(html_escape($page), 'location', 301); 
		?>
	<?php } ?>
</div>
</div>
