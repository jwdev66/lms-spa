<?php

namespace Tests\Browser;

use Tests\Browser\Pages\DashBoard;
use Tests\DuskTestCase;

class DashBoardTest extends DuskTestCase
{
    public function testCreateDashBoard()
    {
        $this->browse(function ($browser) {
            $browser->visit(new DashBoard)
                ->createDashBoard();
        });
    }

}
