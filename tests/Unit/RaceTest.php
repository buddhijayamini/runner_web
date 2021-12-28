<?php

namespace Tests\Unit;

use App\Models\TbmMeeting;
use App\Models\TbmRace;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class RaceTest extends TestCase
{
    use DatabaseMigrations;
   
     /** @test */
    function it_has_an_race()
    {
        $meet=TbmMeeting::factory()->create();
        $race=TbmRace::factory(['meeting_id'=>$meet->id,'external_id'=>1,'name'=>'race 01'])->create();
        $this->assertInstanceOf('App\Models\TbmRace', $race);
    }
}
