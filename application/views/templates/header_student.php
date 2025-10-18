<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskApp | Consulta de Tareas</title>
    <style>
        /* Utiliza los mismos estilos que header.php para consistencia */
        body { font-family: 'Arial', sans-serif; margin: 0; padding: 0; background-color: #f0f2f5; color: #333; }
        .container { max-width: 900px; margin: 30px auto; padding: 30px; background: white; border-radius: 12px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); }
        header { background-color: #007bff; color: white; padding: 20px 0; text-align: center; margin-bottom: 20px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); }
        header a { color: white; text-decoration: none; margin: 0 15px; transition: color 0.3s; }
        header a:hover { color: #c7e0ff; }
        .nav { display: flex; justify-content: space-between; align-items: center; max-width: 900px; margin: 0 auto; padding: 0 20px; }
        .logout-btn { background: none; border: 1px solid white; padding: 8px 15px; cursor: pointer; color: white; border-radius: 6px; text-decoration: none; transition: background-color 0.3s, border-color 0.3s; }
        .logout-btn:hover { background-color: #0056b3; border-color: #0056b3; }
        h1 { font-size: 1.5em; margin: 0; }
        h2 { text-align: center; color: #1a1a1a; margin-bottom: 25px; border-bottom: 2px solid #eee; padding-bottom: 10px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background-color: #e9ecef; font-weight: 600; color: #495057; }
        tr:hover { background-color: #f5f5f5; }
        .completed { text-decoration: line-through; color: #888; }
    </style>
</head>
<body>
<header>
    <div class="nav">
        <h1>Consulta de Tareas de <?= $this->session->userdata('user_name') ?></h1>
        <a href="<?= site_url('auth/logout') ?>" class="logout-btn">Cerrar Sesión</a>
    </div>
</header>
<div class="container">
