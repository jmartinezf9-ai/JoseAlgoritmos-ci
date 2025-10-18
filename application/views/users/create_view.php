<div class="form-container" style="max-width: 550px;">
    <h2>New User</h2>
    
    <a href="<?= site_url('users') ?>" style="display: block; margin-bottom: 20px; color: #007bff; text-decoration: none;">&lt;&lt; back to Index</a>
    
    <?= validation_errors('<div class="alert-error">', '</div>'); ?>
    <?php if ($this->session->flashdata('error')): ?>
        <div class="alert-error"><?= $this->session->flashdata('error') ?></div>
    <?php endif; ?>

    <?= form_open('users/create') ?>
        
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="<?= set_value('name') ?>" required style="border: 1px solid #a8cde5;">
        
        <label for="email">email</label>
        <input type="email" name="email" id="email" value="<?= set_value('email') ?>" required style="border: 1px solid #a8cde5;">

        <label for="password">Password</label>
        <input type="password" name="password" id="password" required style="border: 1px solid #a8cde5;">

        <label for="repeat_password">Repeat password</label>
        <input type="password" name="repeat_password" id="repeat_password" required style="border: 1px solid #a8cde5;">

        <div style="margin-top: 15px; margin-bottom: 20px;">
            <input type="checkbox" id="active" name="active" value="1" <?= set_checkbox('active', '1', TRUE) ?>>
            <label for="active" style="display: inline; font-weight: normal;">Active</label>
        </div>
        
        <div style="margin-bottom: 25px;">
            <input type="checkbox" id="administrator" name="administrator" value="1" <?= set_checkbox('administrator', '1', FALSE) ?>>
            <label for="administrator" style="display: inline; font-weight: normal;">Administrator</label>
        </div>


        <div style="display: flex; justify-content: flex-start; gap: 15px; margin-top: 25px;">
            <button type="submit" style="width: 150px; background-color: #5cb85c; margin-top: 0;">Save</button>
            <a href="<?= site_url('users') ?>" class="actions delete" style="width: 150px; text-align: center; padding: 12px 0; background-color: #dc3545;">Cancel</a>
        </div>
    <?= form_close() ?>
</div>
