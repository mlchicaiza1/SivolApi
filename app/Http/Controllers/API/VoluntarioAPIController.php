<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateVoluntarioAPIRequest;
use App\Http\Requests\API\UpdateVoluntarioAPIRequest;
use App\Models\Voluntario;
use App\Repositories\VoluntarioRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\VoluntarioResource;
use Response;

/**
 * Class VoluntarioController
 * @package App\Http\Controllers\API
 */

class VoluntarioAPIController extends AppBaseController
{
    /** @var  VoluntarioRepository */
    private $voluntarioRepository;

    public function __construct(VoluntarioRepository $voluntarioRepo)
    {
        $this->voluntarioRepository = $voluntarioRepo;
    }

    /**
     * Display a listing of the Voluntario.
     * GET|HEAD /voluntarios
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $voluntarios = $this->voluntarioRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(VoluntarioResource::collection($voluntarios), 'Voluntarios retrieved successfully');
    }

    /**
     * Store a newly created Voluntario in storage.
     * POST /voluntarios
     *
     * @param CreateVoluntarioAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateVoluntarioAPIRequest $request)
    {
        $input = $request->all();

        $voluntario = $this->voluntarioRepository->create($input);

        return $this->sendResponse(new VoluntarioResource($voluntario), 'Voluntario saved successfully');
    }

    /**
     * Display the specified Voluntario.
     * GET|HEAD /voluntarios/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Voluntario $voluntario */
        $voluntario = $this->voluntarioRepository->find($id);

        if (empty($voluntario)) {
            return $this->sendError('Voluntario not found');
        }

        return $this->sendResponse(new VoluntarioResource($voluntario), 'Voluntario retrieved successfully');
    }

    /**
     * Update the specified Voluntario in storage.
     * PUT/PATCH /voluntarios/{id}
     *
     * @param int $id
     * @param UpdateVoluntarioAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVoluntarioAPIRequest $request)
    {
        $input = $request->all();

        /** @var Voluntario $voluntario */
        $voluntario = $this->voluntarioRepository->find($id);

        if (empty($voluntario)) {
            return $this->sendError('Voluntario not found');
        }

        $voluntario = $this->voluntarioRepository->update($input, $id);

        return $this->sendResponse(new VoluntarioResource($voluntario), 'Voluntario updated successfully');
    }

    /**
     * Remove the specified Voluntario from storage.
     * DELETE /voluntarios/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Voluntario $voluntario */
        $voluntario = $this->voluntarioRepository->find($id);

        if (empty($voluntario)) {
            return $this->sendError('Voluntario not found');
        }

        $voluntario->delete();

        return $this->sendSuccess('Voluntario deleted successfully');
    }
}
