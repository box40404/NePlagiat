<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;

class UserLoginTest extends DuskTestCase
{

    /** @test */
    public function a_user_can_login()
    {
        $user = User::factory()->create([
            'password' => 'password',
        ]);

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/account/login')
                    ->type('email', $user->email)
                    ->type('password', 'password')
                    ->press('log in')
                    ->assertPathIs('/');
        });
    }
}
