<?php
/*
 * @file index.php
 * @author Stefan Jonker (programmer at stefanjonker dot nl)
 * @date 04-08-2015
 *
 * Created: Tue 04-08-2015, 18:30:14 (:-0500)
 * Last modified: Sun 16-08-2015, 17:42:03 (-0500)
 */
?>

<section class="main-section">
<google-map latitude="25.6488126" longitude="-100.3030789" disableDefaultUI="false" fit-to-markers>	
	<?php foreach($arrayResult as $singleResult) { ?>
		<google-map-marker 
			latitude="<?php echo html_escape($singleResult['latitude']); ?>"
			longitude="<?php echo html_escape($singleResult['longitude']); ?>"
			title="<?php echo html_escape($singleResult['name']); ?>"
			name="<?php echo html_escape($singleResult['slug_places']); ?>">
			<p><strong><?php echo html_escape($singleResult['name']); ?></strong></p>
			<p><?php echo html_escape($singleResult['address']); ?></p>
			<p><a href="view/place/<?php echo html_escape($singleResult['slug_places']); ?>">
				More information
			</a></p>
		</google-map-marker>';
	<?php } ?>
</google-map>
</section>
