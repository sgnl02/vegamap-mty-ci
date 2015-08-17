<?php
/*
 * @file place-breadcrumb.php
 * @author Stefan Jonker (programmer at stefanjonker dot nl)
 * @date 04-08-2015
 *
 * Created: Tue 04-08-2015, 18:30:14 (:-0500)
 * Last modified: Sun 16-08-2015, 17:23:59 (-0500)
 */
?>
<ul class="breadcrumbs">
	<li><a href="<?php echo html_escape(base_url('/')); ?>">Inicio</a></li>
	<li class="unavailable">Lugar</li>
	<li class="current"><?php echo html_escape($arrayResult[0]['name']); ?></li>
</ul>
