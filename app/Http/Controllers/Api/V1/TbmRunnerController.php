<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\APIController;
use App\Models\TbmRunner;
use App\Http\Requests\StoreTbmRunnerRequest;
use App\Http\Requests\UpdateTbmRunnerRequest;
use App\Interfaces\RunnerRepositoryInterface;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class TbmRunnerController extends APIController
{
    private RunnerRepositoryInterface $runnerRepository;

    public function __construct(RunnerRepositoryInterface $runnerRepository)
    {
        $this->runnerRepository = $runnerRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse
    {
        return response()->json([
            'data' => $this->runnerRepository->getAllRunners()
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
     * @param  \App\Http\Requests\StoreTbmRunnerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTbmRunnerRequest $request): JsonResponse
    {
        try{
            $validatedData = $request->validated();

            return response()->json(
                [
                    'data' => $this->runnerRepository->createRunner($validatedData)
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
     * @param  \App\Models\TbmRunner  $tbmRunner
     * @return \Illuminate\Http\Response
     */
    public function show(TbmRunner $tbmRunner,Request $request): JsonResponse
    {
        try {
            $runnerId = $request->route('id');

            return response()->json([
                'data' => $this->runnerRepository->getRunnerById($runnerId)
            ]);
        } catch (Exception $e) {
            return $this->errorResponse(500,'Error View resource.');
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TbmRunner  $tbmRunner
     * @return \Illuminate\Http\Response
     */
    public function edit(TbmRunner $tbmRunner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Http\Requests\UpdateTbmRunnerRequest  $request
     * @param  \App\Models\TbmRunner  $tbmRunner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,UpdateTbmRunnerRequest $request1, TbmRunner $tbmRunner): JsonResponse
    {
        try{
            $runnerId = $request->route('id');
            $runnerDetails = $request1->validated();

            return response()->json([
                'data' => $this->runnerRepository->updateRunner($runnerId, $runnerDetails)
            ]);
          }catch(Exception $e){
            return $this->errorResponse(500,'Error update resource.');
          }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\TbmRunner  $tbmRunner
     * @return \Illuminate\Http\Response
     */
    public function destroy(TbmRunner $tbmRunner,Request $request): JsonResponse
    {
        try{
            $runnerId = $request->route('id');

            $result  = $this->runnerRepository->deleteRunner($runnerId);

                $response = self::successResponse('Deleted successfully.');
                return $response;

        }catch(Exception $e){
            return $this->errorResponse(500,'Error deleting resource.');
        }
    }

    public function showFormData(TbmRunner $tbmRunner,Request $request): JsonResponse
    {
        try {
            $runnerId = $request->route('runnerId');

            $runnerData = response()->json([
                'runner_name' => $this->runnerRepository->getRunnerNameById($runnerId),
                'runner_data' => $this->runnerRepository->getFormDataById($runnerId),
                'Last_runs' => $this->runnerRepository->getFormLastRunnerById($runnerId)
            ]);

            return response()->json([
                'success' => true,
                'data' => $runnerData,
                'status' => 200
            ], 200);

        } catch (Exception $e) {
            return $this->errorResponse(500,'Error View resource.');
        }

    }
}
