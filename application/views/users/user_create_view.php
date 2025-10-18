<div class="card p-4 mx-auto" style="max-width: 600px; margin-top: 30px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
    <h2 class="text-primary border-bottom pb-2 mb-4">New User</h2>

    <?php if (validation_errors()): ?>
        <div class="alert alert-danger"><?= validation_errors() ?></div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
    <?php endif; ?>

    <?= form_open('users/store') ?>
        
        <label for="name">Name</label>
        <input type="text" id="name" name="name" value="<?= set_value('name') ?>" class="form-control" required>
        
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="<?= set_value('email') ?>" class="form-control" required>
        
        <label for="password">Password</label>
        <input type="password" id="password" name="password" class="form-control" required>
        
        <label for="repeat_password">Repeat password</label>
        <input type="password" id="repeat_password" name="repeat_password" class="form-control" required>
        
        <div class="form-check mt-3">
            <input type="checkbox" id="active" name="active" value="1" <?= set_checkbox('active', '1', TRUE) ?> class="form-check-input">
            <label class="form-check-label" for="active">Active</label>
        </div>
        
        <div class="form-check mt-2">
            <input type="checkbox" id="is_admin" name="is_admin" value="1" <?= set_checkbox('is_admin', '1') ?> class="form-check-input">
            <label class="form-check-label" for="is_admin">Administrator (Role: profesora)</label>
        </div>
        
        <button type="submit" class="btn btn-success mt-4">Send</button>
        <a href="<?= site_url('users') ?>" class="btn btn-secondary mt-4">Cancel</a>
    <?= form_close() ?>
</div>
