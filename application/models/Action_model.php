<?php
/*
 * @file Action_model.php
 * @author Stefan Jonker (programmer at stefanjonker dot nl)
 * @date 13-08-2015
 *
 * Created: Thu 13-08-2015, 13:26:30 (:-0500)
 * Last modified: Fri 14-08-2015, 18:33:53 (-0500)
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
	private $createslug;
	private $insertplace;
	private $page;

	public function validatePlace() {
		$this->post = $this->input->post();
		$this->arrayValidationPlace['action']['new'] = "place";

		if(isset($this->post['latitude'])
		&& $this->post['latitude']) { 
			$this->arrayValidationPlace['latitude'] = $this->post['latitude']; 
		} else { 
			$this->arrayValidationPlace['latitude'] = ''; 
			$this->arrayValidationPlace['error']['latitude'] = 'Latitude is empty'; 
		}

		if(isset($this->post['longitude'])
		&& $this->post['longitude']) { 
			$this->arrayValidationPlace['longitude'] = $this->post['longitude']; 
		} else { 
			$this->arrayValidationPlace['longitude'] = ''; 
			$this->arrayValidationPlace['error']['longitude'] = 'Latitude is empty'; 
		}

		if(isset($this->post['name'])
		&& $this->post['name']) { 
			$this->arrayValidationPlace['name'] = $this->post['name']; 
		} else { 
			$this->arrayValidationPlace['name'] = ''; 
			$this->arrayValidationPlace['error']['name'] = 'Name is empty'; 
		}

		if(isset($this->post['street'])
		&& $this->post['street']) { 
			$this->arrayValidationPlace['street'] = $this->post['street']; 
		} else { 
			$this->arrayValidationPlace['street'] = ''; 
			$this->arrayValidationPlace['error']['street'] = 'Street is empty'; 
		}

		if(isset($this->post['type'])
		&& $this->post['type']) { 
			$this->arrayValidationPlace['type'] = $this->post['type']; 
		} else { 
			$this->arrayValidationPlace['type'] = ''; 
			$this->arrayValidationPlace['error']['type'] = 'Type is empty'; 
		}

		if(isset($this->post['option'])
		&& $this->post['option']) { 
			$this->arrayValidationPlace['option'] = $this->post['option']; 
		} else { 
			$this->arrayValidationPlace['option'] = ''; 
			$this->arrayValidationPlace['error']['option'] = 'Option is empty'; 
		}

		/*
		if(isset($this->post['email'])
		&& $this->post['email']) { 
			$this->arrayValidationPlace['email'] = $this->post['email']; 
		} else { 
			$this->arrayValidationPlace['email'] = ''; 
			$this->arrayValidationPlace['error']['email'] = 'Email is empty'; 
		}
		
		
		if(isset($this->post['primaryphone'])
		&& $this->post['primaryphone']) { 
			$this->arrayValidationPlace['primaryphone'] = $this->post['primaryphone']; 
		} else { 
			$this->arrayValidationPlace['primaryphone'] = ''; 
			$this->arrayValidationPlace['error']['primaryphone'] = 'Primary phone is empty'; 
		}

		if(isset($this->post['secondaryphone'])
		&& $this->post['secondaryphone']) { 
			$this->arrayValidationPlace['secondaryphone'] = $this->post['secondaryphone']; 
		} else { 
			$this->arrayValidationPlace['secondaryphone'] = ''; 
			$this->arrayValidationPlace['error']['secondaryphone'] = 'Secondary phone is empty'; 
		}

		if(isset($this->post['website'])
		&& $this->post['website']) { 
			$this->arrayValidationPlace['website'] = $this->post['website']; 
		} else { 
			$this->arrayValidationPlace['website'] = ''; 
			$this->arrayValidationPlace['error']['website'] = 'Website is empty'; 
		}

		if(isset($this->post['facebook'])
		&& $this->post['facebook']) { 
			$this->arrayValidationPlace['facebook'] = $this->post['facebook']; 
		} else { 
			$this->arrayValidationPlace['facebook'] = ''; 
			$this->arrayValidationPlace['error']['facebook'] = 'Facebook is empty'; 
		}
		*/

		if(isset($this->post['primaryopendaysfrom'])
		&& $this->post['primaryopendaysfrom']) { 
			$this->arrayValidationPlace['primaryopendaysfrom'] = $this->post['primaryopendaysfrom']; 
		} else { 
			$this->arrayValidationPlace['primaryopendaysfrom'] = 'ldlfkdjfl'; 
			$this->arrayValidationPlace['error']['primaryopendaysfrom'] = 'Primary open days from is empty'; 
		}

		if(isset($this->post['primaryopendaysuntil'])
		&& $this->post['primaryopendaysuntil']) { 
			$this->arrayValidationPlace['primaryopendaysuntil'] = $this->post['primaryopendaysuntil']; 
		} else { 
			$this->arrayValidationPlace['primaryopendaysuntil'] = ''; 
			$this->arrayValidationPlace['error']['primaryopendaysuntil'] = 'Primary open days until is empty'; 
		}

		if(isset($this->post['primaryopenhoursfrom'])
		&& $this->post['primaryopenhoursfrom']) { 
			$this->arrayValidationPlace['primaryopenhoursfrom'] = $this->post['primaryopenhoursfrom']; 
		} else { 
			$this->arrayValidationPlace['primaryopenhoursfrom'] = ''; 
			$this->arrayValidationPlace['error']['primaryopenhoursfrom'] = 'Primary open hours from is empty'; 
		}

		if(isset($this->post['primaryopenhoursuntil'])
		&& $this->post['primaryopenhoursuntil']) { 
			$this->arrayValidationPlace['primaryopenhoursuntil'] = $this->post['primaryopenhoursuntil']; 
		} else { 
			$this->arrayValidationPlace['primaryopenhoursuntil'] = ''; 
			$this->arrayValidationPlace['error']['primaryopenhoursuntil'] = 'Primary open hours until is empty'; 
		}

		if(isset($this->post['primaryopenminutesfrom'])
		&& $this->post['primaryopenminutesfrom']) { 
			$this->arrayValidationPlace['primaryopenminutesfrom'] = $this->post['primaryopenminutesfrom']; 
		} else { 
			$this->arrayValidationPlace['primaryopenminutesfrom'] = ''; 
			$this->arrayValidationPlace['error']['primaryopenminutesfrom'] = 'Primary open minutes from is empty'; 
		}

		if(isset($this->post['primaryopenminutesuntil'])
		&& $this->post['primaryopenminutesuntil']) { 
			$this->arrayValidationPlace['primaryopenminutesuntil'] = $this->post['primaryopenminutesuntil']; 
		} else { 
			$this->arrayValidationPlace['primaryopenminutesuntil'] = ''; 
			$this->arrayValidationPlace['error']['primaryopenminutesuntil'] = 'Primary open minutes until is empty'; 
		}

		/*
		if(isset($this->post['secondaryopendaysfrom'])
		&& $this->post['secondaryopendaysfrom']) { 
			$this->arrayValidationPlace['secondaryopendaysfrom'] = $this->post['secondaryopendaysfrom']; 
		} else { 
			$this->arrayValidationPlace['secondaryopendaysfrom'] = ''; 
			$this->arrayValidationPlace['error']['secondaryopendaysfrom'] = 'Secondary open days from is empty'; 
		}

		if(isset($this->post['secondaryopendaysuntil'])
		&& $this->post['secondaryopendaysuntil']) { 
			$this->arrayValidationPlace['secondaryopendaysuntil'] = $this->post['secondaryopendaysuntil']; 
		} else { 
			$this->arrayValidationPlace['secondaryopendaysuntil'] = ''; 
			$this->arrayValidationPlace['error']['secondaryopendaysuntil'] = 'Primary open days until is empty'; 
		}

		if(isset($this->post['secondaryopenhoursfrom'])
		&& $this->post['secondaryopenhoursfrom']) { 
			$this->arrayValidationPlace['secondaryopenhoursfrom'] = $this->post['secondaryopenhoursfrom']; 
		} else { 
			$this->arrayValidationPlace['secondaryopenhoursfrom'] = ''; 
			$this->arrayValidationPlace['error']['secondaryopenhoursfrom'] = 'Secondary open hours from is empty'; 
		}

		if(isset($this->post['secondaryopenhoursuntil'])
		&& $this->post['secondaryopenhoursuntil']) { 
			$this->arrayValidationPlace['secondaryopenhoursuntil'] = $this->post['secondaryopenhoursuntil']; 
		} else { 
			$this->arrayValidationPlace['secondaryopenhoursuntil'] = ''; 
			$this->arrayValidationPlace['error']['secondaryopenhoursuntil'] = 'Secondary open hours until is empty'; 
		}

		if(isset($this->post['secondaryopenminutesfrom'])
		&& $this->post['secondaryopenminutesfrom']) { 
			$this->arrayValidationPlace['secondaryopenminutesfrom'] = $this->post['secondaryopenminutesfrom']; 
		} else { 
			$this->arrayValidationPlace['secondaryopenminutesfrom'] = ''; 
			$this->arrayValidationPlace['error']['secondaryopenminutesfrom'] = 'Secondary open minutes from is empty'; 
		}

		if(isset($this->post['secondaryopenminutesuntil'])
		&& $this->post['secondaryopenminutesuntil']) { 
			$this->arrayValidationPlace['secondaryopenminutesuntil'] = $this->post['secondaryopenminutesuntil']; 
		} else { 
			$this->arrayValidationPlace['secondaryopenminutesuntil'] = ''; 
			$this->arrayValidationPlace['error']['secondaryopenminutesuntil'] = 'Secondary open minutes until is empty'; 
		}
		*/
		
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

		$this->createslug = strtolower($this->name);
   	$this->createslug = preg_replace('/[^[:alnum:]]/', ' ', $this->createslug);
   	$this->createslug = preg_replace('/[[:space:]]+/', "-", $this->createslug);
   	$this->slugplaces = trim($this->createslug, "-");

		$this->insertplace = "INSERT 
			INTO places (name, address, latitude, longitude, id_category, id_option, slug_places) 
			VALUES(
				".$this->db->escape($this->name)."
				, ".$this->db->escape($this->street)."
				, ".$this->db->escape($this->latitude)."
				, ".$this->db->escape($this->longitude)."
				, ".$this->db->escape($this->type)."
				, ".$this->db->escape($this->option)."
				, ".$this->db->escape($this->slugplaces)."
			)";

		$this->db->query($this->insertplace);	

		if($this->db->affected_rows()) {
			$this->page = base_url('view/place/' . $this->slugplaces);

			$this->session->set_flashdata('message', $this->name . ' has been added to the map.');
			redirect($this->page, 'location', 301);
		} else {
			$this->page = base_url('error');

			$this->session->set_flashdata('message', 'Error submitting to database');
			redirect($this->page, 'location', 301);
		}
	}
}
