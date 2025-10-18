<div class="form-container" style="max-width: 550px;">
    <h2>Edit profile image</h2>
    
    <?php if ($this->session->flashdata('error')): ?>
        <div class="alert-error"><?= $this->session->flashdata('error') ?></div>
    <?php endif; ?>
    <?= validation_errors('<div class="alert-error">', '</div>'); ?>

    <?= form_open_multipart('profile/upload_image') ?>
        
        <label for="profile_image" style="display: block; margin-bottom: 20px;">
            <input type="file" 
                   name="profile_image" 
                   id="profile_image" 
                   accept="image/*" 
                   required
                   style="display: none;">
                   
            <span id="file-name" style="margin-left: 10px; color: #555;">No se ha seleccionado archivo.</span>
            
            <span style="display: inline-block; padding: 10px 15px; border-radius: 5px; background-color: #a8cde5; color: #333; cursor: pointer; border: 1px solid #007bff; margin-top: 10px;">
                Buscar Imagen
            </span>
        </label>
        
        <div style="display: flex; justify-content: flex-start; gap: 15px; margin-top: 25px;">
            <button type="submit" style="width: 150px; background-color: #5cb85c; margin-top: 0;">Save</button>
            <a href="<?= site_url('profile') ?>" class="actions delete" style="width: 150px; text-align: center; padding: 12px 0; background-color: #dc3545;">Cancel</a>
        </div>
    <?= form_close() ?>
    
    <script>
        document.getElementById('profile_image').addEventListener('change', function() {
            var fileName = this.files.length > 0 ? this.files[0].name : 'No se ha seleccionado archivo.';
            document.getElementById('file-name').textContent = fileName;
        });
    </script>
</div>
