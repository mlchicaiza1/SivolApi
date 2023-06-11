<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateVoluntarioVacunaAPIRequest;
use App\Http\Requests\API\UpdateVoluntarioVacunaAPIRequest;
use App\Models\VoluntarioVacuna;
use App\Repositories\VoluntarioVacunaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\VoluntarioVacunaResource;
use Illuminate\Support\Facades\DB;
use Response;

/**
 * Class VoluntarioVacunaController
 * @package App\Http\Controllers\API
 */

class VoluntarioVacunaAPIController extends AppBaseController
{
    /** @var  VoluntarioVacunaRepository */
    private $voluntarioVacunaRepository;

    public function __construct(VoluntarioVacunaRepository $voluntarioVacunaRepo)
    {
        $this->voluntarioVacunaRepository = $voluntarioVacunaRepo;
    }

    /**
     * Display a listing of the VoluntarioVacuna.
     * GET|HEAD /voluntarioVacunas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $voluntarioVacunas = $this->voluntarioVacunaRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(VoluntarioVacunaResource::collection($voluntarioVacunas), 'Voluntario Vacunas retrieved successfully');
    }

    /**
     * Store a newly created VoluntarioVacuna in storage.
     * POST /voluntarioVacunas
     *
     * @param CreateVoluntarioVacunaAPIRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $voluntarioVacuna = $this->voluntarioVacunaRepository->storeVacuna($input);

        return response()->json(['status' => true, 'result' => json_decode($voluntarioVacuna)]);
    }

    /**
     * Display the specified VoluntarioVacuna.
     * GET|HEAD /voluntarioVacunas/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var VoluntarioVacuna $voluntarioVacuna */
        $voluntarioVacuna = $this->voluntarioVacunaRepository->find($id);

        if (empty($voluntarioVacuna)) {
            return $this->sendError('Voluntario Vacuna not found');
        }

        return $this->sendResponse(new VoluntarioVacunaResource($voluntarioVacuna), 'Voluntario Vacuna retrieved successfully');
    }

    /**
     * Update the specified VoluntarioVacuna in storage.
     * PUT/PATCH /voluntarioVacunas/{id}
     *
     * @param int $id
     * @param UpdateVoluntarioVacunaAPIRequest $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $input = $request->all();

        $voluntarioVacuna = $this->voluntarioVacunaRepository->updateVacuna($input, $id);

        return response()->json(['status' => true, 'result' => json_decode($voluntarioVacuna)]);
    }

    /**
     * Remove the specified VoluntarioVacuna from storage.
     * DELETE /voluntarioVacunas/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id, Request $request)
    {
        $input = $request->all();
        
        $voluntarioVacuna = $this->voluntarioVacunaRepository->deleteVacuna($input, $id);

        return response()->json(['status' => true, 'result' => json_decode($voluntarioVacuna)]);
    }
}
