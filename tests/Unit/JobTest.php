<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class JobTest extends TestCase
{
    use WithoutMiddleware, RefreshDatabase;

    public function testTotalIncomeReturnsCorrectSumOfJobSalary()
    {

        $this->withoutExceptionHandling();

        $user = \App\Models\User::factory()->create([
            'id' => 1
        ]);

        $jobs = \App\Models\Job::factory(2)->create([
            'user_id' => 1
        ]);


        $this->actingAs($user,'api');

        $response = $this->get('/api/user/1/jobs');

        $content_decode = json_decode($response->content());

        $this->assertEquals($jobs->sum('salary'), $content_decode->meta->total_income);

        /* dump($jobs->sum('salary'));
         dd($content_decode->meta->total_income);*/


    }


}
