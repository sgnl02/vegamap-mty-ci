<?php
/*
 * @file map.php
 * @author Stefan Jonker (programmer at stefanjonker dot nl)
 * @date 04-08-2015
 *
 * Created: Tue 04-08-2015, 18:30:14 (:-0500)
 * Last modified: Sun 16-08-2015, 17:40:07 (-0500)
 */
?>

<div class="map">
<?php $numberOfItems = 0; ?>
<google-map latitude="25.6488126" longitude="-100.3030789" disableDefaultUI="false" fit-to-markers zoom="15">
	<?php foreach($arrayResult as $singleResult) { ?>
		<?php $numberOfItems++; ?>

		<google-map-marker 
			latitude="<?php echo html_escape($singleResult['latitude']); ?>"
			longitude="<?php echo html_escape($singleResult['longitude']); ?>"
			title="<?php echo html_escape($singleResult['name']); ?>"
			icon="<?php echo base_url('assets/images/markers/number_' . html_escape($numberOfItems) . ".png"); ?>"
			name="<?php echo html_escape($singleResult['slug_places']); ?>">
			<p><strong><?php echo html_escape($singleResult['name']); ?></strong></p>
			<p><?php echo html_escape($singleResult['address']); ?></p>
			<p><a href="<?php echo base_url('view/place/' 
			. html_escape($singleResult['slug_places'])); ?>">
				More information
			</a></p>
		</google-map-marker>
	<?php } ?>
</google-map>
</div>
