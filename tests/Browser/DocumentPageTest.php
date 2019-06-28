<?php

namespace Tests\Browser;

use Tests\Browser\Pages\DocumentPage;
use Tests\DuskTestCase;

class DocumentPageTest extends DuskTestCase
{
    public function testCreateDocument()
    {
        $this->browse(static function ($browser) {
            $browser->visit(new DocumentPage)
                ->createDocument();
        });
    }

}
