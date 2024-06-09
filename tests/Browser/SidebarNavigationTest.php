<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;

class SidebarNavigationTest extends DuskTestCase
{

    /** @test */
    public function it_can_visit_home_page()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(36))
                    ->visit('/')
                    ->assertPathIs('/')
                    ->assertSee('Recent Posts');
        });
    }

    /** @test */
    public function it_can_visit_profile_page()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(36))
                    ->visit('/profile')
                    ->assertPathIs('/profile')
                    ->assertSee('Profile Information');
        });
    }

    /** @test */
    public function it_can_visit_chats_page()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(36))
                    ->visit('/chats')
                    ->assertPathIs('/chats')
                    ->assertSee('Chat List');
        });
    }


    /** @test */
    public function it_can_visit_groups_page()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(36))
                    ->visit('/groups')
                    ->assertPathIs('/groups')
                    ->assertSee('Groups');
        });
    }
}
