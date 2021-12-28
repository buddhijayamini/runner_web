<?php

namespace Tests\Unit;

use App\Models\TbmFormLastRunner;
use App\Models\TbmMeeting;
use App\Models\TbmRace;
use App\Models\TbmRunner;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LastRunnerTest extends TestCase
{
    use DatabaseMigrations;
    
     /** @test */
     function it_has_an_last()
     {
         $meet=TbmMeeting::factory()->create();
         $race=TbmRace::factory(['meeting_id'=>$meet->id,'external_id'=>1,'name'=>'race 01'])->create();

         $runner = TbmRunner::factory(['race_id'=>$race->id,'external_id'=>1,'name'=>'run 01'])
                     ->create();
         $lasts = TbmFormLastRunner::factory(['runner_id'=>$runner->id,'name'=>'form 01'])
                     ->create();
         $this->assertInstanceOf('App\Models\TbmFormLastRunner', $lasts);
     }
}
