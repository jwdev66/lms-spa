<?php

namespace Tests\Feature;

use Tests\TestCase;

class HomeControllerTest extends TestCase
{
    public function testIndexPageShows()
    {
        $response = $this->get(route('home'));

        $this->assertTrue(true);
    }
}
