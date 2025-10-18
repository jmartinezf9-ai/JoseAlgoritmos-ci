<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
|  AUTO-LOADER
| -------------------------------------------------------------------
| This file specifies which systems should be loaded by default.
|
| In order to keep the system as light-weight as possible only the
| absolute minimal resources are loaded by default.
|
| You may specify autoloading of system libraries, helper files, custom
| config files and languages below.  Also, you can include your own
| libraries, helpers, config files and language files by adding their
| paths to the loader config file.
|
| E.g.
|  $autoload['libraries'] = array('database', 'session');
|
| The file is stored in:
|   application/config/autoload.php
|
*/

/*
| -------------------------------------------------------------------
|  Auto-load packages
| -------------------------------------------------------------------
| Prototype:
|   $autoload['packages'] = array(APPPATH.'third_party', '/usr/local/shared');
*/
$autoload['packages'] = array();


/*
| -------------------------------------------------------------------
|  Auto-load libraries
| -------------------------------------------------------------------
| These are the classes located in system/libraries/ or your application/libraries/
| Be sure to capitalize the class name correctly.
|
*/
// CÁMBIALO a esto para que funcione la base de datos, sesión y validación:
$autoload['libraries'] = array('database', 'session', 'form_validation');


/*
| -------------------------------------------------------------------
|  Auto-load drivers
| -------------------------------------------------------------------
| These groups are located in system/libraries/drivers/ or application/libraries/drivers/
|
| Prototype:
|   $autoload['drivers'] = array('cache');
*/
$autoload['drivers'] = array();


/*
| -------------------------------------------------------------------
|  Auto-load helper files
| -------------------------------------------------------------------
| Prototype:
|   $autoload['helper'] = array('url');
*/
// CÁMBIALO a esto para usar 'site_url' y 'form_open':
$autoload['helper'] = array('url', 'form');


/*
| -------------------------------------------------------------------
|  Auto-load config files
| -------------------------------------------------------------------
| Prototype:
|   $autoload['config'] = array('config1', 'config2');
|
| NOTE: These are loaded after any custom config files are loaded.
*/
$autoload['config'] = array();


/*
| -------------------------------------------------------------------
|  Auto-load language files
| -------------------------------------------------------------------
| Prototype:
|   $autoload['language'] = array('lang1', 'lang2');
*/
$autoload['language'] = array();


/*
| -------------------------------------------------------------------
|  Auto-load models
| -------------------------------------------------------------------
| Prototype:
|   $autoload['model'] = array('model1', 'model2');
*/
$autoload['model'] = array();
