<?php

namespace Tests\Unit;

use App\Models\TbmMeeting;
use App\Models\TbmRace;
use App\Models\TbmRunner;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class RunnerTest extends TestCase
{
    use DatabaseMigrations;

     /** @test */
    function it_has_an_runner()
    {
        $meet=TbmMeeting::factory()->create();
        $race=TbmRace::factory(['meeting_id'=>$meet->id,'external_id'=>1,'name'=>'race 01'])->create();

        $runner = TbmRunner::factory(['race_id'=>$race->id])
                    ->create();
        $this->assertInstanceOf('App\Models\TbmRunner', $runner);
    }
}
