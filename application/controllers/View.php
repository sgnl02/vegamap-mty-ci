<?php
/*
 * @file view.php
 * @author Stefan Jonker (programmer at stefanjonker dot nl)
 * @date 05-08-2015
 *
 * Created: Wed 05-08-2015, 18:45:51 (:-0500)
 * Last modified: Fri 14-08-2015, 18:36:25 (-0500)
 */
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class View extends CI_Controller {
	private $data;
	private $menu;

	public function __construct() {
		parent::__construct();	

		$this->load->library('session');
		$this->load->model('View_model');
	}

	public function main() {
		$this->menu['arrayMenuFoodType'] = $this->View_model->menuFoodType();
		$this->menu['arrayMenuDietType'] = $this->View_model->menuDietType();
		$this->menu['arrayMenuPlaces'] = $this->View_model->menuPlaces();
		$this->data['arrayResult'] = $this->View_model->main();

		$this->load->view('header', $this->menu);
		$this->load->view('main-breadcrumb', $this->data);
		$this->load->view('map', $this->data);
		$this->load->view('main-sidemenu');
		$this->load->view('footer');
	}

	public function error() {
		$this->menu['arrayMenuFoodType'] = $this->View_model->menuFoodType();
		$this->menu['arrayMenuDietType'] = $this->View_model->menuDietType();
		$this->menu['arrayMenuPlaces'] = $this->View_model->menuPlaces();
		$this->data['arrayResult'] = $this->View_model->main();

		$this->load->view('header', $this->menu);
		$this->load->view('main-breadcrumb', $this->data);
		$this->load->view('map', $this->data);
		$this->load->view('error-sidemenu');
		$this->load->view('footer');
	}

	public function addplace() {
		$this->menu['arrayMenuFoodType'] = $this->View_model->menuFoodType();
		$this->menu['arrayMenuDietType'] = $this->View_model->menuDietType();
		$this->menu['arrayMenuPlaces'] = $this->View_model->menuPlaces();
		$this->data['arrayResult'] = $this->View_model->main();

		$this->load->view('header', $this->menu);
		$this->load->view('main-breadcrumb', $this->data);
		$this->load->view('addplace-map');
		$this->load->view('addplace-sidemenu');
		$this->load->view('footer');
	}

	public function place() {
		$this->menu['arrayMenuFoodType'] = $this->View_model->menuFoodType();
		$this->menu['arrayMenuDietType'] = $this->View_model->menuDietType();
		$this->menu['arrayMenuPlaces'] = $this->View_model->menuPlaces();
		$this->data['arrayResult'] = $this->View_model->place();
		$this->load->library('session');

		$this->load->view('header', $this->menu);
		$this->load->view('place-breadcrumb', $this->data);
		$this->load->view('map', $this->data);
		$this->load->view('place-sidemenu');
		$this->load->view('footer');
	}
	
	public function option() {
		$this->menu['arrayMenuFoodType'] = $this->View_model->menuFoodType();
		$this->menu['arrayMenuDietType'] = $this->View_model->menuDietType();
		$this->menu['arrayMenuPlaces'] = $this->View_model->menuPlaces();
		$this->data['arrayResult'] = $this->View_model->option();

		$this->load->view('header', $this->menu);
		$this->load->view('option-breadcrumb', $this->data);
		$this->load->view('map', $this->data);
		$this->load->view('option-sidemenu');
		$this->load->view('footer');
	}

	public function type() {
		$this->menu['arrayMenuFoodType'] = $this->View_model->menuFoodType();
		$this->menu['arrayMenuDietType'] = $this->View_model->menuDietType();
		$this->menu['arrayMenuPlaces'] = $this->View_model->menuPlaces();
		$this->data['arrayResult'] = $this->View_model->type();

		$this->load->view('header', $this->menu);
		$this->load->view('type-breadcrumb', $this->data);
		$this->load->view('map', $this->data);
		$this->load->view('type-sidemenu');
		$this->load->view('footer');
	}
}
