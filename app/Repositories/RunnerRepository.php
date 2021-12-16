<?php

namespace App\Repositories;


use App\Interfaces\RunnerRepositoryInterface;
use App\Models\TbmFormData;
use App\Models\TbmFormLastRunner;
use App\Models\TbmRunner;

class RunnerRepository implements RunnerRepositoryInterface
{
    public function getAllRunners()
    {
        return TbmRunner::all();
    }

    public function getRunnerById($runnerId)
    {
        return TbmRunner::findOrFail($runnerId);
    }

    public function deleteRunner($runnerId)
    {
        TbmRunner::destroy($runnerId);
    }

    public function createRunner(array $runnerDetails)
    {
        return TbmRunner::create($runnerDetails);
    }

    public function updateRunner($runnerId, array $newDetails)
    {
        return TbmRunner::whereId($runnerId)->update($newDetails);
    }

    public function getRunnerNameById($runnerId)
    {
       return TbmRunner::whereId($runnerId)->get('name');
    }

    public function getFormDataById($runnerId)
    {
        return TbmFormData::where('runner_id',$runnerId)->get(['age','sex','color']);
    }

    public function getFormLastRunnerById($runnerId)
    {
        return TbmFormLastRunner::where('runner_id',$runnerId)->get('name');

    }

}
