<div class="form-container">
    <h2>Iniciar Sesión</h2>
    
    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert-success"><?= $this->session->flashdata('success') ?></div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('error')): ?>
        <div class="alert-error"><?= $this->session->flashdata('error') ?></div>
    <?php endif; ?>
    <?= validation_errors('<div class="alert-error">', '</div>'); ?>

    <?= form_open('auth/verify_login') ?>
        <label for="email">Correo Electrónico:</label>
        <input type="email" name="email" id="email" value="<?= set_value('email') ?>" required>

        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password" required>

        <button type="submit">Iniciar Sesión</button>
    <?= form_close() ?>
    
    <div class="form-links">
        <label for="remember_me" style="display:inline; margin-right: 10px;">
            <input type="checkbox" name="remember_me" id="remember_me"> Remember me
        </label>
        <a href="<?= site_url('auth/forgot_password') ?>">Forgot password?</a>
        <a href="<?= site_url('auth/register') ?>">¿No tienes cuenta? Regístrate aquí</a>
    </div>
</div>
