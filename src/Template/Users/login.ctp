<head>
    <!--captcha-->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>


<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="page-header">
            <h2>Iniciar Sesión</h2>
        </div>
        
            <?= $this->Form->create() ?>
            <?= $this->Form->control('user_correo', ['type' => 'email']) ?>
            <?= $this->Form->control('user_contraseña', ['type' => 'password']); ?>
            <!--captcha-->
            <div class="g-recaptcha" data-sitekey="6LcmwqkUAAAAAB9KuvvQl8gr4nI78UGbCWolWn9i"></div>
            <?= $this->Form->button('Login') ?>
            <?= $this->Form->end() ?>
        
    </div>
</div>