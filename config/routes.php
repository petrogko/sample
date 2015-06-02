<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Core\Plugin;
use Cake\Routing\Router;

/**
 * The default class to use for all routes
 *
 * The following route classes are supplied with CakePHP and are appropriate
 * to set as the default:
 *
 * - Route
 * - InflectedRoute
 * - DashedRoute
 *
 * If no call is made to `Router::defaultRouteClass`, the class used is
 * `Route` (`Cake\Routing\Route\Route`)
 *
 * Note that `Route` does not do any inflections on URLs which will result in
 * inconsistently cased URLs when used with `:plugin`, `:controller` and
 * `:action` markers.
 *
 */
Router::defaultRouteClass('Route');

Router::connect('/', ['controller' => 'Default', 'action' => 'index', 'home']);
Router::connect('/pages', ['controller' => 'Pages', 'action' => 'display', 'home']);

Router::scope('/feeds', ['controller' => 'Article'], function($routes) {
    $routes->connect('/', ['action'=>'index']);
    $routes->connect('/add', ['action'=>'add']);
    $routes->connect('/edit/*', ['action'=>'edit']);
    $routes->connect('/view/*', ['action'=>'view']);
    $routes->connect('/delete/*', ['action'=>'delete']);
//    $routes->fallbacks('InflectedRoute');
});

Router::scope('/medium', ['controller' => 'Medium'], function($routes) {
    $routes->connect('/', ['action' => 'index']);
    $routes->connect('/add', ['action'=>'add']);
    $routes->connect('/edit/*', ['action'=>'edit']);
    $routes->connect('/view/*', ['action'=>'view']);
    $routes->connect('/delete/*', ['action'=>'delete']);
});

// RestFul API's
// TODO - Implement
Router::connect('/api/twitter/get', ['controller' => 'Twitter', 'action' => 'get']);
Router::connect('/api/pintrest/get', ['controller' => 'Pintrest', 'action' => 'get']);

/**
 * Load all plugin routes.  See the Plugin documentation on
 * how to customize the loading of plugin routes.
 */
Plugin::routes();