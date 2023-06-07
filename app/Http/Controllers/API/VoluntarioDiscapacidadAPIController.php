<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateVoluntarioDiscapacidadAPIRequest;
use App\Http\Requests\API\UpdateVoluntarioDiscapacidadAPIRequest;
use App\Models\VoluntarioDiscapacidad;
use App\Repositories\VoluntarioDiscapacidadRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\VoluntarioDiscapacidadResource;
use Illuminate\Support\Facades\DB;
use Response;

/**
 * Class VoluntarioDiscapacidadController
 * @package App\Http\Controllers\API
 */

class VoluntarioDiscapacidadAPIController extends AppBaseController
{
    /** @var  VoluntarioDiscapacidadRepository */
    private $voluntarioDiscapacidadRepository;

    public function __construct(VoluntarioDiscapacidadRepository $voluntarioDiscapacidadRepo)
    {
        $this->voluntarioDiscapacidadRepository = $voluntarioDiscapacidadRepo;
    }

    /**
     * Display a listing of the VoluntarioDiscapacidad.
     * GET|HEAD /voluntarioDiscapacidads
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $voluntarioDiscapacidads = $this->voluntarioDiscapacidadRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(VoluntarioDiscapacidadResource::collection($voluntarioDiscapacidads), 'Voluntario Discapacidads retrieved successfully');
    }

    /**
     * Store a newly created VoluntarioDiscapacidad in storage.
     * POST /voluntarioDiscapacidads
     *
     * @param CreateVoluntarioDiscapacidadAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateVoluntarioDiscapacidadAPIRequest $request)
    {
        $input = $request->all();

        //$voluntarioDiscapacidad = $this->voluntarioDiscapacidadRepository->create($input);

        $voluntarioDiscapacidad = DB::select('CALL cre_sp_actualizarvoluntariodiscapacidad(?)',[$input]);
        dd($voluntarioDiscapacidad);

        return $this->sendResponse(new VoluntarioDiscapacidadResource($voluntarioDiscapacidad), 'Voluntario Discapacidad saved successfully');
    }

    /**
     * Display the specified VoluntarioDiscapacidad.
     * GET|HEAD /voluntarioDiscapacidads/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var VoluntarioDiscapacidad $voluntarioDiscapacidad */
        $voluntarioDiscapacidad = $this->voluntarioDiscapacidadRepository->find($id);

        if (empty($voluntarioDiscapacidad)) {
            return $this->sendError('Voluntario Discapacidad not found');
        }

        return $this->sendResponse(new VoluntarioDiscapacidadResource($voluntarioDiscapacidad), 'Voluntario Discapacidad retrieved successfully');
    }

    /**
     * Update the specified VoluntarioDiscapacidad in storage.
     * PUT/PATCH /voluntarioDiscapacidads/{id}
     *
     * @param int $id
     * @param UpdateVoluntarioDiscapacidadAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVoluntarioDiscapacidadAPIRequest $request)
    {
        $input = $request->all();

        /** @var VoluntarioDiscapacidad $voluntarioDiscapacidad */
        $voluntarioDiscapacidad = $this->voluntarioDiscapacidadRepository->find($id);
        
        if (empty($voluntarioDiscapacidad)) {
            return $this->sendError('Voluntario Discapacidad not found');
        }

        //$voluntarioDiscapacidad = $this->voluntarioDiscapacidadRepository->update($input, $id);
        $voluntarioDiscapacidad = DB::select('CALL cre_sp_actualizarvoluntariodiscapacidad(?,?)',[$input, $id]);
        dd($voluntarioDiscapacidad);

        return $this->sendResponse(new VoluntarioDiscapacidadResource($voluntarioDiscapacidad), 'VoluntarioDiscapacidad updated successfully');
    }

    /**
     * Remove the specified VoluntarioDiscapacidad from storage.
     * DELETE /voluntarioDiscapacidads/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var VoluntarioDiscapacidad $voluntarioDiscapacidad */
        //$voluntarioDiscapacidad = $this->voluntarioDiscapacidadRepository->find($id);

        if (empty($voluntarioDiscapacidad)) {
            return $this->sendError('Voluntario Discapacidad not found');
        }

        //$voluntarioDiscapacidad->delete();
        $voluntarioDiscapacidad = DB::select('CALL cre_sp_eliminarvoluntariodiscapacidad(?)',[$id]);
        dd($voluntarioDiscapacidad);

        return $this->sendSuccess('Voluntario Discapacidad deleted successfully');
    }
}
