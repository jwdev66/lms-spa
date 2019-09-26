<?php namespace Tests\Repositories;

use App\Models\Idea\Idea;
use App\Repositories\Idea\IdeaRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class IdeaRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var IdeaRepository
     */
    protected $ideaRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->ideaRepo = \App::make(IdeaRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_idea()
    {
        $idea = factory(Idea::class)->make()->toArray();

        $createdIdea = $this->ideaRepo->create($idea);

        $createdIdea = $createdIdea->toArray();
        $this->assertArrayHasKey('id', $createdIdea);
        $this->assertNotNull($createdIdea['id'], 'Created Idea must have id specified');
        $this->assertNotNull(Idea::find($createdIdea['id']), 'Idea with given id must be in DB');
        $this->assertModelData($idea, $createdIdea);
    }

    /**
     * @test read
     */
    public function test_read_idea()
    {
        $idea = factory(Idea::class)->create();

        $dbIdea = $this->ideaRepo->find($idea->id);

        $dbIdea = $dbIdea->toArray();
        $this->assertModelData($idea->toArray(), $dbIdea);
    }

    /**
     * @test update
     */
    public function test_update_idea()
    {
        $idea = factory(Idea::class)->create();
        $fakeIdea = factory(Idea::class)->make()->toArray();

        $updatedIdea = $this->ideaRepo->update($fakeIdea, $idea->id);

        $this->assertModelData($fakeIdea, $updatedIdea->toArray());
        $dbIdea = $this->ideaRepo->find($idea->id);
        $this->assertModelData($fakeIdea, $dbIdea->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_idea()
    {
        $idea = factory(Idea::class)->create();

        $resp = $this->ideaRepo->delete($idea->id);

        $this->assertTrue($resp);
        $this->assertNull(Idea::find($idea->id), 'Idea should not exist in DB');
    }
}
