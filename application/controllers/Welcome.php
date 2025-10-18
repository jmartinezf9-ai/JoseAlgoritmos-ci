<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
    }

	public function index()
	{
        // Si no está logueado, redirige al login.
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
            return;
        }
        
		$this->load->view('welcome_message');
	}
}
