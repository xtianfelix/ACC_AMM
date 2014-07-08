<?php

include getcwd().'/../mainconfig.php';

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	//'defaultController' => 'root',	//	RootController
	'name'=>'Abadi ACCOUNTING',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.models.db.*',
		'application.components.*',
  		'application.modules.user.models.*',
  		'application.modules.user.components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'admin',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
	    
		'user' => array(
		'debug' => false,
		'usersTable' => 'users',
		'translationTable' => 'translation',
		),
		'usergroup' => array(
		'usergroupTable' => 'user_group',
		'usergroupMessagesTable' => 'user_group_message',
		),
		'membership' => array(
		'membershipTable' => 'membership',
		'paymentTable' => 'payment',
		),
		'friendship' => array(
		'friendshipTable' => 'friendship',
		),
		'profile' => array(
		'privacySettingTable' => 'privacy_setting',
		'profileFieldsGroupTable' => 'profile_field_group',
		'profileFieldsTable' => 'profile_field',
		'profileTable' => 'profile',
		'profileCommentTable' => 'profile_comment',
		'profileVisitTable' => 'profile_visit',
		),
		'role' => array(
		'rolesTable' => 'role',
		'userHasRoleTable' => 'user_role',
		'actionTable' => 'action',
		'permissionTable' => 'permission',
		),
		'messages' => array(
		'messagesTable' => 'message',
		),
		
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
		    'class' => 'application.modules.user.components.YumWebUser',
		    'allowAutoLogin'=>true,
		    'loginUrl' => array('//user/user/login'),
		),
        'cache' => array('class' => 'system.caching.CDummyCache'),
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'appendParams' => FALSE,
			'showScriptName' => FALSE,
			'rules'=>array(
				'<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
				'<controller:\w+>/<action:\w+>/<subaction:\w+>' => '<controller>/<action>',
				'<controller:\w+>/<action:\w+>' => '<controller>/<action>',
				'module/<module:\w+>/<controller:\w+>/<action:\w+>'=>'<module>/<controller>/<action>',
			),
		),
	/*	'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),*/
		
		// uncomment the following to use a MySQL database
		
		'db'=>$db_conn_acc,
		
		'request' => array
		(
			'class'=>'HttpRequest',
			'enableCsrfValidation' => true,
			'noCsrfValidationRoutes' => array('service'),
			'csrfTokenName' => 'main_c_token',
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning, trace',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),

		'session' => array
		(
			'class' => 'Session',
			'connectionID' => 'db',
			'sessionTableName' => 'session_web',
			'sessionName' => 'main_sess',
			'autoCreateSessionTable' => TRUE,
			'cookieParams' => array
			(
				'lifetime' => (86400 * 60),
			),
			'timeout' => (86400 * 60)	//	60 days
		),
		'clientScript' => array(
                'scriptMap' => array(
                        'jquery.js' => false,
                        'jquery.min.js' => false,
                ),
        ),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'Christian Felix'=>'christianfelix@summerdroid.com',
	),
);