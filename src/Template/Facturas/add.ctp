<div class="row">
    <div class="page-header">
        <h2><?= __('Crear Factura') ?></h2>
    </div>
    <div class="col-md-6 col-md-offset-3">
        <?= $this->Form->create($factura) ?>
        <fieldset>
            
            <?php
                echo "Cree una factura";
                echo " ";
                echo " ";
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit')) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
