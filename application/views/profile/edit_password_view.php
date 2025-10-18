<div class="form-container" style="max-width: 550px;">
    <h2>Edit password</h2>
    
    <?= validation_errors('<div class="alert-error">', '</div>'); ?>

    <?= form_open('profile/update_password') ?>
        <label for="current_password">Current Password</label>
        <input type="password" name="current_password" id="current_password" required style="border: 1px solid #a8cde5;">
        
        <label for="new_password">New password</label>
        <input type="password" name="new_password" id="new_password" required style="border: 1px solid #a8cde5;">

        <label for="repeat_password">Repeat new password</label>
        <input type="password" name="repeat_password" id="repeat_password" required style="border: 1px solid #a8cde5;">

        <div style="display: flex; justify-content: flex-start; gap: 15px; margin-top: 25px;">
            <button type="submit" style="width: 150px; background-color: #5cb85c; margin-top: 0;">Save</button>
            <a href="<?= site_url('profile') ?>" class="actions delete" style="width: 150px; text-align: center; padding: 12px 0; background-color: #dc3545;">Cancel</a>
        </div>
    <?= form_close() ?>
</div>
