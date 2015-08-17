<?php
/*
 * @file option-sidemenu.php
 * @author Stefan Jonker (programmer at stefanjonker dot nl)
 * @date 09-08-2015
 *
 * Created: Sun 09-08-2015, 11:22:12 (:-0500)
 * Last modified: Sun 16-08-2015, 17:40:54 (-0500)
 */
?>
<div class="information-wrap">
<div class="information">
	<p><strong><?php echo count(html_escape($arrayResult)); ?> Lugares de
		<?php echo strtolower($arrayResult[0]['option']); ?>:
	</strong></p>
	<ol>
		<?php foreach($arrayResult as $singleResult) { ?>
		<li>
			<a href="<?php echo base_url('view/place/' 
				. html_escape($singleResult['slug_places'])); ?>">
				<?php echo html_escape($singleResult['name']); ?>
			</a>
		</li>
		<?php } ?>
	</ol>	
</div>
</div>
