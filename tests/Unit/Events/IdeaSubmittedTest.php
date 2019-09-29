<?php

namespace Tests\Unit\Events;

use App\Events\IdeaSubmitted;
use App\Models\Idea\Idea;
use App\User;
use Tests\SimpleTestCase;

class IdeaSubmittedTest extends SimpleTestCase
{
    public function test_event_constructor()
    {
        $user = factory(User::class)->make();
        $idea = factory(Idea::class)->make();

        $e = new IdeaSubmitted($user, $idea);

        $this->assertSame($idea, $e->idea);
        $this->assertSame($user, $e->user);
    }
}
