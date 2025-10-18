<div class="card p-4 mx-auto" style="max-width: 500px; margin-top: 30px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
    <h2 class="text-primary border-bottom pb-2 mb-4">Cambiar Imagen de Perfil</h2>

    <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
    <?php endif; ?>

    <?= form_open_multipart('profile/do_upload') ?>
        
        <label for="userfile" class="form-label mt-3">Seleccionar imagen (JPG, PNG)</label>
        <input type="file" name="userfile" id="userfile" size="20" class="form-control" required>
        
        <p class="text-muted small mt-2">Max. Size: 2MB | Max. Width/Height: 1024px</p>
        
        <button type="submit" class="btn btn-primary mt-3">Subir Imagen</button>
        <a href="<?= site_url('profile') ?>" class="btn btn-secondary mt-3">Cancelar</a>
    <?= form_close() ?>
</div>
