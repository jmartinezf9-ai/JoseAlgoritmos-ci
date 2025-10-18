<?php 
// Define la ruta de la imagen
$profile_image = $user->profile_image ? base_url($user->profile_image) : base_url('assets/img/default-profile.png');
// Nota: Si no tienes default-profile.png, debes crear un archivo o cambiar esta ruta.
$has_image = (bool)$user->profile_image;
?>

<div class="card p-4 mx-auto" style="max-width: 600px; margin-top: 30px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
    <h2 class="text-primary border-bottom pb-2 mb-4">Profile</h2>

    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
    <?php endif; ?>

    <div class="d-flex align-items-start mb-4">
        
        <div class="mr-4" style="flex-shrink: 0;">
            <img src="<?= $profile_image ?>" 
                 alt="Profile Image" 
                 class="img-fluid rounded-circle" 
                 style="width: 100px; height: 100px; object-fit: cover; border: 3px solid #ddd;">
            
            <?php if ($has_image): ?>
                <div class="text-center mt-2">
                    <a href="<?= site_url('profile/delete_image') ?>" class="text-danger small">Delete Profile Image</a>
                </div>
            <?php endif; ?>
        </div>
        
        <div class="ml-4">
            <p><strong>Name:</strong> <?= html_escape($user->name) ?></p>
            <p><strong>Email:</strong> <?= html_escape($user->email) ?></p>
            <p><strong>Role:</strong> <?= html_escape(ucfirst($this->session->userdata('role'))) ?></p>

            <p><strong>Created At:</strong> 
            <?php 
            if ($user->created_at && strtotime($user->created_at) > 0) {
                echo date('Y-m-d H:i:s', strtotime($user->created_at));
            } else {
                echo 'N/A';
            }
            ?>
            </p>

            <?php 
            if (isset($user->updated_at) && $user->updated_at && strtotime($user->updated_at) > 0): ?>
                <p><strong>Updated At:</strong> <?= date('Y-m-d H:i:s', strtotime($user->updated_at)) ?></p>
            <?php endif; ?>
        </div>
    </div>

    <hr>

    <div class="mt-4">
        <a href="<?= site_url('profile/edit') ?>" class="btn btn-primary mr-2">Editar Perfil</a>
        <a href="<?= site_url('profile/password') ?>" class="btn btn-primary mr-2">Cambiar Contraseña</a>
        <a href="<?= site_url('profile/image') ?>" class="btn btn-primary">Cambiar Imagen</a>
    </div>
</div>
