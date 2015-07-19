<?php

namespace Reamaze\Tests;

use Reamaze\API\Config;

class TestCase extends \PHPUnit_Framework_TestCase {
    protected $mock = null;

    protected function setUp() {
        $this->mockClient = null;
        $this->call = 0;
        Config::setBrand('example');
        Config::setCredentials('login', 'token');
    }

    protected function tearDown() {
        Config::setBrand(null);
        Config::setCredentials(null, null);
    }

    protected function mockRequest($method, $url, $params = null, $return = array('id' => 'mockId')) {
        $mock = $this->setUpMockRequest();

        $mock->expects($this->at($this->call++))
            ->method('makeRequest')
            ->with($method, $url, $params)
            ->will($this->returnValue(json_encode($return, true)));
    }

    private function setUpMockRequest() {
        if (!$this->mock) {
            $this->mock = $this->getMock('\Reamaze\API\Clients\CurlClient');
            \Reamaze\API\Resource::setClient($this->mock);
        }

        return $this->mock;
    }
}
