<div class="row">
    <div class="page-header">
        <h2><?= __('Crear Detalle de Venta') ?></h2>
    </div>
    <div>
        <?= $this->Form->create($detalleventum) ?>
        <fieldset>
            
            <?php
                echo $this->Form->control('factura_id', ['label'=>__('Factura'),'options' => $facturas, 'empty' => '--Seleccione--']);
                echo $this->Form->control('prenda_id', ['label'=>__('Prenda'),'options' => $prendas, 'empty' => '--Seleccione--']);
                echo $this->Form->control('detalle_cantidad',['label'=>__('Cantidad')]);
                echo $this->Form->control('detalle_precio',['label'=>__('Precio')]);
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit')) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
