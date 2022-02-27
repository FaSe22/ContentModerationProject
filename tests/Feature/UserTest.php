<?php

namespace Tests\Feature;

use App\Models\Blogpost;
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
     * @group Relation
     * @author Sebastian Faber <sebastian@startup-werk.de>
     */
    public function user_should_have_many_tweets()
    {
        /** @var User $user */
        $user = User::factory()->has(Tweet::factory(3))->create();
        $this->assertCount(3, $user->tweets);
    }

    /**
     * @return void
     * @test
     * @group Relation
     * @author Sebastian Faber <sebastian@startup-werk.de>
     */
    public function user_should_have_many_blogposts()
    {
        /** @var User $user */
        $user = User::factory()->has(Blogpost::factory(3))->create();
        $this->assertCount(3, $user->blogposts);
    }


}
