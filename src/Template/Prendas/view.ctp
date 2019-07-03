<div class="page-header">
    <h2><?= h($prenda->prenda_nombre) ?></h2>
</div>
<div class="table-responsive">
    <table class="table table-striped table-hover">
        <tr>
            <th scope="row"><?= __('Modelo') ?></th>
            <td><?= $prenda->has('modelo') ? $this->Html->link($prenda->modelo->modelo_nombre, ['controller' => 'Modelos', 'action' => 'view', $prenda->modelo->modelo_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($prenda->prenda_nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($prenda->prenda_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Stock') ?></th>
            <td><?= $this->Number->format($prenda->prenda_stock) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Precio') ?></th>
            <td><?= $this->Number->format($prenda->prenda_precio) ?></td>
        </tr>
    </table>
</div>
