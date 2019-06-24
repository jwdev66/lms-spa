<?php

namespace Tests\Feature;

use App\Document;
use Tests\TestCase;

class DocumentTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndexPageShows()
    {
        $response = $this->get(route('documents.index'));

        $response->assertStatus(200);
    }

    public function testIndexPageShowsAllDocuments()
    {
        $data = [
            'title' => 'Cool',
            'file' => '1234-filename.txt'
        ];

        $document = Document::create($data);

        $this->get(route('documents.index'))
            ->assertSee($data['title'])
            ->assertSee($data['file']);

    }
}
