<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lang extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
    }

    // Método para cambiar el idioma y redirigir a la página anterior
    public function switch_language($language = "") {
        // Valida que el idioma solicitado sea válido
        if ($language === "english" || $language === "spanish") {
            // Guarda la selección en la sesión
            $this->session->set_userdata('language', $language);
        }
        
        // Redirige al usuario de vuelta a la página anterior
        $referrer = $this->input->server('HTTP_REFERER');
        if ($referrer) {
            redirect($referrer);
        } else {
            // Si no hay página anterior, redirige al inicio
            redirect(base_url()); 
        }
    }
}
