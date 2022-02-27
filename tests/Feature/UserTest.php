<?php

namespace Tests\Feature;

use App\Models\Tweet;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{

    use RefreshDatabase;

    /**
     * @return void
     * @test
     * @author Sebastian Faber <sebastian@startup-werk.de>
     */
    public function user_should_have_many_tweets()
    {
        /** @var User $user */
        $user = User::factory()->has(Tweet::factory(3))->create();
        $this->assertCount(3, $user->tweets);
    }


}
