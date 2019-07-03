<div class="row">
    <div class="page-header">
        <h2><?= __('Crear Modelo') ?></h2>
    </div>
    <div class="col-md-6 col-md-offset-3">
        <?= $this->Form->create($modelo) ?>
        <fieldset>
            
            <?php
                echo $this->Form->control('almacen_id', ['label'=>__('Almacen'),'options' => $almacenes, 'empty' => '--Seleccione--']);
                echo $this->Form->control('modelo_nombre',['label'=>__('Nombre')]);
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit')) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
