<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\API\User\CreateAvatarAPIRequest;
use App\Http\Requests\API\User\UpdateAvatarAPIRequest;
use App\Models\User\Avatar;
use App\Repositories\User\AvatarRepository;
use Response;

/**
 * Class AvatarController
 * @package App\Http\Controllers\API\User
 */
class AvatarAPIController extends AppBaseController
{
    /** @var  AvatarRepository */
    private $avatarRepository;

    public function __construct(AvatarRepository $avatarRepo)
    {
        $this->avatarRepository = $avatarRepo;
    }


    // todo fix this file

    /**
     * @param CreateAvatarAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/avatars",
     *      summary="Store a newly created Avatar in storage",
     *      tags={"Avatar"},
     *      description="Store Avatar",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Avatar that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Avatar")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Avatar"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateAvatarAPIRequest $request)
    {
        $input = $request->all();
        $user = User::findOrFail($input['user_id']);

        if (isset($input['avatar'])) {
            $user->addMediaFromRequest('avatar')->toMediaCollection('avatars');
        }

        $media = $user->getMedia('avatars')->first();

        return $this->sendResponse($media->toArray(), 'Avatar saved successfully');


    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/avatars/{id}",
     *      summary="Display the specified Avatar",
     *      tags={"Avatar"},
     *      description="Get Avatar",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Avatar",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Avatar"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id)
    {
        /** @var Avatar $avatar */
        $avatar = $this->avatarRepository->find($id);

        if (empty($avatar)) {
            return $this->sendError('Avatar not found');
        }

        return $this->sendResponse($avatar->toArray(), 'Avatar retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateAvatarAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/avatars/{id}",
     *      summary="Update the specified Avatar in storage",
     *      tags={"Avatar"},
     *      description="Update Avatar",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Avatar",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Avatar that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Avatar")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Avatar"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateAvatarAPIRequest $request)
    {
        $input = $request->all();

        /** @var Avatar $avatar */
        $avatar = $this->avatarRepository->find($id);

        if (empty($avatar)) {
            return $this->sendError('Avatar not found');
        }

        $avatar = $this->avatarRepository->update($input, $id);

        return $this->sendResponse($avatar->toArray(), 'Avatar updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/avatars/{id}",
     *      summary="Remove the specified Avatar from storage",
     *      tags={"Avatar"},
     *      description="Delete Avatar",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Avatar",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id)
    {
        /** @var Avatar $avatar */
        $avatar = $this->avatarRepository->find($id);

        if (empty($avatar)) {
            return $this->sendError('Avatar not found');
        }

        $avatar->delete();

        return $this->sendResponse($id, 'Avatar deleted successfully');
    }
}
