<div class="user-detail-container" style="max-width: 600px; margin: 0 auto; padding: 20px; background-color: white; border-radius: 8px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);">
    <h2>User</h2>
    
    <a href="<?= site_url('users') ?>" style="display: block; margin-bottom: 25px; color: #007bff; text-decoration: none;">&lt;&lt; back to index</a>
    
    <style>
        .user-field { margin-bottom: 10px; }
        .user-field strong { display: block; font-size: 1em; color: #333; margin-bottom: 2px; }
        .user-field span { font-size: 1.1em; font-style: italic; color: #555; }
    </style>

    <div class="user-field">
        [cite_start]<strong>name [cite: 73]</strong>
        <span><?= html_escape($user->name ?? 'N/A') ?></span> </div>

    <div class="user-field">
        [cite_start]<strong>email [cite: 75]</strong>
        <span><?= html_escape($user->email ?? 'N/A') ?></span> </div>

    <div class="user-field">
        [cite_start]<strong>active [cite: 77]</strong>
        <span><?= html_escape($user->active ?? 'N/A') ?></span> </div>

    <div class="user-field">
        [cite_start]<strong>Administrator [cite: 79]</strong>
        <span><?= html_escape($user->administrator ?? 'N/A') ?></span> </div>

    <div class="user-field">
        [cite_start]<strong>Created at [cite: 81]</strong>
        <span><?= html_escape($user->created_at ?? 'N/A') ?></span> </div>

    <div class="user-field">
        [cite_start]<strong>Updated at [cite: 83]</strong>
        <span><?= html_escape($user->updated_at ?? 'N/A') ?></span> </div>
    
    <div style="margin-top: 30px;">
        <a href="<?= site_url('users/edit/' . $user->id) ?>" class="actions edit" style="background-color: #007bff; color: white; padding: 10px 15px; text-decoration: none;">Edit</a>
        <a href="<?= site_url('users/delete/' . $user->id) ?>" class="actions delete" style="background-color: #dc3545; color: white; padding: 10px 15px; text-decoration: none;" onclick="return confirm('¿Estás seguro de que quieres eliminar a este usuario?');">Delete</a>
    </div>
</div>
