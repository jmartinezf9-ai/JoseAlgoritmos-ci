<h2>Mis Tareas Asignadas</h2>

<?php if (empty($tasks)): ?>
    <p style="text-align: center; margin-top: 50px;">¡Felicidades! No tienes tareas pendientes en este momento.</p>
<?php else: ?>
    <table>
        <thead>
            <tr>
                <th>Título</th>
                <th>Descripción</th>
                <th>Fecha Límite</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tasks as $task): ?>
            <tr>
                <td class="<?= $task->completed ? 'completed' : '' ?>"><?= html_escape($task->title) ?></td>
                <td><?= html_escape($task->description) ?></td>
                <td><?= $task->due_date ?></td>
                <td>
                    <?= $task->completed ? 'Completada' : 'Pendiente' ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>
<?php $this->load->view('templates/footer'); ?>
