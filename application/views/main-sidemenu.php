<?php
/*
 * @file main-sidemenu.php
 * @author Stefan Jonker (programmer at stefanjonker dot nl)
 * @date 09-08-2015
 *
 * Created: Sun 09-08-2015, 11:22:12 (:-0500)
 * Last modified: Sun 09-08-2015, 18:47:34 (-0500)
 */
?>
<div class="information-wrap">
<div class="information">

	<p><strong><?php echo count($arrayResult); ?> Lugares:</strong></p>
	<ol>
		<?php foreach($arrayResult as $singleResult) { ?>
		<li>
			<a href="<?php echo base_url('view/place/' 
				. $singleResult['slug_places']); ?>">
				<?php echo $singleResult['name']; ?>
			</a>
		</li>
		<?php } ?>
	</ol>	
</div>
</div>
