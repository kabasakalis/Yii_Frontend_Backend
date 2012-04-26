<?php

// uncomment the following to define a path alias


// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath'=>realpath('..').DS.'backend',
	'name'=>'My BackEnd Administration',
     'params'=>require(dirname(__FILE__).DS.'params.php'),
    'aliases'=>array(
    'bootstrap'=>'webroot.protected.extensions.bootstrap'
    ),
	// preloading 'log' component
	'preload'=>array(
       'log',
 //   'bootstrap', // preload the bootstrap component
     ),
	// autoloading model and component classes
	'import'=>array(
     'application.models.*',
	 'application.components.*',
   //   'root.common.helpers.*',
      'root.commonend.models.*',
	  'root.commonend.components.*',
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),

		// uncomment the following to enable URLs in path-format
		'urlManager'=>array(
			'urlFormat'=>'path',
            'showScriptName'=>false,
			'rules'=>array(
                 'site/page/<view:\w+>' => 'site/page/',
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
            'errorAction'=>'site/error',
        ),

        'clientScript'=>array(
        'class' => 'CClientScript',
                'scriptMap' => array(
                        'jquery.js'=>false,
                    'jquery.min.js'=>false
                ),
            //CClientScript:POS_END
        'coreScriptPosition' => 2,
),
	),//components


);