<?php

namespace Tests\Browser\Pages\Admin;

use Laravel\Dusk\Browser;
use Tests\Browser\Pages\Page;

class User extends Page
{

    public function url()
    {
        return '/';
    }


    public function assert(Browser $browser)
    {
        $browser->assertPathIs($this->url());
    }

    /**
     * Get the element shortcuts for the page.
     *
     * @return array
     */
    public function elements()
    {
        return [
            '@element' => '#selector',
        ];
    }
}
