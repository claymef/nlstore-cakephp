<div class="page-header">
    <h2><?= h($almacene->almacen_nombre) ?></h2>
</div>
<div class="table-responsive">
    <table class="table table-striped table-hover">
        <tr>
            <th scope="row"><?= __('Usuario') ?></th>
            <td><?= $almacene->has('user') ? $this->Html->link($almacene->user->user_nombre, ['controller' => 'Users', 'action' => 'view', $almacene->user->user_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($almacene->almacen_nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($almacene->almacen_id) ?></td>
        </tr>
    </table>
    <div class="page-header">
        <h3><?= __('Modelos') ?></h3>
    </div>
    <div class="related">
        <?php if (!empty($almacene->modelos)): ?>

        <table class="table table-striped table-hover">
            <tr>
                <th scope="col"><?= __('Almacen') ?></th>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Nombre') ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
            <?php foreach ($almacene->modelos as $modelos): ?>
            <tr>
                <td><?= h($modelos->almacen_id) ?></td>
                <td><?= h($modelos->modelo_id) ?></td>
                <td><?= h($modelos->modelo_nombre) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['controller' => 'Modelos', 'action' => 'view', $modelos->modelo_id], ['class' => 'btn btn-sm btn-info']) ?>
                    <?= $this->Html->link(__('Editar'), ['controller' => 'Modelos', 'action' => 'edit', $modelos->modelo_id], ['class' => 'btn btn-sm btn-primary']) ?>
                    <?= $this->Form->postLink(__('Eliminar'), ['controller' => 'Modelos', 'action' => 'delete', $modelos->modelo_id], ['class' => 'btn btn-sm btn-danger'], ['confirm' => __('Are you sure you want to delete # {0}?', $modelos->modelo_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
