<?php 
namespace ifresco\Service;

use ifresco\Service\Client;
use Guzzle\Service\Builder;

final class Repository {
	private $userName;
	private $password;

	private $builder;
	private $client;
	
	public function __construct($client,$userName,$password) {
		$this->client = $client;
		$this->userName = $userName;
		$this->password = $password;
		//$this->Authenticate();
	}

	private function Authenticate() {
		$command = $this->client->getCommand('Login', array("username"=>$this->userName,"password"=>$this->password));
		$responseModel = $this->client->execute($command);
	}
	
	public function getPersons($filter="*") {
		$command = $this->client->getCommand('GetUsers', array("filter"=>$filter));
		$responseModel = $this->client->execute($command);
		return $responseModel;
	}
	
	public function __call($method, $args) {
		$command = $this->client->getCommand($method, $args);
		$responseModel = $this->client->execute($command);
		return $responseModel;
	}
}
?>