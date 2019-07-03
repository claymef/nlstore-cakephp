<div class="row">
    <div class="page-header">
        <h2><?= __('Editar Detalle de Venta') ?></h2>
    </div>
    <div class="col-md-6 col-md-offset-3">
        <?= $this->Form->create($detalleventum) ?>
        <fieldset>
            <legend><?= __('Edit Detalleventum') ?></legend>
            <?php
                echo $this->Form->control('factura_id', ['label'=>__('Nombre'),'options' => $facturas, 'empty' => '--Seleccione--']);
                echo $this->Form->control('prenda_id', ['label'=>__('Prenda'),'options' => $prendas, 'empty' => '--Seleccione--']);
                echo $this->Form->control('detalle_cantidad', ['label'=>__('Cantidad')]);
                echo $this->Form->control('detalle_precio', ['label'=>__('Precio')]);
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit')) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
