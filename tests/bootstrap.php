<?php

error_reporting(E_ALL | E_STRICT);

if (!file_exists(dirname(__DIR__) . '/composer.lock')) {
	die("Dependencies must be installed using composer:\n\nphp composer.phar install --dev\n\n"
			. "See http://getcomposer.org for help with installing composer\n");
}


$autoloader = require dirname(__DIR__) . '/vendor/autoload.php';
$alfrescoData = __DIR__ . '/ifresco/Tests/AlfrescoData/service.json';
$data = json_decode(file_get_contents($alfrescoData));
Guzzle\Tests\GuzzleTestCase::setServiceBuilder(Guzzle\Service\Builder\ServiceBuilder::factory(array(
		'test.ifresco' => array(
				'class' => 'ifresco\Service\Client',
				'params' => array(
						'host' => $data->host,
						'username' => $data->user,
						'password' => $data->pass,
				)
		)
)));