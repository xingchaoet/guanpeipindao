<?php
return array(
	'loggers' => array(
		'base' => dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'log'.DIRECTORY_SEPARATOR,
		'system' => 'system',
		'app' => 'app'
	),
	'levels' => array('DEBUG', 'INFO', 'ERROR', 'WARN', 'FATAL'),
	'handlers' => array(
		'file' => array(
			'driver' => 'file',
			'level' => array('DEBUG'),
			'formatter' => 'generic',
			'enabled' => true,
			'config' => array(
				'dir' => dirname(dirname(__FILE__)).'/log',
			),
		),
	),
	'formatters' => array(
		'generic' => '{time} {level} [{logger}] {uri} """{message}"""',
	),
);
