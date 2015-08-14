<?php
/*
 * @file view.php
 * @author Stefan Jonker (programmer at stefanjonker dot nl)
 * @date 05-08-2015
 *
 * Created: Wed 05-08-2015, 18:45:51 (:-0500)
 * Last modified: Thu 13-08-2015, 18:08:32 (-0500)
 */
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class View extends CI_Controller {

	public $data;

	public function __construct() {
		parent::__construct();	

		$this->load->library('session');
		$this->load->model('View_model');
	}

	public function main() {
		$menu['arrayMenuFoodType'] = $this->View_model->menuFoodType();
		$menu['arrayMenuDietType'] = $this->View_model->menuDietType();
		$menu['arrayMenuPlaces'] = $this->View_model->menuPlaces();
		$data['arrayResult'] = $this->View_model->main();

		$this->load->view('header', $menu);
		$this->load->view('main-breadcrumb', $data);
		$this->load->view('map', $data);
		$this->load->view('main-sidemenu');
		$this->load->view('footer');
	}

	public function error() {
		$menu['arrayMenuFoodType'] = $this->View_model->menuFoodType();
		$menu['arrayMenuDietType'] = $this->View_model->menuDietType();
		$menu['arrayMenuPlaces'] = $this->View_model->menuPlaces();
		$data['arrayResult'] = $this->View_model->main();

		$this->load->view('header', $menu);
		$this->load->view('main-breadcrumb', $data);
		$this->load->view('map', $data);
		$this->load->view('error-sidemenu');
		$this->load->view('footer');
	}

	public function addplace() {
		$menu['arrayMenuFoodType'] = $this->View_model->menuFoodType();
		$menu['arrayMenuDietType'] = $this->View_model->menuDietType();
		$menu['arrayMenuPlaces'] = $this->View_model->menuPlaces();
		$data['arrayResult'] = $this->View_model->main();

		$this->load->view('header', $menu);
		$this->load->view('main-breadcrumb', $data);
		$this->load->view('addplace-map');
		$this->load->view('addplace-sidemenu');
		$this->load->view('footer');
	}

	public function place() {
		$menu['arrayMenuFoodType'] = $this->View_model->menuFoodType();
		$menu['arrayMenuDietType'] = $this->View_model->menuDietType();
		$menu['arrayMenuPlaces'] = $this->View_model->menuPlaces();
		$data['arrayResult'] = $this->View_model->place();
		$this->load->library('session');

		$this->load->view('header', $menu);
		$this->load->view('place-breadcrumb', $data);
		$this->load->view('map', $data);
		$this->load->view('place-sidemenu');
		$this->load->view('footer');
	}
	
	public function option() {
		$menu['arrayMenuFoodType'] = $this->View_model->menuFoodType();
		$menu['arrayMenuDietType'] = $this->View_model->menuDietType();
		$menu['arrayMenuPlaces'] = $this->View_model->menuPlaces();
		$data['arrayResult'] = $this->View_model->option();

		$this->load->view('header', $menu);
		$this->load->view('option-breadcrumb', $data);
		$this->load->view('map', $data);
		$this->load->view('option-sidemenu');
		$this->load->view('footer');
	}

	public function type() {
		$menu['arrayMenuFoodType'] = $this->View_model->menuFoodType();
		$menu['arrayMenuDietType'] = $this->View_model->menuDietType();
		$menu['arrayMenuPlaces'] = $this->View_model->menuPlaces();
		$data['arrayResult'] = $this->View_model->type();

		$this->load->view('header', $menu);
		$this->load->view('type-breadcrumb', $data);
		$this->load->view('map', $data);
		$this->load->view('type-sidemenu');
		$this->load->view('footer');
	}
}
