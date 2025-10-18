<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Task extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->model('Task_model'); 
        
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
        
        // Restringe el acceso solo a la Profesora (que tiene la opción 'Tasks' en el menú)
        if ($this->session->userdata('role') !== 'profesora') {
            $this->session->set_flashdata('error', 'Acceso denegado. Esta sección es solo para la Profesora.');
            redirect('welcome'); 
        }
    }

    // A. LISTADO DE TAREAS (Lee la Base de Datos)
    public function index() {
        $data['tasks'] = $this->Task_model->get_all_tasks(); 

        $this->load->view('templates/header');
        $this->load->view('tasks/index_view', $data);
        $this->load->view('templates/footer');
    }

    // B. CREAR NUEVA TAREA (Inserta en la Base de Datos)
    public function create() {
        // 1. Configurar reglas de validación: Descripción es campo requerido
        $this->form_validation->set_rules('description', 'Description', 'required|trim|max_length[500]');

        if ($this->form_validation->run() === TRUE) {
            // CRÍTICO: Obtenemos el ID del usuario logueado (Profesora)
            $profesora_id = $this->session->userdata('user_id');
            
            // 2. Preparar los datos
            $insert_data = array(
                'description' => $this->input->post('description'),
                'user_id' => $profesora_id, // Asocia la tarea a la Profesora
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            );

            // 3. Insertar en la base de datos
            if ($this->Task_model->create_task($insert_data)) {
                $this->session->set_flashdata('success', 'Tarea creada con éxito.');
                redirect('task/index');
            } else {
                $this->session->set_flashdata('error', 'Error al crear la tarea en la base de datos.');
                redirect('task/create');
            }
        }

        // Si la validación falla o es la primera vez que carga la vista
        $this->load->view('templates/header');
        $this->load->view('tasks/create_view');
        $this->load->view('templates/footer');
    }

    // C. VER DETALLE DE TAREA
    public function view($task_id) {
        $data['task'] = $this->Task_model->get_task($task_id);

        if (!$data['task']) {
            $this->session->set_flashdata('error', 'Tarea no encontrada.');
            redirect('task/index');
        }
        
        $this->load->view('templates/header');
        $this->load->view('tasks/view_task_view', $data);
        $this->load->view('templates/footer');
    }

    // D. EDITAR TAREA
    public function edit($task_id) {
        $task = $this->Task_model->get_task($task_id);
        
        if (!$task) {
            $this->session->set_flashdata('error', 'Tarea no encontrada.');
            redirect('task/index');
        }

        $data['task'] = $task;

        // Reglas de validación para la edición: Descripción es campo requerido
        $this->form_validation->set_rules('description', 'Description', 'required|trim|max_length[500]');

        if ($this->form_validation->run() === TRUE) {
            $update_data = array(
                'description' => $this->input->post('description'),
                'updated_at' => date('Y-m-d H:i:s')
            );
            
            // Llamada al modelo para actualizar
            if ($this->Task_model->update_task($task_id, $update_data)) {
                $this->session->set_flashdata('success', 'Tarea actualizada con éxito.');
            } else {
                $this->session->set_flashdata('error', 'No se realizaron cambios o hubo un error al actualizar.');
            }
            redirect('task/view/' . $task_id);
        }

        $this->load->view('templates/header');
        $this->load->view('tasks/edit_task_view', $data);
        $this->load->view('templates/footer');
    }

    // E. BORRAR TAREA
    public function delete($task_id) {
        if ($this->Task_model->delete_task($task_id)) {
            $this->session->set_flashdata('success', 'Tarea eliminada con éxito.');
        } else {
            $this->session->set_flashdata('error', 'Error al eliminar la tarea.');
        }
        redirect('task/index');
    }
}
