<?php

namespace App\Interfaces;

interface MeetingRepositoryInterface
{
    public function getAllMeetings();
    public function getMeetingById($meetingId);
    public function deleteMeeting($meetingId);
    public function createMeeting(array $meetingDetails);
    public function updateMeeting($meetingId, array $newDetails);
}
