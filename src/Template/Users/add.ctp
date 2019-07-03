<head>
    <!--captcha-->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="page-header">
            <h2><?=__('Crear Usuario') ?></h2>
        </div>
        <?= $this->Form->create($user) ?>
        <fieldset>
            <?php
                echo $this->Form->control('user_nombre',['label'=>__('Nombre')]);
                echo $this->Form->control('user_apellido',['label'=>__('Apellido')]);
                echo $this->Form->control('user_dni',['label'=>__('DNI')]);
                echo $this->Form->control('user_correo',['label'=>__('Correo Electrónico'), 'type' => 'email']);
                echo $this->Form->control('user_contraseña',['label'=>__('Contraseña'), 'type' => 'password']);
                echo $this->Form->control('user_role', ['options' => ['admin' => 'Admin', 'cliente' => 'Cliente'],'label'=>__('Rol'), 'empty' => '--Seleccione--']);
                echo $this->Form->control('user_status',['label'=>__('Estatus')]);
            ?>
        </fieldset>
        <!--captcha-->
        <div class="g-recaptcha" data-theme="light" data-sitekey="6LcmwqkUAAAAAB9KuvvQl8gr4nI78UGbCWolWn9i"></div>
        <?= $this->Form->button(__('Submit'),['class'=>'submit']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>