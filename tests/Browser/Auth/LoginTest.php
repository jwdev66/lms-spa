<?php

namespace Tests\Browser\Auth;

use Tests\Browser\Pages\Auth\Login;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    public function testUserLogin()
    {
        $this->browse(function ($browser) {
            $browser->visit(new Login())
                ->testLogin();
        });
    }

}
