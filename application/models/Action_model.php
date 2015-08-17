<?php
/*
 * @file Action_model.php
 * @author Stefan Jonker (programmer at stefanjonker dot nl)
 * @date 13-08-2015
 *
 * Created: Thu 13-08-2015, 13:26:30 (:-0500)
 * Last modified: Sun 16-08-2015, 17:31:37 (-0500)
 */
?>
<?php
class Action_model extends CI_Model {
	private $post;
	private $arrayValidationPlace;
	private $latitude;
	private $longitude;
	private $name;
	private $street;
	private $type;
	private $option;
	private $primaryopendaysfrom;
	private $primaryopendaysuntil;
	private $primaryopenhoursfrom;
	private $primaryopenhoursuntil;
	private $createslug;
	private $insertplace;
	private $page;

	public function setValidationFields() {
		$this->post = $this->input->post();
		$this->arrayValidationPlace['action']['new'] = "place";

		if($this->input->post('latitude')) {
			$this->arrayValidationPlace['latitude'] = $this->post['latitude']; 
		}

		if(!$this->input->post('latitude')) {
			$this->arrayValidationPlace['error']['latitude'] = 'Latitude is empty'; 
		}

		if($this->input->post('longitude')) {
			$this->arrayValidationPlace['longitude'] = $this->post['longitude']; 
		} else {
			$this->arrayValidationPlace['error']['longitude'] = 'Longitude is empty'; 
		}

		if($this->input->post('name')) {
			$this->arrayValidationPlace['name'] = $this->post['name']; 
		} else {
			$this->arrayValidationPlace['error']['name'] = 'Name is empty'; 
		}

		if($this->input->post('street')) {
			$this->arrayValidationPlace['street'] = $this->post['street']; 
		} else {
			$this->arrayValidationPlace['error']['street'] = 'Street is empty'; 
		}

		if($this->input->post('type')) {
			$this->arrayValidationPlace['type'] = $this->post['type']; 
		} else {
			$this->arrayValidationPlace['error']['type'] = 'Type of food is empty'; 
		}

		if($this->input->post('option')) {
			$this->arrayValidationPlace['option'] = $this->post['option']; 
		} else {
			$this->arrayValidationPlace['error']['option'] = 'Option is empty'; 
		}

		if($this->input->post('primaryopendaysfrom')) {
			$this->arrayValidationPlace['primaryopendaysfrom'] = $this->post['primaryopendaysfrom']; 
		} else {
			$this->arrayValidationPlace['error']['primaryopendaysfrom'] = 'Primary open days from is empty'; 
		}

		if($this->input->post('primaryopendaysuntil')) {
			$this->arrayValidationPlace['primaryopendaysuntil'] = $this->post['primaryopendaysuntil']; 
		} else {
			$this->arrayValidationPlace['error']['primaryopendaysuntil'] = 'Primary open days until is empty'; 
		}

		if($this->input->post('primaryopenhoursfrom')) {
			$this->arrayValidationPlace['primaryopenhoursfrom'] = $this->post['primaryopenhoursfrom']; 
		} else {
			$this->arrayValidationPlace['error']['primaryopenhoursfrom'] = 'Primary open hours from is empty'; 
		}

		if($this->input->post('primaryopenhoursuntil')) {
			$this->arrayValidationPlace['primaryopenhoursuntil'] = $this->post['primaryopenhoursuntil']; 
		} else {
			$this->arrayValidationPlace['error']['primaryopenhoursuntil'] = 'Primary open hours until is empty'; 
		}

		if($this->input->post('primaryopenminutesfrom')) {
			$this->arrayValidationPlace['primaryopenminutesfrom'] = $this->post['primaryopenminutesfrom']; 
		} else {
			$this->arrayValidationPlace['error']['primaryopenminutesfrom'] = 'Primary open minutes from is empty'; 
		}

		if($this->input->post('primaryopenminutesuntil')) {
			$this->arrayValidationPlace['primaryopenminutesuntil'] = $this->post['primaryopenminutesuntil']; 
		} else {
			$this->arrayValidationPlace['error']['primaryopenminutesuntil'] = 'Primary open minutes until is empty'; 
		}
	}

	public function getValidationFields() {
		return $this->arrayValidationPlace;
	}

	public function insertPlace() {
		$this->post = $this->input->post();

		$this->latitude = $this->post['latitude']; 
		$this->longitude = $this->post['longitude']; 
		$this->name = $this->post['name']; 
		$this->street = $this->post['street']; 
		$this->type = $this->post['type']; 
		$this->option = $this->post['option']; 
		$this->primaryopendaysfrom = $this->post['primaryopendaysfrom']; 
		$this->primaryopendaysuntil = $this->post['primaryopendaysuntil']; 
		$this->primaryopenhoursfrom = $this->post['primaryopenhoursfrom'] 
			. ":" . $this->post['primaryopenminutesfrom'];
		$this->primaryopenhoursuntil = $this->post['primaryopenhoursuntil'] 
			. ":" . $this->post['primaryopenminutesuntil']; 

		$this->createslug = strtolower($this->name);
   	$this->createslug = preg_replace('/[^[:alnum:]]/', ' ', $this->createslug);
   	$this->createslug = preg_replace('/[[:space:]]+/', "-", $this->createslug);
   	$this->slugplaces = trim($this->createslug, "-");

		$this->insertplace = "INSERT 
			INTO places 
				(name, address, latitude, longitude, id_category, id_option, 
				slug_places, primary_open_days_from, primary_open_days_until, 
				primary_open_hours_from, primary_open_hours_until) 
			VALUES(
				" . $this->db->escape($this->name) . "
				, " . $this->db->escape($this->street) . "
				, " . $this->db->escape($this->latitude) . "
				, " . $this->db->escape($this->longitude) . "
				, " . $this->db->escape($this->type) . "
				, " . $this->db->escape($this->option) . "
				, " . $this->db->escape($this->slugplaces) . "
				, " . $this->db->escape($this->primaryopendaysfrom) . "
				, " . $this->db->escape($this->primaryopendaysuntil) . "
				, " . $this->db->escape($this->primaryopenhoursfrom) . "
				, " . $this->db->escape($this->primaryopenhoursuntil) . "
			)";

		$this->db->query($this->insertplace);	

		if($this->db->affected_rows()) {
			$this->showPlace($this->slugplaces);
		} else {
			$this->showError();
		}
	}

	public function showPlace() {
		$this->page = base_url('view/place/' . $this->slugplaces);

		$this->session->set_flashdata('message', $this->name . ' has been added to the map.');
		redirect(html-escape($this->page), 'location', 301);
	}

	public function showError() {
		$this->page = base_url('error');

		$this->session->set_flashdata('message', 'Error submitting to database');
		redirect(html_escape($this->page), 'location', 301);
	}
}
