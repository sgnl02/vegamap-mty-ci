<?php
/*
 * @file action.php
 * @author Stefan Jonker (programmer at stefanjonker dot nl)
 * @date 05-08-2015
 *
 * Created: Wed 05-08-2015, 18:45:51 (:-0500)
 * Last modified: Fri 14-08-2015, 18:36:58 (-0500)
 */
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Action extends CI_Controller {
	protected $data;
	protected $menu;

	public function __construct() {
		parent::__construct();	

		$this->load->library('session');

		$this->load->model('Action_model');
		$this->load->model('View_model');
	}

	public function validateplace() {
		$this->menu['arrayMenuFoodType'] = $this->View_model->menuFoodType();
		$this->menu['arrayMenuDietType'] = $this->View_model->menuDietType();
		$this->menu['arrayMenuPlaces'] = $this->View_model->menuPlaces();
		$this->data['arrayResult'] = $this->View_model->place();
		$this->data['arrayValidationPlace'] = $this->Action_model->validatePlace();

		$this->load->view('header', $this->menu);
		$this->load->view('main-breadcrumb', $this->data);
		$this->load->view('addplace-map', $this->data);
		$this->load->view('addplace-sidemenu');
		$this->load->view('footer');
	}

	public function insertplace() {
		$this->data['arrayInsertPlace'] = $this->Action_model->insertPlace();
	}
}
