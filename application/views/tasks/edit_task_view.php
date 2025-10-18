<div class="form-container" style="max-width: 550px;">
    <h2>Edit Task</h2>
    
    <?= validation_errors('<div class="alert-error">', '</div>'); ?>

    <?= form_open('task/edit/' . $task->id) ?>
        
        [cite_start]<label for="description">Description</label> [cite: 43]
        <textarea name="description" id="description" rows="4" required style="border: 1px solid #a8cde5; padding: 10px; width: 100%; box-sizing: border-box;"><?= set_value('description', $task->description) ?></textarea>
        
        <div style="display: flex; justify-content: flex-start; gap: 15px; margin-top: 25px;">
            <button type="submit" style="width: 150px; background-color: #5cb85c; margin-top: 0;">Save</button>
            <a href="<?= site_url('task/view/' . $task->id) ?>" class="actions delete" style="width: 150px; text-align: center; padding: 12px 0; background-color: #dc3545;">Cancel</a>
        </div>
    <?= form_close() ?>
</div>
