<?php
/*
 * @file map.php
 * @author Stefan Jonker (programmer at stefanjonker dot nl)
 * @date 04-08-2015
 *
 * Created: Tue 04-08-2015, 18:30:14 (:-0500)
 * Last modified: Sun 09-08-2015, 14:22:21 (-0500)
 */
?>

<?php $numberOfItems = 0; ?>
<google-map latitude="25.6488126" longitude="-100.3030789" disableDefaultUI="false" fit-to-markers zoom="15" style="width:100%; height:100%">
	<?php foreach($arrayResult as $singleResult) { ?>
		<?php $numberOfItems++; ?>

		<google-map-marker 
			latitude="<?php echo $singleResult['latitude']; ?>"
			longitude="<?php echo $singleResult['longitude']; ?>"
			title="<?php echo $singleResult['name']; ?>"
			icon="<?php echo base_url('assets/images/markers/number_') . "$numberOfItems" . ".png"; ?>"
			name="<?php echo $singleResult['slug_places']; ?>">
			<p><strong><?php echo $singleResult['name']; ?></strong></p>
			<p><?php echo $singleResult['address']; ?></p>
			<p><a href="<?php echo base_url('view/place/' 
			. $singleResult['slug_places']); ?>">
				More information
			</a></p>
		</google-map-marker>
	<?php } ?>
</google-map>
