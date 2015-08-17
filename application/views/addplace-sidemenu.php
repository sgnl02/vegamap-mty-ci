<?php
/*
 * @file addplace-sidemenu.php
 * @author Stefan Jonker (programmer at stefanjonker dot nl)
 * @date 09-08-2015
 *
 * Created: Sun 09-08-2015, 11:22:12 (:-0500)
 * Last modified: Sun 16-08-2015, 17:28:55 (-0500)
 */
?>

<div class="information-wrap">
<div class="information">
	<p><strong>New place</strong></p>

	<?php var_dump($arrayValidationPlace); ?>

	<?php 
	if(isset($arrayValidationPlace['latitude'])
	&& isset($arrayValidationPlace['longitude'])
	&& !$arrayValidationPlace['latitude']
	&& !$arrayValidationPlace['longitude']) { ?>
		<div class="alert-box alert" id="formselectaddress">
			Click on the map to select the address of the place.
		</div>
	<?php } ?>

	<?php 
	/* Check whether an action is set, and if there are no errors
	 * and set the correct form action
	 */
		if(isset($arrayValidationPlace['action']['new'])
		&& !isset($arrayValidationPlace['error'])) { 
	?>
		<div class="alert-box" id="formselectaddress">
			No errors.
		</div>
		<form 
			action="<?php echo base_url('insert/place') ?>" 
			method="post" 
			id="formaddplace">
	<?php } else { ?>
		<form 
			action="<?php echo base_url('validate/place') ?>" 
			method="post" 
			id="formaddplace">
	<?php } ?>
	
	<?php 
	/* Begin of the input fields
	 */
	?>
		<input 
			type="hidden" 
			value="<?php if(isset($arrayValidationPlace['latitude'])) { 
				echo html_escape($arrayValidationPlace['latitude']); } ?>" 
			id="latitude" 
			name="latitude" 
			placeholder="Latitude"/>
		<input type="hidden" 
			value="<?php if(isset($arrayValidationPlace['longitude'])) { 
					echo html_escape($arrayValidationPlace['longitude']); 
				} ?>" 
			id="longitude" 
			name="longitude" 
			placeholder="Longitude"/>

		<div class="row collapse
			<?php if(isset($arrayValidationPlace['name']) 
			&& !isset($arrayValidationPlace['error']['name'])) { 
				echo 'hide'; } 
			?>">
			<div class="large-12 columns
				<?php if(isset($arrayValidationPlace['error']['name'])) { 
				echo 'error'; } ?>">
	      <label for="name">Name <small>Required</small></label>
			<input 
				value="<?php if(isset($arrayValidationPlace['name'])) { 
						echo html_escape($arrayValidationPlace['name']); 
					} ?>" 
				type="text" 
				id="name" 
				name="name" 
				placeholder="Name"/>
				<?php if(isset($arrayValidationPlace['error']['name'])) { ?>
					<small class="error">
						<?php echo html_escape($arrayValidationPlace['error']['name']); ?>
					</small>
				<?php } ?>
		</div>
		</div>
		<div class="row collapse
			<?php if(isset($arrayValidationPlace['type']) 
			&& !isset($arrayValidationPlace['error']['type'])) { 
				echo 'hide'; } 
			?>">
			<div class="large-12 columns">
				<label for="type">Tipo de comida <small>Required</small></label>
				<select 
					id="type" 
					name="type"
					class="large" 
					<?php if(!isset($arrayValidationPlace['error'])) { 
						/* echo 'disabled'; */ } ?>>
					<option DISABLED>Tipo de comida</option>
					<?php foreach($arrayMenuFoodType as $singleMenuFoodType) { ?>
						<option 
							<?php if(isset($arrayValidationPlace['type']) 
							&& $arrayValidationPlace['type'] 
							=== $singleMenuFoodType['id_categories']) { ?>
								 selected
							<?php } ?>
							value="<?php echo $singleMenuFoodType['id_categories']; ?>">
						<?php echo html_escape($singleMenuFoodType['category']); ?></option>
					<?php } ?>
			</select>
		</div>
		</div>
		<div class="row collapse
			<?php if(isset($arrayValidationPlace['option']) 
			&& !isset($arrayValidationPlace['error']['option'])) { 
				echo 'hide'; } 
			?>">
			<div class="large-12 columns">
				<label for="option">Option <small>Required</small></label>
				<select 
					name="option"
					id="option" 
					class="large" 
					<?php if(!isset($arrayValidationPlace['error'])) { 
						/* echo 'disabled'; */ } ?>>
					<option DISABLED>Option</option>
					<?php foreach($arrayMenuDietType as $singleMenuDietType) { ?>
						<option 
							<?php if(isset($arrayValidationPlace['option']) 
							&& $arrayValidationPlace['option'] 
							=== $singleMenuDietType['id_options']) { ?>
								 selected
							<?php } ?>
						value="<?php echo $singleMenuDietType['id_options']; ?>">
						<?php echo html_escape($singleMenuDietType['option']); ?></option>
					<?php } ?>
			</select>
			</div>
		</div>
		<div class="row collapse
			<?php if(isset($arrayValidationPlace['street']) 
			&& !isset($arrayValidationPlace['error']['street'])) { 
				echo 'hide'; } 
			?>">
			<div class="large-12 columns
				<?php if(isset($arrayValidationPlace['error']['street'])) { 
				echo 'error'; } ?>">
	      <label for="street">Street <small>Required</small></label>
			<textarea 
				id="street" 
				name="street" 
				placeholder="Street"/><?php if(isset($arrayValidationPlace['street'])) { 
						echo html_escape($arrayValidationPlace['street']); } ?></textarea>
				<?php if(isset($arrayValidationPlace['error']['street'])) { ?>
					<small class="error">
						<?php echo html_escape($arrayValidationPlace['error']['street']); ?>
					</small>
				<?php } ?>
			</div>
		</div>
		<div class="row collapse">
			<div class="large-12 columns">
				<strong>Primary opening times</strong>
			</div>
		</div>
		<div class="row collapse
			<?php if(isset($arrayValidationPlace['primaryopendaysfrom']) 
			&& !isset($arrayValidationPlace['error']['primaryopendaysfrom'])) {
				echo 'hide'; } 
			?>">
			<div class="large-12 columns">
				<label for="primaryopendaysfrom">Open from <small>Required</small></label>
				<select 
					name="primaryopendaysfrom"
					id="primaryopendaysfrom" 
					class="large" 
					<?php if(!isset($arrayValidationPlace['error'])) { 
						/* echo 'disabled'; */ } ?>>
				<option DISABLED>Open until</option>
				<option value="Lunes">Lunes</option>
				<option value="Martes">Martes</option>
				<option value="Miercoles">Miercoles</option>
				<option value="Jueves">Jueves</option>
				<option value="Viernes">Viernes</option>
				<option value="Sabado">Sabado</option>
				<option value="Domingo">Domingo</option>
			</select>
			</div>
		</div>
		<div class="row collapse
			<?php if(isset($arrayValidationPlace['primaryopenhoursfrom']) 
			&& !isset($arrayValidationPlace['error']['primaryopenhoursfrom'])
			&& isset($arrayValidationPlace['primaryopenminutesfrom']) 
			&& !isset($arrayValidationPlace['error']['primaryopenminutesfrom'])) {
				echo 'hide'; } 
			?>">
			<div class="large-6 columns
				<?php if(isset($arrayValidationPlace['error']['primaryopenhoursfrom'])) { 
				echo 'error'; } ?>">
			<label for="name"

			>Hours open from <small>Required</small></label>
			<input 
				value="<?php if(isset($arrayValidationPlace['primaryopenhoursfrom'])) { 
						echo html_escape($arrayValidationPlace['primaryopenhoursfrom']); 
					} ?>" 
				type="text" 
				id="primaryopenhoursfrom" 
				name="primaryopenhoursfrom" 
				placeholder="Hours open from"/>
				<?php if(isset($arrayValidationPlace['error']['primaryopenhoursfrom'])) { ?>
					<small class="error">
						<?php echo html_escape($arrayValidationPlace['error']['primaryopenhoursfrom']); ?>
					</small>
				<?php } ?>
		</div>
			<div class="large-6 columns
				<?php if(isset($arrayValidationPlace['error']['primaryopenminutesfrom'])) { 
				echo 'error'; } ?>">
	      <label for="name">Minutes open from <small>Required</small></label>
			<input 
				value="<?php if(isset($arrayValidationPlace['primaryopenminutesfrom'])) { 
						echo html_escape($arrayValidationPlace['primaryopenminutesfrom']); 
					} ?>" 
				type="text" 
				id="primaryopenminutesfrom" 
				name="primaryopenminutesfrom" 
				placeholder="Minutes open from"/>
				<?php if(isset($arrayValidationPlace['error']['primaryopenminutesfrom'])) { ?>
					<small class="error">
						<?php echo html_escape($arrayValidationPlace['error']['primaryopenminutesfrom']); ?>
					</small>
				<?php } ?>
		</div>
		</div>
		<div class="row collapse
			<?php if(isset($arrayValidationPlace['primaryopendaysuntil']) 
			&& !isset($arrayValidationPlace['error']['primaryopendaysuntil'])) {
				echo 'hide'; } 
			?>">
			<div class="large-12 columns">
				<label for="primaryopendaysuntil">Open until <small>Required</small></label>
				<select 
					name="primaryopendaysuntil"
					id="primaryopendaysuntil" 
					class="large" 
					<?php if(!isset($arrayValidationPlace['error'])) { 
						/* echo 'disabled'; */ } ?>>
				<option DISABLED>Open until</option>
				<option value="Lunes">Lunes</option>
				<option value="Martes">Martes</option>
				<option value="Miercoles">Miercoles</option>
				<option value="Jueves">Jueves</option>
				<option value="Viernes">Viernes</option>
				<option value="Sabado">Sabado</option>
				<option value="Domingo">Domingo</option>
			</select>
			</div>
		</div>
		<div class="row collapse
			<?php if(isset($arrayValidationPlace['primaryopenhoursuntil']) 
			&& !isset($arrayValidationPlace['error']['primaryopenhoursuntil'])
			&& isset($arrayValidationPlace['primaryopenminutesuntil']) 
			&& !isset($arrayValidationPlace['error']['primaryopenminutesuntil'])) {
				echo 'hide'; } 
			?>">
			<div class="large-6 columns
				<?php if(isset($arrayValidationPlace['error']['primaryopenhoursuntil'])) { 
				echo 'error'; } ?>">
	      <label for="name">Hours open until <small>Required</small></label>
			<input 
				value="<?php if(isset($arrayValidationPlace['primaryopenhoursuntil'])) { 
						echo html_escape($arrayValidationPlace['primaryopenhoursuntil']); 
					} ?>" 
				type="text" 
				id="primaryopenhoursuntil" 
				name="primaryopenhoursuntil" 
				placeholder="Hours open until"/>
				<?php if(isset($arrayValidationPlace['error']['primaryopenhoursuntil'])) { ?>
					<small class="error">
						<?php echo html_escape($arrayValidationPlace['error']['primaryopenhoursuntil']); ?>
					</small>
				<?php } ?>
		</div>
			<div class="large-6 columns
				<?php if(isset($arrayValidationPlace['error']['primaryopenminutesuntil'])) { 
				echo 'error'; } ?>">
	      <label for="name">Minutes open until <small>Required</small></label>
			<input 
				value="<?php if(isset($arrayValidationPlace['primaryopenminutesuntil'])) { 
						echo html_escape($arrayValidationPlace['primaryopenminutesuntil']); 
					} ?>" 
				type="text" 
				id="primaryopenminutesuntil" 
				name="primaryopenminutesuntil" 
				placeholder="Minutes open until"/>
				<?php if(isset($arrayValidationPlace['error']['primaryopenminutesuntil'])) { ?>
					<small class="error">
						<?php echo html_escape($arrayValidationPlace['error']['primaryopenminutesuntil']); ?>
					</small>
				<?php } ?>
		</div>
		</div>
		<div class="optional">
			<div class="alert-box"><p>Everything below this line is optional</p></div>

			<div class="row collapse
				<?php if(isset($arrayValidationPlace['email']) 
				&& !isset($arrayValidationPlace['error']['email'])) { 
					echo 'hide'; } 
				?>">
				<div class="large-12 columns
					<?php if(isset($arrayValidationPlace['error']['email'])) { 
					echo 'error'; } ?>">
		      <label for="email">Email <small>Optional</small></label>
				<input 
					value="<?php if(isset($arrayValidationPlace['email'])) { 
							echo html_escape($arrayValidationPlace['email']); 
						} ?>" 
					type="text" 
					id="email" 
					name="email" 
					placeholder="Email"/>
					<?php if(isset($arrayValidationPlace['error']['email'])) { ?>
						<small class="error">
							<?php echo html_escape($arrayValidationPlace['error']['email']); ?>
						</small>
					<?php } ?>
			</div>
			</div>
			<div class="row collapse
				<?php if(isset($arrayValidationPlace['primaryphone']) 
				&& !isset($arrayValidationPlace['error']['primaryphone'])) { 
					echo 'hide'; } 
				?>">
				<div class="large-12 columns
					<?php if(isset($arrayValidationPlace['error']['primaryphone'])) { 
					echo 'error'; } ?>">
		      <label for="primaryphone">Primary phone <small>Optional</small></label>
				<input 
					value="<?php if(isset($arrayValidationPlace['primaryphone'])) { 
							echo html_escape($arrayValidationPlace['primaryphone']); 
						} ?>" 
					type="text" 
					id="primaryphone" 
					name="primaryphone" 
					placeholder="Primary phone"/>
					<?php if(isset($arrayValidationPlace['error']['primaryphone'])) { ?>
						<small class="error">
							<?php echo html_escape($arrayValidationPlace['error']['primaryphone']); ?>
						</small>
					<?php } ?>
			</div>
			</div>
			<div class="row collapse
				<?php if(isset($arrayValidationPlace['secondaryphone']) 
				&& !isset($arrayValidationPlace['error']['secondaryphone'])) { 
					echo 'hide'; } 
				?>">
				<div class="large-12 columns
					<?php if(isset($arrayValidationPlace['error']['secondaryphone'])) { 
					echo 'error'; } ?>">
		      <label for="secondaryphone">Secondary phone <small>Optional</small></label>
				<input 
					value="<?php if(isset($arrayValidationPlace['secondaryphone'])) { 
							echo html_escape($arrayValidationPlace['secondaryphone']); 
						} ?>" 
					type="text" 
					id="secondaryphone" 
					name="secondaryphone" 
					placeholder="Secondary phone"/>
					<?php if(isset($arrayValidationPlace['error']['secondaryphone'])) { ?>
						<small class="error">
							<?php echo html_escape($arrayValidationPlace['error']['secondaryphone']); ?>
						</small>
					<?php } ?>
			</div>
			</div>
			<div class="row collapse
				<?php if(isset($arrayValidationPlace['website']) 
				&& !isset($arrayValidationPlace['error']['website'])) { 
					echo 'hide'; } 
				?>">
				<div class="large-12 columns
					<?php if(isset($arrayValidationPlace['error']['website'])) { 
					echo 'error'; } ?>">
		      <label for="website">Website <small>Optional</small></label>
				<input 
					value="<?php if(isset($arrayValidationPlace['website'])) { 
							echo html_escape($arrayValidationPlace['website']); 
						} ?>" 
					type="text" 
					id="website" 
					name="website" 
					placeholder="Website"/>
					<?php if(isset($arrayValidationPlace['error']['website'])) { ?>
						<small class="error">
							<?php echo html_escape($arrayValidationPlace['error']['website']); ?>
						</small>
					<?php } ?>
			</div>
			</div>
			<div class="row collapse
				<?php if(isset($arrayValidationPlace['facebook']) 
				&& !isset($arrayValidationPlace['error']['facebook'])) { 
					echo 'hide'; } 
				?>">
				<div class="large-12 columns
					<?php if(isset($arrayValidationPlace['error']['website'])) { 
					echo 'error'; } ?>">
					<label for="facebook">Facebook <small>Optional</small></label>
				</div>
			</div>
			<div class="row collapse
				<?php if(isset($arrayValidationPlace['facebook']) 
				&& !isset($arrayValidationPlace['error']['facebook'])) { 
					echo 'hide'; } 
				?>">
				<div class="large-5 columns">
					<span class="prefix">facebook.com/</span>
				</div>
				<div class="large-7 columns">
					<input 
						id="facebook" 
						name="facebook" 
						<?php if(!isset($arrayValidationPlace['error'])) {
							/* echo 'disabled'; */ } ?>
						type="text" 
						placeholder="Facebook.">
				</div>
			</div>
			<div class="row collapse
				<?php if(isset($arrayValidationPlace['facebook']) 
				&& !isset($arrayValidationPlace['error']['facebook'])) { 
					echo 'hide'; } 
				?>">
				<div class="large-12 columns">
					<?php if(isset($arrayValidationPlace['error']['facebook'])) { ?>
						<small class="error error--facebook">
							<?php echo html_escape($arrayValidationPlace['error']['facebook']); ?>
						</small>
					<?php } ?>
				</div>
			</div>
			<div class="row collapse">
				<div class="large-12 columns">
					<strong>Secondary opening times</strong>
				</div>
			</div>
			<div class="row collapse
				<?php if(isset($arrayValidationPlace['secondaryopendaysfrom']) 
				&& !isset($arrayValidationPlace['error']['secondaryopendaysfrom'])) {
					echo 'hide'; } 
				?>">
				<div class="large-12 columns">
					<label for="secondaryopendaysfrom">Open from <small>Optional</small></label>
					<select 
						name="secondaryopendaysfrom"
						id="secondaryopendaysfrom" 
						class="large" 
						<?php if(!isset($arrayValidationPlace['error'])) { 
							/* echo 'disabled'; */ } ?>>
					<option DISABLED>Open until</option>
					<option value="Lunes">Lunes</option>
					<option value="Martes">Martes</option>
					<option value="Miercoles">Miercoles</option>
					<option value="Jueves">Jueves</option>
					<option value="Viernes">Viernes</option>
					<option value="Sabado">Sabado</option>
					<option value="Domingo">Domingo</option>
				</select>
				</div>
			</div>
			<div class="row collapse
				<?php if(isset($arrayValidationPlace['secondaryopenhoursfrom']) 
				&& !isset($arrayValidationPlace['error']['secondaryopenhoursfrom'])
				&& isset($arrayValidationPlace['secondaryopenminutesfrom']) 
				&& !isset($arrayValidationPlace['error']['secondaryopenminutesfrom'])) {
					echo 'hide'; } 
				?>">
				<div class="large-6 columns
					<?php if(isset($arrayValidationPlace['error']['secondaryopenhoursfrom'])) { 
					echo 'error'; } ?>">
		      <label for="name">Hours open from <small>Optional</small></label>
				<input 
					value="<?php if(isset($arrayValidationPlace['secondaryopenhoursfrom'])) { 
							echo html_escape($arrayValidationPlace['secondaryopenhoursfrom']); 
						} ?>" 
					type="text" 
					id="secondaryopenhoursfrom" 
					name="secondaryopenhoursfrom" 
					placeholder="Hours open from"/>
					<?php if(isset($arrayValidationPlace['error']['secondaryopenhoursfrom'])) { ?>
						<small class="error">
							<?php echo html_escape($arrayValidationPlace['error']['secondaryopenhoursfrom']); ?>
						</small>
					<?php } ?>
			</div>
				<div class="large-6 columns
					<?php if(isset($arrayValidationPlace['error']['secondaryopenminutesfrom'])) { 
					echo 'error'; } ?>">
		      <label for="name">Minutes open from <small>Optional</small></label>
				<input 
					value="<?php if(isset($arrayValidationPlace['primarminutesminutesfrom'])) { 
							echo html_escape($arrayValidationPlace['secondaryopenminutesfrom']); 
						} ?>" 
					type="text" 
					id="secondaryopenminutesfrom" 
					name="secondaryopenminutesfrom" 
					placeholder="Minutes open from"/>
					<?php if(isset($arrayValidationPlace['error']['secondaryopenminutesfrom'])) { ?>
						<small class="error">
							<?php echo html_ecape($arrayValidationPlace['error']['secondaryopenminutesfrom']); ?>
						</small>
					<?php } ?>
			</div>
			</div>
			<div class="row collapse
				<?php if(isset($arrayValidationPlace['secondaryopendaysuntil']) 
				&& !isset($arrayValidationPlace['error']['secondaryopendaysuntil'])) {
					echo 'hide'; } 
				?>">
				<div class="large-12 columns">
					<label for="secondaryopendaysuntil">Open until <small>Optional</small></label>
					<select 
						name="secondaryopendaysuntil"
						id="secondaryopendaysuntil" 
						class="large" 
						<?php if(!isset($arrayValidationPlace['error'])) { 
							/* echo 'disabled'; */ } ?>>
					<option DISABLED>Open until</option>
					<option value="Lunes">Lunes</option>
					<option value="Martes">Martes</option>
					<option value="Miercoles">Miercoles</option>
					<option value="Jueves">Jueves</option>
					<option value="Viernes">Viernes</option>
					<option value="Sabado">Sabado</option>
					<option value="Domingo">Domingo</option>
				</select>
				</div>
			</div>
			<div class="row collapse
				<?php if(isset($arrayValidationPlace['secondaryopenhoursuntil']) 
				&& !isset($arrayValidationPlace['error']['secondaryopenhoursuntil'])
				&& isset($arrayValidationPlace['secondaryopenminutesuntil']) 
				&& !isset($arrayValidationPlace['error']['secondaryopenminutesuntil'])) {
					echo 'hide'; } 
				?>">
				<div class="large-6 columns
					<?php if(isset($arrayValidationPlace['error']['secondaryopenhoursuntil'])) { 
					echo 'error'; } ?>">
		      <label for="name">Hours open until <small>Optional</small></label>
				<input 
					value="<?php if(isset($arrayValidationPlace['secondaryopenhoursuntil'])) { 
							echo html_escape($arrayValidationPlace['secondaryopenhoursuntil']); 
						} ?>" 
					type="text" 
					id="secondaryopenhoursopenuntil" 
					name="secondaryopenhoursopenuntil" 
					placeholder="Hours open until"/>
					<?php if(isset($arrayValidationPlace['error']['secondaryopenhoursuntil'])) { ?>
						<small class="error">
							<?php echo html_escape($arrayValidationPlace['error']['secondaryopenhoursuntil']); ?>
						</small>
					<?php } ?>
				</div>
				<div class="large-6 columns
					<?php if(isset($arrayValidationPlace['error']['secondaryopenminutesuntil'])) { 
					echo 'error'; } ?>">
		      <label for="name">Minutes open until <small>Optional</small></label>
				<input 
					value="<?php if(isset($arrayValidationPlace['primarminutesminutesuntil'])) { 
							echo html_escape($arrayValidationPlace['secondaryopenminutesuntil']); 
						} ?>" 
					type="text" 
					id="secondaryopenminutesuntil" 
					name="secondaryopenminutesuntil" 
					placeholder="Minutes open until"/>
					<?php if(isset($arrayValidationPlace['error']['secondaryopenminutesuntil'])) { ?>
						<small class="error">
							<?php echo html_escape($arrayValidationPlace['error']['secondaryopenminutesuntil']); ?>
						</small>
					<?php } ?>
			</div>
			</div>
		</div>

		<?php 
		/* Check whether an action is set, and if there are no errors
		 * and set the correct form action
		 */
			if(isset($arrayValidationPlace['action']['new'])
			&& !isset($arrayValidationPlace['error'])) { 
		?>
		<input 
				type="submit" 
				class="button medium expand" 
				value="Add place to the map"/>
		<?php } else { ?>
		<input 
				type="submit" 
				class="button medium expand" 
				value="Check for errors"/>
		<?php } ?>
	</form>

</div>
</div>
