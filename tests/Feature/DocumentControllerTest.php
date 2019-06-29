<?php

namespace Tests\Feature;

use App\Document;
use Tests\TestCase;

class DocumentControllerTest extends TestCase
{

    public function testIndexPageShows()
    {
        $response = $this->get(route('documents.index'));

        $this->assertTrue(true);
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
