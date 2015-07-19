<?php

namespace Reamaze\Tests;

use Reamaze\API\Conversation;

class ConversationTest extends TestCase {
    public function testGetPath() {
        $this->assertEquals('/v1/conversations', Conversation::path());
    }
}
