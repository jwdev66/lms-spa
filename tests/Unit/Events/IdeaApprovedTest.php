<?php

namespace Tests\Unit\Events;

use App\Events\IdeaApproved;
use App\Models\Idea\Idea;
use App\User;
use Tests\SimpleTestCase;

class IdeaApprovedTest extends SimpleTestCase
{
    public function test_event_constructor()
    {
        $user = factory(User::class)->create();
        $idea = factory(Idea::class)->create();


        $e = new IdeaApproved($user, $idea);

        $this->assertSame($idea, $e->idea);
        $this->assertSame($user, $e->user);
    }
}
