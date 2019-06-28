<?php

namespace Tests\Browser\Pages;

use Laravel\Dusk\Browser;


class DocumentPage extends Page
{

    public function url()
    {
        return '/document';
    }


    public function createDocument(Browser $browser)
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
