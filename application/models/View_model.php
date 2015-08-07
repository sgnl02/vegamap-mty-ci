<?php
/*
 * @file View_model.php
 * @author Stefan Jonker (programmer at stefanjonker dot nl)
 * @date 06-08-2015
 *
 * Created: Thu 06-08-2015, 12:58:47 (:-0500)
 * Last modified: Thu 06-08-2015, 19:15:07 (-0500)
 */
?>
<?php
class View_model extends CI_Model {
	private $arrayResult;

	function __autoload() {
		parent::__construct();
		$this->load->database();
	}

	public function main() {
		/* If there is a result, get id from result and match it
		 * to get a full joined query
		 */
			$this->db->select(array('name', 'latitude', 'longitude', 'address', 'category', 'option', 'icon_categories', 'icon_options', 'slug_places'));
			$this->db->from('places');
			$this->db->join('categories', 'categories.id_categories = places.id_category', 'inner');
			$this->db->join('options', 'options.id_options = places.id_option', 'inner');
			$this->db->order_by("name", "asc");

			return $this->db->get()->result_array();
	}

	public function place() {
		/* Try to match the title and return results */

		$this->db->select('id_places', 'slug_places');
		$this->db->from('places');
		$this->db->like('slug_places', $this->db->escape_like_str($this->uri->segment(3)));

		$this->arrayResult = $this->db->get()->result_array();

		/* If there is a result, get id from result and match it
		 * to get a full joined query
		 */
		if($this->arrayResult) {
			$this->db->select(array('name', 'latitude', 'longitude', 'address', 'category', 'option', 'icon_categories', 'icon_options', 'slug_places'));
			$this->db->from('places');
			$this->db->join('categories', 'categories.id_categories = places.id_category', 'inner');
			$this->db->join('options', 'options.id_options = places.id_option', 'inner');

			return $this->db->get()->result_array();
		} else {
			return FALSE;
		}
	}

	public function option() {
		/* Try to match the title and return results */

		$this->db->select('id_options', 'slug_options');
		$this->db->from('options');
		$this->db->like('slug_options', $this->db->escape_like_str($this->uri->segment(3)));
		$this->db->order_by("slug_options", "asc");

		$this->arrayResult = $this->db->get()->result_array();

		/* If there is a result, get id from result and match it
		 * to get a full joined query
		 */
		if($this->arrayResult) {
			$this->db->select(array('name', 'latitude', 'longitude', 'address', 'category', 'option', 'icon_categories', 'icon_options', 'slug_options'));
			$this->db->from('places');
			$this->db->where('id_option', $this->db->escape_like_str($this->arrayResult[0]['id_options']));
			$this->db->join('categories', 'categories.id_categories = places.id_category', 'inner');
			$this->db->join('options', 'options.id_options = places.id_option', 'inner');

			return $this->db->get()->result_array();
		} else {
			return FALSE;
		}
	}

	public function type() {
		/* Try to match the title and return results */

		$this->db->select('id_categories', 'slug_categories');
		$this->db->from('categories');
		$this->db->like('slug_categories', $this->db->escape_like_str($this->uri->segment(3)));
		$this->db->order_by("category", "asc");

		$this->arrayResult = $this->db->get()->result_array();

		/* If there is a result, get id from result and match it
		 * to get a full joined query
		 */
		if($this->arrayResult) {
			$this->db->select(array('name', 'latitude', 'longitude', 'address', 'category', 'option', 'icon_categories', 'icon_options', 'slug_categories'));
			$this->db->from('places');
			$this->db->where('id_category', $this->db->escape_like_str($this->arrayResult[0]['id_categories']));
			$this->db->join('categories', 'categories.id_categories = places.id_category', 'inner');
			$this->db->join('options', 'options.id_options = places.id_option', 'inner');

			return $this->db->get()->result_array();
		} else {
			return FALSE;
		}
	}
}
?>
