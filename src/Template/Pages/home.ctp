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
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;

$this->layout = false;


$cakeDescription = 'NL Store';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>
    </title>

    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css')?>
    <?= $this->Html->css('home1.css') ?>
   
</head>
<body >
    <!--Menu de navegacion-->
    <nav class="menunav">
        <img class="menuimg" src="favicon.ico" width="83" height="83">
        <ul class="menuul">
            <li class="menuli"> <?php 
                    echo $this->Html->link(
                        $this->Html->tag('i', '', array('class' => 'fa fa-home','aria-hidden'=>'true')
                    ).' Inicio',
                    '',
                    array('escape' => false)) 
                    ?>
            </li>
            <li class="menuli"> <?php 
                    echo $this->Html->link(
                        $this->Html->tag('i', '', array('class' => 'fa fa-shopping-bag','aria-hidden'=>'true')
                    ).' Servicios',
                    '#services',
                    array('escape' => false)) 
                    ?>
            </li>
            <li class="menuli"> <?php 
                    echo $this->Html->link(
                        $this->Html->tag('i', '', array('class' => 'fa fa-info-circle','aria-hidden'=>'true')
                    ).' Acerca de',
                    '#about',
                    array('escape' => false)) 
                    ?>
            </li>
            <li class="menuli"> <?php 
                    echo $this->Html->link(
                        $this->Html->tag('i', '', array('class' => 'fa fa-phone','aria-hidden'=>'true')
                    ).' Contactar',
                    '#contact',
                    array('escape' => false)) 
                    ?>
            </li>
            <li class="menuli"> <?php 
                    echo $this->Html->link(
                        $this->Html->tag('i', '', array('class' => 'fa fa-sign-in','aria-hidden'=>'true')
                    ).' Iniciar Sesión',
                    '/users',
                    array('escape' => false)) 
                    ?>
            </li>
        </ul>
    </nav> 
    <!--Secciones-->
    <section name="Home">
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ducimus fugit laudantium, itaque aliquam facilis perspiciatis. Natus qui sapiente nisi voluptas nobis, magnam, quibusdam facilis, sunt est similique ducimus ut nemo?
        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestias esse corporis, sed itaque suscipit voluptate cumque minima delectus, sint nostrum quo adipisci debitis inventore vero nemo mollitia rerum odit iste!
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt asperiores iste natus ipsa quos, in tempora ad vero debitis sapiente deserunt reiciendis at! Placeat assumenda neque facilis. Similique, quod quo.
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Inventore suscipit non corrupti quasi enim consectetur, laborum, cupiditate assumenda eius commodi animi vitae debitis tempora, nostrum deserunt ullam. Eaque, quibusdam et.
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ut non repellat distinctio odio nihil magni itaque natus nostrum aliquid voluptas dolore dicta aperiam laborum rerum laudantium praesentium, earum ratione eligendi?
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Optio ullam voluptatem illo iure, doloribus obcaecati. Fugiat ut, assumenda repellat sunt placeat neque laborum exercitationem fuga omnis officiis quibusdam eligendi tempore.
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit quidem, ipsa cumque maiores aspernatur nam cum culpa iure recusandae eius veritatis illum? Maiores libero error corporis sint aliquam reiciendis nesciunt?
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam, quisquam et voluptatibus possimus excepturi ut placeat necessitatibus maiores nihil voluptatum iure voluptatem cum numquam distinctio. Ullam nostrum facere aliquam in.
    </section>
    <section >
        <a name="services"></a>
        <div class="sectiondiv">
            <div class="titlesection">
                <a href="service.html">
                    <?php  
                        echo $this->Html->tag('i', '', array('class' => 'fa fa-shopping-bag','aria-hidden'=>'true')
                        ).' Servicios';
                        array('escape' => false) 
                    ?>
                </a>
            </div>
        </div>
        
        <div class="product">
            <div class="imgbox">
                <?php echo $this->Html->image('image.png',['alt'=>'CakePHP']);?>
            </div>
            <div class="details">
                <h2>Brand Name<br><span>Men's Designer T-Shirt</span></h2>
                <div class="price">$55.99</div>
                <label class="cardlabel">Size</label>
                <ul class="cardul">
                    <li class="cardli">XS</li>
                    <li class="cardli">S</li>
                    <li class="cardli">M</li>
                    <li class="cardli">XL</li>
                    <li class="cardli">XXL</li>
                </ul>
                <label>Colors</label>
                <ul class="colors">
                    <li class="cardli"></li>
                    <li class="cardli"></li>
                    <li class="cardli"></li>
                    <li class="cardli"></li>
                    <li class="cardli"></li>
                </ul>
                <a class="carda" href="#">Add to Cart</a>
            </div>
        </div>
        <div class="product">
            <div class="imgbox">
                <?php echo $this->Html->image('image2.png',['alt'=>'CakePHP']);?>
            </div>
            <div class="details">
                <h2>Brand Name<br><span>Men's Designer T-Shirt</span></h2>
                <div class="price">$55.99</div>
                <label class="cardlabel">Size</label>
                <ul class="cardul">
                    <li class="cardli">XS</li>
                    <li class="cardli">S</li>
                    <li class="cardli">M</li>
                    <li class="cardli">XL</li>
                    <li class="cardli">XXL</li>
                </ul>
                <label>Colors</label>
                <ul class="colors">
                    <li class="cardli"></li>
                    <li class="cardli"></li>
                    <li class="cardli"></li>
                    <li class="cardli"></li>
                    <li class="cardli"></li>
                </ul>
                <a class="carda" href="#">Add to Cart</a>
            </div>
        </div>
        <div class="product">
            <div class="imgbox">
                <?php echo $this->Html->image('image3.png',['alt'=>'CakePHP']);?>
            </div>
            <div class="details">
                <h2>Brand Name<br><span>Men's Designer T-Shirt</span></h2>
                <div class="price">$55.99</div>
                <label class="cardlabel">Size</label>
                <ul class="cardul">
                    <li class="cardli">XS</li>
                    <li class="cardli">S</li>
                    <li class="cardli">M</li>
                    <li class="cardli">XL</li>
                    <li class="cardli">XXL</li>
                </ul>
                <label>Colors</label>
                <ul class="colors">
                    <li class="cardli"></li>
                    <li class="cardli"></li>
                    <li class="cardli"></li>
                    <li class="cardli"></li>
                    <li class="cardli"></li>
                </ul>
                <a class="carda" href="#">Add to Cart</a>
            </div>
        </div><div class="product">
            <div class="imgbox">
                <?php echo $this->Html->image('image4.png',['alt'=>'CakePHP']);?>
            </div>
            <div class="details">
                <h2>Brand Name<br><span>Men's Designer T-Shirt</span></h2>
                <div class="price">$55.99</div>
                <label class="cardlabel">Size</label>
                <ul class="cardul">
                    <li class="cardli">XS</li>
                    <li class="cardli">S</li>
                    <li class="cardli">M</li>
                    <li class="cardli">XL</li>
                    <li class="cardli">XXL</li>
                </ul>
                <label>Colors</label>
                <ul class="colors">
                    <li class="cardli"></li>
                    <li class="cardli"></li>
                    <li class="cardli"></li>
                    <li class="cardli"></li>
                    <li class="cardli"></li>
                </ul>
                <a class="carda" href="#">Add to Cart</a>
            </div>
        </div>
        <div class="product">
            <div class="imgbox">
                <?php echo $this->Html->image('image.png',['alt'=>'CakePHP']);?>
            </div>
            <div class="details">
                <h2>Brand Name<br><span>Men's Designer T-Shirt</span></h2>
                <div class="price">$55.99</div>
                <label class="cardlabel">Size</label>
                <ul class="cardul">
                    <li class="cardli">XS</li>
                    <li class="cardli">S</li>
                    <li class="cardli">M</li>
                    <li class="cardli">XL</li>
                    <li class="cardli">XXL</li>
                </ul>
                <label>Colors</label>
                <ul class="colors">
                    <li class="cardli"></li>
                    <li class="cardli"></li>
                    <li class="cardli"></li>
                    <li class="cardli"></li>
                    <li class="cardli"></li>
                </ul>
                <a class="carda" href="#">Add to Cart</a>
            </div>
        </div>
        <div class="product">
            <div class="imgbox">
                <?php echo $this->Html->image('image2.png',['alt'=>'CakePHP']);?>
            </div>
            <div class="details">
                <h2>Brand Name<br><span>Men's Designer T-Shirt</span></h2>
                <div class="price">$55.99</div>
                <label class="cardlabel">Size</label>
                <ul class="cardul">
                    <li class="cardli">XS</li>
                    <li class="cardli">S</li>
                    <li class="cardli">M</li>
                    <li class="cardli">XL</li>
                    <li class="cardli">XXL</li>
                </ul>
                <label>Colors</label>
                <ul class="colors">
                    <li class="cardli"></li>
                    <li class="cardli"></li>
                    <li class="cardli"></li>
                    <li class="cardli"></li>
                    <li class="cardli"></li>
                </ul>
                <a class="carda" href="#">Add to Cart</a>
            </div>
        </div>
        <div class="product">
            <div class="imgbox">
                <?php echo $this->Html->image('image3.png',['alt'=>'CakePHP']);?>
            </div>
            <div class="details">
                <h2>Brand Name<br><span>Men's Designer T-Shirt</span></h2>
                <div class="price">$55.99</div>
                <label class="cardlabel">Size</label>
                <ul class="cardul">
                    <li class="cardli">XS</li>
                    <li class="cardli">S</li>
                    <li class="cardli">M</li>
                    <li class="cardli">XL</li>
                    <li class="cardli">XXL</li>
                </ul>
                <label>Colors</label>
                <ul class="colors">
                    <li class="cardli"></li>
                    <li class="cardli"></li>
                    <li class="cardli"></li>
                    <li class="cardli"></li>
                    <li class="cardli"></li>
                </ul>
                <a class="carda" href="#">Add to Cart</a>
            </div>
        </div><div class="product">
            <div class="imgbox">
                <?php echo $this->Html->image('image4.png',['alt'=>'CakePHP']);?>
            </div>
            <div class="details">
                <h2>Brand Name<br><span>Men's Designer T-Shirt</span></h2>
                <div class="price">$55.99</div>
                <label class="cardlabel">Size</label>
                <ul class="cardul">
                    <li class="cardli">XS</li>
                    <li class="cardli">S</li>
                    <li class="cardli">M</li>
                    <li class="cardli">XL</li>
                    <li class="cardli">XXL</li>
                </ul>
                <label>Colors</label>
                <ul class="colors">
                    <li class="cardli"></li>
                    <li class="cardli"></li>
                    <li class="cardli"></li>
                    <li class="cardli"></li>
                    <li class="cardli"></li>
                </ul>
                <a class="carda" href="#">Add to Cart</a>
            </div>
        </div>
        <div class="seediv">
                <li><a href="service.html" class="seea"><i class="fa fa-chevron-right" aria-hidden="true"></i> See More</a></li>
        </div>
    </section>
    <section class="wave">
        <a name="about" style="color:#f68b20">.</a>
        <!--Encabezado de seccion-->
        <div class="sectiondiv">
            <div class="titlesection">
                <?php  
                    echo $this->Html->tag('i', '', array('class' => 'fa fa-info-circle','aria-hidden'=>'true')
                    ).' About';
                    array('escape' => false) 
                ?>
            </div>
        </div>
        <!--Cuerpo de seccion-->
        <div>
            <h3>About</h3>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusamus quia, cumque debitis ullam autem eaque animi sed non voluptatem totam numquam reprehenderit optio quod. Iusto recusandae officiis consequatur nesciunt animi?Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis maxime obcaecati vitae harum enim. Cupiditate cumque neque nam minus itaque, deleniti ipsum praesentium excepturi corporis, ratione nulla officia dignissimos Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit, aut. Modi consequatur odio quaerat asperiores possimus quae incidunt sit quibusdam blanditiis, nobis libero recusandae voluptate, aliquam minima velit quo exercitationem. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illum sint modi itaque ut at ipsum expedita molestiae nostrum illo quis, dicta vitae laborum quibusdam voluptates officia nulla, qui officiis repellat! Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus, corrupti veniam unde, id reprehenderit laudantium, commodi et corporis voluptatem quae voluptatibus ex. Minus rem quos labore enim eligendi beatae! Quaerat. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Possimus quo accusamus recusandae ipsam cum labore reprehenderit esse adipisci magnam. Ducimus explicabo laboriosam exercitationem temporibus debitis excepturi placeat magnam corporis eos.</p>
        </div>
        <div class="w3-third w3-center">
            <i class="fa fa-anchor w3-padding-64 w3-text-red"></i>
        </div>
    </section>
    <section class="about">
        <a name="contact">Contact</a>
    </section>
</body>
</html>
