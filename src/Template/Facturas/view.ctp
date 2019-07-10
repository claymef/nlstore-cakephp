<div class="page-header">
    <h2><?= h($factura->factura_id) ?></h2>
</div>
<div class="table-responsive">
    <table class="table table-striped table-hover">
        <tr>
            <th scope="row"><?= __('Usuario') ?></th>
            <td><?= $factura->has('user') ? $this->Html->link($factura->user->user_nombre, ['controller' => 'Users', 'action' => 'view', $factura->user->user_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($factura->factura_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Creación') ?></th>
            <td><?= h($factura->created) ?></td>
        </tr>

    </table>
    <div class="page-header">
        <h3><?= __('Detalles de Venta') ?></h3>
    </div>
    <div class="related">
        <?php if (!empty($factura->detalleventa)): ?>

        <table class="table table-striped table-hover">
            <tr>
                <th scope="col"><?= __('Detalle') ?></th>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Prenda') ?></th>
                <th scope="col"><?= __('Cantidad') ?></th>
                <th scope="col"><?= __('Precio') ?></th>
                <th scope="col"><?= __('Creación') ?></th>   
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
            <?php foreach ($factura->detalleventa as $detalleventa): ?>
            <tr>
                <td><?= h($detalleventa->detalle_id) ?></td>
                <td><?= h($detalleventa->factura_id) ?></td>
                <td><?= h($detalleventa->prenda_id) ?></td>
                <td><?= h($detalleventa->detalle_cantidad) ?></td>
                <td><?= h($detalleventa->detalle_precio) ?></td>
                <td><?= h($detalleventa->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['controller' => 'Detalleventa', 'action' => 'view', $detalleventa->detalle_id]) ?>
                    <?= $this->Html->link(__('Editar'), ['controller' => 'Detalleventa', 'action' => 'edit', $detalleventa->detalle_id]) ?>
                    <?= $this->Form->postLink(__('Eliminar'), ['controller' => 'Detalleventa', 'action' => 'delete', $detalleventa->detalle_id], ['confirm' => __('Are you sure you want to delete # {0}?', $detalleventa->detalle_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
            <?= $this->Form->postbutton(__('Crear Detalle de Venta'),['controller' => 'Detalleventa', 'action' => 'add']); ?>
        </table>
        <?php endif; ?>
    </div>
</div>
