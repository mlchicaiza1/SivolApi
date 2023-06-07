<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateVoluntarioActividadFisicaAPIRequest;
use App\Http\Requests\API\UpdateVoluntarioActividadFisicaAPIRequest;
use App\Models\VoluntarioActividadFisica;
use App\Repositories\VoluntarioActividadFisicaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\VoluntarioActividadFisicaResource;
use Illuminate\Support\Facades\DB;
use Response;

/**
 * Class VoluntarioActividadFisicaController
 * @package App\Http\Controllers\API
 */

class VoluntarioActividadFisicaAPIController extends AppBaseController
{
    /** @var  VoluntarioActividadFisicaRepository */
    private $voluntarioActividadFisicaRepository;

    public function __construct(VoluntarioActividadFisicaRepository $voluntarioActividadFisicaRepo)
    {
        $this->voluntarioActividadFisicaRepository = $voluntarioActividadFisicaRepo;
    }

    /**
     * Display a listing of the VoluntarioActividadFisica.
     * GET|HEAD /voluntarioActividadFisicas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $voluntarioActividadFisicas = $this->voluntarioActividadFisicaRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(VoluntarioActividadFisicaResource::collection($voluntarioActividadFisicas), 'Voluntario Actividad Fisicas retrieved successfully');
    }

    /**
     * Store a newly created VoluntarioActividadFisica in storage.
     * POST /voluntarioActividadFisicas
     *
     * @param CreateVoluntarioActividadFisicaAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateVoluntarioActividadFisicaAPIRequest $request)
    {
        $input = $request->all();

        //$voluntarioActividadFisica = $this->voluntarioActividadFisicaRepository->create($input);

        $voluntarioActividadFisica = DB::select('CALL cre_sp_agregarvoluntarioactividadfisica(?)',[$input]);
        dd($voluntarioActividadFisica);

        return $this->sendResponse(new VoluntarioActividadFisicaResource($voluntarioActividadFisica), 'Voluntario Actividad Fisica saved successfully');
    }

    /**
     * Display the specified VoluntarioActividadFisica.
     * GET|HEAD /voluntarioActividadFisicas/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var VoluntarioActividadFisica $voluntarioActividadFisica */
        $voluntarioActividadFisica = $this->voluntarioActividadFisicaRepository->find($id);

        if (empty($voluntarioActividadFisica)) {
            return $this->sendError('Voluntario Actividad Fisica not found');
        }

        return $this->sendResponse(new VoluntarioActividadFisicaResource($voluntarioActividadFisica), 'Voluntario Actividad Fisica retrieved successfully');
    }

    /**
     * Update the specified VoluntarioActividadFisica in storage.
     * PUT/PATCH /voluntarioActividadFisicas/{id}
     *
     * @param int $id
     * @param UpdateVoluntarioActividadFisicaAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVoluntarioActividadFisicaAPIRequest $request)
    {
        $input = $request->all();

        /** @var VoluntarioActividadFisica $voluntarioActividadFisica */
        $voluntarioActividadFisica = $this->voluntarioActividadFisicaRepository->find($id);
        
        if (empty($voluntarioActividadFisica)) {
            return $this->sendError('Voluntario Actividad Fisica not found');
        }

        //$voluntarioActividadFisica = $this->voluntarioActividadFisicaRepository->update($input, $id);
        $voluntarioActividadFisica = DB::select('CALL cre_sp_actualizarvoluntarioactividadfisica(?,?)',[$input, $id]);
        dd($voluntarioActividadFisica);

        return $this->sendResponse(new VoluntarioActividadFisicaResource($voluntarioActividadFisica), 'VoluntarioActividadFisica updated successfully');
    }

    /**
     * Remove the specified VoluntarioActividadFisica from storage.
     * DELETE /voluntarioActividadFisicas/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var VoluntarioActividadFisica $voluntarioActividadFisica */
        //$voluntarioActividadFisica = $this->voluntarioActividadFisicaRepository->find($id);
        
        if (empty($voluntarioActividadFisica)) {
            return $this->sendError('Voluntario Actividad Fisica not found');
        }

        //$voluntarioActividadFisica->delete();
        $voluntarioActividadFisica = DB::select('CALL cre_sp_eliminarvoluntarioactividadfisica(?)',[$id]);
        dd($voluntarioActividadFisica);

        return $this->sendSuccess('Voluntario Actividad Fisica deleted successfully');
    }
}
