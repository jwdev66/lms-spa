<?php

namespace Tests\Browser\Auth;

use Tests\Browser\Pages\Auth\LoginPage;
use Tests\DuskTestCase;

class LoginPageTest extends DuskTestCase
{
    public function testUserLogin()
    {
        $this->browse(static function ($browser) {
            $browser->visit(new LoginPage())
                ->testLogin();
        });
    }

}
