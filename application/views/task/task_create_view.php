<div class="card p-4 mx-auto" style="max-width: 600px; margin-top: 30px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
    <h2 class="text-primary border-bottom pb-2 mb-4">Nueva Tarea</h2>

    <?php if (validation_errors()): ?>
        <div class="alert alert-danger"><?= validation_errors() ?></div>
    <?php endif; ?>

    <?= form_open('task/store') ?>
        
        <label for="description">Description</label>
        <textarea id="description" name="description" class="form-control" rows="5" required><?= set_value('description') ?></textarea>
        
        <button type="submit" class="btn btn-success mt-4">Send</button>
        <a href="<?= site_url('task') ?>" class="btn btn-secondary mt-4">Cancel</a>
    <?= form_close() ?>
</div>
