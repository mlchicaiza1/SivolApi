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
    public function store(Request $request)
    {
        $input = $request->all();

        $voluntarioFormacionTitulo = $this->voluntarioFormacionRepository->storeFormacionTitulo($input);

        return response()->json(['status' => true, 'result' => json_decode($voluntarioFormacionTitulo)]);
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
    public function update($id, Request $request)
    {
        $input = $request->all();

        $voluntarioFormacionTitulo = $this->voluntarioFormacionRepository->updateFormacionTitulo($input, $id);

        return response()->json(['status' => true, 'result' => json_decode($voluntarioFormacionTitulo)]);
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
    public function destroy($id,Request $request)
    {
        $input = $request->all();

        $voluntarioFormacionTitulo = $this->voluntarioFormacionRepository->deleteFormacionTitulo($input, $id);

        return response()->json(['status' => true, 'result' => json_decode($voluntarioFormacionTitulo)]);
    }

    /*IDIOMA*/

    public function storeIdioma(Request $request)
    {
        $input = $request->all();

        $voluntarioFormacionIdioma = $this->voluntarioFormacionRepository->storeFormacionIdioma($input);

        return response()->json(['status' => true, 'result' => json_decode($voluntarioFormacionIdioma)]);
    }

    public function updateIdioma($id,Request $request)
    {
        $input = $request->all();

        $voluntarioFormacionIdioma = $this->voluntarioFormacionRepository->updateFormacionIdioma($input, $id);

        return response()->json(['status' => true, 'result' => json_decode($voluntarioFormacionIdioma)]);
    }

    public function deleteIdioma($id,Request $request)
    {
        $input = $request->all();

        $voluntarioFormacionIdioma = $this->voluntarioFormacionRepository->deleteFormacionIdioma($input, $id);

        return response()->json(['status' => true, 'result' => json_decode($voluntarioFormacionIdioma)]);
    }
}
