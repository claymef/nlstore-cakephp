<div class="page-header">
    <h2><?= __('Usuarios') ?></h2>
</div>
<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('user_id',['label'=>__('Id')]) ?></th>
                <th><?= $this->Paginator->sort('user_nombre',['label'=>__('Nombre')]) ?></th>
                <th><?= $this->Paginator->sort('user_apellido',['label'=>__('Apellido')]) ?></th>
                <th><?= $this->Paginator->sort('user_dni',['label'=>__('DNI')]) ?></th>
                <th><?= $this->Paginator->sort('user_correo',['label'=>__('Correo Electrónico')]) ?></th>
                <th><?= $this->Paginator->sort('user_contraseña',['label'=>__('Contraseña')]) ?></th>
                <th><?= $this->Paginator->sort('user_role',['label'=>__('Rol')]) ?></th>
                <th><?= $this->Paginator->sort('user_status',['label'=>__('Estatus')]) ?></th>
                <th><?= $this->Paginator->sort('created',['label'=>__('Creación')]) ?></th>
                <th><?= $this->Paginator->sort('modified',['label'=>__('Modificación')]) ?></th>
                <th><?= __('Acciones') ?></th>
            </tr>

                
            
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $this->Number->format($user->user_id) ?></td>
                <td><?= h($user->user_nombre) ?></td>
                <td><?= h($user->user_apellido) ?></td>
                <td><?= $this->Number->format($user->user_dni) ?></td>
                <td><?= h($user->user_correo) ?></td>
                <td><?= h($user->user_contraseña) ?></td>
                <td><?= h($user->user_role) ?></td>
                <td><?= h($user->user_status) ?></td>
                <td><?= h($user->created) ?></td>
                <td><?= h($user->modified) ?></td>
                <td>
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $user->user_id], ['class' => 'btn btn-sm btn-info','before' => '','after' => '']) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $user->user_id], ['class' => 'btn btn-sm btn-primary','before' => '','after' => '']) ?>
                    <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $user->user_id], ['class' => 'btn btn-sm btn-danger','before' => '','after' => ''], ['confirm' => __('Are you sure you want to delete # {0}?', $user->user_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers(['before' => '','after' => '']) ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}')]) ?></p>
    </div>

