<div class="page-header">
    <h2><?= h($modelo->modelo_nombre) ?></h2>
</div>
<div class="table-responsive">
    <table class="table table-striped table-hover">
        <tr>
            <th scope="row"><?= __('Almacen') ?></th>
            <td><?= $modelo->has('almacene') ? $this->Html->link($modelo->almacene->almacen_nombre, ['controller' => 'Almacenes', 'action' => 'view', $modelo->almacene->almacen_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($modelo->modelo_nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($modelo->modelo_id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Prendas') ?></h4>
        <?php if (!empty($modelo->prendas)): ?>

        <table class="table table-striped table-hover">
            <tr>
                <th scope="col"><?= __('Modelo') ?></th>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Nombre') ?></th>
                <th scope="col"><?= __('Stock') ?></th>
                <th scope="col"><?= __('Precio') ?></th>   
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
            <?php foreach ($modelo->prendas as $prendas): ?>
            <tr>
                <td><?= h($prendas->modelo_id) ?></td>
                <td><?= h($prendas->prenda_id) ?></td>
                <td><?= h($prendas->prenda_nombre) ?></td>
                <td><?= h($prendas->prenda_stock) ?></td>
                <td><?= h($prendas->prenda_precio) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['controller' => 'Prendas', 'action' => 'view', $prendas->prenda_id], ['class' => 'btn btn-sm btn-info']) ?>
                    <?= $this->Html->link(__('Editar'), ['controller' => 'Prendas', 'action' => 'edit', $prendas->prenda_id], ['class' => 'btn btn-sm btn-primary']) ?>
                    <?= $this->Form->postLink(__('Eliminar'), ['controller' => 'Prendas', 'action' => 'delete', $prendas->prenda_id], ['class' => 'btn btn-sm btn-danger'], ['confirm' => __('Are you sure you want to delete # {0}?', $prendas->prenda_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
