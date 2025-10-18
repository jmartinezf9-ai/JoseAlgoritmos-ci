<div class="tasks-container" style="max-width: 900px; margin: 0 auto;">
    <h2>Tasks</h2>

    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert-success"><?= $this->session->flashdata('success') ?></div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('error')): ?>
        <div class="alert-error"><?= $this->session->flashdata('error') ?></div>
    <?php endif; ?>

    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
        <a href="<?= site_url('task/create') ?>" class="actions edit" style="background-color: #007bff; color: white; padding: 10px 15px; text-decoration: none;">New Task</a>
        
        <div style="display: flex; align-items: center;">
            <label for="search" style="margin-right: 10px;">Search</label>
            <input type="text" id="search" placeholder="a" style="padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
        </div>
    </div>

    <div class="task-list" style="margin-top: 20px;">
        <?php if (empty($tasks)): ?>
            <p>No hay tareas registradas.</p>
        <?php else: ?>
            <?php foreach ($tasks as $task): ?>
                <div class="task-item" style="padding: 10px; border-bottom: 1px solid #eee;">
                    <a href="<?= site_url('task/view/' . $task->id) ?>" style="font-size: 1.1em; color: #333; text-decoration: none;">
                        <?= html_escape($task->description) ?>
                    </a>
                    <span style="font-size: 0.8em; color: #999; display: block;">Created: <?= date('Y-m-d H:i', strtotime($task->created_at)) ?></span>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    
    <div style="display: flex; justify-content: flex-start; gap: 10px; margin-top: 20px;">
        <button class="actions delete" style="background-color: #007bff; color: white;">Newer</button>
        <button class="actions delete" style="background-color: #007bff; color: white;">Older</button>
    </div>
</div>
