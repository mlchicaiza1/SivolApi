<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateActividadAPIRequest;
use App\Http\Requests\API\UpdateActividadAPIRequest;
use App\Models\Actividad;
use App\Repositories\ActividadRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\ActividadResource;
use Response;

/**
 * Class ActividadController
 * @package App\Http\Controllers\API
 */

class ActividadAPIController extends AppBaseController
{
    /** @var  ActividadRepository */
    private $actividadRepository;

    public function __construct(ActividadRepository $actividadRepo)
    {
        $this->actividadRepository = $actividadRepo;
    }

    /**
     * Display a listing of the Actividad.
     * GET|HEAD /actividads
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $actividads = $this->actividadRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(ActividadResource::collection($actividads), 'Actividads retrieved successfully');
    }

    /**
     * Store a newly created Actividad in storage.
     * POST /actividads
     *
     * @param CreateActividadAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateActividadAPIRequest $request)
    {
        $input = $request->all();

        $actividad = $this->actividadRepository->create($input);

        return $this->sendResponse(new ActividadResource($actividad), 'Actividad saved successfully');
    }

    /**
     * Display the specified Actividad.
     * GET|HEAD /actividads/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Actividad $actividad */
        $actividad = $this->actividadRepository->find($id);

        if (empty($actividad)) {
            return $this->sendError('Actividad not found');
        }

        return $this->sendResponse(new ActividadResource($actividad), 'Actividad retrieved successfully');
    }

    /**
     * Update the specified Actividad in storage.
     * PUT/PATCH /actividads/{id}
     *
     * @param int $id
     * @param UpdateActividadAPIRequest $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $input = $request->all();
        $actividad = $this->actividadRepository->updateStoreProcedure($input, $id);
        return response()->json(['status' => true, 'data' => $actividad]);
    }

    /**
     * Remove the specified Actividad from storage.
     * DELETE /actividads/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Actividad $actividad */
        $actividad = $this->actividadRepository->find($id);

        if (empty($actividad)) {
            return $this->sendError('Actividad not found');
        }

        $actividad->delete();

        return $this->sendSuccess('Actividad deleted successfully');
    }
}
