<?php

namespace Tests\Browser\Pages;

use Laravel\Dusk\Browser;
use Tests\Browser\Pages\Page;

class DashboardPage extends Page
{

    public function url()
    {
        return '/dashboard';
    }

    public function createDashBoard(Browser $browser)
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