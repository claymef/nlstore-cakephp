<div class="row">
    <div class="page-header">
        <h2><?= __('Editar Factura') ?></h2>
    </div>
    <div class="col-md-6 col-md-offset-3">
        <?= $this->Form->create($factura) ?>
        <fieldset>
            
            <?php
                echo $this->Form->control('user_id', ['label'=>__('Usuario'),'options' => $users, 'empty' => '--Seleccione--']);
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit')) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
