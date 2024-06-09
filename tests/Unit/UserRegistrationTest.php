<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserRegistrationTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function a_user_can_register()
    {
        $response = $this->post('/account/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
        ]);

        $response->assertRedirect('/');
        $this->assertDatabaseHas('users', [
            'email' => 'test@example.com',
        ]);
    }
}
