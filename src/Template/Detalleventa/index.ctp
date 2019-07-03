<div class="page-header">
    <h2><?= __('Detalles de Venta') ?></h2>
</div>
<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('detalle_id',['label'=>__('Id')]) ?></th>
                <th><?= $this->Paginator->sort('factura_id',['label'=>__('Factura')]) ?></th>
                <th><?= $this->Paginator->sort('prenda_id',['label'=>__('Prenda')]) ?></th>
                <th><?= $this->Paginator->sort('detalle_cantidad',['label'=>__('Cantidad')]) ?></th>
                <th><?= $this->Paginator->sort('detalle_precio',['label'=>__('Precio')]) ?></th>
                <th><?= $this->Paginator->sort('created',['label'=>__('Creación')]) ?></th>
                <th scope="col"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($detalleventa as $detalleventum): ?>
            <tr>
                <td><?= $this->Number->format($detalleventum->detalle_id) ?></td>
                <td><?= $detalleventum->has('factura') ? $this->Html->link($detalleventum->factura->factura_id, ['controller' => 'Facturas', 'action' => 'view', $detalleventum->factura->factura_id]) : '' ?></td>
                <td><?= $detalleventum->has('prenda') ? $this->Html->link($detalleventum->prenda->prenda_nombre, ['controller' => 'Prendas', 'action' => 'view', $detalleventum->prenda->prenda_id]) : '' ?></td>
                <td><?= $this->Number->format($detalleventum->detalle_cantidad) ?></td>
                <td><?= $this->Number->format($detalleventum->detalle_precio) ?></td>
                <td><?= h($detalleventum->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $detalleventum->detalle_id], ['class' => 'btn btn-sm btn-info']) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $detalleventum->detalle_id], ['class' => 'btn btn-sm btn-primary']) ?>
                    <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $detalleventum->detalle_id], ['class' => 'btn btn-sm btn-danger'], ['confirm' => __('Are you sure you want to delete # {0}?', $detalleventum->detalle_id)]) ?>
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
