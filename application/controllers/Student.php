<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Task_model');
        $this->load->library('session');
        $this->load->helper('url');

        // Restringe el acceso si no ha iniciado sesión
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
        
        // Carga el nombre del usuario logueado en la sesión
        $user_id = $this->session->userdata('user_id');
        $user = $this->db->get_where('users', array('id' => $user_id))->row();
        if ($user && !$this->session->userdata('user_name')) {
            $this->session->set_userdata('user_name', $user->name);
        }
    }

    public function index() {
        $user_id = $this->session->userdata('user_id');
        $data['tasks'] = $this->Task_model->get_tasks($user_id);
        
        $this->load->view('templates/header_student'); 
        $this->load->view('tasks/student_view', $data); 
        $this->load->view('templates/footer'); 
    }
}
