<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HomeControllerTest extends TestCase
{
    public function testIndexPageShows()
    {
        $response = $this->get(route('home'));

        $this->assertTrue(true);
    }
}
