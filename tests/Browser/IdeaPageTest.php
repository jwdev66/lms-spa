<?php

namespace Tests\Browser;

use Tests\Browser\Pages\IdeaPage;
use Tests\DuskTestCase;

class IdeaPageTest extends DuskTestCase
{
    public function testCreateIdea()
    {
        $this->browse(static function ($browser) {
            $browser->visit(new IdeaPage())
                ->createIdea();
        });
    }

}
