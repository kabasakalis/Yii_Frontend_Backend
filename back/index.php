<?php

defined('DS') or define('DS',DIRECTORY_SEPARATOR);

// change the following paths if necessary
$realRoot=realpath('..').DS;
$shortcuts=$realRoot.'commonend'.DS.'helpers'.DS.'shortcuts.php';
$yii=dirname(__FILE__).DS.'..'.DS.'..'.DS.'..'.DS.'frameworks'.DS .'yii_1.1.10'.DS .'framework'.DS .'yii.php';


// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);


$configBackFolder=$realRoot.'backend'.DS.'config'.DS;
$configBackFile = YII_DEBUG ? 'dev.php' : 'production.php';

$configBack=require($configBackFolder.$configBackFile);

require($shortcuts);
require_once($yii);

//fb($configBack);

 Yii::setPathOfAlias('root',realpath('..'));
 Yii::createWebApplication($configBack)->run();
 

