<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateVoluntarioFormacionAPIRequest;
use App\Http\Requests\API\UpdateVoluntarioFormacionAPIRequest;
use App\Models\VoluntarioFormacion;
use App\Repositories\VoluntarioFormacionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\VoluntarioFormacionResource;
use Illuminate\Support\Facades\DB;
use Response;

/**
 * Class VoluntarioFormacionController
 * @package App\Http\Controllers\API
 */

class VoluntarioFormacionAPIController extends AppBaseController
{
    /** @var  VoluntarioFormacionRepository */
    private $voluntarioFormacionRepository;

    public function __construct(VoluntarioFormacionRepository $voluntarioFormacionRepo)
    {
        $this->voluntarioFormacionRepository = $voluntarioFormacionRepo;
    }

    /**
     * Display a listing of the VoluntarioFormacion.
     * GET|HEAD /voluntarioFormacions
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $voluntarioFormacions = $this->voluntarioFormacionRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(VoluntarioFormacionResource::collection($voluntarioFormacions), 'Voluntario Formacions retrieved successfully');
    }

    /**
     * Store a newly created VoluntarioFormacion in storage.
     * POST /voluntarioFormacions
     *
     * @param CreateVoluntarioFormacionAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateVoluntarioFormacionAPIRequest $request)
    {
        $input = $request->all();

        $voluntarioFormacion = $this->voluntarioFormacionRepository->create($input);

        return $this->sendResponse(new VoluntarioFormacionResource($voluntarioFormacion), 'Voluntario Formacion saved successfully');
    }

    /**
     * Display the specified VoluntarioFormacion.
     * GET|HEAD /voluntarioFormacions/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var VoluntarioFormacion $voluntarioFormacion */
        $voluntarioFormacion = $this->voluntarioFormacionRepository->find($id);

        if (empty($voluntarioFormacion)) {
            return $this->sendError('Voluntario Formacion not found');
        }

        return $this->sendResponse(new VoluntarioFormacionResource($voluntarioFormacion), 'Voluntario Formacion retrieved successfully');
    }

    /**
     * Update the specified VoluntarioFormacion in storage.
     * PUT/PATCH /voluntarioFormacions/{id}
     *
     * @param int $id
     * @param UpdateVoluntarioFormacionAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVoluntarioFormacionAPIRequest $request)
    {
        $input = $request->all();

        /** @var VoluntarioFormacion $voluntarioFormacion */
        $voluntarioFormacion = $this->voluntarioFormacionRepository->find($id);

        if (empty($voluntarioFormacion)) {
            return $this->sendError('Voluntario Formacion not found');
        }

        $voluntarioFormacion = $this->voluntarioFormacionRepository->update($input, $id);

        return $this->sendResponse(new VoluntarioFormacionResource($voluntarioFormacion), 'VoluntarioFormacion updated successfully');
    }

    /**
     * Remove the specified VoluntarioFormacion from storage.
     * DELETE /voluntarioFormacions/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var VoluntarioFormacion $voluntarioFormacion */
        //$voluntarioFormacion = $this->voluntarioFormacionRepository->find($id);

        if (empty($voluntarioFormacion)) {
            return $this->sendError('Voluntario Formacion not found');
        }

        //$voluntarioFormacion->delete();
        $voluntarioFormacion = DB::select('CALL cre_sp_eliminarvoluntarioformaciontitulo(?)',[$id]);
        dd($voluntarioFormacion);

        return $this->sendSuccess('Voluntario Formacion deleted successfully');
    }

    /*IDIOMA*/

    public function storeIdioma(CreateVoluntarioFormacionAPIRequest $request)
    {
        $input = $request->all();

        //$voluntarioFormacionIdioma = $this->voluntarioFormacionRepository->create($input);
        $voluntarioFormacionIdioma = DB::select('CALL cre_sp_agregarvoluntarioformacionidioma(?)',[$input]);
        dd($voluntarioFormacionIdioma);

        return $this->sendResponse(new VoluntarioFormacionResource($voluntarioFormacionIdioma), 'Voluntario Idioma Formacion saved successfully');
    }

    public function updatIdioma($id, UpdateVoluntarioFormacionAPIRequest $request)
    {
        $input = $request->all();

        /** @var VoluntarioFormacion $voluntarioFormacion */
        $voluntarioFormacionIdioma = $this->voluntarioFormacionRepository->find($id);

        if (empty($voluntarioFormacionIdioma)) {
            return $this->sendError('Voluntario Idioma Formacion not found');
        }

        //$voluntarioFormacion = $this->voluntarioFormacionRepository->update($input, $id);
        $voluntarioFormacionIdioma = DB::select('CALL cre_sp_actualizarvoluntarioformacionidioma(?,?)',[$input,$id]);
        dd($voluntarioFormacionIdioma);

        return $this->sendResponse(new VoluntarioFormacionResource($voluntarioFormacionIdioma), 'Voluntario Idioma Formacion updated successfully');
    }
}
