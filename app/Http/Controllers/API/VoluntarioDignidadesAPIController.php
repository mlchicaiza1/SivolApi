<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateVoluntarioDignidadesAPIRequest;
use App\Http\Requests\API\UpdateVoluntarioDignidadesAPIRequest;
use App\Models\VoluntarioDignidades;
use App\Repositories\VoluntarioDignidadesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\VoluntarioDignidadesResource;
use Illuminate\Support\Facades\DB;
use Response;

/**
 * Class VoluntarioDignidadesController
 * @package App\Http\Controllers\API
 */

class VoluntarioDignidadesAPIController extends AppBaseController
{
    /** @var  VoluntarioDignidadesRepository */
    private $voluntarioDignidadesRepository;

    public function __construct(VoluntarioDignidadesRepository $voluntarioDignidadesRepo)
    {
        $this->voluntarioDignidadesRepository = $voluntarioDignidadesRepo;
    }

    /**
     * Display a listing of the VoluntarioDignidades.
     * GET|HEAD /voluntarioDignidades
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $voluntarioDignidades = $this->voluntarioDignidadesRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(VoluntarioDignidadesResource::collection($voluntarioDignidades), 'Voluntario Dignidades retrieved successfully');
    }

    /**
     * Store a newly created VoluntarioDignidades in storage.
     * POST /voluntarioDignidades
     *
     * @param CreateVoluntarioDignidadesAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateVoluntarioDignidadesAPIRequest $request)
    {
        $input = $request->all();

        $voluntarioDignidades = $this->voluntarioDignidadesRepository->create($input);

        return $this->sendResponse(new VoluntarioDignidadesResource($voluntarioDignidades), 'Voluntario Dignidades saved successfully');
    }

    /**
     * Display the specified VoluntarioDignidades.
     * GET|HEAD /voluntarioDignidades/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var VoluntarioDignidades $voluntarioDignidades */
        //$voluntarioDignidades = $this->voluntarioDignidadesRepository->find($id);
        $voluntarioDignidades = DB::select('CALL cre_sp_obtenervoluntariodignidades(?)',[$id]);
        dd($voluntarioDignidades);

        if (empty($voluntarioDignidades)) {
            return $this->sendError('Voluntario Dignidades not found');
        }

        return $this->sendResponse(new VoluntarioDignidadesResource($voluntarioDignidades), 'Voluntario Dignidades retrieved successfully');
    }

    /**
     * Update the specified VoluntarioDignidades in storage.
     * PUT/PATCH /voluntarioDignidades/{id}
     *
     * @param int $id
     * @param UpdateVoluntarioDignidadesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVoluntarioDignidadesAPIRequest $request)
    {
        $input = $request->all();

        /** @var VoluntarioDignidades $voluntarioDignidades */
        $voluntarioDignidades = $this->voluntarioDignidadesRepository->find($id);

        if (empty($voluntarioDignidades)) {
            return $this->sendError('Voluntario Dignidades not found');
        }

        $voluntarioDignidades = $this->voluntarioDignidadesRepository->update($input, $id);

        return $this->sendResponse(new VoluntarioDignidadesResource($voluntarioDignidades), 'VoluntarioDignidades updated successfully');
    }

    /**
     * Remove the specified VoluntarioDignidades from storage.
     * DELETE /voluntarioDignidades/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var VoluntarioDignidades $voluntarioDignidades */
        $voluntarioDignidades = $this->voluntarioDignidadesRepository->find($id);

        if (empty($voluntarioDignidades)) {
            return $this->sendError('Voluntario Dignidades not found');
        }

        $voluntarioDignidades->delete();

        return $this->sendSuccess('Voluntario Dignidades deleted successfully');
    }
}
