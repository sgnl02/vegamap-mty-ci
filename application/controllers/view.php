<?php
/*
 * @file view.php
 * @author Stefan Jonker (programmer at stefanjonker dot nl)
 * @date 05-08-2015
 *
 * Created: Wed 05-08-2015, 18:45:51 (:-0500)
 * Last modified: Thu 06-08-2015, 18:59:52 (-0500)
 */
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class view extends CI_Controller {

	public $data;

	public function main()
	{
		$this->load->model('View_model');
		$data['arrayResult'] = $this->View_model->main();
		$this->load->view('main', $data);
	}

	public function place()
	{
		$this->load->model('View_model');
		$data['arrayResult'] = $this->View_model->place();
		$this->load->view('place', $data);
	}
	
	public function option()
	{
		$this->load->model('View_model');
		$data['arrayResult'] = $this->View_model->option();
		$this->load->view('option', $data);
	}

	public function type()
	{
		$this->load->model('View_model');
		$data['arrayResult'] = $this->View_model->type();
		$this->load->view('type', $data);
	}
}
