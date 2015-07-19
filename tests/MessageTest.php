<?php

namespace Reamaze\Tests;

use Reamaze\API\Message;
use Reamaze\API\Conversation;
use Reamaze\API\Exceptions\Api as ApiException;

class MessageTest extends TestCase {
    public function testGetPath() {
        $this->assertEquals('/v1/messages', Message::path());
    }

    public function testCreateRequiresConversationSlug() {
        try {
            Message::create(array(
                "body" => "Hello world!",
                "visibility" => 0
            ));
        } catch (ApiException $e) {
            $this->assertSame("Missing parameter 'conversation_slug'", $e->getMessage());
        }
    }

    public function testCreateUrl() {
        $conversation_slug = 'hello';
        $this->mockRequest('POST', Conversation::url() . "/" . $conversation_slug . '/messages', array("body" => "hello world!", "visibility" => 0));
        Message::create(array(
            "conversation_slug" => "hello",
            "body" => "hello world!",
            "visibility" => 0
        ));
    }

    public function testAllMessagesForConversation() {
        $conversation_slug = 'hello';
        $this->mockRequest('GET', Conversation::url() . "/" . $conversation_slug . '/messages', array("filter" => "staff"));
        Message::all(array(
            "conversation_slug" => "hello",
            "filter" => "staff",
        ));
    }

    public function testAllMessages() {
        $conversation_slug = 'hello';
        $this->mockRequest('GET', Message::url(), array("filter" => "staff"));
        Message::all(array(
            "filter" => "staff",
        ));
    }
}
