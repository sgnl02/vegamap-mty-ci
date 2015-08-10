<?php
/*
 * @file index.php
 * @author Stefan Jonker (programmer at stefanjonker dot nl)
 * @date 04-08-2015
 *
 * Created: Tue 04-08-2015, 18:30:14 (:-0500)
 * Last modified: Sun 09-08-2015, 18:47:46 (-0500)
 */
?>

<section class="main-section">
<google-map latitude="25.6488126" longitude="-100.3030789" disableDefaultUI="false" fit-to-markers>	
	<?php foreach($arrayResult as $singleResult) { ?>
		<google-map-marker 
			latitude="<?php echo $singleResult['latitude']; ?>"
			longitude="<?php echo $singleResult['longitude']; ?>"
			title="<?php echo $singleResult['name']; ?>"
			name="<?php echo $singleResult['slug_places']; ?>">
			<p><strong><?php echo $singleResult['name']; ?></strong></p>
			<p><?php echo $singleResult['address']; ?></p>
			<p><a href="view/place/<?php echo $singleResult['slug_places']; ?>">
				More information
			</a></p>
		</google-map-marker>';
	<?php } ?>
</google-map>
</section>
