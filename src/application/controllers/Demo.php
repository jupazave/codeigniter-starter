<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Demo extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data['random'] = array(rand(1, 100), rand(1, 100), rand(1, 100), rand(1, 100));
		for($i = 0; $i < count($data['random']); $i++) {
			$data['links'][$i] = '/demo/add/'.$data['random'][$i];
		}

		$this->layouts->set_title('Demo');
		$this->layouts->set_metainformations(array(
			array('name' => 'description', 'content' => 'Hello World')
		));
		$this->layouts->view('default', array('content' => 'demo/index'), $data);
	}

	public function add($number = 'default')
	{
		$data['num'] = $number;

		$this->layouts->set_title('Demo - Argument '.$number);
		$this->layouts->set_metainformations(array(
			array('name' => 'description', 'content' => 'Hello World')
		));
		$this->layouts->view('default', array('content' => 'demo/add'), $data);
	}
}
