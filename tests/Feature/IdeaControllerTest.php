<?php

namespace Tests\Feature;

use Tests\TestCase;

class IdeaControllerTest extends TestCase
{
    public function testDatabase()
    {
        $idea = factory(\App\Idea::class)->make();

        $this->assertTrue(true);
    }
}
