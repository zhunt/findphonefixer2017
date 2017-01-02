<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
    <!DOCTYPE html>

    <html lang="en-US">
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">


        <link href="/assets/fonts/font-awesome.css" rel="stylesheet" type="text/css">
        <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="/bootstrap/css/bootstrap.css" type="text/css">
        <link rel="stylesheet" href="/css/bootstrap-select.min.css" type="text/css">
        <link rel="stylesheet" href="/css/owl.carousel.css" type="text/css">
        <link rel="stylesheet" href="/css/jquery.nouislider.min.css" type="text/css">
        <link rel="stylesheet" href="/css/colors/brown.css" type="text/css">
        <link rel="stylesheet" href="/css/user.style.css" type="text/css">

        <title>Find Phone Fixer: Cellphone Repairs
            <?= $cakeDescription ?>:
            <?= $this->fetch('title') ?>
        </title>

        <meta name="description" content="Find places near you to get your iPhone, Samsung, or cellphone repaired.">

        <?= $this->Html->meta('icon') ?>


        <?php /*
            echo $this->Html->css('base.css')
            echo $this->Html->css('cake.css')
        */ ?>

        <?= $this->fetch('meta') ?>
        <?= $this->fetch('css') ?>
        <?= $this->fetch('script') ?>

    </head>

<body onunload="" class="map-fullscreen page-homepage navigation-off-canvas" id="page-top">

<!-- Outer Wrapper-->
<div id="outer-wrapper">
    <!-- Inner Wrapper -->
    <div id="inner-wrapper">

        <!-- Navigation-->
        <div class="header">
            <div class="wrapper">
                <div class="brand">
                    <a href="index-restaurants.html"><img src="/assets/img/logo-restaurants.png" alt="logo"></a>
                </div>
                <nav class="navigation-items">
                    <div class="wrapper">
                        <ul class="main-navigation navigation-top-header"></ul>
                        <ul class="user-area">
                            <li><a href="sign-in.html">Sign In</a></li>
                            <li><a href="register.html"><strong>Register</strong></a></li>
                        </ul>
                        <a href="submit.html" class="submit-item">
                            <div class="content"><span>Submit Your Item</span></div>
                            <div class="icon">
                                <i class="fa fa-plus"></i>
                            </div>
                        </a>
                        <div class="toggle-navigation">
                            <div class="icon">
                                <div class="line"></div>
                                <div class="line"></div>
                                <div class="line"></div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- end Navigation-->

    <?= $this->Flash->render() ?>

        <?= $this->fetch('content') ?>

    </div>
</div>

<script type="text/javascript" src="/js/jquery-2.1.0.min.js"></script>
<script type="text/javascript" src="/js/before.load.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&amp;libraries=places"></script>
<script type="text/javascript" src="/js/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/smoothscroll.js"></script>
<script type="text/javascript" src="/js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="/js/jquery.hotkeys.js"></script>
<script type="text/javascript" src="/js/jquery.nouislider.all.min.js"></script>
<script type="text/javascript" src="/js/custom.js"></script>
<script type="text/javascript" src="/js/maps.js"></script>

<script>
    $(window).load(function(){
        var rtl = false; // Use RTL
        initializeOwl(rtl);
    });

    // autoComplete(); // turn off for now
</script>

<!--[if lte IE 9]>
<script type="text/javascript" src="/js/ie-scripts.js"></script>
<![endif]-->


</body>
</html>
