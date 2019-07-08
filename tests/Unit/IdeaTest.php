<?php

namespace Tests\Unit;

use App\Idea;
use Tests\TestCase;

class IdeaTest extends TestCase
{
    public function testCreateBranch()
    {
        $data = [
            'title'       => 'some title',
            'description' => 'some description',
        ];
        $idea = new Idea($data);
        $this->assertEquals($data['title'], $idea->title);
        $this->assertEquals($data['description'], $idea->description);
    }
}
