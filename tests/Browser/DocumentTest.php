<?php

namespace Tests\Browser;

use Tests\Browser\Pages\Document;
use Tests\DuskTestCase;

class DocumentTest extends DuskTestCase
{
    public function testCreateDocument()
    {
        $this->browse(function ($browser) {
            $browser->visit(new Document)
                ->createDocument();
        });
    }

}
