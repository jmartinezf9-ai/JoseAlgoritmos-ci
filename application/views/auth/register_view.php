<div class="form-container">
    <h2>Registro</h2>
    
    <?= validation_errors('<div class="alert-error">', '</div>'); ?>

    <?= form_open('auth/create_account') ?>
        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name" value="<?= set_value('name') ?>" required>
        
        <label for="email">Correo Electrónico:</label>
        <input type="email" name="email" id="email" value="<?= set_value('email') ?>" required>

        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password" required>

        <label for="repeat_password">Confirmar Contraseña:</label>
        <input type="password" name="repeat_password" id="repeat_password" required>

        <button type="submit">Registro</button>
    <?= form_close() ?>
    
    <div class="form-links">
        <a href="<?= site_url('auth/login') ?>">¿Ya tienes cuenta? Inicia Sesión</a>
    </div>
</div>
