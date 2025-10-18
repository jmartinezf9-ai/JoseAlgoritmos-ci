<div class="form-container" style="max-width: 550px;">
    <h2>Delete profile image</h2>
    
    <p style="text-align: center; font-size: 1.1em; color: #dc3545;">Are you sure?</p>
    
    <?= form_open('profile/delete_image') ?>
        <div style="display: flex; justify-content: flex-start; gap: 15px; margin-top: 25px;">
            <button type="submit" style="width: 150px; background-color: #5cb85c; margin-top: 0;">Save</button>
            <a href="<?= site_url('profile') ?>" class="actions delete" style="width: 150px; text-align: center; padding: 12px 0; background-color: #dc3545;">Cancel</a>
        </div>
    <?= form_close() ?>
</div>
