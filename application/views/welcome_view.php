<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskApp | Bienvenido</title>
    <style>
        body { font-family: 'Arial', sans-serif; background-color: #f4f7f6; display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; text-align: center; }
        .welcome-container { background-color: white; padding: 40px 60px; border-radius: 12px; box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15); max-width: 600px; width: 100%; }
        h1 { color: #007bff; font-size: 2.5em; margin-bottom: 10px; }
        p { color: #555; font-size: 1.1em; margin-bottom: 30px; }
        .nav-links a { 
            background-color: #28a745; /* Green */
            color: white; 
            padding: 12px 25px; 
            text-decoration: none; 
            border-radius: 8px; 
            font-size: 1.1em;
            margin: 0 10px;
            transition: background-color 0.3s;
        }
        .nav-links a:hover {
            background-color: #218838;
        }
        .lang-selector { margin-top: 30px; }
        .lang-selector button {
            background: none;
            border: 1px solid #ccc;
            padding: 5px 10px;
            margin: 0 5px;
            cursor: pointer;
            border-radius: 5px;
            color: #333;
            transition: background-color 0.3s;
        }
        .lang-selector button:hover {
            background-color: #e9ecef;
        }
        .lang-selector .active {
            background-color: #007bff;
            color: white;
            border-color: #007bff;
        }
    </style>
</head>
<body>
    <div class="welcome-container">
        <h1>TaskApp: Sistema Organizador de Tareas</h1>
        <p>¡Bienvenido/a al sistema diseñado para la gestión y organización de las tareas académicas.</p>
        
        <div class="nav-links">
            <a href="<?= site_url('auth/login') ?>">Iniciar Sesión</a>
            <a href="<?= site_url('auth/register') ?>" style="background-color: #007bff;">Regístrate</a>
        </div>

        <div class="lang-selector">
            <button class="active">Español</button>
            <button>English</button>
        </div>
    </div>
</body>
</html>
