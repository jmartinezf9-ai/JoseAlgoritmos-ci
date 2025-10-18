<div class="form-container">
    <h2>Por favor, ingrese su contraseña para continuar</h2>
    
    <?php if ($this->session->flashdata('error')): ?>
        <div class="alert-error"><?= $this->session->flashdata('error') ?></div>
    <?php endif; ?>

    <?= form_open('profile/verify_password_check') ?>
        <label for="password">PASSWORD</label>
        <input type="password" id="password" name="password" required>
        
        <button type="submit" class="actions save"><?= $this->lang->line('action_send') ?></button>
        <a href="<?= site_url('profile') ?>" class="actions cancel"><?= $this->lang->line('action_cancel') ?></a>
    <?= form_close() ?>
</div>
