<?php

namespace Tests\Browser;

use Tests\Browser\Pages\DashboardPage;
use Tests\DuskTestCase;

class DashboardPageTest extends DuskTestCase
{
    public function testCreateDashBoard()
    {
        $this->browse(static function ($browser) {
            $browser->visit(new DashboardPage)
                ->createDashBoard();
        });
    }

}
