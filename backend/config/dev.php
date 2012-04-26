<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Spiros
 * Date: 4/24/12
 * Time: 12:45 PM
 * To change this template use File | Settings | File Templates.
 */

$main = include('main.php');

$development = array(

    'components' => array(

        'db' => array(
            'connectionString' => 'sqlite:' . dirname(__FILE__) . '/../data/testdrive.db',
        ),
        // uncomment the following to use a MySQL database
        /*
          'db'=>array(
              'connectionString' => 'mysql:host=localhost;dbname=testdrive',
              'emulatePrepare' => true,
              'username' => 'root',
              'password' => '',
              'charset' => 'utf8',
          ),
          */

        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
            /*    array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),*/
                // uncomment the following to show log messages on web pages

                array(
                    'class' => 'CWebLogRoute',
                    'levels' => 'trace,info,error,warning',
                    'categories' => 'vardump',
                    'showInFireBug' => true
                )
            ),
        ),

    ),

    'modules' => array(
        // uncomment the following to enable the Gii tool
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => '1',
            'generatorPaths' => array(
                //    'bootstrap.gii', // since 0.9.1
            ),
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '::1'),
        ),
    ),

);


return array_merge_recursive($main, $development);