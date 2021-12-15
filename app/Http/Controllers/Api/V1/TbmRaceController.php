<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\APIController;
use App\Models\TbmRace;
use App\Http\Requests\StoreTbmRaceRequest;
use App\Http\Requests\UpdateTbmRaceRequest;
use App\Interfaces\RaceRepositoryInterface;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class TbmRaceController extends APIController
{
    private RaceRepositoryInterface $raceRepository;

    public function __construct(RaceRepositoryInterface $raceRepository)
    {
        $this->raceRepository = $raceRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse
    {
        return response()->json([
            'data' => $this->raceRepository->getAllRaces()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTbmRaceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTbmRaceRequest $request): JsonResponse
    {
        try{
            $validatedData = $request->validated();

            return response()->json(
                [
                    'data' => $this->raceRepository->createRace($validatedData)
                ],
                Response::HTTP_CREATED
            );
          }catch(Exception $e){
            return $this->errorResponse(500,'Error save resource.');
          }
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\TbmRace  $tbmRace
     * @return \Illuminate\Http\Response
     */
    public function show(TbmRace $tbmRace,Request $request): JsonResponse
    {
        try {
            $raceId = $request->route('id');

            return response()->json([
                'data' => $this->raceRepository->getRaceById($raceId)
            ]);
        } catch (Exception $e) {
            return $this->errorResponse(500,'Error View resource.');
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TbmRace  $tbmRace
     * @return \Illuminate\Http\Response
     */
    public function edit(TbmRace $tbmRace)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Http\Requests\UpdateTbmRaceRequest  $request
     * @param  \App\Models\TbmRace  $tbmRace
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,UpdateTbmRaceRequest $request1, TbmRace $tbmRace): JsonResponse
    {
        try{
            $raceId = $request->route('id');
            $raceDetails = $request1->validated();

            return response()->json([
                'data' => $this->raceRepository->updateRace($raceId, $raceDetails)
            ]);
          }catch(Exception $e){
            return $this->errorResponse(500,'Error update resource.');
          }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\TbmRace  $tbmRace
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,TbmRace $tbmRace): JsonResponse
    {
        try{
            $raceId = $request->route('id');

            $result  = $this->raceRepository->deleteRace($raceId);

                $response = self::successResponse('Deleted successfully.');
                return $response;

        }catch(Exception $e){
            return $this->errorResponse(500,'Error deleting resource.');
        }

    }
}
