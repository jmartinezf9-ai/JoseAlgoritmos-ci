<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['protocol'] = 'smtp';
$config['smtp_host'] = 'ssl://smtp.gmail.com';  // Importante: usar 'ssl://' o 'tls://'
$config['smtp_port'] = 465;                     // Puerto para SSL
$config['smtp_user'] = 'TU_CORREO_DE_GMAIL@gmail.com'; //  <<< REEMPLAZA ESTO
$config['smtp_pass'] = 'TU_APP_PASSWORD_O_CLAVE';      //  <<< REEMPLAZA ESTO
$config['smtp_crypto'] = 'ssl';                 // Tipo de encriptación
$config['mailtype'] = 'html';                   // Formato del correo
$config['charset'] = 'utf-8';
$config['newline'] = "\r\n";
$config['wordwrap'] = TRUE;
