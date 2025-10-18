<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Contraseña</title>
    <style>
        body { font-family: 'Arial', sans-serif; background-color: #f4f7f6; display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; }
        .container { background-color: white; padding: 35px; border-radius: 8px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); width: 100%; max-width: 400px; text-align: center; }
        h2 { color: #007bff; margin-bottom: 25px; border-bottom: 2px solid #007bff; padding-bottom: 10px; font-size: 1.8em; }
        label { display: block; text-align: left; margin-bottom: 5px; font-weight: bold; color: #555; }
        input[type="email"] { width: 100%; padding: 12px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 6px; box-sizing: border-box; }
        button { background-color: #ffc107; color: black; padding: 12px 20px; border: none; border-radius: 6px; cursor: pointer; width: 100%; font-size: 1em; transition: background-color 0.3s; }
        button:hover { background-color: #e0a800; }
        .login-link { margin-top: 20px; display: block; color: #007bff; text-decoration: none; }
        .login-link:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Recuperar Contraseña</h2>
        <p>Ingresa tu correo electrónico para recibir un enlace de recuperación.</p>

<?= form_open('auth/forgot_password') ?>
            <label for="email">Correo Electrónico:</label>
            <input type="email" name="email" id="email" required>

            <button type="submit">Enviar Enlace de Recuperación</button>
        <?= form_close() ?>
