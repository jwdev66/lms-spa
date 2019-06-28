<?php

namespace Tests\Browser\Pages\Auth;

use App\User;
use Illuminate\Support\Facades\Hash;
use Laravel\Dusk\Browser;
use Tests\Browser\Pages\Page;

class LoginPage extends Page
{

    public function url()
    {
        return '/login';
    }


    public function testLogin(Browser $browser)
    {
        $user = User::findOrFail(1);

        $browser->loginAs($user)
            ->visit($this->dashboardUrl())
            ->assertPathIs($this->dashboardUrl());

    }


    public function elements()
    {
        return [
            '@element' => '#selector',
            '@email' => 'input[name=email]',
            '@password' => 'input[name=password]',
        ];
    }
}
