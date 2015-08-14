<?php
/*
 * @file footer.php
 * @author Stefan Jonker (programmer at stefanjonker dot nl)
 * @date 08-08-2015
 *
 * Created: Sat 08-08-2015, 10:48:06 (:-0500)
 * Last modified: Tue 11-08-2015, 18:51:50 (-0500)
 */
?>

	<!-- Reveal Modals begin -->
	<div id="aboutModal" class="reveal-modal small" data-reveal aria-labelledby="aboutModalTitle" aria-hidden="true" role="dialog">
	  <h2 id="aboutModalTitle">Sobre</h2>
	  <h3>VegaMap<sup>Beta</sup></h3>
	  <ul>
		<li>0.01 Nacimiento.</li>
		<li>0.02 El menú.</li>
		<li>0.03 Los iconos del mapa.</li>
		<li>1.00 Nueva versión.</li>
		<li>1.10 Mostrar toda en la mapa.</li>
		<li>1.11 Beta-versión.</li>
	  </ul>

	  <h3>Problemas?</h3>
	  <p>Enviar un correo: <em>admin [arroba] stefanjonker [punto] nl.</em></p>
	  <a class="close-reveal-modal" aria-label="Close">&#215;</a>
	</div>
	
	<div id="secondModal" class="reveal-modal" data-reveal aria-labelledby="secondModalTitle" aria-hidden="true" role="dialog">
	  <h2 id="secondModalTitle">This is a second modal.</h2>
	  <p>See? It just slides into place after the other first modal. Very handy when you need subsequent dialogs, or when a modal option impacts or requires another decision.</p>
	  <a class="close-reveal-modal" aria-label="Close">&#215;</a>
	</div>

  <a class="exit-off-canvas"></a>

  </div>
</div>

<script src="<?php echo base_url('assets/bower_components/foundation/js/vendor/jquery.js');?>"></script>
<script src="<?php echo base_url('assets/bower_components/foundation/js/foundation/foundation.js');?>"></script>
<script src="<?php echo base_url('assets/bower_components/foundation/js/foundation/foundation.offcanvas.js');?>"></script>
<script src="<?php echo base_url('assets/bower_components/foundation/js/foundation/foundation.reveal.js');?>"></script>

<script>
$(document).ready(function () {
	//$(".map").fadeIn(4000);
});


$(document).foundation();

function resize() {
		if (window.matchMedia("(max-width: 600px)").matches) {
			// Count height of menubar, breadcrumb and information-box, the leftover size
			// is for Google Map
			var windowHeight = document.body.clientHeight
			windowWidth = document.body.clientWidth
			, breadcrumbHeight = document.querySelector('.breadcrumbs').offsetHeight
			, menuHeight = document.querySelector('.tab-bar').offsetHeight
			, informationBoxHeight = document.querySelector('.information').offsetHeight
			, map = document.querySelector('#map-canvas') || document.querySelector('google-map')
			, googleMapHeight = windowHeight - breadcrumbHeight - menuHeight - informationBoxHeight;
	
			$("#map-canvas").height(googleMapHeight); 
			$("#map-canvas").width(windowWidth); 
		} else {
			// Calculating remaining width for Google map
			var windowWidth = document.body.clientWidth
			, windowHeight = document.body.clientHeight
			, informationBoxWidth = document.querySelector('.information').offsetWidth
			, googleMapWidth = windowWidth - informationBoxWidth

			// Calculating remaining height for Google map
			, breadcrumbHeight = document.querySelector('.breadcrumbs').offsetHeight
			, menuHeight = document.querySelector('.tab-bar').offsetHeight
			, informationBoxHeight = document.querySelector('.information').offsetHeight
			, googleMapHeight = windowHeight - breadcrumbHeight - menuHeight

			, map = document.querySelector('#map-canvas') || document.querySelector('google-map')
	
			$("#map-canvas").width(googleMapWidth); 
			$("#map-canvas").height(googleMapHeight); 
		}
}
</script>

</body>
</html>
