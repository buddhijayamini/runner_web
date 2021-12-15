<?php

namespace App\Repositories;

use App\Interfaces\RaceRepositoryInterface;
use App\Models\TbmRace;

class RaceRepository implements RaceRepositoryInterface
{
    public function getAllRaces()
    {
        return TbmRace::all();
    }

    public function getRaceById($raceId)
    {
        return TbmRace::findOrFail($raceId);
    }

    public function deleteRace($raceId)
    {
        TbmRace::destroy($raceId);
    }

    public function createRace(array $raceDetails)
    {
        return TbmRace::create($raceDetails);
    }

    public function updateRace($raceId, array $newDetails)
    {
        return TbmRace::whereId($raceId)->update($newDetails);
    }

}
