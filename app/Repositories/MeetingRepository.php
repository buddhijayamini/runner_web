<?php

namespace App\Repositories;

use App\Interfaces\MeetingRepositoryInterface;
use App\Models\TbmMeeting;

class MeetingRepository implements MeetingRepositoryInterface
{
    public function getAllMeetings()
    {
        return TbmMeeting::all();
    }

    public function getMeetingById($meetingId)
    {
        return TbmMeeting::findOrFail($meetingId);
    }

    public function deleteMeeting($meetingId)
    {
        TbmMeeting::destroy($meetingId);
    }

    public function createMeeting(array $meetingDetails)
    {
        return TbmMeeting::create($meetingDetails);
    }

    public function updateMeeting($meetingId, array $newDetails)
    {
        return TbmMeeting::whereId($meetingId)->update($newDetails);
    }

}
