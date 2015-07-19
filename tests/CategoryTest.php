<?php

namespace Reamaze\Tests;

use Reamaze\API\Category;

class CategoryTest extends TestCase {
    public function testGetPath() {
        $this->assertEquals('/v1/categories', Category::path());
    }
}
