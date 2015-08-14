<?php
/*
 * @file action.php
 * @author Stefan Jonker (programmer at stefanjonker dot nl)
 * @date 05-08-2015
 *
 * Created: Wed 05-08-2015, 18:45:51 (:-0500)
 * Last modified: Thu 13-08-2015, 17:53:38 (-0500)
 */
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Action extends CI_Controller {

	public $data;

	public function __construct() {
		parent::__construct();	

		$this->load->library('session');

		$this->load->model('Action_model');
		$this->load->model('View_model');
	}

	public function validateplace() {
		$menu['arrayMenuFoodType'] = $this->View_model->menuFoodType();
		$menu['arrayMenuDietType'] = $this->View_model->menuDietType();
		$menu['arrayMenuPlaces'] = $this->View_model->menuPlaces();
		$data['arrayResult'] = $this->View_model->place();
		$data['arrayValidationPlace'] = $this->Action_model->validatePlace();

		$this->load->view('header', $menu);
		$this->load->view('main-breadcrumb', $data);
		$this->load->view('addplace-map', $data);
		$this->load->view('addplace-sidemenu');
		$this->load->view('footer');
	}

	public function insertplace() {
		$data['arrayInsertPlace'] = $this->Action_model->insertPlace();
	}
}
