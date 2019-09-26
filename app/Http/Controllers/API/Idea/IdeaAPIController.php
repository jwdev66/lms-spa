<?php

namespace App\Http\Controllers\API\Idea;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\API\Idea\CreateIdeaAPIRequest;
use App\Http\Requests\API\Idea\UpdateIdeaAPIRequest;
use App\Models\Idea\Idea;
use App\Repositories\Idea\IdeaRepository;
use Illuminate\Http\Request;
use Response;

/**
 * Class IdeaController
 * @package App\Http\Controllers\API\Idea
 */
class IdeaAPIController extends AppBaseController
{
    /** @var  IdeaRepository */
    private $ideaRepository;

    public function __construct(IdeaRepository $ideaRepo)
    {
        $this->ideaRepository = $ideaRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/ideas",
     *      summary="Get a listing of the Ideas.",
     *      tags={"Idea"},
     *      description="Get all Ideas",
     *      produces={"application/json"},
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
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/Idea")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
        $ideas = $this->ideaRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($ideas->toArray(), 'Ideas retrieved successfully');
    }

    /**
     * @param CreateIdeaAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/ideas",
     *      summary="Store a newly created Idea in storage",
     *      tags={"Idea"},
     *      description="Store Idea",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Idea that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Idea")
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
     *                  ref="#/definitions/Idea"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateIdeaAPIRequest $request)
    {
        $input = $request->all();

        $idea = $this->ideaRepository->create($input);

        return $this->sendResponse($idea->toArray(), 'Idea saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/ideas/{id}",
     *      summary="Display the specified Idea",
     *      tags={"Idea"},
     *      description="Get Idea",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Idea",
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
     *                  ref="#/definitions/Idea"
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
        /** @var Idea $idea */
        $idea = $this->ideaRepository->find($id);

        if (empty($idea)) {
            return $this->sendError('Idea not found');
        }

        return $this->sendResponse($idea->toArray(), 'Idea retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateIdeaAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/ideas/{id}",
     *      summary="Update the specified Idea in storage",
     *      tags={"Idea"},
     *      description="Update Idea",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Idea",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Idea that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Idea")
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
     *                  ref="#/definitions/Idea"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateIdeaAPIRequest $request)
    {
        $input = $request->all();

        /** @var Idea $idea */
        $idea = $this->ideaRepository->find($id);

        if (empty($idea)) {
            return $this->sendError('Idea not found');
        }

        $idea = $this->ideaRepository->update($input, $id);

        return $this->sendResponse($idea->toArray(), 'Idea updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/ideas/{id}",
     *      summary="Remove the specified Idea from storage",
     *      tags={"Idea"},
     *      description="Delete Idea",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Idea",
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
        /** @var Idea $idea */
        $idea = $this->ideaRepository->find($id);

        if (empty($idea)) {
            return $this->sendError('Idea not found');
        }

        $idea->delete();

        return $this->sendResponse($id, 'Idea deleted successfully');
    }
}
