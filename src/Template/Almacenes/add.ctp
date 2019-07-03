<div class="row">
    <div class="page-header">
        <h2><?= __('Crear Almacen') ?></h2>
    </div>
    <div class="col-md-6 col-md-offset-3">
        <?= $this->Form->create($almacene) ?>
        <fieldset>
            
            <?php
                echo $this->Form->control('almacen_nombre');
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit')) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
