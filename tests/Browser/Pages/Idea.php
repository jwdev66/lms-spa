<?php

namespace Tests\Browser\Pages\Admin;

use Laravel\Dusk\Browser;
use Tests\Browser\Pages\Page;

class Idea extends Page
{

    public function url()
    {
        return '/ideas';
    }

    public function createIdea(Browser $browser)
    {

        $user = \App\User::findOrFail(1);

        $browser->loginAs($user)
            ->visit($this->url())
            ->clickLink(' Add New ');

        $browser->waitFor('@modalCreate', 3)
            ->whenAvailable('@modalCreate', function ($modal) {
                $modal->type('title', 'This cool title');
                $modal->type('description', 'best description ever');
                $modal->press('Create');
            })
            ->assertSee('Idea created successfully.')
            ->clickLink('Logout');

    }

    public function elements()
    {
        return [
            '@element' => '#selector',
            '@modalCreate' => '#modalCreateIdea',
            '@email' => 'input[name=email]',
        ];
    }
}
