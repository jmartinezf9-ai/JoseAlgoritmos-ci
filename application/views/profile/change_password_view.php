<div class="form-container" style="max-width: 500px;">
    <h2>Edit password</h2>
    
    <?php if ($this->session->flashdata('error')): ?>
        <div class="alert-error"><?= $this->session->flashdata('error') ?></div>
    <?php endif; ?>

    <?= form_open('profile/update_password') ?>
        
        <label for="current_password">Current Password</label>
        <input type="password" name="current_password" id="current_password" required style="border: 1px solid #a8cde5;">
        
        <label for="new_password">New password</label>
        <input type="password" name="new_password" id="new_password" required style="border: 1px solid #a8cde5;">

        <label for="repeat_new_password">Repeat new password</label>
        <input type="password" name="repeat_new_password" id="repeat_new_password" required style="border: 1px solid #a8cde5;">
        
        <div style="margin-top: 30px; display: flex; justify-content: flex-start; gap: 15px;">
            <button type="submit" style="width: 150px; background-color: #5cb85c; margin-top: 0;">Save</button>
            <a href="<?= site_url('profile') ?>" class="actions delete" style="width: 150px; text-align: center; padding: 12px 0; background-color: #dc3545;">Cancel</a>
        </div>
    <?= form_close() ?>
</div>
