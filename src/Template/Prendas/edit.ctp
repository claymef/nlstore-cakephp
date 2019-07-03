<div class="row">
    <div class="page-header">
        <h2><?= __('Editar Prenda') ?></h2>
    </div>
    <div class="col-md-6 col-md-offset-3">
        <?= $this->Form->create($prenda) ?>
        <fieldset>
            
            <?php
                echo $this->Form->control('modelo_id', ['label'=>__('Modelo'),'options' => $modelos, 'empty' => '--Seleccione--']);
                echo $this->Form->control('prenda_nombre', ['label'=>__('Nombre')]);
                echo $this->Form->control('prenda_stock', ['label'=>__('Stock')]);
                echo $this->Form->control('prenda_precio', ['label'=>__('Precio')]);
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit')) ?>
        <?= $this->Form->end() ?>
    </div>
</div