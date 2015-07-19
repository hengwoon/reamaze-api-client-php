<?php

namespace Reamaze\Tests;

use Reamaze\API\Resource;


class MockResource extends Resource {

}

class ResourceTest extends TestCase {
    public function testClassName() {
        $this->assertEquals('mockresource', MockResource::className());
    }

    public function testGetPath() {
        $this->assertEquals('/v1/mockresources', MockResource::path());
    }

    public function testRetrieve() {
        $this->mockRequest('GET', MockResource::url() . '/1');

        MockResource::retrieve('1');
    }

    public function testAll() {
        $this->mockRequest('GET', MockResource::url());
        $this->mockRequest('GET', MockResource::url(), array("param1" => "value1", "param2" => "value2"));

        MockResource::all();
        MockResource::all(array("param1" => "value1", "param2" => "value2"));
    }

    public function testCreate() {
        $this->mockRequest('POST', MockResource::url(), array("param1" => "value1", "param2" => "value2"));
        MockResource::create(array("param1" => "value1", "param2" => "value2"));
    }

    public function testUpdate() {
        $this->mockRequest('PUT', MockResource::url() . '/1', array("param1" => "value1", "param2" => "value2"));
        MockResource::update('1', array("param1" => "value1", "param2" => "value2"));
    }

    public function testDelete() {
        $this->mockRequest('DELETE', MockResource::url() . '/1');
        MockResource::delete('1');
    }
}
