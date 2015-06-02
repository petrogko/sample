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
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;

$this->layout = false;

if (!Configure::read('debug')):
    throw new NotFoundException();
endif;

$cakeDescription = 'Simple twitter feed';
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <?= $this->Html->charset() ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>
    </title>

    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('bootstrap.min.css') ?>
    <style>
        body {
            padding-top: 50px;
            padding-bottom: 20px;
        }
    </style>
    <?= $this->Html->css('bootstrap-theme.min.css') ?>
    <?= $this->Html->css('main.css') ?>
    <?= $this->Html->script('vendor/modernizer-2.8.3-respond-1.4.2.min') ?>
</head>
<body class="home">
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <div id="content">
        <?php
        if (Configure::read('debug')):
            Debugger::checkSecurityKeys();
        endif;
        ?>

         <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">Project name</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <form class="navbar-form navbar-right" role="form">
                <div class="form-group">
                  <input type="text" placeholder="Email" class="form-control">
                </div>
                <div class="form-group">
                  <input type="password" placeholder="Password" class="form-control">
                </div>
                <button type="submit" class="btn btn-success">Sign in</button>
              </form>
            </div><!--/.navbar-collapse -->
            </div>
         </nav>

        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron">
            <div class="container">
                <h1>Hello, world!</h1>
            </div>
        </div>

        <div class="container">
            <!-- Example row of columns -->
            <div class="row">
                <?php foreach ($tweets as $tweet) { ?>
                    <?php if(!empty($tweet->text)) { ?>
                    <div class="col-md-4 portfolio-item" style="display: inline-block">
                        <p>
                            <a href="#">
                                <img class="img-responsive" src="<?= $tweet->user->profile_image_url ?>" alt="">
                                <?= $tweet->text ?>
                            </a>
                        </p>
                        <pre>Created At: <?= $tweet->created_at ?> <br> By: <?= $tweet->user->name ?></pre>
                        <pre>Users Followers Count: <?= $tweet->user->followers_count ?></pre>
                    </div>

                <?php } } ?>
            </div>
        </div> <!-- /container -->
        <hr>
    </div>
    <footer>
    </footer>
</body>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <?= $this->Html->script('vendor/modernizer-2.8.3-respond-1.4.2.min') ?>
    <?= $this->Html->script('vendor/bootstrap.min') ?>
    <?= $this->Html->script('plugins') ?>
    <?= $this->Html->script('main') ?>

</html>
