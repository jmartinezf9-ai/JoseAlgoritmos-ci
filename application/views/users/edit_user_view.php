<div class="form-container" style="max-width: 550px;">
    <h2>Edit user</h2>
    
    <a href="<?= site_url('users') ?>" style="display: block; margin-bottom: 20px; color: #007bff; text-decoration: none;">&lt;&lt; back to Index</a>
    
    <?= validation_errors('<div class="alert-error">', '</div>'); ?>

    <?= form_open('users/edit/' . $user->id) ?>
        
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="<?= html_escape($user->name) ?>" required style="border: 1px solid #a8cde5;">
        
        <label for="email">email</label>
        <input type="email" name="email" id="email" value="<?= html_escape($user->email) ?>" required style="border: 1px solid #a8cde5;">

        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="Dejar en blanco para no cambiar" style="border: 1px solid #a8cde5;">

        <label for="repeat_password">Repeat password</label>
        <input type="password" name="repeat_password" id="repeat_password" style="border: 1px solid #a8cde5;">

<div style="margin-top: 15px; margin-bottom: 20px;">
            <input type="checkbox" id="active" name="active" value="1" <?= $user->active ? 'checked' : '' ?>>
            <label for="active" style="display: inline; font-weight: normal;">Active</label>
        </div>
        
        <div style="margin-bottom: 25px;">
            <input type="checkbox" id="administrator" name="administrator" value="1" <?= $user->role === 'profesora' ? 'checked' : '' ?>>
            <label for="administrator" style="display: inline; font-weight: normal;">Administrator</label>
        </div>
        <div style="display: flex; justify-content: flex-start; gap: 15px; margin-top: 25px;">
            <button type="submit" style="width: 150px; background-color: #5cb85c; margin-top: 0;">Save</button>
            <a href="<?= site_url('users') ?>" class="actions delete" style="width: 150px; text-align: center; padding: 12px 0; background-color: #dc3545;">Cancel</a>
        </div>
    <?= form_close() ?>
</div>
