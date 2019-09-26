<?php namespace Tests\Repositories;

use App\Models\User\Avatar;
use App\Repositories\User\AvatarRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class AvatarRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var AvatarRepository
     */
    protected $avatarRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->avatarRepo = \App::make(AvatarRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_avatar()
    {
        $avatar = factory(Avatar::class)->make()->toArray();

        $createdAvatar = $this->avatarRepo->create($avatar);

        $createdAvatar = $createdAvatar->toArray();
        $this->assertArrayHasKey('id', $createdAvatar);
        $this->assertNotNull($createdAvatar['id'], 'Created Avatar must have id specified');
        $this->assertNotNull(Avatar::find($createdAvatar['id']), 'Avatar with given id must be in DB');
        $this->assertModelData($avatar, $createdAvatar);
    }

    /**
     * @test read
     */
    public function test_read_avatar()
    {
        $avatar = factory(Avatar::class)->create();

        $dbAvatar = $this->avatarRepo->find($avatar->id);

        $dbAvatar = $dbAvatar->toArray();
        $this->assertModelData($avatar->toArray(), $dbAvatar);
    }

    /**
     * @test update
     */
    public function test_update_avatar()
    {
        $avatar = factory(Avatar::class)->create();
        $fakeAvatar = factory(Avatar::class)->make()->toArray();

        $updatedAvatar = $this->avatarRepo->update($fakeAvatar, $avatar->id);

        $this->assertModelData($fakeAvatar, $updatedAvatar->toArray());
        $dbAvatar = $this->avatarRepo->find($avatar->id);
        $this->assertModelData($fakeAvatar, $dbAvatar->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_avatar()
    {
        $avatar = factory(Avatar::class)->create();

        $resp = $this->avatarRepo->delete($avatar->id);

        $this->assertTrue($resp);
        $this->assertNull(Avatar::find($avatar->id), 'Avatar should not exist in DB');
    }
}
