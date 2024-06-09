<?php

namespace Tests\Unit;

use App\Models\Group;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PostCreationTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function a_user_can_create_a_post()
    {
        $user = User::factory()->create();
        $group = Group::factory()->create();

        $this->actingAs($user);

        $response = $this->post("/groups/$group->id/create-post/handler", [
            'text' => 'Test Post',
            'group_id' => $group->id,
            'user_id' => $user->id
        ]);

        $response->assertRedirect("/groups/$group->id");
        $this->assertDatabaseHas('posts', [
            'text' => 'Test Post',
        ]);
    }
}
