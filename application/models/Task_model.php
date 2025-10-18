<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Task_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Obtiene todas las tareas (se asume que la Profesora ve todas las tareas)
    public function get_all_tasks() {
        // Ordena por fecha de creación, las más nuevas primero
        $this->db->order_by('created_at', 'DESC'); 
        return $this->db->get('tasks')->result();
    }

    // Obtiene una tarea por su ID
    public function get_task($id) {
        return $this->db->get_where('tasks', array('id' => $id))->row();
    }

    // Crea una nueva tarea
    public function create_task($data) {
        return $this->db->insert('tasks', $data);
    }
    
    // Actualiza una tarea existente
    public function update_task($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('tasks', $data);
    }
    
    // Elimina una tarea por su ID
    public function delete_task($id) {
        $this->db->where('id', $id);
        return $this->db->delete('tasks');
    }
}
