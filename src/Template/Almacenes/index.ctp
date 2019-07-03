<div class="page-header">
    <h2><?= __('Almacenes') ?></h2>
</div>
<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('almacen_id',['label'=>__('Id')]) ?></th>
                <th><?= $this->Paginator->sort('user_id',['label'=>__('Usuario')]) ?></th>
                <th><?= $this->Paginator->sort('almacen_nombre',['label'=>__('Nombre')]) ?></th>
                <th><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($almacenes as $almacene): ?>
            <tr>
                <td><?= $this->Number->format($almacene->almacen_id) ?></td>
                <td><?= $almacene->has('user') ? $this->Html->link($almacene->user->user_nombre, ['controller' => 'Users', 'action' => 'view', $almacene->user->user_id]) : '' ?></td>
                <td><?= h($almacene->almacen_nombre) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $almacene->almacen_id], ['class' => 'btn btn-sm btn-info']) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $almacene->almacen_id], ['class' => 'btn btn-sm btn-primary']) ?>
                    <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $almacene->almacen_id], ['class' => 'btn btn-sm btn-danger'], ['confirm' => __('Are you sure you want to delete # {0}?', $almacene->almacen_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
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
</div>
