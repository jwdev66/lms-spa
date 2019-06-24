<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HomeTest extends TestCase
{
    public function testIndexPageShows()
    {
        $response = $this->get(route('home'));
        $response->assertSuccessful();
    }
}
