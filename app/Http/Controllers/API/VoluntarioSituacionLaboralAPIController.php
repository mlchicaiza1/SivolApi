<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateVoluntarioSituacionLaboralAPIRequest;
use App\Http\Requests\API\UpdateVoluntarioSituacionLaboralAPIRequest;
use App\Models\VoluntarioSituacionLaboral;
use App\Repositories\VoluntarioSituacionLaboralRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\VoluntarioSituacionLaboralResource;
use Response;

/**
 * Class VoluntarioSituacionLaboralController
 * @package App\Http\Controllers\API
 */

class VoluntarioSituacionLaboralAPIController extends AppBaseController
{
    /** @var  VoluntarioSituacionLaboralRepository */
    private $voluntarioSituacionLaboralRepository;

    public function __construct(VoluntarioSituacionLaboralRepository $voluntarioSituacionLaboralRepo)
    {
        $this->voluntarioSituacionLaboralRepository = $voluntarioSituacionLaboralRepo;
    }

    /**
     * Display a listing of the VoluntarioSituacionLaboral.
     * GET|HEAD /voluntarioSituacionLaborals
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $voluntarioSituacionLaborals = $this->voluntarioSituacionLaboralRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(VoluntarioSituacionLaboralResource::collection($voluntarioSituacionLaborals), 'Voluntario Situacion Laborals retrieved successfully');
    }

    /**
     * Store a newly created VoluntarioSituacionLaboral in storage.
     * POST /voluntarioSituacionLaborals
     *
     * @param CreateVoluntarioSituacionLaboralAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateVoluntarioSituacionLaboralAPIRequest $request)
    {
        $input = $request->all();

        $voluntarioSituacionLaboral = $this->voluntarioSituacionLaboralRepository->create($input);

        return $this->sendResponse(new VoluntarioSituacionLaboralResource($voluntarioSituacionLaboral), 'Voluntario Situacion Laboral saved successfully');
    }

    /**
     * Display the specified VoluntarioSituacionLaboral.
     * GET|HEAD /voluntarioSituacionLaborals/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var VoluntarioSituacionLaboral $voluntarioSituacionLaboral */
        $voluntarioSituacionLaboral = $this->voluntarioSituacionLaboralRepository->find($id);

        if (empty($voluntarioSituacionLaboral)) {
            return $this->sendError('Voluntario Situacion Laboral not found');
        }

        return $this->sendResponse(new VoluntarioSituacionLaboralResource($voluntarioSituacionLaboral), 'Voluntario Situacion Laboral retrieved successfully');
    }

    /**
     * Update the specified VoluntarioSituacionLaboral in storage.
     * PUT/PATCH /voluntarioSituacionLaborals/{id}
     *
     * @param int $id
     * @param UpdateVoluntarioSituacionLaboralAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVoluntarioSituacionLaboralAPIRequest $request)
    {
        $input = $request->all();



        $voluntarioSituacionLaboral = $this->voluntarioSituacionLaboralRepository->updateStoreProcedure($input, $id);

        return response()->json(['status' => true, 'data' => $voluntarioSituacionLaboral]);
    }

    /**
     * Remove the specified VoluntarioSituacionLaboral from storage.
     * DELETE /voluntarioSituacionLaborals/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var VoluntarioSituacionLaboral $voluntarioSituacionLaboral */
        $voluntarioSituacionLaboral = $this->voluntarioSituacionLaboralRepository->find($id);

        if (empty($voluntarioSituacionLaboral)) {
            return $this->sendError('Voluntario Situacion Laboral not found');
        }

        $voluntarioSituacionLaboral->delete();

        return $this->sendSuccess('Voluntario Situacion Laboral deleted successfully');
    }
}
