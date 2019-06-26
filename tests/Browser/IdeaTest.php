<?php

namespace Tests\Browser;

use Tests\Browser\Pages\Idea;
use Tests\DuskTestCase;

class IdeaTest extends DuskTestCase
{
    public function testCreateIdea()
    {
        $this->browse(function ($browser) {
            $browser->visit(new Idea)
                ->createIdea();
        });
    }

}
