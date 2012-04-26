<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Spiros
 * Date: 4/24/12
 * Time: 12:46 PM
 * To change this template use File | Settings | File Templates.
 */

$main = include_once( 'main.php' );

$production = array(

    'components'=>array(
        'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
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
    ),
    );



return array_merge_recursive($main,$production);