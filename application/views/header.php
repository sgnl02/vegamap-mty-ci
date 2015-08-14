<?php
/*
 * @file header.php
 * @author Stefan Jonker (programmer at stefanjonker dot nl)
 * @date 07-08-2015
 *
 * Created: Fri 07-08-2015, 16:44:38 (:-0500)
 * Last modified: Fri 14-08-2015, 12:24:51 (-0500)
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

		#map-canvas, google-map {
			height: 100%;
			position: fixed;
			float: left;
			width: 100%;
		}

		.inner-wrap { height: 100%; }
		.tab-bar .menu-icon { z-index: 2; }
		.menu { margin-left: 10px; }
		.breadcrumbs { margin-bottom: 0; }
		.information-wrap { position: relative; width: 300px; float: right; }
		.information { float: left; position: fixed; width: 300px; height: 95%; margin-right: 20px; background: white; z-index: 400; overflow-y: auto; padding: 15px; padding-bottom: 200px; }
		.information p { margin-bottom: 0 !important; }
		.information .button-group { margin-top: 20px; }
		.indent { display: block; margin-left: 20px; }
		h1>sup { position: absolute; margin-top: -8px !important; }
		.title-color { color: #accf1e; }
		.error--facebook { margin-top: -16px !important; }
		.optional { padding-top: 20px; border-top: 2px solid black; }

		@media (max-width: 600px) {
			google-map { 
				position: relative !important; 
			}

			.information-wrap { width: 100%; margin-right: 0; }
			.information { height: 200px !important; padding-bottom: 50px; }

		  .information, .information-wrap {
				display: block;
				width: 100% !important;
		  }
		}
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
        <h1 class="title"><i class="fa fa-leaf title-color"></i> VegaMap<sup>1.1.1</sup></h1>
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
		  <li><a href="<?php echo base_url('add/place/'); ?>">Add place</a></li>
        <li><a href="#" data-reveal-id="aboutModal">Sobre</a></li>
      </ul>
    </aside>
