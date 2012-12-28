<?php

namespace ifresco\Tests;

use RuntimeException;
use Exception;
use ifresco\Service\Repository;
use Guzzle\Tests\GuzzleTestCase;

class ifrescoTest extends GuzzleTestCase {
	private $client;
	protected function setUp() {
		$builder = self::getServiceBuilder();
		$this->client = $builder->get('test.ifresco');
	}

	public function testAuthentication() {
		try {
			$Repository = $this->client->getRepository();
		}
		catch (\Exception $e) {
			$this->fail();
		}
	}

	public function testPersons() {
		try {
			$Repository = $this->client->getRepository();
			//$Repository->getPersons();
			$Repository->GetUsers(array("filter"=>"*"));
		}
		catch (\Exception $e) {
			$this->fail();
		}
	}
}
?>