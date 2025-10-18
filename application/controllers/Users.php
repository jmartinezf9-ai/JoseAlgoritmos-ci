<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller {

    public function __construct() {
        parent::__construct();
        
        // CRÍTICO: Carga de modelos, helpers y librerías
        $this->load->model('user_model');
        $this->load->helper('form');
        $this->load->library('form_validation');

        // CRÍTICO: Restricción de acceso. Solo 'profesora' (administrador) puede acceder
        if ($this->session->userdata('role') !== 'profesora') {
            redirect('profile'); // Redirige a una página segura si no es admin
        }
    }

    // Muestra la lista de usuarios (index)
    public function index() {
        $user_id = $this->session->userdata('user_id');
        
        // Obtenemos todos los usuarios, excluyendo al usuario actual (el administrador)
        $data['users'] = $this->user_model->get_all_users($user_id);

        $this->load->view('templates/header', $data);
        $this->load->view('users/users_list_view', $data);
        $this->load->view('templates/footer');
    }

    // Vista del formulario para crear un nuevo usuario
    public function create() {
        $this->load->view('templates/header');
        $this->load->view('users/user_create_view');
        $this->load->view('templates/footer');
    }

    // Lógica para guardar un nuevo usuario en la DB
    public function store() {
        // 1. Reglas de Validación
        $this->form_validation->set_rules('name', 'Name', 'required|trim|max_length[100]');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]|max_length[100]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('repeat_password', 'Repeat password', 'required|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            // Falló: Vuelve a la vista de creación con errores
            $this->load->view('templates/header');
            $this->load->view('users/user_create_view');
            $this->load->view('templates/footer');
        } else {
            // Éxito: Guardar en DB
            $is_admin = $this->input->post('is_admin') ? TRUE : FALSE;
            
            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'active' => $this->input->post('active') ? 1 : 0,
                // Asigna rol 'profesora' si es admin, sino 'alumno'
                'role' => $is_admin ? 'profesora' : 'alumno', 
                'created_at' => date('Y-m-d H:i:s')
            );

            if ($this->user_model->create_user($data)) {
                $this->session->set_flashdata('success', 'Usuario creado exitosamente.');
                redirect('users');
            } else {
                $this->session->set_flashdata('error', 'Error al crear el usuario.');
                redirect('users/create');
            }
        }
    }
    
    // Vista para mostrar detalles de un usuario
    public function show($id) {
        $data['user'] = $this->user_model->get_user($id);
        
        $this->load->view('templates/header', $data);
        $this->load->view('users/user_show_view', $data);
        $this->load->view('templates/footer');
    }

    // Vista para el formulario de edición (placeholder)
    public function edit($id) {
        $data['user'] = $this->user_model->get_user($id);
        
        $this->load->view('templates/header', $data);
        $this->load->view('users/user_edit_view', $data); 
        $this->load->view('templates/footer');
    }
    
    // Lógica para eliminar un usuario (placeholder)
    public function delete($id) {
        if ($this->user_model->delete_user($id)) {
            $this->session->set_flashdata('success', 'Usuario eliminado correctamente.');
        } else {
            $this->session->set_flashdata('error', 'Error al intentar eliminar el usuario.');
        }
        redirect('users');
    }
}
