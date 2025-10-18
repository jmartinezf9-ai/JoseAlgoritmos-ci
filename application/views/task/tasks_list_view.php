<div class="card p-4 mx-auto" style="margin-top: 30px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
    <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-2">
        <h2 class="text-primary m-0">Tasks</h2>
        
        <?php if (isset($user_role) && $user_role === 'profesora'): ?>
            <a href="<?= site_url('task/create') ?>" class="btn btn-primary">New Task</a>
        <?php endif; ?>
    </div>

    <div class="mb-3">
        <form action="<?= site_url('task/search') ?>" method="get" class="row g-3 align-items-center">
            <div class="col-auto">
                 <input type="text" name="q" placeholder="Search" class="form-control" style="width: 250px;">
            </div>
            <div class="col-auto">
                 <button type="submit" class="btn btn-info">Search</button>
            </div>
        </form>
    </div>

    <div class="list-group">
        <?php if (isset($user_role) && $user_role === 'profesora'): ?>
            
            <div class="alert alert-info">Eres *Profesora*. Ves todas las tareas para administrarlas.</div>
            <?php for ($i = 0; $i < 4; $i++): ?>
            <div class="list-group-item d-flex justify-content-between align-items-center">
                [ADMIN] Tarea de ejemplo <?= $i + 1 ?> (<?= date('Y-m-d') ?>)
                <div>
                    <a href="<?= site_url('task/edit/1') ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="<?= site_url('task/delete/1') ?>" class="btn btn-sm btn-danger" onclick="return confirm('Confirm delete?')">Delete</a>
                </div>
            </div>
            <?php endfor; ?>

        <?php else: // Rol: alumno ?>

            <div class="alert alert-info">Eres *Estudiante*. Ves tus tareas asignadas.</div>
            
            <?php 
            // Esto simularía que la variable $tasks está vacía si eres estudiante
            if (empty($tasks) || count($tasks) === 0): ?>
                <div class="list-group-item text-center">
                    ¡Felicidades! No tienes tareas pendientes asignadas por el momento.
                </div>
            <?php endif; ?>

        <?php endif; ?>
    </div>
    
    <div class="d-flex justify-content-end mt-3">
        <a href="#" class="btn btn-outline-secondary btn-sm mr-2">Newer</a>
        <a href="#" class="btn btn-outline-secondary btn-sm">Older</a>
    </div>
</div>
