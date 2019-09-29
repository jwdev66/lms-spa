<?php namespace Tests\APIs;

use App\Models\Idea\Idea;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\ApiTestTrait;
use Tests\TestCase;

class IdeaApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_idea()
    {
        $idea = factory(Idea::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/idea/ideas', $idea
        );

        $this->assertApiResponse($idea);
    }

    /**
     * @test
     */
    public function test_read_idea()
    {
        $idea = factory(Idea::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/idea/ideas/' . $idea->id
        );

        $this->assertApiResponse($idea->toArray());
    }

    /**
     * @test
     */
    public function test_update_idea()
    {
        $idea = factory(Idea::class)->create();
        $editedIdea = factory(Idea::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/idea/ideas/' . $idea->id,
            $editedIdea
        );

        $this->assertApiResponse($editedIdea);
    }

    /**
     * @test
     */
    public function test_delete_idea()
    {
        $idea = factory(Idea::class)->create();

        $this->response = $this->json(
            'DELETE',
            '/api/idea/ideas/' . $idea->id
        );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/idea/ideas/' . $idea->id
        );

        $this->response->assertStatus(404);
    }
}
