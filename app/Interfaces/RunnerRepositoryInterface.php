<?php

namespace App\Interfaces;

interface RunnerRepositoryInterface
{
    public function getAllRunners();
    public function getRunnerById($runnerId);
    public function deleteRunner($runnerId);
    public function createRunner(array $runnerDetails);
    public function updateRunner($runnerId, array $newDetails);
    public function getFormDataById($runnerId);
    public function getFormLastRunnerById($runnerId);
}
