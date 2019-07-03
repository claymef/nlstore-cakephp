<div class="page-header">
    <h2><?= h($detalleventum->detalle_id) ?></h2>
</div>
<div class="table-responsive">
    <table class="table table-striped table-hover">
        <tr>
            <th scope="row"><?= __('Factura') ?></th>
            <td><?= $detalleventum->has('factura') ? $this->Html->link($detalleventum->factura->factura_id, ['controller' => 'Facturas', 'action' => 'view', $detalleventum->factura->factura_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Prenda') ?></th>
            <td><?= $detalleventum->has('prenda') ? $this->Html->link($detalleventum->prenda->prenda_nombre, ['controller' => 'Prendas', 'action' => 'view', $detalleventum->prenda->prenda_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($detalleventum->detalle_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cantidad') ?></th>
            <td><?= $this->Number->format($detalleventum->detalle_cantidad) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Precio') ?></th>
            <td><?= $this->Number->format($detalleventum->detalle_precio) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Creación') ?></th>
            <td><?= h($detalleventum->created) ?></td>
        </tr>
    </table>
</div>
