<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\User\Avatar;

class AvatarApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_avatar()
    {
        $avatar = factory(Avatar::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/user/avatars', $avatar
        );

        $this->assertApiResponse($avatar);
    }

    /**
     * @test
     */
    public function test_read_avatar()
    {
        $avatar = factory(Avatar::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/user/avatars/'.$avatar->id
        );

        $this->assertApiResponse($avatar->toArray());
    }

    /**
     * @test
     */
    public function test_update_avatar()
    {
        $avatar = factory(Avatar::class)->create();
        $editedAvatar = factory(Avatar::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/user/avatars/'.$avatar->id,
            $editedAvatar
        );

        $this->assertApiResponse($editedAvatar);
    }

    /**
     * @test
     */
    public function test_delete_avatar()
    {
        $avatar = factory(Avatar::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/user/avatars/'.$avatar->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/user/avatars/'.$avatar->id
        );

        $this->response->assertStatus(404);
    }
}
