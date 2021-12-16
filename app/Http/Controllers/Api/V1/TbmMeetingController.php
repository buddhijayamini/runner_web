<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\APIController;
use App\Models\TbmMeeting;
use App\Http\Requests\StoreTbmMeetingRequest;
use App\Http\Requests\UpdateTbmMeetingRequest;
use App\Interfaces\MeetingRepositoryInterface;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class TbmMeetingController extends APIController
{
    private MeetingRepositoryInterface $meetingRepository;

    public function __construct(MeetingRepositoryInterface $meetingRepository)
    {
        $this->meetingRepository = $meetingRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): JsonResponse
    {
        if(Auth::check()){
            return $this->responseUnauthorized();
        }

        return response()->json([
            'data' => $this->meetingRepository->getAllMeetings()
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
     * @param  \App\Http\Requests\StoreTbmMeetingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTbmMeetingRequest $request): JsonResponse
    {
        try{
        $validatedData = $request->validated();

        // if ($validatedData->fails())
        // {
        //     return response(['errors'=>$validator->errors()->all()], 422);
        // }
        return response()->json(
            [
                'data' => $this->meetingRepository->createMeeting($validatedData)
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
     * @param  \App\Models\TbmMeeting  $tbmMeeting
     * @return \Illuminate\Http\Response
     */
    public function show(TbmMeeting $tbmMeeting,Request $request): JsonResponse
    {

      if(Auth::check()){
            return $this->responseUnauthorized();
        }

        try {

            $meetingId = $request->route('id');

            return response()->json([
                'data' => $this->meetingRepository->getMeetingById($meetingId)
            ]);

        } catch (Exception $e) {
            return $this->errorResponse(500,'Error View resource.');
        }


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TbmMeeting  $tbmMeeting
     * @return \Illuminate\Http\Response
     */
    public function edit(TbmMeeting $tbmMeeting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTbmMeetingRequest  $request1
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\TbmMeeting  $tbmMeeting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,UpdateTbmMeetingRequest  $request1,TbmMeeting $tbmMeeting): JsonResponse
    {
     try{
        $meetingId = $request->route('id');
        $meetingDetails = $request1->validated();

        return response()->json([
            'data' => $this->meetingRepository->updateMeeting($meetingId, $meetingDetails)
        ]);
      }catch(Exception $e){
        return $this->errorResponse(500,'Error update resource.');
      }
    }

    /**
     * Remove the specified resource from storage.
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\TbmMeeting  $tbmMeeting
     * @return \Illuminate\Http\Response
     */
      public function destroy(Request $request,TbmMeeting  $tbmMeeting): JsonResponse
    {
        try{
            $meetingId = $request->route('id');

            $result  = $this->meetingRepository->deleteMeeting($meetingId);

                $response = self::successResponse('Deleted successfully.');
                return $response;

        }catch(Exception $e){
            return $this->errorResponse(500,'Error deleting resource.');
        }

    }
}
