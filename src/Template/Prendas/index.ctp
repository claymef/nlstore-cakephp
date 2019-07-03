<div class="page-header">
    <h2><?= __('Prendas') ?></h2>
</div>
<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('prenda_id',['label'=>__('Id')]) ?></th>
                <th><?= $this->Paginator->sort('modelo_id',['label'=>__('Modelo')]) ?></th>
                <th><?= $this->Paginator->sort('prenda_nombre',['label'=>__('Nombre')]) ?></th>
                <th><?= $this->Paginator->sort('prenda_stock',['label'=>__('Stock')]) ?></th>
                <th><?= $this->Paginator->sort('prenda_precio',['label'=>__('Precio')]) ?></th>
                <th scope="col"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($prendas as $prenda): ?>
            <tr>
                <td><?= $this->Number->format($prenda->prenda_id) ?></td>
                <td><?= $prenda->has('modelo') ? $this->Html->link($prenda->modelo->modelo_nombre, ['controller' => 'Modelos', 'action' => 'view', $prenda->modelo->modelo_id]) : '' ?></td>
                <td><?= h($prenda->prenda_nombre) ?></td>
                <td><?= $this->Number->format($prenda->prenda_stock) ?></td>
                <td><?= $this->Number->format($prenda->prenda_precio) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $prenda->prenda_id], ['class' => 'btn btn-sm btn-info']) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $prenda->prenda_id], ['class' => 'btn btn-sm btn-primary']) ?>
                    <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $prenda->prenda_id], ['class' => 'btn btn-sm btn-danger'], ['confirm' => __('Are you sure you want to delete # {0}?', $prenda->prenda_id)]) ?>
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
