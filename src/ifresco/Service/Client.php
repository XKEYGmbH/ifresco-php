<?php 

namespace ifresco\Service;

use ifresco\Service\Repository;
use Guzzle\Common\Collection;
use Guzzle\Service\Client as GuzzleClient;
use Guzzle\Service\Description\ServiceDescription;
use Guzzle\Plugin\CurlAuth\CurlAuthPlugin;

class Client extends GuzzleClient {
	private $client;
	private $username;
	private $password;
	public static function factory($config = array())
	{
		try {
		$default = array(
				'base_url' => '{scheme}://{host}:{port}',
				'scheme'   => 'http',
				'host'   => 'localhost',
				'port'   => '8080',
				'alfPath' => 'alfresco'
		);
		$required = array('username', 'password');
		$config = Collection::fromConfig($config, $default, $required);

		$client = new self($config->get('base_url'), $config);
		$client->client = $client;
		$client->username = $config->get('username');
		$client->password = $config->get('password');
		
		$authPlugin = new CurlAuthPlugin('admin', 'geheim!');
		$client->addSubscriber($authPlugin);
		
		$description = ServiceDescription::factory(__DIR__ . '/Description/Alfresco.json');
		$client->setDescription($description);
		return $client;
		}
		catch (\Exception $e) {
			echo $e->getMessage();
		}
	}
	
	public function getRepository() {
		return new Repository($this->client,$this->username,$this->password);
	}

	/*
	private $repoUrl;
	private $userName;
	private $password;
	private $client;
	private $alfPath;
	
	public function __construct($repoUrl,$userName,$password,$alfPath = "alfresco") {
		$this->repoUrl = $repoUrl;
		$this->userName = $userName;
		$this->password = $password;
		$this->alfPath = $alfPath;
		$this->init();
	}

	private function init() {
		$this->client = new \Guzzle\Http\Client($this->repoUrl,array(
			//'curl.options' => array(
			//	 CURLOPT_SSL_VERIFYHOST   => false,
				//		'CURLOPT_SSL_VERIFYPEER' => false
				
		));

		$this->auth();
	}

	private function auth() {
		try {
			//$request = $client->post('/service/api/login')->setAuth('user', 'pass');
			$request = $this->client->post($this->alfPath.'/service/api/login?format=xml',null, 
					array('username' =>urlencode($this->userName), 'password' => urlencode($this->password)));
			$response = $request->send();
			$data = $response->getBody();
			print_R($data);
			die();
		}
		catch (\Exception $e) {
			echo $e->getMessage();
			die();
		}
	}*/
}

?>