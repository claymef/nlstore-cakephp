<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'NL Store';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    
    <?= $this->Html->css('https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css')?>
    <?= $this->Html->css(['bootstrap','mystyle']) ?>
    <?= $this->Html->script(['jquery-2.2.4','bootstrap']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
<nav class="navbar navbar-inverse nav-users">
        <div class="container">
            <div class="navbar-header">
                
                <?php 
                    echo $this->Html->link(
                        $this->Html->tag('i', '', array('class' => 'fa fa-home','aria-hidden'=>'true')
                    ).__('Inicio'),
                    '/',
                    array('escape' => false,'class' => 'navbar-brand')) 
                    ?>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?= __('Usuarios') ?><span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <?= $this->Html->link(__('Lista de Usuarios'),['controller' => 'Users', 'action' => 'index']) ?>
                            </li>
                            <li>
                                <?= $this->Html->link(__('Crear Usuario'),['controller' => 'Users', 'action' => 'add']) ?>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?= __('Almacenes') ?><span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <?= $this->Html->link(__('Lista de Almacenes'),['controller' => 'Almacenes', 'action' => 'index']) ?>
                            </li>
                            <li>
                                <?= $this->Html->link(__('Crear Almacen'),['controller' => 'Almacenes', 'action' => 'add']) ?>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?= __('Modelos') ?><span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <?= $this->Html->link(__('Lista de Modelos'),['controller' => 'Modelos', 'action' => 'index']) ?>
                            </li>
                            <li>
                                <?= $this->Html->link(__('Crear Modelo'),['controller' => 'Modelos', 'action' => 'add']) ?>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?= __('Prendas') ?><span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <?= $this->Html->link(__('Lista de Prendas'),['controller' => 'Prendas', 'action' => 'index']) ?>
                            </li>
                            <li>
                                <?= $this->Html->link(__('Crear Prenda'),['controller' => 'Prendas', 'action' => 'add']) ?>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?= __('Facturas') ?><span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <?= $this->Html->link(__('Lista de Facturas'),['controller' => 'Facturas', 'action' => 'index']) ?>
                            </li>
                            <li>
                                <?= $this->Html->link(__('Crear Factura'),['controller' => 'Facturas', 'action' => 'add']) ?>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?= __('Detalles de Venta') ?><span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <?= $this->Html->link(__('Lista de Detalles de Venta'),['controller' => 'Detalleventa', 'action' => 'index']) ?>
                            </li>
                            <li>
                                <?= $this->Html->link(__('Crear Detalle de Venta'),['controller' => 'Detalleventa', 'action' => 'add']) ?>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav">
                    <li><?= $this->Html->image("icons/32/peru_flag_flags_18118.png", [
                        "alt" => "Español",
                        'url' =>['controller' => 'App', 'action' => 'change-language', 'es_PE']
                    ]); ?></li>
                    <li><?= $this->Html->image("icons/32/usa_18285.png", [
                        "alt" => "English",
                        'url' =>['controller' => 'App', 'action' => 'change-language', 'en_US']
                    ]); ?></li>
                    <li><?= $this->Html->image("icons/32/brazil_18295.png", [
                        "alt" => "Portugues",
                        'url' =>['controller' => 'App', 'action' => 'change-language', 'pt_BR']
                    ]); ?></li>
                </ul>
            </div>  
        </div>
    </nav>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
</html>
