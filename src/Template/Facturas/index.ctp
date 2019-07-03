<div class="page-header">
    <h2><?= __('Facturas') ?></h2>
</div>
<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead>
            <tr><th scope="col"><?= $this->Paginator->sort('factura_id',['label'=>__('Id')]) ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id',['label'=>__('Usuario')]) ?></th>
                <th scope="col"><?= $this->Paginator->sort('created',['label'=>__('Creación')]) ?></th>
                <th scope="col"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($facturas as $factura): ?>
            <tr>
                <td><?= $this->Number->format($factura->factura_id) ?></td>
                <td><?= $factura->has('user') ? $this->Html->link($factura->user->user_nombre, ['controller' => 'Users', 'action' => 'view', $factura->user->user_id]) : '' ?></td>
                <td><?= h($factura->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $factura->factura_id], ['class' => 'btn btn-sm btn-info']) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $factura->factura_id], ['class' => 'btn btn-sm btn-primary']) ?>
                    <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $factura->factura_id], ['class' => 'btn btn-sm btn-danger'], ['confirm' => __('Are you sure you want to delete # {0}?', $factura->factura_id)]) ?>
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
