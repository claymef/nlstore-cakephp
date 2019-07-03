<div class="row">
    <div class="page-header">
        <h2><?= h($user->user_nombre) ?></h2>
    </div>
    <div class="col-md-6 col-md-offset-3">
        <?= $this->Form->create($user) ?>
        <fieldset>
            <legend><?= __('Edit User') ?></legend>
            <?php
                echo $this->Form->control('user_nombre', ['label'=>__('Nombre')]);
                echo $this->Form->control('user_apellido', ['label'=>__('Apellido')]);
                echo $this->Form->control('user_dni', ['label'=>__('DNI')]);
                echo $this->Form->control('user_correo', ['label'=>__('Correo Electrónico'),'type' => 'email']);
                echo $this->Form->control('user_contraseña', ['label'=>__('Contraseña'),'type' => 'password']);
                echo $this->Form->control('user_role', ['label'=>__('Rol'),'options' => ['admin' => 'Admin', 'cliente' => 'Cliente']]);
                echo $this->Form->control('user_status', ['label'=>__('Estatus')]);
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit')) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
