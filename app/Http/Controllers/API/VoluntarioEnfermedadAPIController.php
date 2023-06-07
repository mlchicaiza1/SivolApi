<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateVoluntarioEnfermedadAPIRequest;
use App\Http\Requests\API\UpdateVoluntarioEnfermedadAPIRequest;
use App\Models\VoluntarioEnfermedad;
use App\Repositories\VoluntarioEnfermedadRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\VoluntarioEnfermedadResource;
use Response;

/**
 * Class VoluntarioEnfermedadController
 * @package App\Http\Controllers\API
 */

class VoluntarioEnfermedadAPIController extends AppBaseController
{
    /** @var  VoluntarioEnfermedadRepository */
    private $voluntarioEnfermedadRepository;

    public function __construct(VoluntarioEnfermedadRepository $voluntarioEnfermedadRepo)
    {
        $this->voluntarioEnfermedadRepository = $voluntarioEnfermedadRepo;
    }

    /**
     * Display a listing of the VoluntarioEnfermedad.
     * GET|HEAD /voluntarioEnfermedads
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $voluntarioEnfermedads = $this->voluntarioEnfermedadRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(VoluntarioEnfermedadResource::collection($voluntarioEnfermedads), 'Voluntario Enfermedads retrieved successfully');
    }

    /**
     * Store a newly created VoluntarioEnfermedad in storage.
     * POST /voluntarioEnfermedads
     *
     * @param CreateVoluntarioEnfermedadAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateVoluntarioEnfermedadAPIRequest $request)
    {
        $input = $request->all();

        $voluntarioEnfermedad = $this->voluntarioEnfermedadRepository->create($input);

        return $this->sendResponse(new VoluntarioEnfermedadResource($voluntarioEnfermedad), 'Voluntario Enfermedad saved successfully');
    }

    /**
     * Display the specified VoluntarioEnfermedad.
     * GET|HEAD /voluntarioEnfermedads/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var VoluntarioEnfermedad $voluntarioEnfermedad */
        $voluntarioEnfermedad = $this->voluntarioEnfermedadRepository->find($id);

        if (empty($voluntarioEnfermedad)) {
            return $this->sendError('Voluntario Enfermedad not found');
        }

        return $this->sendResponse(new VoluntarioEnfermedadResource($voluntarioEnfermedad), 'Voluntario Enfermedad retrieved successfully');
    }

    /**
     * Update the specified VoluntarioEnfermedad in storage.
     * PUT/PATCH /voluntarioEnfermedads/{id}
     *
     * @param int $id
     * @param UpdateVoluntarioEnfermedadAPIRequest $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $input = $request->all();

        $voluntarioEnfermedad = $this->voluntarioEnfermedadRepository->updateStoreProcedure($input, $id);

        return response()->json(['status' => true, 'data' => $voluntarioEnfermedad]);

    }

    /**
     * Remove the specified VoluntarioEnfermedad from storage.
     * DELETE /voluntarioEnfermedads/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var VoluntarioEnfermedad $voluntarioEnfermedad */
        $voluntarioEnfermedad = $this->voluntarioEnfermedadRepository->find($id);

        if (empty($voluntarioEnfermedad)) {
            return $this->sendError('Voluntario Enfermedad not found');
        }

        $voluntarioEnfermedad->delete();

        return $this->sendSuccess('Voluntario Enfermedad deleted successfully');
    }
}
