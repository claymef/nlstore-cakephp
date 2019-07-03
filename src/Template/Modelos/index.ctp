<div class="page-header">
    <h2><?= __('Modelos') ?></h2>
</div>
<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('modelo_id',['label'=>__('Id')]) ?></th>
                <th><?= $this->Paginator->sort('almacen_id',['label'=>__('Almacen')]) ?></th>
                <th><?= $this->Paginator->sort('modelo_nombre',['label'=>__('Nombre')]) ?></th>
                <th scope="col"><?= __('Acciones') ?></th>
            </tr>
                        
        </thead>
        <tbody>
            <?php foreach ($modelos as $modelo): ?>
            <tr>
                <td><?= $this->Number->format($modelo->modelo_id) ?></td>
                <td><?= $modelo->has('almacene') ? $this->Html->link($modelo->almacene->almacen_nombre, ['controller' => 'Almacenes', 'action' => 'view', $modelo->almacene->almacen_id]) : '' ?></td>
                <td><?= h($modelo->modelo_nombre) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $modelo->modelo_id], ['class' => 'btn btn-sm btn-info']) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $modelo->modelo_id], ['class' => 'btn btn-sm btn-primary']) ?>
                    <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $modelo->modelo_id], ['class' => 'btn btn-sm btn-danger'], ['confirm' => __('Are you sure you want to delete # {0}?', $modelo->modelo_id)]) ?>
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
