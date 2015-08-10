<?php
/*
 * @file header.php
 * @author Stefan Jonker (programmer at stefanjonker dot nl)
 * @date 07-08-2015
 *
 * Created: Fri 07-08-2015, 16:44:38 (:-0500)
 * Last modified: Mon 10-08-2015, 10:22:21 (-0500)
 */
?>
<!doctype>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Vegamap</title>

	<link rel="import" href="<?php echo base_url('assets/bower_components/google-map/google-map.html');?>" />
	<link rel="stylesheet" href="<?php echo base_url('assets/bower_components/foundation/css/foundation.css');?>" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

	<style>
		google-map {
			height: 100%;
			position: fixed;
			float: left;
			width: 80% !important;
		}

		.inner-wrap { height: 100%; }
		.tab-bar .menu-icon { z-index: 2; }
		.menu { margin-left: 10px; }
		.breadcrumbs { margin-bottom: 0; }
		.information-wrap { position: relative; width: 25%; float: right; margin-right: 10px; }
		.information { float: left; position: fixed; width: 25%; height: 95%; margin-right: 20px; background: white; z-index: 400; overflow-y: auto; padding: 15px; padding-bottom: 200px; }
		.information p { margin-bottom: 0 !important; }
		.information .button-group { margin-top: 20px; }
		.indent { display: block; margin-left: 20px; }
		h1>sup { position: absolute; margin-top: -8px !important; }
	</style>

</head>

<body>

<div class="off-canvas-wrap" data-offcanvas>
  <div class="inner-wrap">
    <nav class="tab-bar">
      <section class="left">
        <a class="left-off-canvas-toggle menu-icon"><span></span> <span class="menu">Menu</span></a>
      </section>

      <section class="middle tab-bar-section">
        <h1 class="title"><i class="fa fa-leaf"></i> VegaMap<sup>1.1.1</sup></h1>
      </section>
    </nav>

    <aside class="left-off-canvas-menu">
      <ul class="off-canvas-list">
        <li><label>VegaMap<sup>1.1.1</sup></label></li>
        <li class="has-submenu"><a href="#">Tipo de comida</a>
            <ul class="left-submenu">
                <li class="back"><a href="#">Regresar</a></li>
                <li><label>Tipo de comida</label></li>
					<?php foreach($arrayMenuFoodType as $singleMenuFoodType) { ?>
						<li>
							<a href="
								<?php echo base_url('view/type/' 
								. $singleMenuFoodType['slug_categories']); ?>">
								<?php echo $singleMenuFoodType['category']; ?>
							</a>
						</li>
					<?php } ?>
            </ul>
        </li>
        <li class="has-submenu"><a href="#">Opciones</a>
            <ul class="left-submenu">
                <li class="back"><a href="#">Regresar</a></li>
                <li><label>Opciones</label></li>
					<?php foreach($arrayMenuDietType as $singleMenuDietType) { ?>
						<li>
							<a href="
								<?php echo base_url('view/option/' 
								. $singleMenuDietType['slug_options']); ?>">
								<?php echo $singleMenuDietType['option']; ?>
							</a>
						</li>
					<?php } ?>
            </ul>
        </li>
        <li class="has-submenu"><a href="#">Lugares</a>
            <ul class="left-submenu">
                <li class="back"><a href="#">Regresar</a></li>
                <li><label>Lugares</label></li>
					<?php foreach($arrayMenuPlaces as $singleMenuPlace) { ?>
						<li>
							<a href="
								<?php echo base_url('view/place/' 
								. $singleMenuPlace['slug_places']); ?>">
								<?php echo $singleMenuPlace['name']; ?>
							</a>
						</li>
					<?php } ?>
            </ul>
        </li>

      </ul>
    </aside>
