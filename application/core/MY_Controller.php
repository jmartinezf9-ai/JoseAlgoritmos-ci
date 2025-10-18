<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        // CRÍTICO: Carga el idioma al inicio de cada petición
        $language = $this->session->userdata('language');

        if (!$language) {
            // Si no hay idioma en sesión, establece 'spanish' por defecto
            $language = 'spanish';
            $this->session->set_userdata('language', $language);
        }

        // Carga la configuración de idioma global
        $this->config->set_item('language', $language);
        $this->lang->load('app', $language); // Carga el archivo app_lang.php
    }
}
