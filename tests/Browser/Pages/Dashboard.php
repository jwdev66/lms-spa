<?php

namespace Tests\Browser\Pages\Admin;

use Laravel\Dusk\Browser;
use Tests\Browser\Pages\Page;

class Dashboard extends Page
{

    public function url()
    {
        return '/dashboard';
    }

    public function assert(Browser $browser)
    {
        $browser->assertPathIs($this->url());
    }

    public function elements()
    {
        return [
            '@element' => '#selector',
        ];
    }
}
