<div class="row">
    <div class="page-header">
        <h2><?= __('Editar Almacen') ?></h2>
    </div>
    <div class="col-md-6 col-md-offset-3">
        <?= $this->Form->create($almacene) ?>
        <fieldset>
        
            <?php
                echo $this->Form->control('almacen_nombre', ['label'=>__('Nombre')]);
            ?>
        </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
    </div>
</div>
