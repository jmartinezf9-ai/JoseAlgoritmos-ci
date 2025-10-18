<div class="card p-4 mx-auto" style="margin-top: 30px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
    <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-2">
        <h2 class="text-primary m-0"><?= $this->lang->line('nav_users') ?></h2>
        <a href="<?= site_url('users/create') ?>" class="btn btn-primary"><?= $this->lang->line('users_new_user') ?></a>
    </div>

    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
    <?php endif; ?>

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th><?= $this->lang->line('users_name') ?></th>
                    <th><?= $this->lang->line('users_email') ?></th>
                    <th class="text-center"><?= $this->lang->line('users_active') ?></th>
                    <th class="text-center">Admin</th>
                    <th><?= $this->lang->line('users_created_at') ?></th>
                    <th class="text-center"><?= $this->lang->line('action_actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($users)): ?>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?= html_escape($user->name) ?></td>
                            <td><?= html_escape($user->email) ?></td>
                            <td class="text-center"><?= $user->active ? 'Sí' : 'No' ?></td>
                            <td class="text-center"><?= $user->role === 'profesora' ? 'Sí' : 'No' ?></td>
                            <td><?= date('Y-m-d H:i', strtotime($user->created_at)) ?></td>
                            <td class="text-center">
                                <a href="<?= site_url('users/show/' . $user->id) ?>" class="btn btn-sm btn-info" title="View">View</a>
                                <a href="<?= site_url('users/edit/' . $user->id) ?>" class="btn btn-sm btn-warning" title="Edit">Edit</a>
                                <a href="<?= site_url('users/delete/' . $user->id) ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar a este usuario?')" title="Delete">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center">No hay usuarios registrados aparte de ti.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-end mt-3">
        <a href="#" class="btn btn-outline-secondary btn-sm mr-2">Newer</a>
        <a href="#" class="btn btn-outline-secondary btn-sm">Older</a>
    </div>
</div>
