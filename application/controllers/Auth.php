<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function register() {
        $this->load->view('templates/header');
        $this->load->view('auth/register_view');
        $this->load->view('templates/footer');
    }

    public function create_account() {
        $this->form_validation->set_rules('name', 'Nombre', 'required');
        $this->form_validation->set_rules('email', 'Correo Electrónico', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Contraseña', 'required|min_length[6]');
        $this->form_validation->set_rules('repeat_password', 'Repetir Contraseña', 'required|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('auth/register_view');
            $this->load->view('templates/footer');
        } else {
            // 1. Preparar datos del usuario
            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role' => 'profesora' 
            );

            // Si ya hay usuarios, el nuevo es estudiante
            if ($this->db->count_all('users') > 0) {
                $data['role'] = 'estudiante';
            }

            // 2. Insertar usuario en la base de datos
            $this->db->insert('users', $data);
            $user_name = $this->input->post('name');
            $user_email = $this->input->post('email');

            // 3. ENVIAR CORREO DE CONFIRMACIÓN (SIMULADO)
            // (Requiere la configuración en email.php)
            $this->load->library('email');
            $this->email->from('TU_CORREO_DE_GMAIL@gmail.com', 'TaskApp - Administrador'); 
            $this->email->to($user_email);
            $this->email->subject('Activación de Cuenta - TaskApp UMG');

            $message = "Hola {$user_name},\n\n";
            $message .= "¡Gracias por registrarte en TaskApp! Para activar tu cuenta, haz clic en el siguiente enlace:\n\n";
            $message .= site_url('auth/activate'); 
            $message .= "\n\nSi tienes problemas, contacta a soporte.\n";
            
            $this->email->message($message);

            if ($this->email->send()) {
                $this->session->set_flashdata('success', '¡Cuenta creada con éxito! Se ha enviado un correo de activación a '.$user_email.'.');
            } else {
                $this->session->set_flashdata('success', '¡Cuenta creada con éxito! (Error al enviar correo: Revisa tus credenciales SMTP).');
            }

            // 4. Redirigir al login
            redirect('auth/login');
        }
    }

    public function login() {
        if ($this->session->userdata('logged_in')) {
            if ($this->session->userdata('role') == 'profesora') {
                redirect('task/index');
            } else {
                redirect('welcome');
            }
        }
        $this->load->view('templates/header');
        $this->load->view('auth/login_view');
        $this->load->view('templates/footer');
    }

    public function verify_login() {
        $this->form_validation->set_rules('email', 'Correo Electrónico', 'required');
        $this->form_validation->set_rules('password', 'Contraseña', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('auth/login_view');
            $this->load->view('templates/footer');
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $user = $this->db->get_where('users', array('email' => $email))->row();

            if ($user && password_verify($password, $user->password)) {
                $session_data = array(
                    'user_id' => $user->id,
                    'user_name' => $user->name,
                    'role' => $user->role,
                    'logged_in' => TRUE
                );
                $this->session->set_userdata($session_data);
                
                // MENSAJE DE BIENVENIDA (REQUERIMIENTO)
                $this->session->set_flashdata('welcome_message', '¡Bienvenido(a) de nuevo, ' . $user->name . '! Sesión iniciada con éxito.');

                if ($user->role == 'profesora') {
                    redirect('task/index');
                } else {
                    redirect('welcome');
                }

            } else {
                $this->session->set_flashdata('error', 'Correo o contraseña incorrectos.');
                redirect('auth/login');
            }
        }
    }

    public function logout() {
        // MENSAJE DE CIERRE DE SESIÓN (REQUERIMIENTO)
        $this->session->set_flashdata('welcome_message', 'Has cerrado la sesión de forma segura.');
        $this->session->unset_userdata('logged_in');
        $this->session->sess_destroy();
        redirect('auth/login');
    }

    public function forgot_password() {
        if ($this->input->post('email')) {
             $this->session->set_flashdata('success', 'Se han enviado las instrucciones de restablecimiento a tu correo electrónico (simulado).');
             redirect('auth/login');
             return;
        }
        $this->load->view('templates/header');
        $this->load->view('auth/forgot_password_view');
        $this->load->view('templates/footer');
    }

    public function reset_password($token = null) {
        $this->load->view('templates/header');
        $this->load->view('auth/reset_password_view');
        $this->load->view('templates/footer');
    }
}
