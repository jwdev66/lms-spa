<?php

namespace Tests\Browser\Pages;

use App\User;
use Laravel\Dusk\Browser;

class IdeaPage extends Page
{

    public function url()
    {
        return '/ideas';
    }

    public function createIdea(Browser $browser)
    {

        $user = User::findOrFail(1);

        $browser->loginAs($user)
            ->visit($this->url());

        $browser->click('@add-button');

        $browser->whenAvailable('#modalAddIdea', static function ($modal) {
                $modal->type('#title', 'This cool title');
                $modal->type('#description', 'best description ever');
                $modal->press('Submit');
            })
            ->assertSee('Idea created successfully.');

    }

    public function elements()
    {
        return [

        ];
    }
}
