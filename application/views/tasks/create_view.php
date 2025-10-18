<div class="form-container" style="max-width: 550px;">
    <h2>New Task</h2>
    
    <?= validation_errors('<div class="alert-error">', '</div>'); ?>
    <?php if ($this->session->flashdata('error')): ?>
        <div class="alert-error"><?= $this->session->flashdata('error') ?></div>
    <?php endif; ?>

    <?= form_open('task/create') ?>
        
        <label for="description">Description</label>
        <textarea name="description" id="description" rows="4" required style="border: 1px solid #a8cde5; padding: 10px; width: 100%; box-sizing: border-box;"><?= set_value('description') ?></textarea>
        
        <div style="display: flex; justify-content: flex-start; gap: 15px; margin-top: 25px;">
            <button type="submit" style="width: 150px; background-color: #5cb85c; margin-top: 0;">Send</button>
            <a href="<?= site_url('task/index') ?>" class="actions delete" style="width: 150px; text-align: center; padding: 12px 0; background-color: #dc3545;">Cancel</a>
        </div>
    <?= form_close() ?>
</div>
