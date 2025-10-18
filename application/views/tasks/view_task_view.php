<div class="task-detail-container" style="max-width: 600px; margin: 0 auto; padding: 20px; background-color: white; border-radius: 8px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);">
    <h2>Task</h2>
    
    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert-success"><?= $this->session->flashdata('success') ?></div>
    <?php endif; ?>
    
    <a href="<?= site_url('task/index') ?>" style="display: block; margin-bottom: 25px; color: #007bff; text-decoration: none;">&lt;&lt; back to index</a>
    
    <style>
        .task-field { margin-bottom: 15px; padding-bottom: 5px; border-bottom: 1px dotted #eee; }
        .task-field strong { display: block; font-size: 1em; color: #333; margin-bottom: 2px; }
        .task-field span { font-size: 1.1em; color: #555; white-space: pre-wrap; word-wrap: break-word; }
    </style>

    <div class="task-field">
        [cite_start]<strong>ID</strong> [cite: 50]
        [cite_start]<span><?= html_escape($task->id ?? 'N/A') ?></span> [cite: 51]
    </div>

    <div class="task-field">
        [cite_start]<strong>Description</strong> [cite: 52]
        [cite_start]<span><?= html_escape($task->description ?? 'N/A') ?></span> [cite: 53]
    </div>

    <div class="task-field">
        [cite_start]<strong>Created at</strong> [cite: 54]
        [cite_start]<span><?= date('Y-m-d H:i:s', strtotime($task->created_at ?? 'N/A')) ?></span> [cite: 55]
    </div>

    <div class="task-field">
        [cite_start]<strong>Updated at</strong> [cite: 56]
        [cite_start]<span><?= date('Y-m-d H:i:s', strtotime($task->updated_at ?? 'N/A')) ?></span> [cite: 57]
    </div>
    
    <div style="margin-top: 30px;">
        <a href="<?= site_url('task/edit/' . $task->id) ?>" class="actions edit" style="background-color: #007bff; color: white; padding: 10px 15px; text-decoration: none;">Edit</a>
        <a href="<?= site_url('task/delete/' . $task->id) ?>" class="actions delete" style="background-color: #dc3545; color: white; padding: 10px 15px; text-decoration: none;" onclick="return confirm('¿Estás seguro de que quieres eliminar esta tarea?');">Delete</a>
    </div>
</div>
