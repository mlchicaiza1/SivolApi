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
    public function store(CreateVoluntarioVacunaAPIRequest $request)
    {
        $input = $request->all();

        //$voluntarioVacuna = $this->voluntarioVacunaRepository->create($input);
        $voluntarioVacuna = DB::select('CALL cre_sp_agregarvoluntariovacuna(?)',[$input]);
        dd($voluntarioVacuna);

        return $this->sendResponse(new VoluntarioVacunaResource($voluntarioVacuna), 'Voluntario Vacuna saved successfully');
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
    public function update($id, UpdateVoluntarioVacunaAPIRequest $request)
    {
        $input = $request->all();

        /** @var VoluntarioVacuna $voluntarioVacuna */
        $voluntarioVacuna = $this->voluntarioVacunaRepository->find($id);

        if (empty($voluntarioVacuna)) {
            return $this->sendError('Voluntario Vacuna not found');
        }

        //$voluntarioVacuna = $this->voluntarioVacunaRepository->update($input, $id);

        $voluntarioVacuna = DB::select('CALL cre_sp_actualizarvoluntariovacuna(?,?)',[$input, $id]);
        dd($voluntarioVacuna);

        return $this->sendResponse(new VoluntarioVacunaResource($voluntarioVacuna), 'VoluntarioVacuna updated successfully');
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
    public function destroy($id)
    {
        /** @var VoluntarioVacuna $voluntarioVacuna */
        //$voluntarioVacuna = $this->voluntarioVacunaRepository->find($id);

        if (empty($voluntarioVacuna)) {
            return $this->sendError('Voluntario Vacuna not found');
        }

        //$voluntarioVacuna->delete();
        $voluntarioVacuna = DB::select('CALL  cre_sp_eliminarvoluntariovacuna(?)',[$id]);
        dd($voluntarioVacuna);

        return $this->sendSuccess('Voluntario Vacuna deleted successfully');
    }
}
