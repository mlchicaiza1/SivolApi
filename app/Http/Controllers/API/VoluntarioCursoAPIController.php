<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateVoluntarioCursoAPIRequest;
use App\Http\Requests\API\UpdateVoluntarioCursoAPIRequest;
use App\Models\VoluntarioCurso;
use App\Repositories\VoluntarioCursoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\VoluntarioCursoResource;
use Illuminate\Support\Facades\DB;
use Response;

/**
 * Class VoluntarioCursoController
 * @package App\Http\Controllers\API
 */

class VoluntarioCursoAPIController extends AppBaseController
{
    /** @var  VoluntarioCursoRepository */
    private $voluntarioCursoRepository;

    public function __construct(VoluntarioCursoRepository $voluntarioCursoRepo)
    {
        $this->voluntarioCursoRepository = $voluntarioCursoRepo;
    }

    /**
     * Display a listing of the VoluntarioCurso.
     * GET|HEAD /voluntarioCursos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $voluntarioCursos = $this->voluntarioCursoRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(VoluntarioCursoResource::collection($voluntarioCursos), 'Voluntario Cursos retrieved successfully');
    }

    /**
     * Store a newly created VoluntarioCurso in storage.
     * POST /voluntarioCursos
     *
     * @param CreateVoluntarioCursoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateVoluntarioCursoAPIRequest $request)
    {
        $input = $request->all();

        $voluntarioCurso = $this->voluntarioCursoRepository->create($input);

        return $this->sendResponse(new VoluntarioCursoResource($voluntarioCurso), 'Voluntario Curso saved successfully');
    }

    /**
     * Display the specified VoluntarioCurso.
     * GET|HEAD /voluntarioCursos/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var VoluntarioCurso $voluntarioCurso */
        //$voluntarioCurso = $this->voluntarioCursoRepository->find($id);

        /*if (empty($voluntarioCurso)) {
            return $this->sendError('Voluntario Curso not found');
        }*/

        $cursos = DB::select('CALL cre_sp_obtenervoluntariocursos(8)');
        dd($cursos);
       // return $this->sendResponse(new VoluntarioCursoResource($voluntarioCurso), 'Voluntario Curso retrieved successfully');
    }

    /**
     * Update the specified VoluntarioCurso in storage.
     * PUT/PATCH /voluntarioCursos/{id}
     *
     * @param int $id
     * @param UpdateVoluntarioCursoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVoluntarioCursoAPIRequest $request)
    {
        $input = $request->all();

        /** @var VoluntarioCurso $voluntarioCurso */
        $voluntarioCurso = $this->voluntarioCursoRepository->find($id);

        if (empty($voluntarioCurso)) {
            return $this->sendError('Voluntario Curso not found');
        }

        $voluntarioCurso = $this->voluntarioCursoRepository->update($input, $id);

        return $this->sendResponse(new VoluntarioCursoResource($voluntarioCurso), 'VoluntarioCurso updated successfully');
    }

    /**
     * Remove the specified VoluntarioCurso from storage.
     * DELETE /voluntarioCursos/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var VoluntarioCurso $voluntarioCurso */
        $voluntarioCurso = $this->voluntarioCursoRepository->find($id);

        if (empty($voluntarioCurso)) {
            return $this->sendError('Voluntario Curso not found');
        }

        $voluntarioCurso->delete();

        return $this->sendSuccess('Voluntario Curso deleted successfully');
    }
}
