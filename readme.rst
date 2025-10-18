###################
What is CodeIgniter
###################

CodeIgniter is an Application Development Framework - a toolkit - for people
who build web sites using PHP. Its goal is to enable you to develop projects
much faster than you could if you were writing code from scratch, by providing
a rich set of libraries for commonly needed tasks, as well as a simple
interface and logical structure to access these libraries. CodeIgniter lets
you creatively focus on your project by minimizing the amount of code needed
for a given task.

*******************
Release Information
*******************

This repo contains in-development code for future releases. To download the
latest stable release please visit the `CodeIgniter Downloads
<https://codeigniter.com/download>`_ page.

**************************
Changelog and New Features
**************************

You can find a list of all changes for each release in the `user
guide change log <https://github.com/bcit-ci/CodeIgniter/blob/develop/user_guide_src/source/changelog.rst>`_.

*******************
Server Requirements
*******************

PHP version 5.6 or newer is recommended.

It should work on 5.3.7 as well, but we strongly advise you NOT to run
such old versions of PHP, because of potential security and performance
issues, as well as missing features.

************
Installation
************

Please see the `installation section <https://codeigniter.com/userguide3/installation/index.html>`_
of the CodeIgniter User Guide.

*******
License
*******

Please see the `license
agreement <https://github.com/bcit-ci/CodeIgniter/blob/develop/user_guide_src/source/license.rst>`_.

*********
Resources
*********

-  `User Guide <https://codeigniter.com/docs>`_
-  `Contributing Guide <https://github.com/bcit-ci/CodeIgniter/blob/develop/contributing.md>`_
-  `Language File Translations <https://github.com/bcit-ci/codeigniter3-translations>`_
-  `Community Forums <http://forum.codeigniter.com/>`_
-  `Community Wiki <https://github.com/bcit-ci/CodeIgniter/wiki>`_
-  `Community Slack Channel <https://codeigniterchat.slack.com>`_

Report security issues to our `Security Panel <mailto:security@codeigniter.com>`_
or via our `page on HackerOne <https://hackerone.com/codeigniter>`_, thank you.

***************
Acknowledgement
***************

The CodeIgniter team would like to thank EllisLab, all the
contributors to the CodeIgniter project and you, the CodeIgniter user.
--
-- SQL NECESARIO PARA LA CALIFICACIÓN
-- Base de datos: 'algoritmos'
--
-- 1. ESTRUCTURA DE LA TABLA users
--

CREATE TABLE users (
  id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(100) NOT NULL,
  email varchar(100) NOT NULL,
  password varchar(255) NOT NULL,
  role enum('profesora','alumno') NOT NULL DEFAULT 'alumno',
  active tinyint(1) NOT NULL DEFAULT 1,
  profile_image varchar(255) DEFAULT NULL,
  created_at datetime NOT NULL,
  updated_at datetime DEFAULT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY email (email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 2. INSERCIÓN DEL USUARIO ADMINISTRADOR (PROFESORA)
--

INSERT INTO users (id, name, email, password, role, active, created_at) VALUES
(1, 'Admin Profesora', 'admin@profesora.com', '$2y$10$T89/2RkMv3u/k4S5B/3Rj.zQv8/RkF8nQj0Q/0RkF8nQj0Q/0RkF8nQj0Q/0', 'profesora', 1, NOW());

-- CONTRASEÑA DEL ADMIN: 123456
