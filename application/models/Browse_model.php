<?php
/*
 * @file Browse_model.php
 * @author Stefan Jonker (programmer at stefanjonker dot nl)
 * @date 06-08-2015
 *
 * Created: Thu 06-08-2015, 13:14:41 (:-0500)
 * Last modified: Thu 06-08-2015, 13:15:18 (-0500)
 */
?>
<?php
class browse_model extends CI_Model {
	function __autoload() {
		parent::__construct();
		$this->load->database();
	}
	public function getAllBooks() {
		return "ja";
	}
}
?>
