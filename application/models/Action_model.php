<?php
/*
 * @file Action_model.php
 * @author Stefan Jonker (programmer at stefanjonker dot nl)
 * @date 13-08-2015
 *
 * Created: Thu 13-08-2015, 13:26:30 (:-0500)
 * Last modified: Fri 14-08-2015, 11:51:43 (-0500)
 */
?>
<?php
class Action_model extends CI_Model {
	private $arrayResult;

	function __autoload() {
		parent::__construct();
		$this->load->database();
	}

	public function validatePlace() {
		$post = $this->input->post();

		$arrayValidationPlace['action']['new'] = "place";

		if(isset($post['latitude'])
		&& $post['latitude']) { 
			$arrayValidationPlace['latitude'] = $post['latitude']; 
		} else { 
			$arrayValidationPlace['latitude'] = ''; 
			$arrayValidationPlace['error']['latitude'] = 'Latitude is empty'; 
		}

		if(isset($post['longitude'])
		&& $post['longitude']) { 
			$arrayValidationPlace['longitude'] = $post['longitude']; 
		} else { 
			$arrayValidationPlace['longitude'] = ''; 
			$arrayValidationPlace['error']['longitude'] = 'Latitude is empty'; 
		}

		if(isset($post['name'])
		&& $post['name']) { 
			$arrayValidationPlace['name'] = $post['name']; 
		} else { 
			$arrayValidationPlace['name'] = ''; 
			$arrayValidationPlace['error']['name'] = 'Name is empty'; 
		}

		if(isset($post['street'])
		&& $post['street']) { 
			$arrayValidationPlace['street'] = $post['street']; 
		} else { 
			$arrayValidationPlace['street'] = ''; 
			$arrayValidationPlace['error']['street'] = 'Street is empty'; 
		}

		if(isset($post['type'])
		&& $post['type']) { 
			$arrayValidationPlace['type'] = $post['type']; 
		} else { 
			$arrayValidationPlace['type'] = ''; 
			$arrayValidationPlace['error']['type'] = 'Type is empty'; 
		}

		if(isset($post['option'])
		&& $post['option']) { 
			$arrayValidationPlace['option'] = $post['option']; 
		} else { 
			$arrayValidationPlace['option'] = ''; 
			$arrayValidationPlace['error']['option'] = 'Option is empty'; 
		}

		/*
		if(isset($post['email'])
		&& $post['email']) { 
			$arrayValidationPlace['email'] = $post['email']; 
		} else { 
			$arrayValidationPlace['email'] = ''; 
			$arrayValidationPlace['error']['email'] = 'Email is empty'; 
		}
		
		
		if(isset($post['primaryphone'])
		&& $post['primaryphone']) { 
			$arrayValidationPlace['primaryphone'] = $post['primaryphone']; 
		} else { 
			$arrayValidationPlace['primaryphone'] = ''; 
			$arrayValidationPlace['error']['primaryphone'] = 'Primary phone is empty'; 
		}

		if(isset($post['secondaryphone'])
		&& $post['secondaryphone']) { 
			$arrayValidationPlace['secondaryphone'] = $post['secondaryphone']; 
		} else { 
			$arrayValidationPlace['secondaryphone'] = ''; 
			$arrayValidationPlace['error']['secondaryphone'] = 'Secondary phone is empty'; 
		}

		if(isset($post['website'])
		&& $post['website']) { 
			$arrayValidationPlace['website'] = $post['website']; 
		} else { 
			$arrayValidationPlace['website'] = ''; 
			$arrayValidationPlace['error']['website'] = 'Website is empty'; 
		}

		if(isset($post['facebook'])
		&& $post['facebook']) { 
			$arrayValidationPlace['facebook'] = $post['facebook']; 
		} else { 
			$arrayValidationPlace['facebook'] = ''; 
			$arrayValidationPlace['error']['facebook'] = 'Facebook is empty'; 
		}
		*/

		if(isset($post['primaryopendaysfrom'])
		&& $post['primaryopendaysfrom']) { 
			$arrayValidationPlace['primaryopendaysfrom'] = $post['primaryopendaysfrom']; 
		} else { 
			$arrayValidationPlace['primaryopendaysfrom'] = 'ldlfkdjfl'; 
			$arrayValidationPlace['error']['primaryopendaysfrom'] = 'Primary open days from is empty'; 
		}

		if(isset($post['primaryopendaysuntil'])
		&& $post['primaryopendaysuntil']) { 
			$arrayValidationPlace['primaryopendaysuntil'] = $post['primaryopendaysuntil']; 
		} else { 
			$arrayValidationPlace['primaryopendaysuntil'] = ''; 
			$arrayValidationPlace['error']['primaryopendaysuntil'] = 'Primary open days until is empty'; 
		}

		if(isset($post['primaryopenhoursfrom'])
		&& $post['primaryopenhoursfrom']) { 
			$arrayValidationPlace['primaryopenhoursfrom'] = $post['primaryopenhoursfrom']; 
		} else { 
			$arrayValidationPlace['primaryopenhoursfrom'] = ''; 
			$arrayValidationPlace['error']['primaryopenhoursfrom'] = 'Primary open hours from is empty'; 
		}

		if(isset($post['primaryopenhoursuntil'])
		&& $post['primaryopenhoursuntil']) { 
			$arrayValidationPlace['primaryopenhoursuntil'] = $post['primaryopenhoursuntil']; 
		} else { 
			$arrayValidationPlace['primaryopenhoursuntil'] = ''; 
			$arrayValidationPlace['error']['primaryopenhoursuntil'] = 'Primary open hours until is empty'; 
		}

		if(isset($post['primaryopenminutesfrom'])
		&& $post['primaryopenminutesfrom']) { 
			$arrayValidationPlace['primaryopenminutesfrom'] = $post['primaryopenminutesfrom']; 
		} else { 
			$arrayValidationPlace['primaryopenminutesfrom'] = ''; 
			$arrayValidationPlace['error']['primaryopenminutesfrom'] = 'Primary open minutes from is empty'; 
		}

		if(isset($post['primaryopenminutesuntil'])
		&& $post['primaryopenminutesuntil']) { 
			$arrayValidationPlace['primaryopenminutesuntil'] = $post['primaryopenminutesuntil']; 
		} else { 
			$arrayValidationPlace['primaryopenminutesuntil'] = ''; 
			$arrayValidationPlace['error']['primaryopenminutesuntil'] = 'Primary open minutes until is empty'; 
		}

		/*
		if(isset($post['secondaryopendaysfrom'])
		&& $post['secondaryopendaysfrom']) { 
			$arrayValidationPlace['secondaryopendaysfrom'] = $post['secondaryopendaysfrom']; 
		} else { 
			$arrayValidationPlace['secondaryopendaysfrom'] = ''; 
			$arrayValidationPlace['error']['secondaryopendaysfrom'] = 'Secondary open days from is empty'; 
		}

		if(isset($post['secondaryopendaysuntil'])
		&& $post['secondaryopendaysuntil']) { 
			$arrayValidationPlace['secondaryopendaysuntil'] = $post['secondaryopendaysuntil']; 
		} else { 
			$arrayValidationPlace['secondaryopendaysuntil'] = ''; 
			$arrayValidationPlace['error']['secondaryopendaysuntil'] = 'Primary open days until is empty'; 
		}

		if(isset($post['secondaryopenhoursfrom'])
		&& $post['secondaryopenhoursfrom']) { 
			$arrayValidationPlace['secondaryopenhoursfrom'] = $post['secondaryopenhoursfrom']; 
		} else { 
			$arrayValidationPlace['secondaryopenhoursfrom'] = ''; 
			$arrayValidationPlace['error']['secondaryopenhoursfrom'] = 'Secondary open hours from is empty'; 
		}

		if(isset($post['secondaryopenhoursuntil'])
		&& $post['secondaryopenhoursuntil']) { 
			$arrayValidationPlace['secondaryopenhoursuntil'] = $post['secondaryopenhoursuntil']; 
		} else { 
			$arrayValidationPlace['secondaryopenhoursuntil'] = ''; 
			$arrayValidationPlace['error']['secondaryopenhoursuntil'] = 'Secondary open hours until is empty'; 
		}

		if(isset($post['secondaryopenminutesfrom'])
		&& $post['secondaryopenminutesfrom']) { 
			$arrayValidationPlace['secondaryopenminutesfrom'] = $post['secondaryopenminutesfrom']; 
		} else { 
			$arrayValidationPlace['secondaryopenminutesfrom'] = ''; 
			$arrayValidationPlace['error']['secondaryopenminutesfrom'] = 'Secondary open minutes from is empty'; 
		}

		if(isset($post['secondaryopenminutesuntil'])
		&& $post['secondaryopenminutesuntil']) { 
			$arrayValidationPlace['secondaryopenminutesuntil'] = $post['secondaryopenminutesuntil']; 
		} else { 
			$arrayValidationPlace['secondaryopenminutesuntil'] = ''; 
			$arrayValidationPlace['error']['secondaryopenminutesuntil'] = 'Secondary open minutes until is empty'; 
		}
		*/
		
		return $arrayValidationPlace;
	}

	public function insertPlace() {
		$post = $this->input->post();

		$latitude = $post['latitude']; 
		$longitude = $post['longitude']; 
		$name = $post['name']; 
		$street = $post['street']; 
		$type = $post['type']; 
		$option = $post['option']; 

		$createslug = strtolower($name);
   	$createslug = preg_replace('/[^[:alnum:]]/', ' ', $createslug);
   	$createslug = preg_replace('/[[:space:]]+/', "-", $createslug);
   	$slugplaces = trim($createslug, "-");

		$insertplace = "INSERT 
			INTO places (name, address, latitude, longitude, id_category, id_option, slug_places) 
			VALUES(
				".$this->db->escape($name)."
				, ".$this->db->escape($street)."
				, ".$this->db->escape($latitude)."
				, ".$this->db->escape($longitude)."
				, ".$this->db->escape($type)."
				, ".$this->db->escape($option)."
				, ".$this->db->escape($slugplaces)."
			)";

		$this->db->query($insertplace);	

		if($this->db->affected_rows()) {
			$page = base_url('view/place/' . $slugplaces);

			$this->session->set_flashdata('message', $name . ' has been added to the map.');
			redirect($page, 'location', 301);
		} else {
			$page = base_url('error');

			$this->session->set_flashdata('message', 'Error submitting to database');
			redirect($page, 'location', 301);
		}
	}
}
