<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\Artisan;
//use PHPUnit\Framework\TestCase;

use Tests\TestCase;

class UsersTest extends TestCase
{
    use WithoutMiddleware, RefreshDatabase;

    public function testShouldPingUsersPage()
    {
        $this->get(route('users.index'))
            ->assertStatus(200);

    }


}
