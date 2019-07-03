<div class="page-header">
    <h2><?= h($user->user_nombre) ?></h2>
</div>
<div class="table-responsive">
    <table class="table table-striped table-hover">
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($user->user_nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Apellido') ?></th>
            <td><?= h($user->user_apellido) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Correo Electrónico') ?></th>
            <td><?= h($user->user_correo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contraseña') ?></th>
            <td><?= h($user->user_contraseña) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rol') ?></th>
            <td><?= h($user->user_role) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->user_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('DNI') ?></th>
            <td><?= $this->Number->format($user->user_dni) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Creación') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modificación') ?></th>
            <td><?= h($user->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Estatus') ?></th>
            <td><?= $user->user_status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
