<?php

namespace App\Interfaces;

interface RaceRepositoryInterface
{
    public function getAllRaces();
    public function getRaceById($raceId);
    public function deleteRace($raceId);
    public function createRace(array $raceDetails);
    public function updateRace($raceId, array $newDetails);
}
