<h2>Editar Tarea: <?= html_escape($task->title) ?></h2>

<?= form_open('task/update/' . $task->id) ?>

    <label for="title">Título de la Tarea:</label>
    <input type="text" name="title" id="title" value="<?= set_value('title', $task->title) ?>" required>
    <p style="color: red; font-size: 0.9em;"><?= form_error('title') ?></p>

    <label for="description">Descripción (Opcional):</label>
    <textarea name="description" id="description"><?= set_value('description', $task->description) ?></textarea>
    <p style="color: red; font-size: 0.9em;"><?= form_error('description') ?></p>

    <label for="due_date">Fecha Límite (YYYY-MM-DD - Opcional):</label>
    <input type="date" name="due_date" id="due_date" value="<?= set_value('due_date', $task->due_date) ?>">
    <p style="color: red; font-size: 0.9em;"><?= form_error('due_date') ?></p>

    <button type="submit" style="background-color: #ffc107; color: black; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; margin-top: 20px;">Guardar Cambios</button>
    <a href="<?= site_url('task/index') ?>" style="margin-left: 10px;">Cancelar y Volver</a>
<?= form_close() ?>

<style>
    /* Estilos específicos para el formulario */
    label { display: block; margin-top: 15px; font-weight: bold; }
    input[type="text"], input[type="date"], textarea {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }
    textarea { resize: vertical; min-height: 100px; }
</style>
