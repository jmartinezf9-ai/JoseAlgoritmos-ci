<!DOCTYPE html>
<html lang="<?= $this->session->userdata('language') ?>">
<head>
    <meta charset="UTF-8">
    <title><?= $this->lang->line('app_title') ?></title>
    
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    
    </head>
<body>
<header>
    <nav>
        <div class="left-nav">
            <a href="<?= site_url() ?>">Home</a>
            
            <a href="<?= site_url('lang/switch_language/english') ?>" style="color: <?= $this->session->userdata('language') === 'english' ? 'red' : 'inherit' ?>;">English</a>
            <a href="<?= site_url('lang/switch_language/spanish') ?>" style="color: <?= $this->session->userdata('language') === 'spanish' ? 'red' : 'inherit' ?>;">Español</a>
        </div>
        
        <div class="right-nav">
            
            <?php if ($this->session->userdata('logged_in')): ?>
                <span>Hello, <?= $this->session->userdata('name') ?></span>
                
                <a href="<?= site_url('profile') ?>">Profile</a>
                
                <?php if ($this->session->userdata('role') === 'profesora'): ?>
                    <a href="<?= site_url('users') ?>">Users</a>
                    <a href="<?= site_url('task') ?>">Tasks</a>
                <?php endif; ?>
                
                <a href="<?= site_url('auth/logout') ?>">Log out</a>
            <?php else: ?>
                <a href="<?= site_url('auth/login') ?>">Login</a>
            <?php endif; ?>
        </div>
    </nav>
</header>
<div class="container">
