<?php

namespace Tests\Unit;

use App\Models\TbmMeeting;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Database\Eloquent\Factories\Factory;

class MeetTest extends TestCase
{
    use DatabaseMigrations;
   
     /** @test */
    function it_has_an_meet()
    {
        $meets = TbmMeeting::factory()->create();
        $this->assertInstanceOf('App\Models\TbmMeeting', $meets);
    }

}
