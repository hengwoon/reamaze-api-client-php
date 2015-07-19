<?php

namespace Reamaze\Tests;

use Reamaze\API\Config;

class ConfigTest extends TestCase {
    public function testCredentials() {
        Config::setCredentials("login@example.com", "apitoken");

        $this->assertEquals(array("login" => "login@example.com", "apiToken" => "apitoken"), Config::getCredentials());
    }

    public function testBrand() {
        Config::setBrand("hello");

        $this->assertEquals("hello", Config::getBrand());
    }

    public function testBaseUrl() {
        Config::setBrand("hello");

        $this->assertEquals("https://hello." . Config::BASE_DOMAIN . '/api', Config::getBaseUrl());
    }

    public function testBaseUrlExceptionIfBrandNotSet() {
        Config::setBrand(null);

        $this->setExpectedException('Reamaze\API\Exceptions\Config');

        Config::getBaseUrl();
    }
}
