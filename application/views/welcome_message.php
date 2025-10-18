<?php $this->load->view('templates/header'); ?>

<h2>Welcome</h2>

<?php if ($this->session->flashdata('welcome_message')): ?>
    <div class="alert-success">
        <?= $this->session->flashdata('welcome_message') ?>
    </div>
<?php endif; ?>

<?php if ($this->session->flashdata('error')): ?>
    <div class="alert-error">
        <?= $this->session->flashdata('error') ?>
    </div>
<?php endif; ?>

<p>
    Esta es la página principal del sistema TaskApp. Usa la barra de navegación superior para acceder a tu perfil y módulos según tu rol.
</p>

<?php $this->load->view('templates/footer'); ?>
