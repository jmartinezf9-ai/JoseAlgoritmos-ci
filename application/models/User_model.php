<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_user($id) {
        return $this->db->get_where('users', array('id' => $id))->row();
    }

    public function get_user_by_email($email) {
        return $this->db->get_where('users', array('email' => $email))->row();
    }
    
    public function get_all_users($exclude_id) {
        $this->db->where('id !=', $exclude_id);
        $this->db->order_by('created_at', 'DESC'); 
        return $this->db->get('users')->result();
    }

    // ... (otras funciones como create_user, update_user, delete_user, etc.)

    // Métodos para el módulo Profile
    public function update_profile($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('users', $data);
    }
    
    public function update_password($id, $new_password_hash) {
        $data = array(
            'password' => $new_password_hash
        );
        $this->db->where('id', $id);
        return $this->db->update('users', $data);
    }

    // Métodos de la imagen de perfil (Añadidos recientemente)
    public function update_profile_image($id, $path) {
        $data = array(
            'profile_image' => $path,
            'updated_at' => date('Y-m-d H:i:s')
        );
        $this->db->where('id', $id);
        return $this->db->update('users', $data);
    }
    
    public function delete_profile_image($id) {
        $data = array(
            'profile_image' => NULL,
            'updated_at' => date('Y-m-d H:i:s')
        );
        $this->db->where('id', $id);
        return $this->db->update('users', $data);
    }
} // La llave de cierre CRÍTICA
