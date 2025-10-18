<div class="form-container">
    <h2>Editar Perfil</h2>
    
    <?php if (validation_errors()): ?>
        <div class="alert-error"><?= validation_errors() ?></div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('error')): ?>
        <div class="alert-error"><?= $this->session->flashdata('error') ?></div>
    <?php endif; ?>

    <?= form_open('profile/update_profile') ?>
        
        <label for="name"><?= $this->lang->line('users_name') ?></label>
        <input type="text" id="name" name="name" value="<?= html_escape(set_value('name', $user->name)) ?>" required>
        
        <label for="email"><?= $this->lang->line('users_email') ?></label>
        <input type="email" id="email" name="email" value="<?= html_escape(set_value('email', $user->email)) ?>" required>
        
        <button type="submit" class="actions save"><?= $this->lang->line('action_save') ?></button>
        <a href="<?= site_url('profile') ?>" class="actions cancel"><?= $this->lang->line('action_cancel') ?></a>
    <?= form_close() ?>
</div>
