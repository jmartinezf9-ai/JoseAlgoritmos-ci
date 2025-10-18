<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends MY_Controller {

    public function __construct() {
        parent::__construct();
        
        // CRÍTICO: Carga del modelo para solucionar el error "Call to a member function... on null"
        $this->load->model('user_model');
        
        $this->load->helper('form');
        $this->load->library('form_validation');

        // Redirigir si no ha iniciado sesión
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
    }

    // Muestra la vista principal del perfil
    public function index() {
        $user_id = $this->session->userdata('user_id');
        $data['user'] = $this->user_model->get_user($user_id);

        $this->load->view('templates/header', $data);
        $this->load->view('profile/profile_view', $data);
        $this->load->view('templates/footer');
    }

    // Vista del formulario de subida de imagen
    public function image()
    {
        $this->load->view('templates/header');
        $this->load->view('profile/image_upload_view');
        $this->load->view('templates/footer');
    }

    // Lógica para procesar la subida de imagen
    public function do_upload()
    {
        // 1. Configuración de la subida
        // ¡ADVERTENCIA! Asegúrate de que ./uploads/profiles/ exista y tenga permisos (chmod 777)
        $config['upload_path']   = './uploads/profiles/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']      = 2048; // 2MB
        $config['max_width']     = 1024;
        $config['max_height']    = 1024;
        $config['file_name']     = 'profile_' . $this->session->userdata('user_id') . '_' . time();

        $this->load->library('upload', $config);
        
        // 2. Ejecutar subida
        if ( ! $this->upload->do_upload('userfile'))
        {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('templates/header');
            $this->load->view('profile/image_upload_view', $error);
            $this->load->view('templates/footer');
        }
        else
        {
            // 3. Subida exitosa: Guardar ruta en DB
            $upload_data = $this->upload->data();
            $file_path = 'uploads/profiles/' . $upload_data['file_name'];
            $user_id = $this->session->userdata('user_id');

            // Antes de guardar la nueva, borramos la vieja si existe
            $this->_delete_old_image($user_id);
            
            // Guardamos la nueva ruta
            $this->user_model->update_profile_image($user_id, $file_path);

            $this->session->set_flashdata('success', '¡Imagen de perfil actualizada con éxito!');
            redirect('profile');
        }
    }
    
    // Elimina la imagen de perfil
    public function delete_image()
    {
        $user_id = $this->session->userdata('user_id');
        
        $this->_delete_old_image($user_id); // Elimina el archivo físico si existe
        $this->user_model->delete_profile_image($user_id); // Establece la ruta en DB como NULL
        
        $this->session->set_flashdata('success', 'Imagen de perfil eliminada.');
        redirect('profile');
    }

    // Función auxiliar para eliminar el archivo físico
    private function _delete_old_image($user_id)
    {
        $user = $this->user_model->get_user($user_id);
        
        if (isset($user->profile_image) && $user->profile_image) {
             // Aseguramos que la ruta es local antes de intentar borrar
            $full_path = FCPATH . $user->profile_image;

            if (file_exists($full_path)) {
                @unlink($full_path);
            }
        }
    }
}
