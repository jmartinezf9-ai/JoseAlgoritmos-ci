<div class="table-container" style="max-width: 900px;">
    <h2><?= $this->lang->line('users_title') ?></h2>

    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert-success"><?= $this->session->flashdata('success') ?></div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('error')): ?>
        <div class="alert-error"><?= $this->session->flashdata('error') ?></div>
    <?php endif; ?>

    <a href="<?= site_url('users/create') ?>" class="actions edit" style="display: inline-block; margin-bottom: 20px;">
        <?= $this->lang->line('users_new_user') ?>
    </a>

    <table>
        <thead>
            <tr>
                <th><?= $this->lang->line('users_name') ?></th>
                <th><?= $this->lang->line('users_email') ?></th>
                <th><?= $this->lang->line('users_active') ?></th>
                <th><?= $this->lang->line('users_admin') ?></th>
                <th><?= $this->lang->line('users_created_at') ?></th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($users)): ?>
                <tr>
                    <td colspan="6">No hay usuarios registrados (aparte de ti).</td>
                </tr>
            <?php else: ?>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= html_escape($user->name) ?></td>
                        <td><?= html_escape($user->email) ?></td>
                        <td><?= $user->active ? 'Si' : 'No' ?></td>
                        <td><?= $user->role === 'profesora' ? 'Si' : 'No' ?></td>
                        <td><?= date('Y-m-d H:i', strtotime($user->created_at)) ?></td>
                        <td>
                            <a href="<?= site_url('users/view/' . $user->id) ?>" class="actions edit" style="padding: 5px 10px;">View</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>
